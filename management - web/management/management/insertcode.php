<?php

$con = mysqli_connect('127.0.0.1','root','','qlchts') 
or die ('Không thể kết nối tới database');
mysqli_set_charset($con, 'UTF8');

if(isset($_POST['add']))
{
    $id = $_POST['id'];
    $ten = $_POST['ten'];
    $soCMND = $_POST['soCMND'];
    $sdt = $_POST['sdt'];

    echo "$id";
    echo "$ten ";
    echo "$soCMND ";
    echo "$sdt ";

    $sql = "INSERT INTO nhanvien(id,ten,soCMND,sdt) VALUES ('$id','$ten','$soCMND','$sdt')";
    $result = mysqli_query($con,$sql);
    header("location: nhanvien.php");
}


?>