<html>
    <head>
        <title>Hello!</title>
        <meta charset="utf-8">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{!! asset('css/app.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/font-awesome.min.css') !!}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="{!! asset('js/app.js') !!}"></script>
    </head>
    <body>
        <table class="table" style="font-size: 12px;">
            <thead class="thead-inverse text-center">
            <tr>
                <th>STT</th>
                <th>ID</th>
                <th>Tài khoản</th>
                <th>Mật khẩu</th>
                <th>Họ tên</th>
                <th>Giới tính</th>
                <th>Email</th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                {{--<th>Tạo mới</th>--}}
                {{--<th>Cập nhật</th>--}}
                <th>Trạng Thái</th>
            </tr>
            </thead>
            <tbody>
            @foreach($kh as $index=>$k)
            <tr>
                <td>{{$index+1}}</td>
                <td>{{$k->kh_ma}}</td>
                <td>{{$k->kh_taiKhoan}}</td>
                <td>{{$k->kh_matKhau}}</td>
                <td>{{$k->kh_hoTen}}</td>
                <td>{{$k->kh_gioiTinh}}</td>
                <td>{{$k->kh_email}}</td>
                <td>{{$k->kh_ngaySinh}}</td>
                <td>{{$k->kh_diaChi}}</td>
                <td>{{$k->kh_soDienThoai}}</td>
                {{--<td>{{$k->kh_taoMoi}}</td>--}}
                {{--<td>{{$k->kh_capNhat}}</td>--}}
                <td>{{$k->kh_trangThai}}</td>
            </tr>
            </tbody>
            @endforeach
        </table>
        <div class="d-flex">
            <div class="mx-auto mt-3">
                {{$kh->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </body>
</html>