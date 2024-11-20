<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$cars = [];

require_once 'database/database.php';
require_once 'templates/functions/template_functions.php';

$valid = validate();


$pdo = db_connect();

if ($valid) handle_form_submission($pdo);


get_cars();

include 'templates/sell.php';
