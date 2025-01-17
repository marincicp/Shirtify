<?php
require_once "../app/config/config.php";
require_once "../app/classes/User.php";
require_once "../app/classes/Product.php";
require_once "include/header.php";

$user = new User();


if ($user->is_logged() && $user->is_admin()):

    $products = new Product();
    $products = $products->get_all_products();



    ?>
<div class="h-full w-full flex justify-center items-center">


    <div class=" h-2/5 w-[900px] mx-auto  flex justify-center items-center flex-col gap-2 p-4 ">

        <div class="w-full flex justify-start mb-4 ">

            <p class="text-gray-700 font-bold text-lg">Full product list:</p>
        </div>
        <table class="table border-2 border-solid border-gray-300 rounded-lg w-full">
            <thead>
                <tr class=" uppercase bg-gray-200 text-gray-800 text-base border-b-0 font-medium ">

                    <th class="text-center"> ID</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Size</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Created</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>


                <?php foreach ($products as $product): ?>
                <tr class="text-gray-700 border-b-gray-300 border-2">
                    <td class="text-center"><?= $product["product_id"] ?> </td>
                    <td>
                        <div class="flex items-center justify-center gap-3">
                            <div>
                                <div class="font-bold"><?= $product["name"] ?></div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                        <?= $product["size"] ?>
                    </td>
                    <td class="text-center"><?= $product["price"] ?> $</td>
                    <td class="text-center"><?= date("F,jS Y", strtotime($product["created_at"])) ?> </td>
                    <td class="flex justify-center">
                        <div class="avatar">
                            <div class="mask mask-squircle h-12 w-12">
                                <img src="../public/images/product_images/<?= $product["image"] ?>"
                                    alt="Avatar Tailwind CSS Component" />
                            </div>

                        </div>
                    </td>
                    <td>

                        <a href=" edit_product.php?id=<?= $product["product_id"]; ?>" class=" btn btn-info">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                                viewBox="0 0 48 48">
                                <path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="3"
                                    d="M18.4,21.8L32.1,8.1c2.3-2.3,6-2.1,8.1,0.4c1.8,2.2,1.5,5.5-0.5,7.5l-2.8,2.8">
                                </path>
                                <path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="3"
                                    d="M32.5,23.3L17.9,37.8c-0.4,0.4-0.8,0.6-1.3,0.8L6.5,41.5l2.9-10.1c0.1-0.5,0.4-0.9,0.8-1.3l3.7-3.7">
                                </path>
                                <line x1="29.1" x2="36.9" y1="11.1" y2="18.9" fill="none" stroke="#000"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3"></line>
                            </svg>
                        </a>

                        <a href="delete_product.php?id=<?= $product["product_id"]; ?>" class=" btn btn-error "><svg
                                xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                                viewBox="0 0 50 50">
                                <path
                                    d="M 21 0 C 19.355469 0 18 1.355469 18 3 L 18 5 L 10.1875 5 C 10.0625 4.976563 9.9375 4.976563 9.8125 5 L 8 5 C 7.96875 5 7.9375 5 7.90625 5 C 7.355469 5.027344 6.925781 5.496094 6.953125 6.046875 C 6.980469 6.597656 7.449219 7.027344 8 7 L 9.09375 7 L 12.6875 47.5 C 12.8125 48.898438 14.003906 50 15.40625 50 L 34.59375 50 C 35.996094 50 37.1875 48.898438 37.3125 47.5 L 40.90625 7 L 42 7 C 42.359375 7.003906 42.695313 6.816406 42.878906 6.503906 C 43.058594 6.191406 43.058594 5.808594 42.878906 5.496094 C 42.695313 5.183594 42.359375 4.996094 42 5 L 32 5 L 32 3 C 32 1.355469 30.644531 0 29 0 Z M 21 2 L 29 2 C 29.5625 2 30 2.4375 30 3 L 30 5 L 20 5 L 20 3 C 20 2.4375 20.4375 2 21 2 Z M 11.09375 7 L 38.90625 7 L 35.3125 47.34375 C 35.28125 47.691406 34.910156 48 34.59375 48 L 15.40625 48 C 15.089844 48 14.71875 47.691406 14.6875 47.34375 Z M 18.90625 9.96875 C 18.863281 9.976563 18.820313 9.988281 18.78125 10 C 18.316406 10.105469 17.988281 10.523438 18 11 L 18 44 C 17.996094 44.359375 18.183594 44.695313 18.496094 44.878906 C 18.808594 45.058594 19.191406 45.058594 19.503906 44.878906 C 19.816406 44.695313 20.003906 44.359375 20 44 L 20 11 C 20.011719 10.710938 19.894531 10.433594 19.6875 10.238281 C 19.476563 10.039063 19.191406 9.941406 18.90625 9.96875 Z M 24.90625 9.96875 C 24.863281 9.976563 24.820313 9.988281 24.78125 10 C 24.316406 10.105469 23.988281 10.523438 24 11 L 24 44 C 23.996094 44.359375 24.183594 44.695313 24.496094 44.878906 C 24.808594 45.058594 25.191406 45.058594 25.503906 44.878906 C 25.816406 44.695313 26.003906 44.359375 26 44 L 26 11 C 26.011719 10.710938 25.894531 10.433594 25.6875 10.238281 C 25.476563 10.039063 25.191406 9.941406 24.90625 9.96875 Z M 30.90625 9.96875 C 30.863281 9.976563 30.820313 9.988281 30.78125 10 C 30.316406 10.105469 29.988281 10.523438 30 11 L 30 44 C 29.996094 44.359375 30.183594 44.695313 30.496094 44.878906 C 30.808594 45.058594 31.191406 45.058594 31.503906 44.878906 C 31.816406 44.695313 32.003906 44.359375 32 44 L 32 11 C 32.011719 10.710938 31.894531 10.433594 31.6875 10.238281 C 31.476563 10.039063 31.191406 9.941406 30.90625 9.96875 Z">
                                </path>
                            </svg>
                        </a>

                    </td>
                </tr>

                <?php endforeach; ?>


            </tbody>

        </table>
    </div>
</div>
<?php endif; ?>


<?php

require_once "include/footer.php";
?>