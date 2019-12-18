<?php

$con = mysqli_connect('127.0.0.1','root','','qlchts') 
or die ('Không thể kết nối tới database');
mysqli_set_charset($con, 'UTF8');

if(isset($_GET['delete'])){
    $mancc = $_GET['delete'];
    
    $sql = "DELETE FROM  nhaccc WHERE mancc='$mancc'";
    $result = mysqli_query($con,$sql);
    
    echo " Đã xóa nhà cung cấp có mã nhà cung cấp  = $mancc";
    
    ?>
    <br>
    <a href="nhaccc.php"> Back </a>
    <?php

}
?>

