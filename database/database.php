<?php
require 'config.php';

function db_connect() {

  try {

    $connectionString = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
    $user = DBUSER;
    $pass = DBPASS;

    $pdo = new PDO($connectionString, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
  }
  catch (PDOException $e)
  {
    die($e->getMessage());
  }
}

function get_filtered_cars($location, $model, $brand, $color, $km, $price) {
  global $pdo, $cars;

  $sql = 'SELECT * FROM cars WHERE 1=1';
  $params = [];

  if ($location != "no-selection") {
      $sql .= ' AND location = :location';
      $params[':location'] = $location;
  }
  if (!empty($model)) {
      $sql .= ' AND model LIKE :model';
      $params[':model'] = '%' . $model . '%';
  }
  if (!empty($brand)) {
      $sql .= ' AND brand LIKE :brand';
      $params[':brand'] = '%' . $brand . '%';
  }
  if ($color) {
      $sql .= ' AND color = :color';
      $params[':color'] = $color;
  }
  if (!empty($km)) {
      $sql .= ' AND km <= :km';
      $params[':km'] = $km;
  }
  if (!empty($price)) {
      $sql .= ' AND price <= :price';
      $params[':price'] = $price;
  }
  if (!empty($seller_name)) {
      $sql .= ' AND seller_name <= :seller_name';
      $params[':seller_name'] = $seller_name;
  }
  if (!empty($seller_email)) {
      $sql .= ' AND seller_email <= :seller_email';
      $params[':seller_email'] = $seller_email;
  }
  if (!empty($seller_phone)) {
      $sql .= ' AND seller_phone <= :seller_phone';
      $params[':seller_phone'] = $seller_phone;
  }
  $sql .= ' ORDER BY ID DESC';
  $statement = $pdo->prepare($sql);
  $statement->execute($params);
  $cars = $statement->fetchAll(PDO::FETCH_ASSOC);
}


function handle_form_submission() {
  global $pdo;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $noPicture = './images/noimage.png';

    $sql = 'INSERT INTO cars (location, model, brand, color, km, price, picture, year, seller_name, seller_email, seller_phone) VALUES (:location, :model, :brand, :color, :km, :price, :picture, :year, :seller_name, :seller_email, :seller_phone)';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':location', $_POST['location']);
    $statement->bindValue(':model', $_POST['model']);
    $statement->bindValue(':brand', $_POST['brand']);
    $statement->bindValue(':color', $_POST['color']);
    $statement->bindValue(':km', $_POST['km']);
    $statement->bindValue(':price', $_POST['price']);
    if (isset($_POST['picture'])) {
      $statement->bindValue(':picture', $_POST['picture']);
    } else {
      $statement->bindValue(':picture', $noPicture);
    }
    $statement->bindValue(':year', $_POST['year']);
    $statement->bindValue(':seller_name', $_POST['seller_name']);
    $statement->bindValue(':seller_email', $_POST['seller_email']);
    $statement->bindValue(':seller_phone', $_POST['seller_phone']);
    $statement->execute();
  }
}

function get_cars() {
  global $pdo;
  global $cars;

  $sql = 'SELECT * FROM cars ORDER BY ID DESC';

  $result = $pdo->query($sql);
  while ($row = $result->fetch()) {
    $cars[] = $row;
  }
}

function get_six_cars() {
  global $pdo;
  global $cars;

  $sql = 'SELECT * FROM cars ORDER BY ID DESC LIMIT 6';

  $result = $pdo->query($sql);
  while ($row = $result->fetch()) {
    $cars[] = $row;
  }
}
