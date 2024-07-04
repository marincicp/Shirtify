<?php


require_once "../app/config/config.php";
require_once "../app/classes/User.php";
require_once "../app/classes/Product.php";


$user = new User();


if ($user->is_logged() && $user->is_admin()):

    $products = new Product();
    $products = $products->get_all_products();



    ?>
    <!-- <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Admin</title>
    </head>

    <body>
        <div class="overflow-x-auto h-full w-[700px] mx-auto flex justify-center items-center flex-col gap-2">
            <a href="add_product.php" class="btn btn-primary">Add Product </a>

            <table class="table border-2 border-solid border-gray-300">
                <!-- head -->
    <thead>
        <tr class="text-gray-500 uppercase bg-slate-200">

            <th>Product ID</th>
            <th>Name</th>
            <th>Size</th>
            <th>Price</th>
            <th>Created</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>


        <?php foreach ($products as $product):
            echo "" . $product["image"]; ?>
            <tr>
                <td><?= $product["product_id"] ?> $</td>
                <td>
                    <div class="flex items-center gap-3">
                        <div>
                            <div class="font-bold"><?= $product["name"] ?></div>
                        </div>
                    </div>
                </td>
                <td>
                    <?= $product["size"] ?>
                </td>
                <td><?= $product["price"] ?> $</td>
                <td><?= $product["created_at"] ?> </td>
                <th>
                    <div class="avatar">
                        <div class="mask mask-squircle h-12 w-12">
                            <img src="../public/images/product_images/<?= $product["image"] ?>"
                                alt="Avatar Tailwind CSS Component" />
                        </div>
                        <?= $product["image"] ?>
                    </div>
                </th>
                <td>
                    <a href="edit_product.php?id=<?= $product["product_id"]; ?>" class=" btn btn-primary">Edit
                    </a>

                    <a href="delete_product.php?id=<?= $product["product_id"]; ?>" class=" btn btn-primary">Delete
                    </a>

                </td>
            </tr>

        <?php endforeach; ?>


    </tbody>

    </table>

    </div>




<?php endif; ?>

</html>
</body>