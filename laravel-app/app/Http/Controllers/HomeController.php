<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Ahc\Jwt\JWT;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $sdt=$request['phone'];


        $jwt = new JWT('f001ea2a230659e28e4220aff0c7dbd3');
        $token = $jwt->encode([
            "iss" => "MPS",
            "iat" => Carbon::now()->timestamp,
            "exp"=> Carbon::now()->addHour()->timestamp,
        ]);

        $users=DB::table('subscriptions')
            ->select('up_users.user_no','up_users.username','up_users.name')
            ->join('subscriptions_pkg_links','subscriptions.id','=','subscriptions_pkg_links.subscription_id')
            ->join('pkgs','subscriptions_pkg_links.pkg_id','=','pkgs.id')
            ->join('subscriptions_user_links','subscriptions.id','=','subscriptions_user_links.subscription_id')
            ->join('up_users','subscriptions_user_links.user_id','=','up_users.id')
            ->whereIn('pkgs.id',array(66,68))
        ->where([
            ['subscriptions.status','=',1],
            ['subscriptions.end_date','>',Carbon::now()->format('Y-m-d')],
            ['up_users.username','=',$sdt]

        ])->first();
        $list_sdt=DB::table('subscriptions')
            ->select('up_users.username')
            ->join('subscriptions_pkg_links','subscriptions.id','=','subscriptions_pkg_links.subscription_id')
            ->join('pkgs','subscriptions_pkg_links.pkg_id','=','pkgs.id')
            ->join('subscriptions_user_links','subscriptions.id','=','subscriptions_user_links.subscription_id')
            ->join('up_users','subscriptions_user_links.user_id','=','up_users.id')
            ->whereIn('pkgs.id',array(66,68))
            ->where([
                ['subscriptions.status','=',1],
                ['subscriptions.end_date','>',Carbon::now()->format('Y-m-d')]
            ])->get('username')->all();


        $result_login=[];
        $result_learn=[];
        $full_name='';
        if($users !==null){
            $u_no = $users->user_no;

            $curl = curl_init();
            $body = '{"userSno":"' . $u_no . '"}';
            $full_name = $users->name;

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://globalstd.doyose.com/appif/MIF-MPS-RC-0006',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $body,
                CURLOPT_HTTPHEADER => array(
                    'AuthTokenKey: ' . $token,
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $result = json_decode($response);
            $data = $result->resultData;
            $log_his = $data->loginHis;
            $learn_his = $data->learningHis;
            if(count($log_his)==0){
                $result_login[0]['loginDt']='';
                $result_login[0]['loginCnt']=0;
            }
            foreach ($log_his as $key=>$value){
                $result_login[$key]['loginDt'] = $value->loginDt;
                $result_login[$key]['loginCnt'] = $value->loginCnt;

            }

            if(count($learn_his)==0){
                $result_learn[0]['cosSno']='';
                $result_learn[0]['lsNm']='';
                $result_learn[0]['lsSno']='';
                $result_learn[0]['untSno']='';
                $result_learn[0]['untNm']='';
                $result_learn[0]['srsSno']='';
                $result_learn[0]['lnCnt']=0;
                $result_learn[0]['lnDt']='';
                $result_learn[0]['srsNm']='';
                $result_learn[0]['cosNm']='';
            }
            foreach ($learn_his as $key=>$value){
                $result_learn[$key]['cosSno'] = $value->cosSno;
                $result_learn[$key]['lsNm'] = $value->lsNm;
                $result_learn[$key]['lsSno'] = $value->lsSno;
                $result_learn[$key]['untSno'] = $value->untSno;
                $result_learn[$key]['untNm'] = $value->untNm;
                $result_learn[$key]['srsSno'] = $value->srsSno;
                $result_learn[$key]['lnCnt'] = $value->lnCnt;
                $result_learn[$key]['lnDt'] = $value->lnDt;
                $result_learn[$key]['srsNm'] = $value->srsNm;
                $result_learn[$key]['cosNm'] = $value->cosNm;

            }


        }

        $data1=array('result_login'=>$result_login, 'full_name' =>$full_name,'list_sdt'=>$list_sdt,'phone'=>$sdt,'title'=>"Tra cứu lịch sử khách hàng",'learn_his'=>$result_learn);

        return view('pages.home')->with($data1);
    }

    /**
     * Show the application contact.
     *
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        $title = "Liên hệ";
        return view('pages.contact', compact('title'));
    }

    public function user()
    {
        $title = "Quản lý User";
        $user = DB::table('users')
            ->get();

        return view('user.index', compact('user', 'title'));
    }

    public function add_user(Request $request)
    {
        try {
            DB::table('users')->insert([
                'email' => $request['email'],
                'password' => Hash::make($request['pass']),
                'level' => $request['level'],
                'full_name' => $request['name'],
                'phone' => $request['phone'],
                'address' => $request['address'],
                'status' => 1,
            ]);
        } catch (QueryException $ex) {
            $notification = array(
                'message' => 'Thêm User thất bại! Vui lòng nhập lại ',
                'alert-type' => 'error'
            );
            return Redirect::back()->with($notification);
        }
        $notification = array(
            'message' => 'Thêm User thành công!',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
    }

    public function delete_user($id)
    {
        DB::table('users')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Xóa thành công !',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
    }

    public function editUser($id){
        $user =DB::table('users')->where('id','=',$id)->first();
        $level = ["admin", "user1", "user3"];
        return view('user.update_user',compact('user','level'));
    }

    public function updateUser(Request $request){
        try{
            DB::table('users')
                ->where('id', '=', $request->id_reward)
                ->update([
                    'email'=> $request['txtName1'],
                    'level'=> $request['txtName2'],
                    'full_name'=> $request['txtName3'],
                    'phone'=> $request['txtName4'],
                    'address'=> $request['txtName5'],
                ]);

        }
        catch (QueryException $ex){
            $notification = array(
                'message' => 'Thông tin không chính xác! Vui lòng nhập lại ',
                'alert-type' => 'error'
            );
            return Redirect::back()->with($notification);
        }
        $notification = array(
            'message' => 'Chỉnh sửa thành công!',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
    }
}
