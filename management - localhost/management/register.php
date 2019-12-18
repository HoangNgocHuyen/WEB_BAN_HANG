<html>
<head>
    	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="index.css">
        <style>
        .edit{
        margin-top: 100px;
        }
        </style>
</head>
        <!-- 'start nếu xảy ra lỗi thì hiện thông báo:' -->
        <?php
                if(isset($_COOKIE["error"])){
        ?>
        <div class="alert alert-danger">
                <strong>Có lỗi!</strong> <?php echo $_COOKIE["error"]; ?>
        </div>
        <?php } ?>
        <!-- 'end nếu xảy ra lỗi thì hiện thông báo:' -->


        <!-- 'start nếu thành công thì hiện thông báo:' -->
        <?php
                if(isset($_COOKIE["success"])){
        ?>
        <div class="alert alert-success">
                <strong>Chúc mừng!</strong> <?php echo $_COOKIE["success"]; ?>
        </div>
        <?php } ?>
        <!-- 'end nếu thành công thì hiện thông báo:' -->
<?php
    require_once("lib/connection.php");
    if (isset($_POST["btn_submit"])) {
    //lấy thông tin từ các form bằng phương thức POST
    $username = $_POST["username"];
    $password = $_POST["pass"];
    $pass2 = $_POST["pass2"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
    if ($username == "" || $password == "" || $name == "" || $email == "") {
        header("location:register.php");
	setcookie("error", "Vui lòng điền đủ thông tin!", time()+1, "/","", 0);
    }
        else{
        // Kiểm tra tài khoản đã tồn tại chưa
        $sql="select * from users where username='$username'";
        $kt=mysqli_query($conn, $sql);
            if(mysqli_num_rows($kt)  > 0){
                header("location:register.php");
                setcookie("error", "Tài khoản đã tồn tại", time()+1, "/","", 0);
            }
            //kiểm tra xem 2 mật khẩu có giống nhau hay không:
            if($password!=$pass2){
                header("location:register.php");
                setcookie("error", "Mật khẩu nhập lại không đúng!", time()+1, "/","", 0);
            }
            else{
            //thực hiện việc lưu trữ dữ liệu vào db
                $sql = "INSERT INTO users(
                username,
                password,
                name,
                email
                ) VALUES (
                '$username',
                '$password',
                '$name',
                '$email'
                )";
            // thực thi câu $sql với biến conn lấy từ file connection.php
            mysqli_query($conn,$sql);
            header("location:register.php");
            setcookie("success", "Đăng ký thành công!", time()+1, "/","", 0);
                }
        }
    }
?>
    <form action="register.php" method="post">
        <div class="edit">
    <div class="col-md-6 col-md-offset-3">
	<div class="panel panel-primary">
	    <div class="panel-body">
	    	<div class="form-group">
                    <label>Tên đăng nhập :</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Nhập tên đăng nhập...">
                </div>
                <div class="form-group">
                    <label>Mật khẩu :</label>
                    <input required type="password" id="pass" name="pass" class="form-control" placeholder="Nhập mật khẩu...">
                </div>
                <div class="form-group">
                    <label>Nhập lại mật khẩu:</label>
                    <input required type="password" class="form-control" id="pass2" name="pass2" placeholder="Nhập lại mật khẩu...">
                </div>
                <div class="form-group">
                    <label>Tên đầy đủ của bạn:</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên đầy đủ của bạn...">
                </div>
                <div class="form-group">
                    <label>Email của bạn:</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Nhập Email của bạn...">
                </div>
                <div class = "col-xs-5">
                </div>
                <div class = "col-xs-7">
                    <button type="submit" class="btn btn-default" name="btn_submit">Đăng ký</button><br>
                    <a href="index.php">Trang chủ</a>
                </div>
            </div>
        </div>
        </div>
        </div>
</html>