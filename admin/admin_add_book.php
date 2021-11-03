<?php
include("./header.php");
ob_start();
?>

<div class="container-fluid">
    <div class="row mt-5">
        <div class="col d-flex"><a href="admin_book.php"><i class="fas fa-chevron-left "></i></a>
            <h4 class="ms-2">Trở lại trang chủ</h4>
        </div>
        <div class="col text-end"><a href="./admin_book.php"><button class="btn btn-outline-danger" type="submit">Hủy</button></a></div>
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
                <div class="col-md-4">
                    <label for="book_isbn" class="form-label"></label>
                    <input type="text" name="book_isbn" class="form-control" id="book_isbn" placeholder="978-0-321-94786-4">
                    <div class="text-muted"><small>Mã vạch</small></div>
                </div>
                <div class="col-md-4">
                    <label for="book_title" class="form-label">Tiêu đề</label>
                    <input type="text" name="book_title" class="form-control" id="book_title" placeholder="Tự Động Hóa PLC S7-1200 Với Tia Portal">
                </div>
                <div class="col-md-4">
                    <label for="book_author" class="form-label">Tác giả</label>
                    <input type="text" name="book_author" class="form-control" id="book_author" placeholder="Trần Văn Hiếu">
                </div>
                <div class="col-md-4">
                    <label for="book_Category" class="form-label">Chủ đề</label>
                    <input type="text" name="book_Category" class="form-control" id="book_Category" placeholder="Vừa học vừa chơi">
                </div>
                <div class="col-md-4">
                    <label for="book_descr" class="form-label">Miêu tả về sách</label>
                    <input type="text" name="book_descr" class="form-control" id="book_descr" placeholder="Tự Động Hóa PLC S7-1200 ">
                </div>
                <div class="col-md-4">
                    <label for="book_price" class="form-label">Giá bán</label>
                    <input type="text" name="book_price" class="form-control" id="book_price" placeholder="1200">
                </div>
                <div class="col-md-4">
                    <label for="publisherid" class="form-label">Nhà sản xuất</label>
                    <input type="text" name="publisherid" class="form-control" id="publisherid" placeholder="Wrox">
                </div>
                <div class="col">
                    <label for="avatar" class="form-label">Thay đổi ảnh</label>
                    <div class="mb-3">
                        <img src="<?php echo $row['book_image']; ?>" alt="" style="width : 10%">
                    </div>
                    <input type="file" name="fileToUpload" id="fileToUpload" class=" mb-3 form-control" value="chọn ảnh">
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
include("footer.php");



//Process the Value from Form and Save it in Database

//Check whether the submit button is clicked or not

if (isset($_POST['submit'])) {


    //echo "CLicked";

    //1. Get the DAta from Form
    $book_isbn = $_POST['book_isbn'];
    $book_title = $_POST['book_title'];
    $book_author = $_POST['book_author'];
    $book_Category = $_POST['book_Category'];
    $book_descr = $_POST['book_descr'];
    $book_price = $_POST['book_price'];
    $publisherid = $_POST['publisherid'];


    $target_dir = "img/"; //chỉ định thư mục nơi tệp sẽ được đặt
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

    // echo $avatar;
    // update
    //2. SQL Query to Save the data into database
    $sql = "INSERT INTO books`(book_isbn`, book_title, book_author, book_image, book_Category, book_descr, book_price, publisherid) 
    VALUES ('$book_isbn','$book_title','$book_author','$target_dir','$book_Category','$book_descr','$book_price','$publisherid')";
    //3. Executing Query and Saving Data into Datbase
    $res = mysqli_query($conn, $sql);

    //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
    if ($res == TRUE) {
        //Data Inserted

        //Create a Session Variable to Display Message
        $_SESSION['add'] = "<div class='danger'>thêm thành công</div>";
        header("location: admin_book.php");
    } else {

        $_SESSION['add'] = "<div class='error'>không hợp lệ</div>";
        //Redirect Page to Add Admin
        header("location: admin_add_book.php");
    }
}

?>