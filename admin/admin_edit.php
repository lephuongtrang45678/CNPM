<?php
include("header.php");
?>

<div class="container-fluid">
	<div class="row mt-5">
		<div class="col d-flex"><a href="admin_book.php"><i class="fas fa-chevron-left "></i></a>
			<h4 class="ms-2">Trở lại trang chủ</h4>
		</div>
		<div class="col text-end"><a href="./admin_book.php"><button class="btn btn-outline-danger" type="submit">Hủy</button></a></div>
	</div>
	<?php
	if (isset($_GET['book_isbn'])) {
		$manv = $_GET['book_isbn'];
	}

	$sql_2 = " SELECT * FROM books WHERE book_isbn = '$book_isbn'";
	$res_2 = mysqli_query($conn, $sql_2);

	$row_2 = mysqli_fetch_assoc($res_2);
	?>

	<div class="row mt-4 ">
		<form class="d-flex w-25 text-end">
			<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-outline-danger" type="submit">Search</button>
		</form>
	</div>
	<div class="row">
		<div class="col border p-3 rounded-2 mt-3">
			<form method="POST" class="row g-3 " enctype="multipart/form-data" id="form">
			<div class="col-md-4">
                    <label for="book_isbn" class="form-label"></label>
                    <input type="" name="book_isbn" class="form-control" id="book_isbn" placeholder="978-0-321-94786-4">
                    <div class="text-muted"><small>Mã vạch</small></div>
                </div>
                <div class="col-md-4">
                    <label for="book_title" class="form-label">Tiêu đề</label>
                    <input type="" name="book_title" class="form-control" id="book_title" placeholder="Tự Động Hóa PLC S7-1200 Với Tia Portal">
                </div>
                <div class="col-md-4">
                    <label for="book_author" class="form-label">Tác giả</label>
                    <input type="" name="book_author" class="form-control" id="book_author" placeholder="Trần Văn Hiếu">
                </div>
				<div class="col">
					<label for="book_image" class="form-label">Hình ảnh</label>
					<div class="mb-3">
						<img src="<?php echo $row_2['book_image']; ?>" alt="" style="width : 10%">
					</div>
					<input type="file" id="fileToUpload" name="fileToUpload" accept="images/*" class=" mb-3 form-control" value="chọn ảnh">
					<div class="preview mb-3">
						<div id="preview">
							<img src="#" hidden />
						</div>
                <div class="col-md-4">
                    <label for="book_Category" class="form-label">Chủ đề</label>
                    <input type="tel" name="book_Category" class="form-control" id="book_Category" placeholder="Vừa học vừa chơi">
                </div>
                <div class="col-md-4">
                    <label for="book_descr" class="form-label">Miêu tả về sách</label>
                    <input type="book_descr" name="book_descr" class="form-control" id="book_descr" placeholder="Tự Động Hóa PLC S7-1200 ">
                </div>
				<div class="col-md-4">
                    <label for="book_price" class="form-label">Giá bán</label>
                    <input type="book_price" name="book_price" class="form-control" id="book_price" placeholder="1200">
                </div>
				<div class="col-md-4">
                    <label for="publisherid" class="form-label">Nhà sản xuất</label>
                    <input type="publisherid" name="publisherid" class="form-control" id="publisherid" placeholder="Wrox">
                </div>
						<div id="err"></div>
					</div>
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


		//echo "CLicked";

		//1. Get the DAta from Form
		$book_isbn = $_POST['book_isbn'];
		$book_title = $_POST['book_title'];
		$book_author = $_POST['book_author'];
		$book_Category = $_POST['book_Category'];
		$book_descr = $_POST['book_descr'];
		$book_price = $_POST['book_price'];
		$publisherid = $_POST['publisherid'];
		$target_dir = "upload/upload-img/"; //chỉ định thư mục nơi tệp sẽ được đặt
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
		include('../constants.php');
		$sql = "SELECT * FROM books WHERE book_isbn=$book_isbn ";
		$res = mysqli_query($conn, $sql);
		if ($res == true) {
			$count = mysqli_num_rows($res);
			if ($count == 1) {
				$sql2 = "UPDATE books set book_isbn ='$book_isbn', book_title='$book_title', book_author='$book_author', book_Category='$book_Category', book_descr='$book_descr',book_price='$book_price',publisherid='$publisherid',  book_image= '$target_file' where book_isbn = '$book_isbn'";
				$res2 = mysqli_query($conn, $sql2);
				if ($res2 == true) {
					//Display Succes Message
					//REdirect to Manage Admin Page with Success Message
					$_SESSION['edit'] = "<div class='success'> Changed Successfully. </div>";
					//Redirect the User
					header('location:' . SITEURL . 'index.php');
				} else {
					//Display Error Message
					//REdirect to Manage Admin Page with Error Message
					$_SESSION['edit'] = "<div class='error'>Failed to Change . </div>";
					//Redirect the User
					header('location:' . SITEURL . 'edit-danhba.php');
				}
			}
		}
	}

	?>
	<script type="text/javascript" src="edit-js.js"></script>