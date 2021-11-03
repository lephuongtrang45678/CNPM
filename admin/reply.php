<?php
include("./header.php");
?>
	<p class="lead"><a href="admin_add_book.php">Thêm sách mới</a></p>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Tiêu đề</th>
				<th>Tác giả</th>
				<th>Hình ảnh</th>
				<th>Miêu tả về sách</th>
				<th>&nbsp;</th>
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
						<td><?php echo $row['book_title']; ?></td>
						<td><?php echo $row['book_author']; ?></td>
						<td>
							<div>
								<img src="./img/<?php echo $row['book_image']; ?>" alt="">
							</div>
						</td>
						<td><?php echo $row['book_descr']; ?></td>
						<td><a href="delete_books_add.php?booktitle=<?php echo $row['book_author']; ?>">Xóa</a></td>
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
