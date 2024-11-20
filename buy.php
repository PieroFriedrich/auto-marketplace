<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$cars = [];

require_once 'database/database.php';
require_once 'templates/functions/template_functions.php';

$pdo = db_connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $location = $_POST['location'];
    $model = $_POST['model'];
    $brand = $_POST['brand'];
    $color = $_POST['color'];
    $km = $_POST['km'];
    $price = $_POST['price'];

    get_filtered_cars($location, $model, $brand, $color, $km, $price);
} else {
    get_cars();
}

include 'templates/buy.php';
