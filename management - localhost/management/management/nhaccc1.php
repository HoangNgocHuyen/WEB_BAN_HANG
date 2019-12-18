<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quản lí nhà cung cấp</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="index.css">
        <style type='text/css'>
        a.non-textdecoration{
            color: red;
            text-decoration: none;
        }
        </style>
</head>

<body>
	<div class="container">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="thongke.php" class="non-textdecoration"><h2>Nhà cung cấp</h2></a>
                        </div>

                    </div>
                </div>
                    <table class="table table-striped table-hover">
                        <?php
                                // đoạn này là code php để kết nối cơ sở dữ liệu
                                $con = mysqli_connect('localhost','root','','qlchts')
                                or die ('Không thể kết nối tới database');
                                mysqli_set_charset($con, 'UTF8');
                                // câu lệnh sql
                                $sql = "SELECT nhaccc.* FROM `nhaccc` 
                                INNER JOIN trasua ON trasua.mancc = nhaccc.mancc
                                GROUP BY trasua.mancc
                                ORDER BY COUNT(trasua.masanpham) DESC";
                                //truy vấn trong csdl sử dụng câu lệnh sql ở trên
                                $result = mysqli_query($con,$sql);
                                // lấy ra số hàng của kết quả $result mà truy vấn đc
                                $num_rows = mysqli_num_rows($result);
                        ?>

                        <thead>
                            <tr>
                                    <th>Mã nhà cung cấp</th>
                                    <th>Tên nhà cung cấp</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>

                            </tr>
                        </thead>
                            <tbody>
                                <?php

                                if($num_rows > 0) {
                                    //đoạn này là xét trong từng hàng một nè, 
                                    while($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <!-- chỗ này là lấy ra những thuộc tính trong hàng đó, thuộc tính để trong dấu ' ' ý -->
                                        <td><?php echo $row['mancc']?></td>
                                        <td><?php echo $row['tenncc']?></td>
                                        <td><?php echo $row['diachi']?></td>
                                        <td><?php echo $row['sdt']?></td>
                                    </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                            </tbody>
                    </table>
            </div>
	</div>
	
</body>

</html>