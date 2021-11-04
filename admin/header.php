<?php
include("../constants.php");

if (!isset($_SESSION['login'])) {
    header("Location:admin.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BUY_BOOK</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>

    <header class="my-header">

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <a href="index.php">
                        <img src="img/logo-new.png" alt="">
                    </a>
                </div>
                <div class="col-md-9">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link" href="publisher.php"><i class="fas fa-users"></i> Nhà xuất bản</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="books.php"><i class="fad fa-books"></i> Sách</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reply.php"><i class="fal fa-phone-rotary"></i> Phản hồi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="handle_cart.php"><i class="fas fa-shopping-cart"></i> Giỏ hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                        </li>

                    </ul>
                </div>
            </div>

        </div>
    </header>
</body>