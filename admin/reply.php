<?php
include("./header.php");
?>
<p class="lead btn btn-danger mt-5 mb-3 "><a href="admin_add_book.php" class="text-decoration-none text-white">Thêm sách mới</a></p>

<table class="table table-striped table-hover">
	<thead>
		<tr>
		    <th>ID</th>
			<th>Tiêu đề</th>
			<th>Tác giả</th>
			<th>Hình ảnh</th>
			<th>Miêu tả về sách</th>
			<th>Xóa sách</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sql = "SELECT * FROM books_add";
		$result = mysqli_query($conn, $sql);

		//bước 3 xử lý kết quả trả về
		if (mysqli_num_rows($result) > 0) {
			$i = 1;
			while ($row = mysqli_fetch_assoc($result)) {
		?>
				<tr>
				    <td><?php echo $row['book_ad_id']; ?></td>
					<td><?php echo $row['book_title']; ?></td>
					<td><?php echo $row['book_author']; ?></td>
					<td>
						<div>
							<img src="./img/<?php echo $row['book_image']; ?>" alt="">
						</div>
					</td>
					<td><?php echo $row['book_descr']; ?></td>
					<td><a href="delete_books_add.php?bookadid=<?php echo $row['book_ad_id']; ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?')" class="text-danger"><i class="fas fa-minus-square"></i></a></td>
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