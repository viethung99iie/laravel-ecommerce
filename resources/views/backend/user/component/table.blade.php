<table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>
                    <input type="checkbox" class="form-check" id="checkAll" value="">
                </th>
                <th style="width: 113px;">Avatar</th>
                <th>Thông tin người dùng</th>
                <th>Địa chỉ</th>
                <th class="text-center">Trạng thái</th>
                <th class="text-center">Thao tác</th>
            </tr>
            </thead>
            <tbody>
                @if (isset($users) && is_object($users))
                @foreach ($users as $user)
                        <tr>
                <td>
                    <input type="checkbox" class="form-check" id='check' >
                </td>
                <td >
                    <span class="img-cover image "><img src="https://th.bing.com/th/id/OIP.H33ToM8hwdW580U1Tc4H3gHaHY?rs=1&pid=ImgDetMain" alt=""></span>
                </td>
                <td>
                    <p class="info-item name"><strong>Họ và tên</strong>: {{$user->name}}</p>
                    <p class="info-item email"><strong>Email</strong>: {{$user->email}}</p>
                    <p class="info-item phone"><strong>Phone</strong>: 0932164834</p>
                </td>
                <td>
                    <p class="address-item name"><strong>Địa chỉ</strong>: 470 trần đại nghĩa</p>
                       <p class="address-item name"><strong>Xã/Phường</strong>: Hòa quý</p>
                    <p class="address-item name"><strong>Huyện/Quận</strong>: Ngũ Hành Sơn</p>
                    <p class="address-item name"><strong>Tỉnh/Thành phố</strong>: Đà Nẵng</p>
                </td>
                    <td class="text-center">
                <div class="ibox-content">
                    <input type="checkbox" class="js-switch" checked />
                </div>
                </td>
                <td class="text-center">
                    <a href="#" class="btn btn-success mx-2" > <i class="fa fa-edit"></i></a>
                    <a href="#" class="btn btn-danger" > <i class="fa fa-trash"></i></a>
                </td>
            </tr>
                @endforeach
                @endif
            </tbody>
        </table>
{{$users->links('pagination::bootstrap-4')}}
