<?php
ob_start();

include("index.php");
?>

<div class="container-fluid">
    <div class="row mt-5">
        <div class="col d-flex"><a href="danhba_admin.php" class="text-danger"><i class="fas fa-chevron-left "></i></a>
            <h4 class="ms-2">Trở lại danh bạ</h4>
        </div>
        <div class="col text-end"><a href="./index.php"><button class="btn btn-outline-danger" type="submit">Hủy</button></a></div>
    </div>
    <?php
    if (isset($_GET['idAd'])) {
        $idAd = $_GET['idAd'];
    }

    $sql_2 = " SELECT * FROM admin WHERE idAd  = '$idAd'";
    $res_2 = mysqli_query($conn, $sql_2);

    $row_2 = mysqli_fetch_assoc($res_2);
    ?>


    <div class="row">
        <div class="col border p-3 rounded-2 mt-3">
            <form method="POST" class="row g-3 " enctype="multipart/form-data">
                <div class="col-md-4">
                    <label for="name" class="form-label">Tên admin</label>
                    <input type="" name="name" class="form-control" id="name" value="<?php echo $row_2['name'] ?>">
                </div>
                <div class="col-md-4">
                    <label for="pass" class="form-label">password</label>
                    <input type="password" name="pass" class="form-control" id="pass" value="<?php echo $row_2['pass'] ?>">
                </div>
                <div class="col-md-4">
                    <label for="id_Addministrators" class="form-label">Mã Addministrators</label>
                    <input type="password" name="id_Addministrators" class="form-control" id="id_Addministrators" value="<?php echo $row_2['id_Addministrators'] ?>">
                </div>
                <input type="hidden" name="idAd" class="form-control" id="idAd" value="<?php echo $row_2['idAd'] ?>">

                <div class=" col-12 d-flex justify-content-center">
                    <button type="submit" name="submit" class="btn btn-outline-danger ">
                        <h5>Sửa</h5x>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <?php
    include("footer.php");
    if (isset($_POST['submit'])) {


        //echo "CLicked";

        //1. Get the DAta from Form
        $idAd = $_POST['idAd'];
        $name = $_POST['name'];
        $pass = md5($_POST['pass']);
        $id_Addministrators = $_POST['id_Addministrators'];






        $sql = "SELECT * FROM admin WHERE idAd = '$idAd' ";
        $res = mysqli_query($conn, $sql);
        if ($res == true) {
            $count = mysqli_num_rows($res);
            if ($count == 1) {
                $sql2 = "UPDATE admin SET name='$name',pass='$pass', id_Addministrators='$id_Addministrators' WHERE idAd = '$idAd'";
                $res2 = mysqli_query($conn, $sql2);
                if ($res2 == true) {
                    //Display Succes Message
                    //REdirect to Manage Admin Page with Success Message
                    $_SESSION['edit'] = "<div class='success'> Changed Successfully. </div>";
                    //Redirect the admin
                    header('location:' . SITEURL . 'administrators/danhba_admin.php');
                } else {
                    //Display Error Message
                    //REdirect to Manage Admin Page with Error Message
                    $_SESSION['edit'] = "<div class='error'>Failed to Change . </div>";
                    //Redirect the admin
                    header('location:' . SITEURL . 'administrators/edit_admin.php');
                }
            }
        }
    }

    ?>
    <script type="text/javascript" src="../js/edit-js.js"></script>