<?php
//kiểm tra người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['success'])) //nếu người dùng được cài đặt
{
    //người dùng chưa đăng nhập
    $_SESSION['no-login'] = "<div class='error text-center'>Hãy đăng nhập.</div>";
    //quay lại trang đăng nhập
    header('location: admin.php');
}?>