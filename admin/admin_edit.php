<?php
include("header.php");
ob_start();
?>

<div class="container-fluid">
	<div class="row mt-5">
		<div class="col d-flex"><a href="admin_book.php"><i class="fas fa-chevron-left "></i></a>
			<h4 class="ms-2">Trở lại trang chủ</h4>
		</div>
		<div class="col text-end"><a href="./admin_book.php"><button class="btn btn-outline-danger" type="submit">Hủy</button></a></div>
	</div>
	<?php
	if (isset($_GET['bookisbn'])) {
		$book_isbn = $_GET['bookisbn'];
	}

	$sql_2 = " SELECT * FROM books WHERE book_isbn = '$book_isbn'";
	$res_2 = mysqli_query($conn, $sql_2);

	$row_2 = mysqli_fetch_assoc($res_2);
	?>


	<div class="row">
		<div class="col border p-3 rounded-2 mt-3">
			<form method="POST" class="row g-3 " enctype="multipart/form-data" id="form">
				<div class="col-md-4">
					<label for="book_isbn" class="form-label"></label>
					<input type="" name="book_isbn" class="form-control" id="book_isbn" value="<?php echo $row_2['book_isbn']; ?>">
					<div class="text-muted"><small>Mã vạch</small></div>
				</div>
				<div class="col-md-4">
					<label for="book_title" class="form-label">Tiêu đề</label>
					<input type="" name="book_title" class="form-control" id="book_title" value="<?php echo $row_2['book_title']; ?>">
				</div>
				<div class="col-md-4">
					<label for="book_author" class="form-label">Tác giả</label>
					<input type="" name="book_author" class="form-control" id="book_author" value="<?php echo $row_2['book_author']; ?>">
				</div>
				<div class="col">
					<label for="avatar" class="form-label">Thay đổi ảnh</label>
					<div class="mb-3">
						<img src="<?php echo $row_2['book_image']; ?>" alt="" style="width : 10%">
					</div>
					<input type="file" id="fileToUpload" name="fileToUpload" accept="images/*" class=" mb-3 form-control" value="chọn ảnh">
					<div class="preview mb-3">
						<div id="preview">
							<img src="#" hidden />
						</div>
						<div id="err"></div>
					</div>
				</div>
				<div class="col-md-4">
					<label for="book_Category" class="form-label">Chủ đề</label>
					<input type="" name="book_Category" class="form-control" id="book_Category" value="<?php echo $row_2['book_Category']; ?>">
				</div>
				<div class="col-md-4">
					<label for="book_descr" class="form-label">Miêu tả về sách</label>
					<input type="" name="book_descr" class="form-control" id="book_descr" value="<?php echo $row_2['book_descr']; ?>">
				</div>
				<div class="col-md-4">
					<label for="book_price" class="form-label">Giá bán</label>
					<input type="" name="book_price" class="form-control" id="book_price" value="<?php echo $row_2['book_price']; ?>">
				</div>
				<div class="col-md-4">
					<label for="publisherid" class="form-label">Nhà sản xuất</label>
					<input type="" name="publisherid" class="form-control" id="publisherid" value="<?php echo $row_2['publisherid']; ?>">
				</div>
				<div class="col-12 d-flex justify-content-center mt-3">
					<button type="submit" name="submit" class="btn btn-outline-danger ">
						<h5>Sửa</h5x>
					</button>
				</div>
			</form>
		</div>
	</div>

	<?php
	include("footer.php");
	if (isset($_POST['submit'])) {


		// echo "CLicked";

		//1. Get the DAta from Form
		$book_isbn = $_POST['book_isbn'];
		$book_title = $_POST['book_title'];
		$book_author = $_POST['book_author'];
		$book_Category = $_POST['book_Category'];
		$book_descr = $_POST['book_descr'];
		$book_price = $_POST['book_price'];
		$publisherid = $_POST['publisherid'];
		$target_dir = "img/"; //chỉ định thư mục nơi tệp sẽ được đặt
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); //chỉ định đường dẫn của tệp sẽ được tải lên
		$uploadOk = 1; //chưa được sử dụng (sẽ được sử dụng sau)
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); //giữ phần mở rộng tệp của tệp 

		// Kiểm tra xem tệp đã tồn tại chưa
		if (file_exists($target_file)) {
			echo "Xin lỗi, ảnh bạn đã tồn tại.";
			$uploadOk = 0;
		}

		// kiểm tra kích cỡ ảnh
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			echo "Xin lỗi,cỡ ảnh bạn quá lớn.";
			$uploadOk = 0;
		}

		// cho phép các dạng form ảnh
		if (
			$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif"
		) {
			echo " Xin lỗi, chỉ có tệp JPG, JPG, PNG & GIF được phép.";
			$uploadOk = 0;
		}

		// kiểm tra nếu $uploadOk = 0
		if ($uploadOk == 0) {
			echo "Xin lỗi, tập tin của bạn đã không được tải lên.";
			// Hoàn thành tải lên tập tin PHP Script
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				echo "Tệp " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " đã thành công.";
			} else {
				echo "Xin lỗi, đã có lỗi tải lên tệp của bạn.";
			}
		}
		// echo $avatar;
		// update
	    $sql = "SELECT * FROM books WHERE book_isbn='$book_isbn' ";
		$res = mysqli_query($conn, $sql);
		if (mysqli_num_rows($res) > 0) {
			$sql2 = "UPDATE books SET book_isbn='$book_isbn', book_title='$book_title',book_author='$book_author',book_image='$target_dir',book_Category='$book_Category',book_descr='$book_descr',book_price='$book_price',publisherid='$publisherid' ";
			$res2 = mysqli_query($conn, $sql2);
			if ($res2 == true) {

				//Display Succes Message
				//REdirect to Manage Admin Page with Success Message
				$_SESSION['edit'] = "<div class='success'> Changed Successfully. </div>";
				//Redirect the User
				header('location:admin_book.php');
			} else {
				echo "err";
				//Display Error Message
				//REdirect to Manage Admin Page with Error Message
				$_SESSION['edit'] = "<div class='error'>Failed to Change . </div>";
				//Redirect the User
				header('location:admin_edit.php');
			}
		}
		else{
			echo "sai";
		}
	}

	?>
	<script type="text/javascript" src="../js/edit-js.js"></script>