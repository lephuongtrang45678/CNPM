<?php
include('header.php')
?>


<div class="container bg-light">
    <div class="row">
        <div class="col-3 ">
            <div>
                <h6 class="title">Danh mục </h6>
            </div>
            <div>
                <div class="sidemenu-box">
                    <h6 class="title">Theo dịp </h6>
                    // 'distinst'
                    <?php
                    $query = "SELECT * FROM books ORDER BY book_Category";
                    $result = mysqli_query($conn, $query);


                    ?>
                    <h6 class="title">Thể loại </h6>
                    <ul>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <li>
                                <a class="text-decoration-none text-muted"><?php echo $row['book_Category']; ?></a>
                            </li>
                        <?php } ?>
                        <li>
                            <a class="text-decoration-none text-danger" href=" books.php">Xem tất cả sách</a>
                        </li>
                    </ul>
                    
                </div>
            </div>
            <div>
                <h6 class="title">Theo chủ đề </h6>
            </div>
            <div>
                <?php
                $query = "SELECT * FROM books ORDER BY book_author";
                $result = mysqli_query($conn, $query);


                ?>
                <h6 class="title">Tác giả tiêu biểu </h6>
                <ul>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <li>
                            <a class="text-decoration-none text-muted"><?php echo $row['book_author']; ?></a>
                        </li>
                    <?php } ?>
                    <li>
                        <a class="text-decoration-none text-danger" href=" books.php">Xem tất cả sách</a>
                    </li>
                </ul>
            </div>
            <div>


                <?php
                $query = "SELECT * FROM publisher ORDER BY publisherid";
                $result = mysqli_query($conn, $query);


                ?>
                <h6 class="title">Nhà suất bản tiêu biểu </h6>
                <ul>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <li>
                            <a class="text-decoration-none text-muted" href="detail_publisher.php?pubid=<?php echo $row['publisherid']; ?>"><?php echo $row['publisher_name']; ?></a>
                        </li>
                    <?php } ?>
                    <li>
                        <a class="text-decoration-none text-danger" href=" books.php">Xem tất cả sách</a>
                    </li>
                </ul>
            </div>
            <div>
                <div class="sidemenu-box">
                    <h6 class="title">Theo giá</h6>
                    <ul class="sidebar-menu-new">
                        <li>
                            <a href="" class="text-decoration-none text-muted">nhỏ hơn 50.000đ</a>
                        </li>
                        <li>
                            <a href="" class="text-decoration-none text-muted">từ 50.000 - 100.000đ</a>
                        </li>
                        <li>
                            <a href="" class="text-decoration-none text-muted">từ 100.000 - 200.000đ</a>
                        </li>
                        <li>
                            <a href="" class="text-decoration-none text-muted">từ 200.000 - 300.000đ</a>
                        </li>
                        <li>
                            <a href="" class="text-decoration-none text-muted">từ 300.000 - 400.000đ</a>
                        </li>
                        <li>
                            <a href="" class="text-decoration-none text-muted">từ 400.000 - 500.000đ</a>
                        </li>
                        <li>
                            <a href="" class="text-decoration-none text-muted">từ 500.000 - 1.000.000đ</a>
                        </li>
                        <li>
                            <a href="" class="text-decoration-none text-muted">lớn hơn 1.000.000đ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="row ">
                <div class="col-12">
                    <div class="container w-75 ">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="img/img-index-slide/1.jpg" class="d-block w-100 alt=" ..."">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/img-index-slide/2.jpg" class="d-block w-100 alt=" ..."">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/img-index-slide/3.jpg" class="d-block w-100 alt=" ..."">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/img-index-slide/4.jpg" class="d-block w-100 alt=" ..."">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/img-index-slide/5.jpg" class="d-block w-100 alt=" ..."">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                    </div>
                </div>
                <div class="col-12 mt-5 ">
                    <div class="row">
                        <div class="col-12">
                            <div class="row ">
                                <div class="col">
                                    <h5>Sách bán chạy</h5>
                                </div>
                                <div class="col text-end">
                                    <a href="books.php" class="text-decoration-none text-danger">Xem Thêm <i class="fas fa-caret-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <?php

                                $sql = "SELECT * FROM books limit 4 ";
                                $res = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_array($res)) { ?>

                                    <div class="col-3">
                                        <a href="book.php?bookisbn=<?= $row['book_isbn'] ?>">
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
            </div>
        </div>
    </div>
</div>
<?php
include("footer.php");
?>