<?php



require_once "include/header.php";
require_once "app/classes/Cart.php";


if (!$user->is_logged()) {
    header("location: login.php");
    exit();
}


$cart = new Cart();
$cart_items = $cart->get_all_items();



?>
<div
    class="overflow-x-auto h-full w-full sm:w-5/6 lg:w-[700px] mx-auto flex justify-center items-center flex-col gap-2 p-4 ">
    <?php if (empty($cart_items)): ?>

        <div role="alert" class="alert bg-gray-200 text-gray-700 flex justify-center items-center border-0">

            <span class="font-bold">Your cart is empty. Please add items to your cart.</span>
        </div>

    <?php else: ?>



        <div class="w-full flex justify-start mb-4 ">

            <p class="text-gray-700 font-bold text-lg">Review your cart before proceeding to checkout:</p>
        </div>

        <table class="table border-2 border-solid border-gray-300 rounded-lg ">
            <thead>
                <tr class=" uppercase bg-gray-200 text-gray-800 text-base border-b-0 font-medium ">
                    <th class="text-center">Product Name</th>
                    <th class="text-center">Size</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Image</th>
                </tr>
            </thead>
            <tbody>


                <?php foreach ($cart_items as $item): ?>
                    <tr class="text-gray-700 border-b-gray-300 border-2">

                        <td>
                            <div class=" flex items-center justify-center gap-3">

                                <div class="text-center">
                                    <div class="font-bold"><?= $item["name"] ?></div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <?= $item["size"] ?>
                        </td>
                        <td class="text-center"><?= $item["price"] ?> $</td>
                        <td class="text-center"><?= $item["quantity"] ?> </td>
                        <th class="flex justify-center">
                            <div class="avatar">
                                <div class="mask mask-squircle h-12 w-12 ">
                                    <img src="public/images/product_images/<?= $item["image"] ?>" alt="product" />

                                </div>
                            </div>
                        </th>
                    </tr>

                <?php endforeach; ?>


            </tbody>

        </table>
        <div class="w-full flex justify-end mt-4 ">

            <a href="checkout.php" class="btn btn-success uppercase ">Checkout </a>
        </div>
    </div>

<?php endif; ?>


<?php

require_once "include/footer.php"
    ?>