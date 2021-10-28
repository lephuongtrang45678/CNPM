<?php
    session_start();
    include('header.php');
    // get pubid
    if (isset($_GET['pubid'])) {
        $pubid = $_GET['pubid'];
    } else {
        echo "Truy vấn sai! Kiểm tra lại!";
        exit;
    }

    $query = "SELECT book_isbn, book_title, book_image FROM books WHERE publisherid = '$pubid'";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "Không thể truy xuất dữ liệu" . mysqli_error($conn);
        exit;
    }
    if (mysqli_num_rows($result) == 0) {
        echo "Sách trống! Vui lòng đợi cho đến khi những cuốn sách mới sắp tới!";
        exit;
    }

    ?>
    <?php while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 ms-5 text-center">
                <img class="img-responsive img-thumbnail" src="img/img-index/<?php echo $row['book_image']; ?>">
            </div>
            <div class="col-md-7">
                <h4><?php echo $row['book_title']; ?></h4>
                <a href="book.php?bookisbn=<?php echo $row['book_isbn']; ?>" class="btn btn-outline-danger">Chi tiết</a>
            </div>
        </div>
        <br>
    </div>
        
<?php
}
