<?php

$con = mysqli_connect('127.0.0.1','root','','qlchts') 
or die ('Không tìm th?y database');
mysqli_set_charset($con, 'UTF8');


if(isset($_POST['add']))
{
    $masanpham = $_POST['masanpham'];
    $tensanpham = $_POST['tensanpham'];
    $size = $_POST['size'];
    $dongia = $_POST['dongia'];
    $mancc = $_POST['mancc'];
    echo "$masanpham";
    echo "$tensanpham ";
    echo "$size ";
    echo "$dongia ";
    echo "$mancc ";

    $sql = "INSERT INTO trasua(masanpham,tensanpham,size,dongia,mancc) VALUES ('$masanpham','$tensanpham','$size','$dongia','$mancc')";
    $result = mysqli_query($con,$sql);
    
    header("location: trasua.php");
}
?>