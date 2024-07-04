<?php
require_once "../app/config/config.php";
require_once "../app/classes/User.php";
require_once "../app/classes/Product.php";

$user = new User();


if ($user->is_logged() && $user->is_admin()) {



    $product = new Product();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {



        $name = $_POST["name"];
        $price = $_POST["price"];
        $size = $_POST["size"];
        $image = $_POST["photo_path"];

        var_dump($_POST["photo_path"]);
        // $product->create($name, $price, $size, $image);

        // header("location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <title>Add Product</title>
</head>

<body>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 border-black border-1 border-solid">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">

            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-100">Add Product</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm bg-gray-100 p-4">
            <form class="space-y-6 " method="post" action="">



                <div>
                    <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                    <div class="mt-2">
                        <input id="name" name="name" type="text"
                            class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 bg-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            </div>
                    </div>


                    <div>
                        <label for="size" class="block text-sm font-medium leading-6 text-gray-900">Size</label>
                        <div class="mt-2">
                            <input id="size" name="size" type="text"
                                class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 bg-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                </div>

                        </div>


                        <div>
                            <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Price</label>
                            <div class="mt-2">
                                <input id="price" name="price" type="text"
                                    class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 bg-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    </div>

                            </div>
                            <div>
                                <label for="image"
                                    class="block text-sm font-medium leading-6 text-gray-900">Image</label>
                                <div class="mt-2">

                                    <div id="dropzone-upload" class="dropzone">
                                        <input type="hidden" name="photo_path" id="photoPathInput" />

                                    </div>

                                    <div class="mt-2">
                                        <button type="submit"
                                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                            Edit
                                        </button>
                                    </div>
            </form>
        </div>
    </div>
    <script src=" https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script>
    Dropzone.options.dropzoneUpload = {
        url: "upload_photo.php",
        paramName: "photo",
        maxFilesize: 20, // MB
        acceptedFiles: "image/*",
        init: function() {
            this.on("success", function(file, response) {
                const jsonResponse = JSON.parse(response);


                console.log("jsonResponse", fiel, response)

                if (jsonResponse.success) {

                    document.querySelector("#photoPathInput").value = jsonResponse.photo.path;

                } else {

                    console.error(jsonResponse.error)
                }

            })
        }
    };
    </script>
</body>

</html>