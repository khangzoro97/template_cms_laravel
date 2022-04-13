@csrf
<div class="row">
    <div id = "url_image1"><input name="id_reward" value="{{$user->id}}" hidden></div>
    <div class="col-lg-12 col-sm-12">
        <div class="form-group">
            <label for="name">Email</label>
            <input id="name" type="text" class="form-control" name="txtName1" value="{{$user->email}}"  autocomplete="number" required>
        </div>
        <div class="form-group">
            <label for="name">Phân hệ người dùng</label>
            <select id="area_search" name = "txtName2" class="form-control select2"  value="{{$user->level}}" autocomplete="number" style="width: 100%;" required>
                <option value="{{$user->level}}" selected>{{$user->level}}</option>
                @foreach ($level as $value)
                    <option value="{{$value}}">{{$value}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Họ và tên</label>
            <input id="name" type="text" class="form-control" name="txtName3" value="{{$user->full_name}}"  autocomplete="number" required>
        </div>
        <div class="form-group">
            <label for="name">Số điện thoại</label>
            <input id="name" type="text" class="form-control" name="txtName4" value="{{$user->phone}}"  autocomplete="number" >
        </div>
        <div class="form-group">
            <label for="name">Địa chỉ</label>
            <input id="name" type="text" class="form-control" name="txtName5" value="{{$user->address}}"  autocomplete="number" >
        </div>
        {{--<div class="form-group">
            <meta name="csrf-token2" content="{{ csrf_token() }}">
            <label for="exampleInputEmail1">Mức độ Giải Thưởng</label>
            <select id="level" name = "txtLevel" class="form-control select2"  value="" autocomplete="txtReward" style="width: 100%;">
                <option value="1" @if($reward->level=='1') selected @endif >Giải Nhất</option>
                <option value="2" @if($reward->level=='2') selected @endif >Giải Nhì</option>
                <option value="3" @if($reward->level=='3') selected @endif >Giải Ba</option>
                <option value="4" @if($reward->level=='4') selected @endif >Giải Khuyến Khích</option>
                <option value="level" >Mức Độ Giải</option>
            </select>
        </div>
        <div class="form-group">
            <label for="name">Số lượng Giải Thưởng</label>
            <input id="quantity" type="number" class="form-control @error('txtQuatity') is-invalid
                                                      @enderror" name="txtQuatity" value="{{$reward->quantity}}"  autocomplete="number" required>
            @error('txtQuatity')
            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Giá Trị Giải Thưởng</label>
            <input id="values" type="text" class="form-control @error('txtValues') is-invalid
                                                      @enderror" name="txtValues" value="{{$reward->values}}"  autocomplete="number" required>
            @error('txtValues')
            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
            @enderror
        </div>--}}

    </div>
</div>
