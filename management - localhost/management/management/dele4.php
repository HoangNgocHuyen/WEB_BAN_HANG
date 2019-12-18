<?php

$con = mysqli_connect('127.0.0.1','root','','qlchts') 
or die ('Không thể kết nối tới database');
mysqli_set_charset($con, 'UTF8');

if(isset($_GET['delete'])){
    $masanpham = $_GET['delete'];
    
    $sql = "DELETE FROM  trasua WHERE masanpham='$masanpham'";
    $result = mysqli_query($con,$sql);
    
    echo " Đã xóa loại trà sữa có mã sản phẩm = $masanpham";
    
    ?>
    <br>
    <a href="trasua.php"> Back </a>
    <?php

}
?>

