<?php

$con = mysqli_connect('127.0.0.1','root','','qlchts') 
or die ('Không thể kết nối tới database');
mysqli_set_charset($con, 'UTF8');

if(isset($_GET['delete'])){
    $mahoadon = $_GET['delete'];
    
    $sql = "DELETE FROM  hoadon WHERE mahoadon='$mahoadon'";
    $result = mysqli_query($con,$sql);
    
    echo " Đã hủy hóa đơn có mã hóa đơn là  = $mahoadon";
    
    ?>
    <br>
    <a href="hoadon.php"> Back </a>
    <?php

}
?>

