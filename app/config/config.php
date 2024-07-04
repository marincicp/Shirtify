<?php
session_start();
$server_name = "localhost";
$db_user = "root";
$db_password = "";
$database_name = "shop";


$conn = mysqli_connect($server_name, $db_user, $db_password, $database_name);

if (!$conn) {
    die("" . mysqli_connect_error());
}