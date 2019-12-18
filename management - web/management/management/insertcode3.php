<?php

$con = mysqli_connect('127.0.0.1','root','','qlchts') 
or die ('Không thể kết nối tới database');
mysqli_set_charset($con, 'UTF8');


if(isset($_POST['add']))
{
    $mancc = $_POST['mancc'];
    $tenncc = $_POST['tenncc'];
    $diachi = $_POST['diachi'];
    $sdt = $_POST['sdt'];
    echo "$mancc";
    echo "$tenncc ";
    echo "$diachi";
    echo "$sdt";

    $sql = "INSERT INTO nhaccc(mancc,tenncc,diachi,sdt) VALUES ('$mancc','$tenncc','$diachi','$sdt')";
    $result = mysqli_query($con,$sql);
    
    header("location: nhaccc.php");
}
?>