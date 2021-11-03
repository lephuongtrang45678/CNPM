<?php
include('constants.php');
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link href="style/style.css" rel="stylesheet" type="text/css">
    <title>Mua Sách Mới, Sách Hot, Sách Hay Nên Đọc Online</title>
</head>

<body>
    <div class="container-fluid d-flex justify-content-between bg-light">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link text-decoration-none text-muted  href=" #"><i class="fas fa-info"></i> Trợ giúp</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-decoration-none text-muted" href="#"><i class="far fa-newspaper"></i> Tin tức</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-decoration-none text-muted" href="#"><i class="fas fa-tags"></i> Khuyến mãi</a>
            </li>

        </ul>
        <ul class="nav ">
            <li class="nav-item">
                <a href=" add_book_table.php" class="nav-link text-decoration-none text-muted"><i class=" fas fa-book-medical"></i> Sách Chưa có</a>
            </li>
            <li class="nav-item">
                <a href="check_cart.php" class="nav-link text-decoration-none text-muted"><i class="fas fa-box-open"></i> Kiểm tra đơn hàng</a>
            </li>

            <?php
            if (isset($_SESSION['user'])) { ?>
                <li class="nav-item">
                    <a href="./logout.php" class="nav-link text-decoration-none text-muted text-center "><i class="fas fa-sign-in-alt"></i> Đăng Xuất </a>
                    <div class="text-muted"><?php echo $_SESSION['user'] ?></div>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a href="./register.php" class="nav-link text-decoration-none text-muted"><i class="fas fa-user-plus"></i> Đăng Ký</a>
                </li>
                <li class="nav-item">
                    <a href="./login.php" class="nav-link text-decoration-none text-muted "><i class="fas fa-sign-in-alt"></i> Đăng nhập </a>
                </li>
            <?php }
            ?>
        </ul>
    </div>
    <div class="container-fluid mt-4 mb-4">
        <div class="row">
            <div class="col-3">
                <a href="index.php"><img src="https://bookbuy.vn/Images/frontend/base/logo-new.png" alt=""></a>
            </div>
            <div class="col-5">


                <form action="search.php" method="POST" class="d-flex boder">
                    <select class="form-select w-25 me-2" aria-label="">
                        <option selected>Tất cả</option>
                        <option value="1">Sách - Truyện tranh</option>
                        <option value="2">CD - DVD </option>
                        <option value="3">Quà tặng </option>
                        <option value="3">Dụng cụ vẽ - VPP </option>
                        <option value="3">Công nghệ </option>
                        <option value="3">Vật dụng gia đình </option>
                        <option value="3">Làm Đẹp - Sức Khỏe </option>
                    </select>
                    <input type="search" name="search" class="form-control" placeholder="Tìm kiếm sách .." required>
                    <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-outline-danger">
                </form>
            </div>
            <div class="col-2">
                <div class="row">
                    <div class="col">
                        <a class="text-decoration-none text-dark" href="">
                            <h5 class="text-danger"><i class="fas fa-phone-volume"></i> Hotline: </h5> 0933 109 009
                        </a>
                    </div>

                </div>
            </div>

            <div class="col-2">
                <a href="cart.php" class="text-decoration-none text-danger">
                    <h5>
                        <i class="fas fa-shopping-cart"></i> Giỏ hàng

                    </h5>
                </a>
            </div>
        </div>
    </div>