<?php
require_once "include/header.php";


if ($user->is_logged()) {
    header("location: index.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];


    $created = $user->create($name, $username, $email, $password);



    if ($created) {

        $_SESSION["message"]["type"] = "success";
        $_SESSION["message"]["text"] = "User created successfully.";



        header("location:index.php");
        exit();
    } else {

        $_SESSION["message"]["type"] = "error";
        $_SESSION["message"]["text"] = "Error creating user. Please try again.";
        header("location:register.php");
    }
}

?>


<div class="flex h-full flex-col justify-center items-center px-6 py-12 lg:px-8  ">
    <div class="border-gray-200 border-solid border-2 w-[500px] p-4 rounded-lg	">

        <div class="sm:mx-auto sm:w-full sm:max-w-sm  ">

            <h2 class=" text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Create New Account</h2>
        </div>

        <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm  ">
            <form class="space-y-4 " action="" method="POST">

                <div>
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Full Name</label>
                    <div class="mt-2">
                        <input id="name" name="name" type="text"
                            class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 bg-gray-200 placeholder:text-gray-400 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>


                <div>
                    <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                    <div class="mt-2">
                        <input id="username" name="username" type="text"
                            class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 bg-gray-200 placeholder:text-gray-400 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" required
                            class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 bg-gray-200 placeholder:text-gray-400 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    <div class="mt-2">
                        <input id="password" name="password" type="password"
                            class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 bg-gray-200 placeholder:text-gray-400  focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>

                </div>
                <div>
                    <button type=" submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600
                        mt-6 mb-4">
                        Create
                    </button>
                </div>
            </form>

        </div>

    </div>
</div>


<?php

require_once "include/footer.php"

    ?>