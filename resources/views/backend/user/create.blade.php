@include('backend.user.component.breadcumb',['title'=>$config['seo']['create']['title']])
<form action="{{route('users.store')}}" class="box" method="post">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p> - Nhập thông tin chung của người sử dụng</p>
                        <p> - Lưu ý: Những trường đánh dấu <span class="text-danger">(*)</span> là bắt buộc</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">
                                        Email <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                        type="text"
                                        name="email"
                                        value="{{old('email')}}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    >
                                </div>
                                 @error('email')
                                    <div class="error-message">* {{ $message }}</div>
                                 @enderror
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">
                                        Tên người dùng <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                        type="text"
                                        name="name"
                                        value="{{old('name')}}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    >
                                </div>
                                @error('name')
                                    <div class="error-message">* {{ $message }}</div>
                                 @enderror
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">
                                        Nhóm người dùng
                                    </label>
                                    <select name="user_catalogue_id" id="" class="form-control">
                                        <option value="0">[Chọn nhóm người dùng]</option>
                                        <option value="1" @if (old('user_catalogue_id')==1)
                                                    selected
                                        @endif>Quản trị viên</option>
                                        <option value="2" @if (old('user_catalogue_id')==2)
                                                    selected
                                        @endif>Cộng tác viên</option>
                                    </select>
                                </div>
                                @error('user_catalogue_id')
                                    <div class="error-message">* {{ $message }}</div>
                                 @enderror
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">
                                        Ngày sinh
                                    </label>
                                    <input
                                        type="date"
                                        name="birthday"
                                        value="{{old('birthday')}}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">
                                        Mật khẩu <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                        type="password"
                                        name="password"
                                        value=""
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    >
                                </div>
                                @error('password')
                                    <div class="error-message">* {{ $message }}</div>
                                 @enderror
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">
                                        Nhập lại mật khẩu <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                        type="password"
                                        name="re_password"
                                        value=""
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    >
                                </div>
                                @error('re_password')
                                    <div class="error-message">* {{ $message }}</div>
                                 @enderror
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">
                                        Ảnh đại diện
                                    </label>
                                    <input
                                        type="text"
                                        name="avatar"
                                        value="{{old('avatar')}}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin liên hệ</div>
                    <div class="panel-description">
                        <p> - Nhập thông tin liên hệ của người dùng</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">
                                        Tỉnh/Thành Phố
                                    </label>
                                    <select name="province_id" id="" class="form-control setUpSelect2 province location" data-target = 'districts'>
                                        <option value="0">[Chọn Tỉnh/Thành Phố]</option>
                                        @if (isset($provinces))
                                            @foreach ($provinces as $item)
                                                <option value="{{$item->code}}"
                                                    @if (old('province_id') == $item->code)
                                                        selected
                                                    @endif>{{$item->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">
                                        Quận/Huyện
                                    </label>
                                    <select name="district_id" id="" class="form-control districts setUpSelect2 location" data-target = 'wards'>
                                        <option value="0">[Chọn Quận/Huyện]</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">
                                        Phường/Xã
                                    </label>
                                    <select name="ward_id" id="" class="form-control setUpSelect2 wards">
                                        <option value="0">[Chọn Phường/Xã]</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">
                                        Địa Chỉ
                                    </label>
                                    <input
                                        type="text"
                                        name="address"
                                        value="{{old('address')}}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">
                                        Số điện thoại
                                    </label>
                                    <input
                                        type="text"
                                        name="phone"
                                        value="{{old('phone')}}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">
                                       Ghi chú
                                    </label>
                                    <input
                                        type="text"
                                        name="description"
                                        value="{{old('description')}}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="text-right mb15">
            <button type="submit" class="btn btn-primary" value="send" name="send">Lưu Lại</button>
        </div>
    </div>
</form>
<script>
    let province_id = '{{old('province_id')}}';
    let district_id = '{{old('district_id')}}';
    let ward_id = '{{old('ward_id')}}';
</script>
