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

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tên sách</th>
                                <th scope="col">Tác giả</th>
                                <th scope="col">Miêu tả sách</th>
                                <th scope="col">Bìa sách</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"><?= $row['book_title'] ?></th>
                                <td><?= $row['book_author'] ?></td>
                                <td><?= $row['book_descr'] ?></td>
                                <td><?= $row['book_image'] ?></td>
                            </tr>
                        </tbody>
                        <?php
                        if (isset($conn)) {
                            mysqli_close($conn);
                        }
                        ?>
                    </table>
                <?php }
                ?>
            </div>
        </div>
    </div>
</div>