<?php
require_once "app/config/config.php";
require_once "app/classes/User.php";
require_once "app/classes/Product.php";

$user = new User();
$products = new Product();
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
        <div class="navbar-end  flex">
            <ul class="menu menu-horizontal px-1">
                <?php if (!$user->is_logged()): ?>
                    <li><a href='register.php'>Register</a></li>
                    <li><a href='login.php'>Login</a></li>
                <?php else: ?>
                    <li><a href='cart.php'> <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg></a></li>
                    <li><a href='orders.php'>My Orders</a></li>
                    <li><a href='logout.php'>Logout</a></li>
                <?php endif; ?>
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