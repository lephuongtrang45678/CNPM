<?php
include('../constants.php')
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
                <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center mb-5 fw-light fs-5 text-danger fw-bold fs-3">ĐĂNG NHẬP</h5>
                    <form method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" id="email" value="trang">
                            <label for="floatingInput">Tên đăng nhập </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="pass"  >
                            <label for="floatingPassword">Mật khẩu</label>
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                            <label class="form-check-label" for="rememberPasswordCheck">
                                Nhớ mật khẩu
                            </label>
                        </div>
                        <div class="d-grid">
                            <input class="btn btn-outline-danger btn-login text-uppercase fw-bold" name="submit" type="submit" value="Đăng Nhập">
                        </div>
                        <hr class="my-4">
                        <div class="d-grid mb-2">
                            <button class="btn btn-google btn-login text-uppercase fw-bold" type="">
                                <i class="fab fa-google me-2"></i> Đăng Nhập với Google
                            </button>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-facebook btn-login text-uppercase fw-bold" type="">
                                <i class="fab fa-facebook-f me-2"></i> Đăng Nhập với Facebook
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $pass = md5($_POST['pass']);



    echo $sql = "SELECT * FROM administrators WHERE name='$name' and pass = '$pass'";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $pass_save = $row['pass'];
        if ($pass == $pass_save) {
            $_SESSION['user_administrators'] = $name;
            header("Location:" . SITEURL . "administrators/index.php");

        } else {
            $response = 'mat khau sai';
            header("Location:" . SITEURL . "administrators/login.php?response=$response");
        }
    } else {
        $response = "email sai";
        header("Location:" . SITEURL . "administrators/login.php?response=$response");
    }
}




include('footer.php');
?>