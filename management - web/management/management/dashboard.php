<?php
session_start();
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Quản lí cửa hàng trà sữa </title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="index.css">
    </head>
    <body>
        <div class="container">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Quản lí cửa hàng trà sữa </h2>
                        </div>
                        <div class ="col-sm-6">
                            <a href="../index.php" class="btn btn-danger">Đăng xuất</a>
                        </div>
                    </div>
                </div>

                <br><br><a href="nhaccc.php" target="_self">Nhà cung cấp</a><br><br><br><br>
                <a href="trasua.php" target="_self">Trà sữa</a><br><br><br><br>
                <a href="nhanvien.php" target="_self">Nhân viên</a><br><br><br><br>
                <a href="hoadon.php" target="_self">Hóa đơn</a><br><br><br><br>
                <a href="thongke.php" target="_self">Thống kê</a><br><br><br><br>
            </div>
        </div>
    </div>
</div>
</body>

</html>