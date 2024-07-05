<?php

require_once "include/header.php";



if ($user->is_logged()) {
    header("location: index.php");
    exit();
}





if ($_SERVER["REQUEST_METHOD"] === "POST") {




    $username = $_POST["username"];
    $password = $_POST["password"];



    $res = $user->login($username, $password);
    $is_admin = $user->is_admin();


    if (!$res) {
        $_SESSION["message"]["type"] = "error";
        $_SESSION["message"]["text"] = "Invalid username or password.";
        header("location: login.php");
        exit();
    }



    if ($is_admin) {

        header("location: admin/index.php");
    } else {
        header("location: index.php");


    }
    exit();
}



?>



<div class="flex min-h-full flex-col justify-center items-center px-6 py-12 lg:px-8  ">
    <div class="border-gray-200 border-solid border-2 w-[500px] p-4 rounded-lg	">

        <div class="sm:mx-auto sm:w-full sm:max-w-sm  ">
            <h2 class=" text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Welcome back to Shirtfy
            </h2>
        </div>

        <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm ">
            <form class="space-y-4 " action="login.php" method="POST">

                <div>
                    <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                    <div class="mt-2">
                        <input id="username" name="username" type="text"
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
                    <button type=" submit" class="flex w-full justify-center rounded-md bg-green-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600
                        mt-6 mb-4">
                        Sign
                        In</button>
                </div>
            </form>

        </div>

    </div>
</div>





<?php

require_once "include/footer.php"

    ?>