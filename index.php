<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$cars = [];

require_once 'database/database.php';
require_once 'templates/functions/template_functions.php';

$pdo = db_connect();

handle_form_submission($pdo);

get_six_cars();

include 'templates/index.php';
