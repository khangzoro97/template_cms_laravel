@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'home'
])

@section('content')
    <div class="card-body">
        <div class="card">
            <div class="card-header">
                <div class="button-group-card-header" style="text-align: center">
                    {{--                @if($role_use_number == 1)--}}
                    <br>
                    <form action="{{route('home')}}"  enctype="multipart/form-data" style="display: flex">
                        <select id="phone" name = "phone" class="form-control select2" style="width: 20%;" required>
                            <option selected>Choose...</option>
                            @foreach ($list_sdt as $key => $value)
                                <option value="{{$value->username}}" @if($value->username==$phone) selected @endif>{{$key+1}}---{{$value->username}}</option>
                            @endforeach
                        </select>
                            <div style="margin-left: 40px">
                                <button type="submit" class="btn btn-info" style="padding: 8px 5px">
                                    <i class="fas fa-search">Tra cứu</i></button>
                            </div>
                    </form>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <h5 style="color: #0c84ff">1,Lịch sử đăng nhập</h5>
                <table style="width: 70%" id="example" class="table table-bordered table-striped">
                    <thead style="width: 70%">
                    <tr>
                        <th style="width:3%">STT</th>
                        <th style="width:10%;">PHONE</th>
                        <th style="width:10%;">NAME</th>
                        <th style="width:10%">LOGIN DATE</th>
                        <th style="width:10%">LOGIN COUNT</th>
                    </tr>
                    </thead>
                    <tbody id="table_body">

                        @foreach($result_login as $key => $value)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$phone}}</td>
                                <td>{{$full_name}}</td>
                                <td>@if($value['loginDt']!=null){{date('Y-m-d', strtotime($value['loginDt']))}}@endif</td>
                                <td>{{$value['loginCnt']}}</td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>
                <br>
                <p style="text-align: center">--------------------------------------------------------------------------------------------------------------------------------</p>
            </div>
                <div class="card-body">
                <h5 style="color: #0c84ff">2,Lịch sử học tập</h5>
                <table style="width: 100%" id="example1" class="table table-bordered table-striped">
                    <thead style="width: 100%">
                    <tr>
                        <th style="width:3%">STT</th>
                        <th style="width:10%;">Phone</th>
                        <th style="width:10%;">Name</th>
                        <th style="width:10%">Learn count</th>
                        <th style="width:10%">Learn_Date</th>
                        <th style="width:10%">Course number</th>
                        <th style="width:10%">Course name</th>
                        <th style="width:10%">Lesson number</th>
                        <th style="width:10%">Lesson name</th>
                        <th style="width:10%">Unit number</th>
                        <th style="width:10%">Unit name</th>

                        <th style="width:10%">Series number</th>
                        <th style="width:10%;">Series name </th>
                    </tr>
                    </thead>
                    <tbody id="table_body">

                    @foreach($learn_his as $key => $value)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$phone}}</td>
                            <td>{{$full_name}}</td>
                            <td>{{$value['lnCnt']}}</td>
                            <td>@if($value['lnDt']!=null){{date('Y-m-d H:m:s', strtotime($value['lnDt']))}}@endif</td>
                            <td>{{$value['cosSno']}}</td>
                            <td>{{$value['cosNm']}}</td>
                            <td>{{$value['lsSno']}}</td>
                            <td>{{$value['lsNm']}}</td>
                            <td>{{$value['untSno']}}</td>
                            <td>{{$value['untNm']}}</td>
                            <td>{{$value['srsSno']}}</td>
                            <td>{{$value['srsNm']}}</td>
                        </tr>
                    @endforeach



                    </tbody>
                </table>

            </div>
            <!-- /.card-body -->
        </div>
    </div>




    <!-- /.card-body -->


    <!-- /.card-footer-->
    <!-- /.card -->
@endsection







