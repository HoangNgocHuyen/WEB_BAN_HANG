<?php

$con = mysqli_connect('127.0.0.1','root','','qlchts') 
or die ('Không thể kết nối tới database');
mysqli_set_charset($con, 'UTF8');
$mahoadon ='';
$ngaylap='';
$soluong='';
$tongtien='';
if(isset($_GET['edit']))
{
    
    $mahoadon = $_GET['edit'];

    $sql = "SELECT * FROM hoadon WHERE mahoadon = $mahoadon";
    $result = mysqli_query($con,$sql);
    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    
}
if(isset($_POST['update'])) {
    $mahoadon = $_POST['mahoadon'];
    $ngaylap = $_POST['ngaylap'];
    $soluong = $_POST['soluong'];
    $tongtien = $_POST['tongtien'];
    
    
    $sql = "UPDATE hoadon SET 
    ngaylap 	= '$ngaylap',
    soluong 	= '$soluong',
    tongtien 	= '$tongtien'
    WHERE mahoadon = '$mahoadon'";
    
    $result = mysqli_query($con,$sql); 
    header("location: hoadon.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quản lí hóa đơn</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
</head>

<body>
	<div class="col-md-6">
        <a href="hoadon.php"> BACK </a>
        <br>
        <form action = "edit2.php" method = "POST">
					
                <div class="form-group">
                    
                <input type="hidden" name="mahoadon" class="form-control"  value= "<?php echo $row['mahoadon']; ?>"  >
                </div>		
                <div class="form-group">
                    <label>Ngày lập</label>
                    <input type="text" name="ngaylap" class="form-control"  value= "<?php echo $row['ngaylap']; ?>">
                </div>
                <div class="form-group">
                    <label>Số lượng</label>
                    <input type="text" name="soluong" class="form-control" value= "<?php echo $row['soluong']; ?>">
                </div>
                <div class="form-group">
                    <label>Tổng tiền</label>
                    <input type="text" name="tongtien" class="form-control" value="<?php echo $row['tongtien']; ?>">
                </div>

                <input type="submit" name="update" class="btn btn-success" value="update" >
					
		</form>
    </div>
	
</body>

</html>