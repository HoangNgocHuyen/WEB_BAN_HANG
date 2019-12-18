<?php

$con = mysqli_connect('127.0.0.1','root','','qlchts') 
or die ('Không thể kết nối tới database');
mysqli_set_charset($con, 'UTF8');

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    
    $sql = "DELETE FROM  nhanvien WHERE id='$id'";
    $result = mysqli_query($con,$sql);
    
    echo " Đã xóa nhân viên có id = $id";
    
    ?>
    <br>
    <a href="nhanvien.php"> Back </a>
    <?php

}
?>

