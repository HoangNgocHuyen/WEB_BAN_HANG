<?php
$server_username = "id11807162_admin2";
$server_password = "VTH020499";
$server_host = "localhost";
$database = 'id11807162_user';
 
$conn = mysqli_connect($server_host,$server_username,$server_password,$database)
or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");