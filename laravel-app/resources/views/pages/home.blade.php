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
                <table style="width: 70%" id="examp" class="table table-bordered table-striped">
                    <thead style="width: 70%">
                    <tr>
                        <th style="width:3%">STT</th>
                        <th style="width:10%;">CUSTOMER</th>
                        <th style="width:10%;">FULL NAME</th>
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
                                <td>{{$value['loginDt']}}</td>
                                <td>{{$value['loginCnt']}}</td>
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







