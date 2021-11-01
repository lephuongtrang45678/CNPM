<?php
include('./header.php');
include('./check-login.php');
include('funtion_cart.php');

// book_isbn got from form post method, change this place later.
if (isset($_POST['bookisbn'])) {
    $book_isbn = $_POST['bookisbn'];
}

if (isset($book_isbn)) {
    // new iem selected
    if (!isset($_SESSION['cart'])) {
        // $_SESSION['cart'] is associative array that bookisbn => qty
        $_SESSION['cart'] = array();

        $_SESSION['total_items'] = 0;
        $_SESSION['total_price'] = '0.00';
    }

    if (!isset($_SESSION['cart'][$book_isbn])) {
        $_SESSION['cart'][$book_isbn] = 1;
    } elseif (isset($_POST['cart'])) {
        $_SESSION['cart'][$book_isbn]++;
        unset($_POST);
    }
}




if (isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))) {
    $_SESSION['total_price'] = total_price($_SESSION['cart']);
    $_SESSION['total_items'] = total_items($_SESSION['cart']);
?>
    <form action="cart.php" method="post">
        <table class="table">
            <tr>
                <th>Tên sách</th>
                <th>Tác giả</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng số tiền</th>
                <th>Xóa</th>

            </tr>
            <?php
            foreach ($_SESSION['cart'] as $isbn => $qty) {

                $sql = "SELECT book_isbn, book_title, book_author, book_price FROM books WHERE book_isbn = '$isbn'";
                $result = mysqli_query($conn, $sql);

                $row = mysqli_fetch_assoc($result);
            ?>
                <tr>
                    <td><?php echo $row['book_title']; ?></td>
                    <td><?php echo $row['book_author']; ?></td>
                    <td><?php echo "$" . $row['book_price']; ?></td>
                    <td><input type="text" value="<?php echo $qty; ?>" size="2" name="<?php echo $isbn; ?>"></td>
                    <td><?php echo "$" . $qty * $row['book_price']; ?></td>
                    <td><a href="delete_book.php?book_isbn=<?php echo $row['book_isbn']; ?>"><i class="fas fa-trash text-danger"></i></a></td>
                </tr>
            <?php } ?>
            <tr>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th><?php echo $_SESSION['total_items']; ?></th>
                <th><?php echo "$" . $_SESSION['total_price']; ?></th>
            </tr>
        </table>
        <div class="row">
            <div class="col-6 text-center">
                <a href="books.php" class="btn btn-outline-danger">Tiếp tục xem Sách</a>
            </div>
            <div class="col-6 text-center">
                <a href="checkout.php" class="btn btn-outline-danger">Thanh toán</a>
            </div>

        </div>
    </form>


<?php

    // if save change button is clicked , change the qty of each bookisbn
    
} else {
    echo "<p class=\"text-danger\">Giỏ của bạn trống trơn! Hãy chắc chắn rằng bạn thêm một số sách trong đó!</p>";
}

include('footer.php');
?>