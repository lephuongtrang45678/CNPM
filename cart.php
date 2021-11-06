<?php
include('./header.php');
include('./check-login.php');
include('./function_cart.php');


// book_isbn got from form post method, change this place later.
if (isset($_POST['bookisbn'])) {
    $book_isbn = $_POST['bookisbn'];
}

if (isset($book_isbn)) {
    // new iem selected
    if (!isset($_SESSION['cart_to_buy'])) {
        // $_SESSION['cart_to_buy'] is associative array that bookisbn => qty
        $_SESSION['cart_to_buy'] = array();

        $_SESSION['total_items_cart'] = 0;
        $_SESSION['total_price_cart'] = '0.00';
    }

    if (!isset($_SESSION['cart_to_buy'][$book_isbn])) {
        $_SESSION['cart_to_buy'][$book_isbn] = 1;
    } elseif (isset($_POST['cart'])) {
        $_SESSION['cart_to_buy'][$book_isbn]++;
        unset($_POST);
    }
}




if (isset($_SESSION['cart_to_buy']) && (array_count_values($_SESSION['cart_to_buy']))) {
    $_SESSION['total_price_cart'] = total_price($_SESSION['cart_to_buy']);
    $_SESSION['total_items_cart'] = total_items($_SESSION['cart_to_buy']);
?>
    <form  method="post">
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
                        <td><?php echo "đ" . $row['book_price']; ?></td>
                        <td><input type="text" value="<?php echo $qty; ?>" size="2" name="<?php echo $isbn; ?>"></td>
                        <td><?php echo "đ" . $qty * $row['book_price']; ?></td>
                    </tr>
            <?php }
            } ?>

            <tr>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th><?php echo $_SESSION['total_items_cart']; ?></th>
                <th><?php echo "đ" . $_SESSION['total_price_cart']; ?></th>
            </tr>
        </table>
        <div class="row">
            <div class="col-4 text-center">
                <input type="submit" class="btn btn-outline-danger" name="save_change" value="Lưu ">
            </div>
            <div class="col-4 text-center">
                <a href="books.php" class="btn btn-outline-danger">Tiếp tục xem Sách</a>
            </div>
            <div class="col-4 text-center">
                <a href="checkout.php" class="btn btn-outline-danger">Thanh toán</a>
            </div>

        </div>
    </form>


<?php
    // if save change button is clicked , change the qty of each bookisbn
    if (isset($_POST['save_change'])) {
        foreach ($_SESSION['cart_to_buy'] as $isbn => $qty) {
            if ($_POST[$isbn] == '0') {
                unset($_SESSION['cart_to_buy']["$isbn"]);
            } else {
                $_SESSION['cart_to_buy']["$isbn"] = $_POST["$isbn"];
            }
        }
    }

} else {
    echo "<p class=\"text-danger\">Giỏ của bạn trống trơn! Hãy chắc chắn rằng bạn thêm một số sách trong đó!</p>";
}

include('footer.php');

?>