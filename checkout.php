<?php
// the shopping cart needs sessions, to start one
/*
		Array of session(
			cart => array (
				book_isbn (get from $_GET['book_isbn']) => number of books
			),
			items => 0,
			total_price => '0.00'
		)
	*/
session_start();
include('header.php');
include('./function_cart.php');
// print out header here


if (isset($_SESSION['cart_to_buy']) && (array_count_values($_SESSION['cart_to_buy']))) {
?>
    <table class="table">
        <tr>
            <th>Tên sách</th>
            <th>Tác giả</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng số tiền</th>

        </tr>
        <?php
        foreach ($_SESSION['cart_to_buy'] as $isbn => $qty) {

            $sql = "SELECT book_isbn, book_title, book_author, book_price FROM books WHERE book_isbn = '$isbn'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
        ?>
                <tr>
                    <td><?php echo $row['book_title']; ?></td>
                    <td><?php echo $row['book_author']; ?></td>
                    <td><?php echo "$" . $row['book_price']; ?></td>
                    <td><input type="text" value="<?php echo $qty; ?>" size="2" name="<?php echo $isbn; ?>"></td>
                    <td><?php echo "$" . $qty * $row['book_price']; ?></td>
                </tr>
        <?php }
        } ?>

        <tr>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th><?php echo $_SESSION['total_items_cart']; ?></th>
            <th><?php echo "$" . $_SESSION['total_price_cart']; ?></th>
        </tr>
    </table>
    <div class="container">
        <div class="row">

            <form method="post" action="process.php" class="form-horizontal">
                <?php if (isset($_SESSION['err']) && $_SESSION['err'] == 1) { ?>
                    <p class="text-danger">đã nhập</p>
                <?php } ?>
                <div class="col-12 ">
                    <label for="address" class="control-label col-md-4">Địa chỉ</label>
                    <div class="col-md-4  ">
                        <input type="text" name="address" class="col-md-4" class="form-control">
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <label for="city" class="control-label col-md-4">Thành phố</label>
                    <div class="col-md-4  ">
                        <input type="text" name="city" class="col-md-4" class="form-control">
                    </div>
                </div>

                <div class="col-12 ">
                    <input type="submit" name="order" value="ĐẶT HÀNG" class="btn btn-outline-danger mt-4">
                </div>

            </form>
        </div>

    </div>
    <p class="lead">Vui lòng nhấn ĐẶT HÀNG để xác nhận giao dịch mua hàng của bạn hoặc tiếp tục mua sắm để thêm hoặc xóa các mục.</p>
<?php
} else {
    echo "<p class=\"text-danger\">Giỏ của bạn trống trơn! Hãy chắc chắn rằng bạn thêm một số sách trong đó!</p>";
}





if (isset($conn)) {
    mysqli_close($conn);
}
include("footer.php");
?>