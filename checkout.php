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
// include('./check-login.php');

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
            <form method="post" class="form-horizontal">

                <div class="col-12 ">
                    <label for="address" class="control-label col-md-4">Địa chỉ</label>
                    <div class="col-md-4  ">
                        <input type="text" name="address" class="col-md-4" class="form-control">
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <label for="sdt" class="control-label col-md-4">Số điện thoại</label>
                    <div class="col-md-4  ">
                        <input type="tel" name="sdt" class="col-md-4" class="form-control">
                    </div>
                </div>

                <div class="col-12 ">
                    <input type="submit" name="order" value="ĐẶT HÀNG" class="btn btn-outline-danger mt-4">

                </div>
            </form>
        </div>

    </div>
    <p class="lead">Vui lòng nhấn ĐẶT HÀNG để xác nhận giao dịch mua hàng của bạn hoặc tiếp tục mua sắm để thêm hoặc xóa các mục.</p>
<?php } else {
    echo "<p class=\"text-danger\">Giỏ của bạn trống trơn! Hãy chắc chắn rằng bạn thêm một số sách trong đó!</p>";
}

include("footer.php");

$userid = $_SESSION['userid'];

if (isset($_POST['order'])) {
    $address = $_POST['address'];
    $sdt = $_POST['sdt'];

    $query = "UPDATE users SET address='$address',sdt='$sdt' WHERE userid='$userid'";
    $result = mysqli_query($conn, $query);

    $date = date("Y-m-d");
    $date_ship = date('Y-m-d', strtotime($date . ' + 5 days'));

    $sql2 = "INSERT INTO orders(orderid, userid, date, date_ship, ship_address, sdt, amount, order_status) 
    VALUES (NULL, '$userid', '$date', '$date_ship', '$address', '$sdt','" . $_SESSION['total_price_cart'] . "', 'Đang xử lý')";
    $res2 = mysqli_query($conn, $sql2);



    $sql = "SELECT MAX(orderid) AS orderid FROM orders WHERE orders.userid = '$userid' ";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $orderid = $row['orderid'];
    }

    foreach ($_SESSION['cart_to_buy'] as $isbn => $qty) {
        $query = "SELECT book_price FROM books WHERE book_isbn = '$isbn'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $bookprice = $row['book_price'];

            $sql_2 = "INSERT INTO order_items VALUES 
            ('$orderid', '$isbn', '$bookprice', '$qty')";
            $res_2 = mysqli_query($conn, $sql_2);
            if (!$res_2) {
                echo "Insert value false!" . mysqli_error($conn);
                exit;
            }
        }
    }
    unset($_SESSION['cart_to_buy']);

    echo $_SESSION['success'] = "<div class='danger'>Thanh toán thành công đơn hàng của bạn.</div>";
    header("Location:" . SITEURL . "check_cart.php");
}





?>