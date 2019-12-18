<?php

$con = mysqli_connect('127.0.0.1','root','','qlchts') 
or die ('Không thể kết nối tới database');
mysqli_set_charset($con, 'UTF8');
$id ='';
$ten='';
$soCMND='';
$sdt='';
if(isset($_GET['edit']))
{
    
    $id = $_GET['edit'];

    $sql = "SELECT * FROM nhanvien WHERE id = $id";
    $result = mysqli_query($con,$sql);
    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    
}
if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $ten = $_POST['ten'];
    $soCMND = $_POST['soCMND'];
    $sdt = $_POST['sdt'];
    
    
    $sql = "UPDATE nhanvien SET 
    ten 	= '$ten',
    soCMND 	= '$soCMND',
    sdt 	= '$sdt'
    WHERE id = '$id'";
    $result = mysqli_query($con,$sql); 
    header("location: nhanvien.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quản lí nhân viên</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
</head>

<body>
	<div class="col-md-6">
        <a href="nhanvien.php"> BACK </a>
        <br>
        <form action = "edit.php" method = "POST">
					
                <div class="form-group">
                    
                <input type="hidden" name="id" class="form-control"  value= "<?php echo $row['id']; ?>"  >
                </div>		
                <div class="form-group">
                    <label>Tên nhân viên</label>
                    <input type="text" name="ten" class="form-control"  value= "<?php echo $row['ten']; ?>">
                </div>
                <div class="form-group">
                    <label>Số CMND</label>
                    <input type="text" name="soCMND" class="form-control" value= "<?php echo $row['soCMND']; ?>">
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" name="sdt" class="form-control" value="<?php echo $row['sdt']; ?>">
                </div>

                <input type="submit" name="update" class="btn btn-success" value="update" >
					
		</form>
    </div>
	
</body>

</html>