<?php
include("./header.php");
?>

<p class="lead btn btn-danger mt-5 mb-3 "><a href="admin_add_book.php" class="text-decoration-none text-white">Thêm sách mới</a></p>


<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Mã vạch</th>
			<th>Tiêu đề</th>
			<th>Tác giả</th>
			<th>Hình ảnh</th>
			<th>Chủ Đề</th>
			<th>Miêu tả về sách</th>
			<th>Giá bán</th>
			<th>Nhà sản xuất</th>
			<th>Sửa</th>
			<th>Xóa</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sql = "SELECT * FROM books";
		$result = mysqli_query($conn, $sql);

		//bước 3 xử lý kết quả trả về
		if (mysqli_num_rows($result) > 0) {
			$i = 1;
			while ($row = mysqli_fetch_assoc($result)) {
		?>
				<tr>
					<td><?php echo $row['book_isbn']; ?></td>
					<td><?php echo $row['book_title']; ?></td>
					<td><?php echo $row['book_author']; ?></td>
					<td>
						<div>
							<img src="../<?php echo $row['book_image']; ?>" alt="" class="img-fluid">
						</div>
					</td>
					<td><?php echo $row['book_Category']; ?></td>
					<td><?php echo $row['book_descr']; ?></td>
					<td><?php echo $row['book_price']; ?></td>
					<td><?php echo $row['publisherid']; ?></td>
					<td><a href="admin_edit.php?bookisbn=<?php echo $row['book_isbn']; ?>"><i class="fas fa-edit text-danger"></i></a></td>
					<td><a href="admin_delete.php?bookisbn=<?php echo $row['book_isbn']; ?>"><i class="fas fa-trash text-danger"></i></a></td>

				</tr>
		<?php
				$i++;
			}
		}
		?>
	</tbody>
</table>
<?php
if (isset($conn)) {
	mysqli_close($conn);
}
require_once "footer.php";
?>