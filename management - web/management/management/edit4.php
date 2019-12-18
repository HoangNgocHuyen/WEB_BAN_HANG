<?php

$con = mysqli_connect('127.0.0.1','root','','qlchts') 
or die ('Không thể kết nối tới database');
mysqli_set_charset($con, 'UTF8');
$masanpham ='';
$tensanpham='';
$size='';
$dongia='';
if(isset($_GET['edit']))
{
    
    $masanpham = $_GET['edit'];

    $sql = "SELECT * FROM trasua WHERE masanpham = $masanpham";
    $result = mysqli_query($con,$sql);
    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    
}
if(isset($_POST['update'])) {
    $masanpham = $_POST['masanpham'];
    $tensanpham = $_POST['tensanpham'];
    $size = $_POST['size'];
    $dongia = $_POST['dongia'];
    
    
    
    $sql = "UPDATE trasua SET 
    tensanpham 	= '$tensanpham',
    size	= '$size',
    dongia 	= '$dongia'
    WHERE masanpham = '$masanpham'";
    
    $result = mysqli_query($con,$sql); 
     header("location: trasua.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quản lí trà sữa</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
</head>

<body>
	<div class="col-md-6">
        <a href="trasua.php"> BACK </a>
        <br>
        <form action = "edit4.php" method = "POST">
					
                <div class="form-group">
                    
                <input type="hidden" name="masanpham" class="form-control"  value= "<?php echo $row['masanpham']; ?>"  >
                </div>		
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="tensanpham" class="form-control"  value= "<?php echo $row['tensanpham']; ?>">
                </div>
                <div class="form-group">
                    <label>Size</label>
                    <input type="text" name="size" class="form-control" value= "<?php echo $row['size']; ?>">
                </div>
                <div class="form-group">
                    <label>Đơn giá</label>
                    <input type="text" name="dongia" class="form-control" value="<?php echo $row['dongia']; ?>">
                </div>

                <input type="submit" name="update" class="btn btn-success" value="update" >
					
		</form>
    </div>
	
</body>

</html>