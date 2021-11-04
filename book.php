<?php

include('header.php');
$book_isbn = $_GET['bookisbn'];


$query = "SELECT * FROM books WHERE book_isbn = '$book_isbn' ";
$result = mysqli_query($conn, $query);
if (!$result) {
    echo "Không thể truy xuất dữ liệu " . mysqli_error($conn);
    exit;
}

$row = mysqli_fetch_array($result);
if (!$row) {
    echo "sách trống";
    exit;
}




?>
<!-- Example row of columns -->
<div class="container">
    <form method="post" class="mb-4" action="cart.php">
        <h5 class="mt-3 mb-3"><a href="books.php" class="text-decoration-none text-danger">Tất cả sách</a> > <?php echo $row['book_title']; ?></h5>
        <div class="row">
            <div class="col-md-3 text-center">
                <img class="img-thumbnail img-fluid" src="<?php echo $row['book_image']; ?>">
            </div>
            <div class="col-md-6">
                <h4>Miêu tả về sách</h4>
                <p><?php echo $row['book_descr']; ?></p>
                <h4>Chi tiết</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Mã sách</th>
                            <th scope="col">Tác giả</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><?= $row['book_isbn'] ?></th>
                            <td><?= $row['book_author'] ?></td>
                            <td><?= $row['publisherid'] ?></td>
                            <td><?= $row['book_price'] ?></td>
                        </tr>
                    </tbody>
                    <?php
                    if (isset($conn)) {
                        mysqli_close($conn);
                    }
                    ?>
                </table>


                <input type="hidden" name="bookisbn" value="<?php echo $book_isbn; ?>">
                <input type="submit" value=" Thêm vào giỏ hàng" name="cart" class="form-control btn btn-outline-danger ">
    </form>



</div>

<?php
require "footer.php";
?>