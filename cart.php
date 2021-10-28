<?php
session_start();
include("header.php");


if (isset($_POST['remove'])) {
    if ($_GET['action'] == 'remove') {
        foreach ($_SESSION['cart-to'] as $key => $value) {
            if ($value["book_isbn"] == $_GET['id']) {
                unset($_SESSION['cart-to'][$key]);
                echo "<script>alert('Product has been Removed...!')</script>";
                echo "<script>window.location = 'cart.php'</script>";
            }
        }
    }
}
?>

<div id="products-wrapper">
    <h1>Các sản phẩm</h1>
    <div class="products">
        <?php
        //current URL of the Page. cart_update.php redirects back to this URL
        $current_url = base64_encode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

        $results = $mysqli->query("SELECT * FROM books ORDER BY book_isbn ASC");
        if ($results) {

            //fetch results set as object and output HTML
            while ($obj = $results->fetch_object()) {
                echo '<div class="product">';
                echo '<form method="post" action="cart_update.php">';
                echo '<div class="product-thumb"><img class="w-50" src="./img/img-index/' . $obj->book_image . '"></div>';
                echo '<div class="product-content"><h3>' . $obj->book_title . '</h3>';
                echo '<div class="product-desc">' . $obj->book_descr . '</div>';
                echo '<div class="product-info">';
                echo 'Giá ' . $currency . $obj->book_price . ' | ';
                echo 'Số lượng <input type="text" name="product_qty" value="1" size="3" />';
                echo '<button class="add_to_cart">Thêm vào giỏ hàng</button>';
                echo '</div></div>';
                echo '<input type="hidden" name="product_code" value="' . $obj->book_isbn . '" />';
                echo '<input type="hidden" name="type" value="add" />';
                echo '<input type="hidden" name="return_url" value="' . $current_url . '" />';
                echo '</form>';
                echo '</div>';
            }
        }
        ?>
    </div>

    <div class="shopping-cart">
        <h2>Giỏ hàng của bạn</h2>
        <?php
        if (isset($_SESSION["products"])) {
            $total = 0;
            echo '<ol>';
            foreach ($_SESSION["products"] as $cart_itm) {
                echo '<li class="cart-itm">';
                echo '<span class="remove-itm"><a href="cart_update.php?removep=' . $cart_itm["book_isbn"] . '&return_url=' . $current_url . '">&times;</a></span>';
                echo '<h3>' . $cart_itm["name"] . '</h3>';
                echo '<div class="p-code">P Mã : ' . $cart_itm["book_isbn"] . '</div>';
                echo '<div class="p-qty">Số lượng : ' . $cart_itm["qty"] . '</div>';
                echo '<div class="p-price">Giá :' . $currency . $cart_itm["book_price"] . '</div>';
                echo '</li>';
                $subtotal = ($cart_itm["book_price"] * $cart_itm["qty"]);
                $total = ($total + $subtotal);
            }
            echo '</ol>';
            echo '<span class="check-out-txt"><strong>Total : ' . $currency . $total . '</strong> <a href="view_cart.php">Thanh toán!</a></span>';
            echo '<span class="empty-cart"><a href="cart_update.php?emptycart=1&return_url=' . $current_url . '">Giỏ hàng trống.</a></span>';
        } else {
            echo 'Giỏ của bạn trống';
        }
        ?>
    </div>

</div>