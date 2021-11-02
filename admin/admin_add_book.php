<?php
	//include("./connect_book.php");
	include("header.php");
	if(isset($_POST['add'])){
		$isbn = $_POST['isbn'];
		$title = $_POST['title'];
		$author = $_POST['author'];
		$descr = $_POST['descr'];
		$price = $_POST['price'];
		$publisher = $_POST['publisher'];
		$target_dir = "img/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;
		$image = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			echo "Tệp " . htmlspecialchars(basename($_FILES["image"]["name"])) . " đã thành công.";
		} else {
			echo "Xin lỗi, đã có lỗi tải lên tệp của bạn.";
		}
		// nhà xuất bản  và  trả về 
		// if publisher không có trong db, tạo mới
		$findPub = "SELECT * FROM publisher WHERE publisher_name = '$publisher'";
		$findResult = mysqli_query($conn, $findPub);
		if(!$findResult){
			// chèn vào bảng nhà xuất bản và trả về id
			$insertPub = "INSERT INTO publisher(publisher_name) VALUES ('$publisher')";
			$insertResult = mysqli_query($conn, $insertPub);
			if(!$insertResult){
				echo "Can't add new publisher " . mysqli_error($conn);
				exit;
			}
		} else {
			$row = mysqli_fetch_assoc($findResult);
			$publisherid = $row['publisherid'];
		}


		$query = "INSERT INTO books VALUES ('" . $isbn . "', '" . $title . "', '" . $author . "', '" . $image . "', '" . $descr . "', '" . $price . "', '" . $publisherid . "')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't add new data " . mysqli_error($conn);
			exit;
		} else {
			header("Location: admin_book.php");
		}
	}
?>
	<form method="post" action="admin_add_book.php" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>Mã vạch</th>
				<td><input type="text" name="isbn"></td>
			</tr>
			<tr>
				<th>Tiêu đề</th>
				<td><input type="text" name="title" required></td>
			</tr>
			<tr>
				<th>Tác Giả</th>
				<td><input type="text" name="author" required></td>
			</tr>
			<tr>
				<th>Hình ảnh</th>
				<td><input type="file" name="image"></td>
			</tr>
			<tr>
				<th>Miêu tả về sách</th>
				<td><textarea name="descr" cols="40" rows="5"></textarea></td>
			</tr>
			<tr>
				<th>Giá bán</th>
				<td><input type="text" name="price" required></td>
			</tr>
			<tr>
				<th>Nhà sản xuất</th>
				<td><input type="text" name="publisher" required></td>
			</tr>
		</table>
		<input type="submit" name="add" value="Thêm sách mới" class="btn btn-primary">
		<input type="reset" value="cancel" class="btn btn-default">
	</form>
	<br/>
<?php
	if(isset($conn)) {mysqli_close($conn);}
	include("footer.php");
?>