<?php
include('header.php');

$query = "SELECT book_isbn, book_image, book_title FROM books";
$result = mysqli_query($conn, $query);
if (!$result) {
    echo "Không thể truy xuất dữ liệu " . mysqli_error($conn);
    exit;
}

?>
<div class="container-fluid">
    <h5 class="text-muted mb-5">Sách - Truyện tranh, Mua sách truyện mới online được đọc nhiều nhất | Bookbuy.vn</h5>
    <div class="row">
        <?php while ($query_row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-md-3 mb-5">
                <a href="book.php?bookisbn=<?php echo $query_row['book_isbn']; ?>" class="text-decoration-none text-dark">
                    <img class="img-responsive img-thumbnail" src="./img/img-index/<?php echo $query_row['book_image']; ?>">
                    <div class=" "><?php echo $query_row['book_title'] ?></div>

                </a>
            </div>
        <?php } ?>
    </div>

</div>

<?php
include("footer.php");
?>