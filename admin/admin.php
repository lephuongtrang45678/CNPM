<?php
	$title = "Administration section";
	include("./template/header.php");
?>
     <div class="admin">
	<form class="form-horizontal" method="post" action="boos.php">
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
		<input type="submit" name="submit" class="btn btn-primary">
	</form>
     </div>

<?php
	include("./template/footer.php");
?>