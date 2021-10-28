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
            //books Available
            <div class="books-menu-box">
                <div class="row">
                    <?php while ($query_row = mysqli_fetch_assoc($res)) { ?>
                        <div class="col-md-3 mb-5">
                            <a href="book.php?bookisbn=<?php echo $query_row['book_isbn']; ?>" class="text-decoration-none text-dark">
                                <img class="img-responsive img-thumbnail" src="./img/img-index/<?php echo $query_row['book_image']; ?>">
                                <h5 class="mt-4 "><?php echo $query_row['book_title'] ?></h5>
                                <div class=" ">$<?php echo $query_row['book_price'] ?></div>
                                <a href="cart" class="btn btn-outline-danger">Thêm vào giỏ hàng</a>
                            </a>
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
            <h5>Bạn có thể cho tôi thêm thông tin sách bạn muốn có? </h5><i class="fas fa-folder-plus"></i>
        </a>
    <?php }

    ?>

    </div>

</section>

<?php include('footer.php'); ?>