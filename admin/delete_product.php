<?php
require_once "../app/config/config.php";
require_once "../app/classes/User.php";
require_once "../app/classes/Product.php";

$user = new User();


if ($user->is_logged() && $user->is_admin()) {

    $product_id = $_GET["id"];


    $product = new Product();

    $product->delete($product_id);



    header("location: index.php");
    exit();
}





?>