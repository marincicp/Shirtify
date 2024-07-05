<?php



require_once "include/header.php";
require_once "app/classes/Cart.php";
require_once "app/classes/Order.php";



if (!$user->is_logged()) {
    header("location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {



    $delivery_address = $_POST["address"] . ", " . $_POST["city"] . ", " . $_POST["zip_code"] . ", " . $_POST["country"];
    $order = new Order();
    $order = $order->create_order($delivery_address);

    $_SESSION["type"] = "success";
    $_SESSION["type"] = "Order has been sucefully added.";

    header("location: orders.php");
    exit();

}


?>



<div class="flex min-h-full flex-col justify-center items-center px-6 py-12 lg:px-8  ">
    <div class="border-gray-200 border-solid border-2 w-[500px] p-4 rounded-lg	">

        <div class="sm:mx-auto sm:w-full sm:max-w-sm  ">
            <h2 class=" text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Enter Your Information
            </h2>
        </div>

        <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm ">
            <form class="space-y-4 " action="" method="POST">

                <div>
                    <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Country</label>
                    <div class="mt-2">
                        <input id="country" name="country" type="text"
                            class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 bg-gray-200 placeholder:text-gray-400 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>


                <div>
                    <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City</label>
                    <div class="mt-2">
                        <input id="city" name="city" type="text"
                            class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 bg-gray-200 placeholder:text-gray-400  focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>

                </div>


                <div>
                    <label for="zip_code" class="block text-sm font-medium leading-6 text-gray-900">Zip Code</label>
                    <div class="mt-2">
                        <input id="zip_code" name="zip_code" type="text"
                            class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 bg-gray-200 placeholder:text-gray-400  focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>

                </div>

                <div>
                    <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
                    <div class="mt-2">
                        <input id="address" name="address" type="text"
                            class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 bg-gray-200 placeholder:text-gray-400  focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>

                </div>

                <div>
                    <button type=" submit" class="flex w-full justify-center rounded-md bg-green-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600
                        mt-6 mb-4">
                        Order</button>
                </div>
            </form>

        </div>

    </div>
</div>




<?php

require_once "include/footer.php";
?>