<?php

$con = mysqli_connect('127.0.0.1','root','','qlchts') 
or die ('Không thể kết nối tới database');
mysqli_set_charset($con, 'UTF8');


if(isset($_POST['add']))
{
    $mahoadon = $_POST['mahoadon'];
    $ngaylap = $_POST['ngaylap'];
    $soluong = $_POST['soluong'];
    $tongtien = $_POST['tongtien'];
    $id = $_POST['id'];
    $masanpham = $_POST['masanpham'];

    echo "$ngaylap ";
    echo "$soluong";
    echo "$tongtien";

    $sql = "INSERT INTO hoadon(mahoadon,ngaylap,soluong,tongtien,id,masanpham) VALUES ('$mahoadon','$ngaylap','$soluong','$tongtien','$id',$masanpham)";
    $result = mysqli_query($con,$sql);
    
    header("location: hoadon.php");
}
?>