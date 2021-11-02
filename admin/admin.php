<?php
$title = "Administration section";
?>
<!doctype html>
<html lang="en">

<head>
	<!-- thẻ meta bắt buộc -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="index.css">
	<title></title>
</head>

<body>

	<div class="admin">
		<form class="form-horizontal" method="post">
			<div class="form-group">
				<label for="name" class="control-label col-md-4">Tên đăng nhập</label>
				<div class="col-md-4">
					<input type="text" name="name" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label for="pass" class="control-label col-md-4">Mật khẩu</label>
				<div class="col-md-4">
					<input type="password" name="pass" class="form-control">
				</div>
			</div>
			<button type="submit" class="btn btn-primary" name="submit">Đăng nhập</button>
		</form>
	</div>
	<?php
    session_start();
    if(isset($_POST['submit'])){
        $email = $_POST['name'];
        $pass = $_POST['pass'];
        //kết nối
        include('../constants.php');
     
        //truy vấn tt
        $sql = "SELECT * FROM admin WHERE name = '$email' and pass = '$pass'";
        $result = mysqli_query($conn, $sql);

        //xác thực, đăng nhập
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
            $user_name = $row['name'];
            $passTrue = $row['pass'];
            }

            if($pass==$passTrue){
                header("Location:admin_book.php");
                $_SESSION['login'] = $user_name;
            }
            else{
                echo 'Mật khẩu không chính xác';
                header("Location:admin.php");
            }
        }
        else{
           echo 'Email không chính xác';     
           header("Location:admin.php");
        }

        //đóng kết nối

    }
?>
