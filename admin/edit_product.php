<?php
require_once "../app/config/config.php";
require_once "../app/classes/User.php";
require_once "../app/classes/Product.php";
require_once "include/header.php";
$user = new User();


if ($user->is_logged() && $user->is_admin()) {

    $product_id = $_GET["id"];


    $product_obj = new Product();
    $product = $product_obj->get_product($product_id);


    if ($_SERVER["REQUEST_METHOD"] === "POST") {


        $name = $_POST["name"];
        $size = $_POST["size"];
        $price = $_POST["price"];
        $image = $_POST["image"];


        $product_obj->update($name, $price, $size, $image, $product_id);

        header("location: edit_product.php?id=" . $product_id);

    }

}



require_once "include/footer.php";










?>








<div class="flex min-h-full flex-col justify-center items-center px-6 py-12 lg:px-8  ">
    <div class="border-gray-200 border-solid border-2 w-[500px] p-4 rounded-lg	">

        <div class="sm:mx-auto sm:w-full sm:max-w-sm  ">
            <h2 class=" text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Edit product</h2>
        </div>

        <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm ">
            <form class="space-y-4 " action="" method="POST">

                <div>
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                    <div class="mt-2">
                        <input id="name" name="name" type="text"
                            class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 bg-gray-200 placeholder:text-gray-400 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="<?= $product["name"] ?>">
                    </div>
                </div>
                <div>
                    <label for="size" class="block text-sm font-medium leading-6 text-gray-900">Size</label>
                    <div class="mt-2">
                        <input id="size" name="size" type="text" value="<?= $product["size"] ?>" class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset
                        ring-gray-300 bg-gray-200 placeholder:text-gray-400 focus:ring-inset focus:ring-indigo-600
                        sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Price</label>
                    <div class="mt-2">
                        <input id="price" name="price" type="text" value="<?= $product["price"] ?>" class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset
                        ring-gray-300 bg-gray-200 placeholder:text-gray-400 focus:ring-inset focus:ring-indigo-600
                        sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Image</label>
                    <div class="mt-2">
                        <input id="image" name="image" type="text"
                            class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 bg-gray-200 placeholder:text-gray-400 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="<?= $product["image"] ?>">
                    </div>

                </div>

                <div>
                    <button type=" submit" class="flex w-full justify-center rounded-md bg-green-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600
                        mt-6 mb-4">
                        Edit Product
                    </button>
                </div>
            </form>

        </div>

    </div>
</div>