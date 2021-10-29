<?php
include('../constants.php');
include('./check_login.php');

if (isset($_SESSION['login'])) {
    echo $_SESSION['login'];
    unset($_SESSION['login']);
}

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
    <div class="container-fluid bg-light">
        <div class="row">
            <div class="col-8 mt-4 ps-4">
                <a href="index.php" class=""><img src="https://bookbuy.vn/Images/frontend/base/logo-new.png" alt=""></a>
            </div>
            <div class="col-4 text-end pe-4 mt-4">
                <?php
                if (isset($_SESSION['user'])) { ?>
                    <div class="nav-item">
                        <a href="./logout.php" class="nav-link text-decoration-none text-muted "><i class="fas fa-sign-in-alt"></i> Đăng Xuất </a></a>
                    </div>
                <?php } else { ?>
                    <div class="nav-item">
                        <a href="./login.php" class="nav-link text-decoration-none text-muted "><i class="fas fa-sign-in-alt"></i> Đăng nhập </a></a>
                    </div>
                <?php }
                ?>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row nav mt-5">
            <div class="col">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="danhba_user.php">Danh bạ người dùng</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="danhba_admin.php">Danh bạ người quản lý</a>
                                </li>

                            </ul>
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
                                <button class="btn btn-outline-danger" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>