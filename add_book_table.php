<?php
include('./header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <?php

                $sql = "SELECT * FROM books_add  ";
                $res = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($res)) { ?>

                    <div class="col-3">
                        <a href="#">
                            <img src="./img/img-index/<?= $row['book_image']; ?>" alt="" class="img-responsive img-thumbnail">
                            <input type="hidden" name="bookname" value="<?= $row['book_title'] ?>">
                            <input type="hidden" name="bookprice" value="<?= $row['book_price'] ?>">
                        </a>
                    </div>
                <?php }
                ?>
            </div>
        </div>
    </div>
</div>