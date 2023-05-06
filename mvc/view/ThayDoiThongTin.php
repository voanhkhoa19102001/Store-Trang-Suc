<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/CuaHangTrangSuc/my-css.css">
    <title><?php echo $title; ?></title>
</head>

<body>
<div class="top-header">
        <p>-~ YOUR LIFE YOUR STYLE ~-</p>
    </div>

    <nav class="navbar sticky-top navbar-expand-md navbar-light bg-light">
        <div class="container-fluid">
            <a class="navar-branch" style="cursor: pointer;" href="/CuaHangTrangSuc">
                <img src="/CuaHangTrangSuc/public/image/logo.png" alt="logo" height="45px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mx-auto " id="lsp">
                    <li class="nav-item">
                        <a class="nav-link active" style="cursor: pointer;" href="/CuaHangTrangSuc">TRANG CHỦ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="cursor: pointer;" href="/CuaHangTrangSuc/SanPham/Pages/1">SẢN PHẨM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="cursor: pointer;" href="/CuaHangTrangSuc/VongTay/Pages/1">VÒNG TAY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="cursor: pointer;" href="/CuaHangTrangSuc/DayChuyen/Pages/1">DÂY CHUYỀN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="cursor: pointer;" href="/CuaHangTrangSuc/KhuyenTai/Pages/1">KHUYÊN TAI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="cursor: pointer;" href="/CuaHangTrangSuc/Nhan/Pages/1">NHẪN</a>
                    </li>
                </ul>

            </div>
            <div class="user-nav">
            <p style="float: left;font-size: 20px">
                <?php
                    if(isset($_SESSION['account'])){
                        $user = $_SESSION['account'];
                        echo 'Xin chào, '.$user['TENKH'];
                    }
                ?>
                </p>
                <div class="dropdown-bell">
                    <i class="fa fa-bell"></i>
                    <div class="dropdown-bell-content">

                        <?php
                            $listSalePro = $data['data_sale'];
                            foreach($listSalePro as $value){
                                echo '<div style="width: 90%;margin-left: 5%;margin-top: 1rem;background-color: #ffed2b;border-radius: 0.5rem;font-size: 1.25rem;">
                                <div style="text-align: center;color: red;">Sản phẩm <b>'.$value['TENSP'].'</b> đang được giảm <b>'.$value['PHANTRAMGIAM'].'%</b> tại cửa hàng <a href="/CuaHangTrangSuc/ChiTietSanPham/SanPham/'.$value['MASP'].'" style="color: #00a2ff;font-size: 1.5rem;font-weight: 900;">Xem ngay</a></div>
                            </div>';
                            }

                        ?>
                    </div>
                </div>


                <div class="dropdown-user">
                    <i class="fa fa-user"></i><i class="fa fa-angle-down"></i>
                    <div class="dropdown-user-content">
                        <?php
                            if(isset($_SESSION['account'])){
                                echo '<a href="/CuaHangTrangSuc/LichSuGioHang">Lịch sử</a>
                                    <a href="/CuaHangTrangSuc/TrangChu/DoiMatKhau">Đổi mật khẩu</a>
                                    <a href="/CuaHangTrangSuc/TrangChu/Logout">Đăng xuất</a>';
                            }
                            else{
                                echo ' <a href="/CuaHangTrangSuc/DangNhap">Đăng nhập</a>
                                    <a href="/CuaHangTrangSuc/DangKy">Đăng ký</a>';
                            }
                        ?>                        
                    </div>
                </div>
                <a href="/CuaHangTrangSuc/GioHang" style="cursor: pointer;"><i class="fa fa-shopping-cart"></i></a>
                <span id="counter">
                    <?php
                    if (isset($_SESSION['cart'])) {
                        $count = 0;
                        foreach ($_SESSION['cart'] as $value) {
                            $count += $value['amount'];
                        }
                        echo $count;
                    } else {
                        echo 0;
                    }
                    ?>
                </span>
            </div>
        </div>
    </nav>
    <div>
        <fieldset>
            <legend><i class="fa fa-user-circle-o" aria-hidden="true"></i></legend>
            <p>THAY ĐỔI THÔNG TIN</p>
            <label for="exampleInputEmail1">Tên Khách Hàng</label>
            <div class="form-group" style="width: 80%;margin-left:10%;">
                <input style="font-family: 'Times New Roman', Times, serif;" type="text" class="form-control" id="nameCus" value="<?php echo $data['TENKH']; ?>">
            </div>
            <label for="exampleInputEmail1">Ngày Sinh</label>
            <div class="form-group" style="width: 80%;margin-left:10%;">
                <input style="font-family: 'Times New Roman', Times, serif;" type="date" class="form-control" id="birthday" value="<?php echo $data['NGAYSINH']; ?>">
            </div>
            <label for="exampleInputEmail1">Địa chỉ</label>
            <div class="form-group" style="width: 80%;margin-left:10%;">
                <input style="font-family: 'Times New Roman', Times, serif;" type="text" class="form-control" id="addressCus" value="<?php echo $data['DIACHI']; ?>">
            </div>
            <label for="exampleInputEmail1">Số điện thoại</label>
            <div class="form-group" style="width: 80%;margin-left:10%;">
                <input style="font-family: 'Times New Roman', Times, serif;" type="text" class="form-control" id="phoneCus" value="<?php echo $data['SDT']; ?>">
            </div>
            <label for="exampleInputEmail1">Giới tính</label>
            <div class="form-group" style="width: 80%;margin-left:10%;">
                <select style="font-family: 'Times New Roman', Times, serif;" class="form-control" id="sexCus">
                    <option value="Nam" <?php if ($data['GIOITINH'] == 'Nam') {
                                            echo "selected";
                                        } ?>>Nam</option>
                    <option value="Nữ" <?php if ($data['GIOITINH'] == 'Nữ') {
                                            echo "selected";
                                        } ?>>Nữ</option>
                </select>
            </div>
            <button style="float: right;margin-right: 10%;font-size: 1.5rem;width: 10rem;color: white;font-family: 'Times New Roman', Times, serif;margin: 1rem;" onclick="saveInfo();" class="btn btn-primary">Lưu</button>
        </fieldset>
    </div>
    <script>
        function saveInfo() {
            $name = $("#nameCus").val();
            $address = $("#addressCus").val();
            $phone = $("#phoneCus").val();
            $sex = $("#sexCus").val();
            $birthday = $("#birthday").val();

            if ($name == '') {
                alert("Tên khách hàng không được để trống")
                return
            }
            if ($address == 'Địa chỉ khách hàng không được để trống') {
                alert("")
                return
            }
            if ($phone == '' || $phone.length != 10 || !checkPhonne($phone)) {
                alert("Số điện thoại không hợp lệ. Số điện thoại không được chứa ký tự đặc biệt và có độ dài 10 ký tự")
                return
            }

            const arr = new Array($name, $address, $phone, $sex,$birthday);
            $.ajax({
                url: '/CuaHangTrangSuc/Admin/saveInfoAccount/'+ JSON.stringify(arr),
                success: function(data) {
                    var data = JSON.parse(data);
                    alert(data.SMS);
                }
            });
        }

        function checkPhonne($phone) {
            for (var i = 0; i < $phone.length; i++) {
                if (isNaN($phone[i])) {
                    return false;
                }
            }
            return true;
        }
    </script>
</body>