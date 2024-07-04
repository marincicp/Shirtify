<?php

require_once "include/header.php";
require_once "app/classes/Cart.php";





$product_id = $_GET["product_id"];
$product = $products->get_product($product_id);




if ($_SERVER["REQUEST_METHOD"] === "POST") {


    $user_id = $_SESSION["user_id"];
    $quantity = $_POST["quantity"];

    $cart = new Cart();
    $cart->add_to_cart($user_id, $product_id, $quantity);

}


?>



<div class="min-h-full bg-gray-200 flex flex-wrap justify-center items-center p-2 gap-2">


    <div class="card bg-base-100 w-2/5 h-[500px] shadow-xl">
        <figure class="px-10 pt-10">
            <img src="images/<?php echo $product["image"] ?>" alt="<?php echo $product["name"] ?>" class="rounded-xl" />
        </figure>
        <div class="card-body items-center text-center">
            <h2 class="card-title"><?php echo $product["name"] ?></h2>
            <p>Price: <?php echo $product["price"] ?></p>
            <p>Size: <?php echo $product["size"] ?></p>
            <div class="card-actions">

                <form method="post" action="">
                    <input type="number" placeholder="Type here" value="1" name="quantity"
                        class="input input-bordered w-[70px] mb-2 max-w-xs" />

                    <button class="btn btn-primary">Add To Cart</button>
                </form>
            </div>
        </div>
    </div>



</div>


<?php
require_once "include/footer.php";
?>