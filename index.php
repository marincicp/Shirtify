<?php

require_once "include/header.php";
require_once "app/classes/Product.php";

$products = new Product();

$products = $products->get_all_products();


?>


<div class="min-h-full bg-gray-200 flex flex-wrap justify-between p-6 gap-6">

    <?php foreach ($products as $product): ?>

        <div class="card bg-gray-300 w-96 shadow-xl text-gray-900">
            <figure class="px-10 pt-10">
                <img src="images/<?php echo $product["image"] ?>" alt="<?php echo $product["name"] ?>" class="rounded-xl" />
            </figure>
            <div class="card-body items-center text-center">
                <h2 class="card-title"><?php echo $product["name"] ?></h2>
                <p>Price: <?php echo $product["price"] ?></p>
                <p>Size: <?php echo $product["size"] ?></p>
                <div class="card-actions">
                    <a href="product.php?product_id=<?= $product["product_id"] ?>" class="btn btn-neutral">View Product</a>
                </div>
            </div>
        </div>






    <?php endforeach; ?>


    <?php

    require_once "include/footer.php"

        ?>