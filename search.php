<?php

include('header.php');


$search = mysqli_real_escape_string($conn, $_POST['search']);

?>

<section class="">
    <div class="container">
        <h5 class="">Sách mà bạn muốn tìm : <a class="text-danger text-decoration-none">"<?php echo $search ?>"</a></h5>

        <?php


        $sql = "SELECT * FROM books WHERE book_title LIKE '%$search%' OR book_descr LIKE '%$search%'";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Count Rows
        $count = mysqli_num_rows($res);

        //Check whether books available of not
        if ($count > 0) { ?>
            <div class="books-menu-box">
                <div class="row">
                    <?php while ($query_row = mysqli_fetch_assoc($res)) { ?>
                        <div class="col-md-3 mb-5 text-center">
                            <div class="card" style="width: 14rem; height: 29rem;">
                                <a href="book.php?bookisbn=<?php echo $query_row['book_isbn']; ?>" class="text-decoration-none text-dark">
                                    <img src="<?php echo $query_row['book_image']; ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $query_row['book_title'] ?></h5>
                                        <p class="card-text"><?php echo $query_row['book_price'] ?></p>
                                    </div>
                                </a>
                            </div>

                        </div>
                    <?php } ?>
                </div>


                </form>
            </div>
    </div>

<?php
        } else { ?>
    <div class='error mt-3'>Sách không tìm thấy.</div>
    <a href="add_books.php" class="text-decoration-none text-dark">
        <h5>Bạn có thể cho tôi thêm thông tin sách bạn muốn có? <i class="fas fa-folder-plus"></i></h5>
    </a>
<?php }

?>

</div>

</section>

<?php include('footer.php'); ?>