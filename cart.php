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
<div class="overflow-x-auto h-full w-[700px] mx-auto flex justify-center items-center flex-col gap-2">
    <?php if (empty($cart_items)): ?>


    <div role="alert" class="alert bg-gray-200 text-gray-900 flex justify-center items-center">

        <span>Your cart is empty. Please add items to your cart.</span>
    </div>

    <?php else: ?>


    <table class="table border-2 border-solid border-gray-300">
        <thead>
            <tr class="text-gray-500 uppercase bg-slate-200">
                <th>Product Name</th>
                <th>Size</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>


            <?php foreach ($cart_items as $item): ?>
            <tr>

                <td>
                    <div class="flex items-center gap-3">

                        <div>
                            <div class="font-bold"><?= $item["name"] ?></div>
                        </div>
                    </div>
                </td>
                <td>
                    <?= $item["size"] ?>
                </td>
                <td><?= $item["price"] ?> $</td>
                <td><?= $item["quantity"] ?> </td>
                <th>
                    <div class="avatar">
                        <div class="mask mask-squircle h-12 w-12">
                            <img src="<?= $item["image"] ?>" alt="Avatar Tailwind CSS Component" />
                        </div>
                    </div>
                </th>
            </tr>

            <?php endforeach; ?>


        </tbody>

    </table>

    <a href="checkout.php" class="btn btn-primary">Checkout </a>
</div>

<?php endif; ?>


<?php

require_once "include/footer.php"
    ?>