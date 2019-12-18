<?php
ob_start();
session_start();
?>
<html>
    <head>
        <title>Trang đăng nhập</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            .edit{
                margin-top: 150px;
            }
        </style>
    </head>
    <body>
        <!-- 'start nếu xảy ra lỗi thì hiện thông báo:' -->
        <?php
        if (isset($_COOKIE["error"])) {
            ?>
            <div class="alert alert-danger">
                <strong>Có lỗi!</strong> <?php echo $_COOKIE["error"]; ?>
            </div>
        <?php } ?>
        <!-- 'end nếu xảy ra lỗi thì hiện thông báo:' -->


        <!-- 'start nếu thành công thì hiện thông báo:' -->
        <?php
        if (isset($_COOKIE["success"])) {
            ?>
            <div class="alert alert-success">
                <strong>Chúc mừng!</strong> <?php echo $_COOKIE["success"]; ?>
            </div>
        <?php } ?>
        <!-- 'end nếu thành công thì hiện thông báo:' -->
        <?php
        //Gọi file connection.php ở bài trước
        require_once("lib/connection.php");
        // Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
        if (isset($_POST["btn_submit"])) {
            // lấy thông tin người dùng
            $username = $_POST["username"];
            $password = $_POST["password"];
            //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
            //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
            $username = strip_tags($username);
            $username = addslashes($username);
            $password = strip_tags($password);
            $password = addslashes($password);
            if ($username == "" || $password == "") {
                header("location:index.php");
                setcookie("error", "Username hoặc password bạn không được để trống!", time() + 1, "/", "", 0);
            } else {
                $sql = "select * from users where username = '$username' and password = '$password' ";
                $query = mysqli_query($conn, $sql);
                $num_rows = mysqli_num_rows($query);
                if ($num_rows == 0) {
                header("location:index.php");
                setcookie("error", "Tên đăng nhập hoặc mật khẩu không đúng!", time() + 1, "/", "", 0);
                } else {
                    //tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
                    $_SESSION['username'] = $username;
                    // Thực thi hành động sau khi lưu thông tin vào session
                    // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
                    header('Location: management/dashboard.php');
                    exit();
                }
            }
        }
        ?>
        <form method="POST" action="index.php">
            <div class="edit">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <strong><center>Trang đăng nhập</center></strong>
                            <div class="form-group">
                                <label>Tài khoản:</label>
                                <input type="text" class="form-control" name="username" placeholder="Nhập tên đăng nhập...">
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu:</label>
                                <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu..." required>
                            </div>
                            <div class = "col-xs-5">
                            </div>
                            <div class = "col-xs-7">
                                <button type="submit" class="btn btn-default" name="btn_submit">Đăng nhập</button><br>
                                <a href="register.php">Tạo tài khoản mới</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>