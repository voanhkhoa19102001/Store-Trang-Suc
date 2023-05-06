  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0099ff;">
    <a class="navbar-brand" href="/CuaHangTrangSuc/Admin">INFINITY ADMIN</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav" style="float: left;">
        <li class="nav-item active">
          <a class="nav-link" href="/CuaHangTrangSuc/Admin">Trang Chủ</a>
        </li>
        <?php
          if(isset($_SESSION['staff'])){
            echo '<li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Admin Quản Lý
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="/CuaHangTrangSuc/Admin/SanPham">Quản lý Sản Phẩm</a>
              <a class="dropdown-item" href="/CuaHangTrangSuc/Admin/HoaDon">Quản lý Hóa Đơn</a>
              <a class="dropdown-item" href="/CuaHangTrangSuc/Admin/PhieuNhap">Quản lý Phiếu Nhập</a>
              <a class="dropdown-item" href="/CuaHangTrangSuc/Admin/NhanVien">Quản lý Nhân Viên</a>
              <a class="dropdown-item" href="/CuaHangTrangSuc/Admin/KhachHang">Quản lý Khách Hàng </a>
              <a class="dropdown-item" href="/CuaHangTrangSuc/Admin/KhuyenMai">Quản lý Khuyến Mãi</a>
              <a class="dropdown-item" href="/CuaHangTrangSuc/Admin/NhaCungCap">Quản lý Nhà Cung Cấp</a>
            </div>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/CuaHangTrangSuc/Admin/ThongKe">Thống kê</a>
          </li>';
          }
        ?>
      </ul>
    </div>
    <div>
      <?php
      if (isset($_SESSION['staff'])) {
        echo '<a href="/CuaHangTrangSuc/Admin/DangXuat" style="float: right;">
        <button class="btn btn-outline-success my-2 my-sm-0" style="background-color: red;color:white;font-weight: 600;border-radius: 0.5rem;" type="submit">Đăng Xuất</button>
      </a><h4 style="float: right;margin-right: 1rem;color:white">'.$_SESSION['staff']['TENNV'].'</h4>';
      }
      else{
        echo '<a href="/CuaHangTrangSuc/Admin/DangNhap" style="float: right;">
        <button class="btn btn-outline-success my-2 my-sm-0" style="background-color: green;color:white;font-weight: 600;border-radius: 0.5rem;" type="submit">Đăng Nhập</button>
      </a>';
      }
      ?>
      
      
    </div>

  </nav>



  <!doctype html>
  <html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

  <body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="/CuaHangTrangSuc/jquery-3.6.0.js"></script>
    <script src="/CuaHangTrangSuc/processFunc.js"></script>
    <script src="/CuaHangTrangSuc/fileSave.js"></script>
    <script src="/CuaHangTrangSuc/html2canvas.js"></script>
    <script>
      var formatter = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND',

            // These options are needed to round to whole numbers if that's what you want.
            //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
            //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
        });
    </script>

  </body>

  </html>