<?php



require_once "include/header.php";
require_once "app/classes/Order.php";



if (!$user->is_logged()) {
    header("location: login.php");
    exit();
}


$user_id = $_SESSION["user_id"];

$orders = new Order();
$orders = $orders->get_all_orders();


?>


<div class="overflow-x-auto h-full w-[1000px] mx-auto flex justify-center items-center flex-col gap-2">

    <?php if (empty($orders)): ?>


    <div role="alert" class="alert bg-gray-200 text-gray-900 flex justify-center items-center border-0">

        <span class="font-bold">No orders. Please add something to your cart.</span>
    </div>

    <?php else: ?>


    <table class="table border-2 border-solid border-gray-300 rounded-lg ">
        <!-- head -->
        <thead>
            <tr class=" uppercase bg-gray-200 text-gray-800 text-base border-b-0 font-medium ">

                <th class="text-center">Order ID</th>
                <th class="text-center">Product Name</th>
                <th class="text-center">Size</th>
                <th class="text-center">Price</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Image</th>
                <th class="text-center"> Delivery Address</th>
                <th class="text-center">Date</th>
            </tr>
        </thead>
        <tbody>


            <?php foreach ($orders as $order): ?>
            <tr class="text-gray-700 border-b-gray-300 border-2">
                <td class="text-center">
                    <?= $order["order_id"] ?>
                </td>
                <td>
                    <div class="flex items-center justify-center gap-3">

                        <div>
                            <div class="font-bold text-center"><?= $order["name"] ?></div>
                        </div>
                    </div>
                </td>
                <td class="text-center"><?= $order["quantity"] ?> </td>
                <td class="text-center"><?= $order["price"] ?> $</td>
                <td class="text-center">
                    <?= $order["size"] ?>
                </td>
                <th>
                    <div class="avatar">
                        <div class="mask mask-squircle h-12 w-12 ">
                            <img src="public/images/product_images/<?= $item["image"] ?>" />
                        </div>
                    </div>
                </th>
                <td class="text-center"><?= $order["delivery_address"] ?> </td>
                <td class="text-center"><?= $order["created_at"] ?> </td>
            </tr>

            <?php endforeach; ?>


        </tbody>

    </table><?php endif; ?>

</div>










<?php
require_once "include/footer.php";
?>