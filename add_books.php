<?php
ob_start();
include("header.php");
include('./check-login.php');
?>

<div class="container-fluid">
    <div class="row mt-5">
        <div class="col d-flex"><a href="index.php"><i class="fas fa-chevron-left "></i></a>
            <h4 class="ms-2">Trang chủ</h4>
        </div>
        <div class="col text-end"><a href="index.php"><button class="btn btn-outline-danger" type="submit">Hủy</button></a></div>
    </div>
    <?php

    if (isset($_SESSION['add'])) //Checking whether the SEssion is Set of Not
    {
        echo $_SESSION['add']; //Display the SEssion Message if SEt
        unset($_SESSION['add']); //Remove Session Message
    }



    ?>
    <div class="row">
        <div class="col border p-3 rounded-2 mt-3">
            <form method="POST" class="row g-3 " enctype="multipart/form-data">
                <div class="col-md-12">
                    <label for="book_title" class="form-label">Tên sách</label>
                    <input type="text" name="book_title" class="form-control" id="book_title" placeholder="Mắt biếc">
                </div>
                <div class="col-md-12">
                    <label for="book_author" class="form-label">Tác giả</label>
                    <input type="text" name="book_author" class="form-control" id="book_author" placeholder="Nguyễn Ngọc Ánh">
                </div>
                <div class="col-md-12">
                    <label for="book_descr" class="form-label">Miêu tả một chút về sách</label>
                    <input type="text" name="book_descr" class="form-control" id="book_descr" placeholder="tiểu thuyết tình cảm có cảm xúc sâu lắng...">
                </div>

                <div class="col">
                    <label for="avatar" class="form-label">Thêm ảnh</label>
                    <input type="file" id="fileToUpload" name="fileToUpload" class=" mb-3 form-control" value="chọn ảnh">
                    <div class="preview mb-3">
                        <div id="preview">
                            <img src="#" hidden />
                        </div>
                        <div id="err"></div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <button type="submit" name="submit" class="btn btn-outline-danger ">
                        <h5>Thêm</h5x>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include('footer.php');

if (isset($_POST['submit'])) {


    //echo "CLicked";

    //1. Get the DAta from Form
    $book_title = $_POST['book_title'];
    $book_author = $_POST['book_author'];
    $book_descr = $_POST['book_descr'];



    $target_dir = "img/img_upload/"; //chỉ định thư mục nơi tệp sẽ được đặt
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); //chỉ định đường dẫn của tệp sẽ được tải lên
    $uploadOk = 1; //chưa được sử dụng (sẽ được sử dụng sau)
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); //giữ phần mở rộng tệp của tệp 

    

    // kiểm tra kích cỡ ảnh
    if (
        $_FILES["fileToUpload"]["size"] > 500000
    ) {
        echo "Xin lỗi,cỡ ảnh bạn quá lớn.";
        $uploadOk = 0;
    }

    // cho phép các dạng form ảnh
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo " Xin lỗi, chỉ có tệp JPG, JPG, PNG & GIF được phép.";
        $uploadOk = 0;
    }

    // kiểm tra nếu $uploadOk = 0
    if ($uploadOk == 0) {
        echo "Xin lỗi, tập tin của bạn đã không được tải lên.";
        // Hoàn thành tải lên tập tin PHP Script
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "Tệp " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " đã thành công.";
        } else {
            echo "Xin lỗi, đã có lỗi tải lên tệp của bạn.";
        }
    }

    $userid = $_SESSION['userid'] ;
    $date_add = date("Y-m-d ");

    //2. SQL Query to Save the data into database
    echo $sql = "INSERT INTO `books_add`(`book_ad_id`, `book_title`, `book_author`, `book_image`, `book_descr`, `userid`, `date_add`) 
    VALUES (NULL,'$book_title','$book_author','$target_file','$book_descr','$userid','$date_add')";

    //3. Executing Query and Saving Data into Datbase
    $res = mysqli_query($conn, $sql);

    //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
    if ($res == TRUE) {
        //Data Inserted

        //Create a Session Variable to Display Message
        $_SESSION['add'] = "<div class='danger'>thêm thành công</div>";
        header("Location:add_book_table.php");

    } else {

        $_SESSION['add'] = "<div class='error'>không hợp lệ</div>";
        //Redirect Page to Add Admin
        header("location: add_books.php");
    }
}
?>

<script type="text/javascript" src="js/edit-js.js"></script>