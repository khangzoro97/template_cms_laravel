@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'user'
])

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Bảng user</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <div class="card-body">

                <div class="card">
                    <div class="card-header">
                        <div class="button-group-card-header">
                            {{--                @if($role_use_number == 1)--}}
                            <button id = "" type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-create-store"><i class="fa fa-plus-circle"></i> Tạo User</button>
                            {{--                @endif--}}
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example" class="table table-bordered table-striped">
                            <thead style="width: 100%">
                            <tr>
                                <th style="width:6%">STT</th>
                                <th style="width:20%">Email</th>
                                <th style="width:12%">Level</th>
                                <th style="width:20%">Tên người dùng</th>
                                <th style="width:15%">Điện thoại</th>
                                <th style="width:20%">Địa chỉ</th>
                                <th style="width:6%">Trạng thái</th>

                            </tr>
                            </thead>
                            <tbody id="table_body">
                            @if(count($user) > 0)
                                @foreach($user as $key => $value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{$value->level}}</td>
                                        <td>{{$value->full_name}}</td>
                                        <td>{{$value->phone}}</td>
                                        <td>{{$value->address}}</td>
                                        <td style="color: #00A000">@if($value->status==1)Active @else NoActive @endif </td>

                                    </tr>
                                @endforeach
                            @else
                                <td colspan="6" style="text-align: center">
                                    <h3>Không có Thông Tin</h3>
                                </td>
                            @endif

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

                {{--     modal --}}
                {{--<div class="modal fade" id="modal-admin-action-update">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Cập Nhật Thông Tin</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <form action="" method="post">
                                <div class="modal-body">
                                    @csrf

                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>--}}

                {{--     modal --}}
                <div class="modal fade" id="modal-create-store">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Tạo USER mới</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="form-horizontal" action="{{route('add_user')}}" method="post">
                                <div class="modal-body">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-body">

                                                <div class="form-group">
                                                    <label for="name">Email</label>
                                                    <input id="" type="text" class="form-control @error('txtName') is-invalid @enderror" name="email" autocomplete="number" required>
                                                    @error('txtName')
                                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Password</label>
                                                    <input id="fName" type="password" class="form-control @error('txtAddress') is-invalid @enderror" name="pass" autocomplete="number" required>
                                                    @error('txtAddress')
                                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Level</label>
                                                    <select id="level" name = "level" class="form-control select2"  value="{{ old('area') }}" autocomplete="type" style="width: 100%;">
                                                        <option>admin</option>
                                                        <option>user1</option>
                                                        <option>user2</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Họ tên</label>
                                                    <input id="fName" type="text" class="form-control @error('txtAddress') is-invalid @enderror" name="name" value=""  autocomplete="number" required>
                                                    @error('txtAddress')
                                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Số điện thoại</label>
                                                    <input id="fName" type="text" class="form-control @error('txtAddress') is-invalid @enderror" name="phone" value=""  autocomplete="number" required>
                                                    @error('txtAddress')
                                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Địa chỉ</label>
                                                    <input id="fName" type="text" class="form-control @error('txtAddress') is-invalid @enderror" name="address" value=""  autocomplete="number" required>
                                                    @error('txtAddress')
                                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                    <button id="create_member" type="submit" class="btn btn-primary">Lưu</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>

        </div>


        <!-- /.card-body -->
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

@endsection
