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
    <link rel="stylesheet" href="/CuaHangTrangSuc/usercss.css">
    <script src="/CuaHangTrangSuc/processFunc.js"></script>

    <title>Giỏ Hàng</title>
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
    </nav><br>
    <h2 class="title">
        <span>GIỎ HÀNG</span>
    </h2><br>
    <div style="width: 80%;margin-left: 10%;">
        <table style="width: 100%;" class="table" id="shopping-cart-id"></table>
    </div>
    <div class="footer-container">
        <div class="footer">
            <img src="/CuaHangTrangSuc/public/image/logo.png" alt="">
        </div>
        <div class="footer">
            <a href="">GIAO HÀNG</a><br>
            <a href="">BẢO HÀNH</a><br>
            <a href="">BẢO DƯỠNG</a><br>
            <a href="">ĐẶT HÀNG</a><br>
            <a href="">CỬA HÀNG</a><br>
            <a href="">LIÊN HỆ</a><br>
        </div>
        <div class="footer">
            <a href="">VỀ MILD</a><br>
            <a href="">TẠI SAO LẠI CHỌN MILD</a><br>
        </div>
        <div class="footer">
            <h3>ĐĂNG KÝ NHẬN TIN</h3><br>
            <input type="text">
            <button class="footer-btn">ĐĂNG KÝ</button>
        </div>
    </div>

    <script>
        function loadCart() {
            $.ajax({
                url: '/CuaHangTrangSuc/Admin/getCart',
                success: function(data) {
                    var data = JSON.parse(data);
                    $xhtml = '<tr>' +
                        '<th>Hình ảnh</th>' +
                        '<th>Tên sản phẩm</th>' +
                        '<th>Giá</th>' +
                        '<th>Số lượng</th>' +
                        '<th>Tổng tiền</th>' +
                        '</tr>';
                    $sum = 0;
                    for (var key in data) {
                        $obj = data[key];
                        $sum += $obj.GIA * (1 - $obj.PHANTRAMGIAM / 100) * $obj.amount;
                        $xhtml += '<tr>' +
                            '<td><img style="width:5rem;height:5rem;" src="/CuaHangTrangSuc/public/image/HINHANH/' + $obj.HINHANH + '" alt=""></td>' +
                            '<td>' +
                            '<p style="margin: 0;">' + $obj.TENSP + ' (-' + $obj.PHANTRAMGIAM + '%)</p>' +
                            '</td>' +
                            '<td>';

                        if ($obj.PHANTRAMGIAM == 0) {
                            $xhtml += '<div>' + formatter.format($obj.GIA) + ' <sup>đ</sup></div>';
                        } else {
                            $xhtml += '<div>' + formatter.format($obj.GIA * (1 - $obj.PHANTRAMGIAM / 100)) + ' <sup>đ</sup></div>';
                            $xhtml += '<div style="text-decoration: line-through;" >' + formatter.format($obj.GIA) + ' <sup>đ</sup></div>';
                        }
                        $xhtml += '</td>' +
                            '<td><input style="min-width:1rem;" id="number-product-item-' + $obj.MASP + '" type="number" onchange="changeNumberCart(\'' + $obj.MASP + '\');" placeholder="1" class="number" value="' + $obj.amount + '"><i class="fa fa-trash" onclick="deleteCartItem(\'' + $obj.MASP + '\')"></i><p style="color:red;">' + $obj.ERROR + '</p></td>' +
                            '<td>' +
                            '<div>' + formatter.format($obj.GIA * (1 - $obj.PHANTRAMGIAM / 100) * $obj.amount) + ' <sup>đ</sup></div>' +
                            '</td>' +
                            '</tr>';
                    }
                    $.ajax({
                        url: '/CuaHangTrangSuc/Admin/getSale',
                        success: function(subdata) {
                            var subdata = JSON.parse(subdata);
                            if (subdata === undefined || subdata.length == 0 || data.length == 0 || data === undefined) {
                                $xhtml += '<tr>' +
                                    '<td colspan="3">' +
                                    '</td>' +
                                    '<td colspan="2" style="text-align: end;">' +
                                    '<div class="total-price">' +
                                    formatter.format($sum) + '<sup>đ</sup>' +
                                    '</div>' +
                                    '<p style="font-size: 12px;">Tiền vận chuyển tính khi thanh toán</p>' +
                                    '<input type="button" onclick="orderCart();" value="ĐẶT HÀNG" class="cart-btn">' +
                                    '</td>' +
                                    '</tr>';

                            } else {
                                $xhtml += '<tr>' +
                                    '<td>Tổng</td>' +
                                    '<td></td>' +
                                    '<td></td>' +
                                    '<td></td>' +
                                    '<td style="text-align: end;">' +
                                    '<div class="total-price">' +formatter.format($sum) + '</div>' +
                                    '</td>' +
                                    '</tr>' +
                                    '<tr>' +
                                    '<td>Khuyến mãi</td>' +
                                    '<td></td>' +
                                    '<td>'+subdata.PHANTRAMGIAM+'%</td>' +
                                    '<td>('+subdata.NGAYBD +' đến '+ subdata.NGAYKT+')</td>' +
                                    '<td style="text-align: end;">' +
                                    '<div class="total-price">- '+formatter.format($sum*(subdata.PHANTRAMGIAM/100))+'</div>' +
                                    '</td>' +
                                    '</tr>' +
                                    '<tr>' +
                                    '<td><div class="total-price">Thành tiền</div></td>' +
                                    '<td colspan="3"></td>' +
                                    '<td style="text-align: end;">' +
                                    '<div class="total-price">'+formatter.format($sum*(1-subdata.PHANTRAMGIAM/100))+
                                '</div>' +
                                '</td>' +
                                '</tr>' +
                                '<tr>' +
                                '<td colspan="4"></td>' +
                                '<td>' +
                                '<p style="font-size: 12px;">Tiền vận chuyển tính khi thanh toán</p><input type="button" onclick="orderCart();" value="ĐẶT HÀNG" class="cart-btn"></p>' +
                                '</td>' +
                                '</tr>';
                            }

                            $("#shopping-cart-id").html($xhtml);

                        }
                    })
                }
            })
        }
        $(document).ready(function() {
            loadCart();
        });

        function changeNumberCart($id) {
            $number = ($("#number-product-item-" + $id).val());
            if (!Number.isInteger(parseInt($number)) || parseInt($number) != $number) {
                loadCart();
            } else if ($number <= 0) {
                if (confirm('Số lượng sản phẩm phải lớn hơn 0. Bạn có muốn xóa sản phẩm này không ?')) {
                    $.ajax({
                        url: '/CuaHangTrangSuc/Admin/deleteCartItem/' + $id,
                        success: function(data) {
                            alert(data);
                        }
                    })
                    loadCart();
                } else {

                    loadCart();
                }
            } else {
                $.ajax({
                    url: '/CuaHangTrangSuc/Admin/checkNumberCart/' + $id + '/' + $number,
                    success: function(data) {
                        var data = JSON.parse(data);
                        if (data.SMS != "success") {
                            alert(data.SMS);
                        }
                        loadCart();

                    }
                })
            }
        }

        function deleteCartItem($id) {
            if (confirm('Bạn có muốn xóa sản phẩm này không ?')) {
                $.ajax({
                    url: '/CuaHangTrangSuc/Admin/deleteCartItem/' + $id,
                    success: function(data) {
                        alert(data);
                    }
                })
                loadCart();
            }
        }

        function orderCart() {
            $.ajax({
                url: '/CuaHangTrangSuc/Admin/orderCart',
                success: function(data) {
                    var data = JSON.parse(data);
                    console.log(data);
                    if (data.SMS == "NOT_LOGIN") {
                        alert("Vui lòng đăng nhập để tiếp tục");
                        window.location.href = "/CuaHangTrangSuc/DangNhap?return=GioHang"
                    } else {
                        alert(data.SMS);
                    }
                    loadCart();
                }
            })
        }
    </script>
</body>

</html>