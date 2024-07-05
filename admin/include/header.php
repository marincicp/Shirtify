<?php
require_once "../app/config/config.php";
require_once "../app/classes/User.php";
require_once "../app/classes/Product.php";

$user = new User();
if ($user->is_logged() && $user->is_admin()):

    $products = new Product();
    $products = $products->get_all_products();
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shirtify</title>
        <link href="./public/css/style.css" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
        <title>Add Product</title>
    </head>

    <body class="h-screen bg-white">

        <div class="navbar bg-base-100">
            <div class="navbar-start">
                <div class="dropdown">
                    <div tabindex="0" role="button" class="btn btn-ghost ">


                        <a href="index.php" class="btn btn-ghost text-xl">Shirtify</a>
                    </div>

                </div>
            </div>
            <div class="navbar-end hidden sm:flex">
                <ul class="menu menu-horizontal px-1">
                    <li>
                        <a href="add_product.php" class="btn btn-success">Add Product </a>
                    </li>
                    <li><a href='logout.php' class="btn btn-ghost ml-2">Logout</a></li>
                </ul>
            </div>

        </div>



        <?php
        if (isset($_SESSION["message"])): ?>

            <div class="toast toast-top toast-center">
                <div class="alert alert-<?= $_SESSION["message"]["type"] ?>">
                    <span><?= $_SESSION["message"]["text"] ?></span>
                </div>
            </div>




            <?php unset($_SESSION["message"]); endif; ?>


    <?php endif; ?>