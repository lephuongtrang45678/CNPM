<?php

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'doc', 'ppt'); // valid extensions
$path = '../img/img-index/'; // upload directory

if ($_FILES['fileToUpload']) {
    $img = $_FILES['fileToUpload']['name'];
    $tmp = $_FILES['fileToUpload']['tmp_name'];

    // get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

    // can upload same image using rand function
    $final_image = rand(1000, 1000000) . $img;

    // check's valid format
    if (in_array($ext, $valid_extensions)) {
        $path = $path . strtolower($final_image);

        if (move_uploaded_file($tmp, $path)) {
            echo "<img src='$path' style='width: 15%;'/>";

        }
    } else {
        echo 'invalid';
    }
}
