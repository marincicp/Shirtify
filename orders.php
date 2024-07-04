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


        <div role="alert" class="alert bg-gray-200 text-gray-900 flex justify-center items-center">

            <span>No orders. Please add something to your cart.</span>
        </div>

    <?php else: ?>


        <table class=" table border-2 border-solid border-gray-300">
            <!-- head -->
            <thead>
                <tr class="text-gray-500 uppercase bg-slate-200">

                    <th>Order ID</th>
                    <th>Product Name</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Delivery Address</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>


                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td>
                            <?= $order["order_id"] ?>
                        </td>
                        <td>
                            <div class="flex items-center gap-3">

                                <div>
                                    <div class="font-bold"><?= $order["name"] ?></div>
                                </div>
                            </div>
                        </td>
                        <td><?= $order["quantity"] ?> </td>
                        <td><?= $order["price"] ?> $</td>
                        <td>
                            <?= $order["size"] ?>
                        </td>
                        <th>
                            <div class="avatar">
                                <div class="mask mask-squircle h-12 w-12">
                                    <img src="<?= $order["image"] ?>" alt="Avatar Tailwind CSS Component" />
                                </div>
                            </div>
                        </th>
                        <td><?= $order["delivery_address"] ?> </td>
                        <td><?= $order["created_at"] ?> </td>
                    </tr>

                <?php endforeach; ?>


            </tbody>

        </table><?php endif; ?>

</div>










<?php
require_once "include/footer.php";
?>