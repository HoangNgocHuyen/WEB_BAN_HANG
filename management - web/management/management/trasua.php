<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quản lí trà sữa</title>
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
                            <a href="dashboard.php" class="non-textdecoration"><h2>Trà sữa</h2></a>
                        </div>
                        <div class="col-sm-6">
                                <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                                                class="material-icons">&#xE147;</i> <span>Thêm</span></a>
                        </div>
                    </div>
                </div>
                    <table class="table table-striped table-hover">

                            <?php
                                    // đoạn này là code php để kết nối cơ sở dữ liệu
                                    $con = mysqli_connect('localhost','id11807162_admin','VTH020499','id11807162_qlchts') 
                                    or die ('Không thể kết nối tới database');
                                    mysqli_set_charset($con, 'UTF8');

                                    // câu lệnh sql
                                    $sql = "SELECT * FROM trasua";

                                    //truy vấn trong csdl sử dụng câu lệnh sql ở trên
                                    $result = mysqli_query($con,$sql);
                                    // lấy ra số hàng của kết quả $result mà truy vấn đc
                                    $num_rows = mysqli_num_rows($result);

                            ?>

                            <thead>
                                <tr>
                                    <th>Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Size</th>
                                    <th>Đơn giá</th>
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
                                                <td><?php echo $row['masanpham']?></td>
                                                <td><?php echo $row['tensanpham']?></td>
                                                <td><?php echo $row['size']?></td>
                                                <td><?php echo $row['dongia']?></td>
                                                <td>
                                                        <a href="edit4.php?edit=<?php echo $row['masanpham'];?>" class="edit" data-toggle="modal"><i class="material-icons"
                                                                        data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                                        <a href="dele4.php?delete=<?php echo $row['masanpham']; ?>" class="delete" data-toggle="modal"><i class="material-icons"
                                                                        data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                    }
                                    ?>
                            </tbody>
                    </table>
            </div>
	</div>
	<!-- Add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Thêm loại trà sữa</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<form action = "insertcode4.php" method = "POST">
					<div class="modal-body">
						<div class="form-group">
							<label>Mã sản phẩm</label>
							<input type="text" name="masanpham" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Tên sản phẩm</label>
							<input type="text" name="tensanpham" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Size</label>
							<input type="text" name="size" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Đơn giá</label>
							<input type="text"  name="dongia" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Mã nhà cung cấp</label>
							<input type="int"  name="mancc" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="add" class="btn btn-success" value="Add" >
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Delete Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<form action = "dele4.php" method = "POST">
					<div class="modal-body">
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="delete" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

</html>