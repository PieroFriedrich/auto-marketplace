<?php
function the_cars() {
  global $cars;

  foreach($cars as $index => $row) {
    ?>
      <div class="car-box" id="car-<?php echo $index; ?>" 
           data-location="<?php echo ($row['location']); ?>" 
           data-km="<?php echo ($row['km']); ?>" 
           data-price="<?php echo ($row['price']); ?>" 
           data-color="<?php echo ($row['color']); ?>"
           data-seller-name="<?php echo ($row['seller_name']); ?>"
           data-seller-email="<?php echo ($row['seller_email']); ?>"
           data-seller-phone="<?php echo ($row['seller_phone']); ?>">
        <img src="<?php echo ($row['picture']); ?>">
        <p><?php echo ($row['year'] . " " . $row['brand'] . " " . $row['model']); ?></p>
        <p>$<?php echo ($row['price']); ?>.00</p>
        <button class="buynow">Buy Now</button>
        <div class="seller-info" id="seller-info-modal">
          <h3>Seller Information</h3>
          <p>Name: <span id="seller-name"></span></p>
          <p>Email: <span id="seller-email"></span></p>
          <p>Phone: <span id="seller-phone"></span></p>
          <button id="close-info">Close</button>
        </div>
      </div>    
    <?php
  }
}


$valid = false;
$val_messages = Array();

function the_results()
{
  global $valid;

  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    if ($valid) {
        echo "<div style='color: green; font-size: 20px'>Your car has been included for sale! Thank you!</div>";
    }
  }
}

function validate()
{
    global $valid;
    global $val_messages;

    if($_SERVER['REQUEST_METHOD']== 'POST')
    {

      if (isset($_POST['location'])) {
        if ($_POST['location'] != "no-selection") {
          $val_messages['location'] = "";
        } else {
          $val_messages['location'] = 'You must choose one of the cities to pick up your car';
        }
      }
      if (isset($_POST['model'])) {
        if (strlen($_POST['model']) >= 2 && strlen($_POST['model']) <= 30) {
          $val_messages['model'] = "";
        } else {
          $val_messages['model'] = 'model must have between 2 and 30 characters';
        }
      }

      if (isset($_POST['brand'])) {
        if (strlen($_POST['brand']) >= 3 && strlen($_POST['brand']) <= 20) {
          $val_messages['brand'] = "";
        } else {
          $val_messages['brand'] = 'brand must have between 3 and 20 characters';
        }
      }

      if (isset($_POST['color'])) {
        if ($_POST['color'] != "no-selection") {
          $val_messages['color'] = "";
        } else {
          $val_messages['color'] = 'You must select your car color';
        }
      }
      if (isset($_POST['km'])) {
        if ($_POST['km'] >= 0 && $_POST['km'] <= 500000) {
          $val_messages['km'] = "";
        } else if ($_POST['km'] < 0) {
          $val_messages['km'] = 'km must be a positive number';
        } else {
          $val_messages['km'] = 'Auto Marketplace only accepts cars until 500,000 km';
        }
      }
      if (isset($_POST['price'])) {
        if ($_POST['price'] >= 0 && $_POST['price'] <= 10000000) {
          $val_messages['price'] = "";
        } else if ($_POST['price'] < 0) {
          $val_messages['price'] = 'price must be a positive number';
        } else {
          $val_messages['price'] = 'Maximum price is $10,000,000.00';
        }
      }
      if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
        $allowed = array('jpg', 'jpeg', 'png', 'webp', 'avif');
        $fileExt = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
        if (!in_array(strtolower($fileExt), $allowed)) {
            $val_messages['picture'] = 'Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.';
        } else if ($_FILES['picture']['size'] > 6 * 1024 * 1024) {
            $val_messages['picture'] = 'File size exceeds the maximum limit of 6MB.';
        } else {
            $uploadDir = 'uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            $newFileName = uniqid() . '.' . $fileExt;
            if (move_uploaded_file($_FILES['picture']['tmp_name'], $uploadDir . $newFileName)) {
                $_POST['picture'] = $uploadDir . $newFileName;
                $val_messages['picture'] = '';
            } else {
                $val_messages['picture'] = 'There was a problem uploading the file.';
            }
        }
      } else {
          $_POST['picture'] = "./images/noimage.png";
      }
      if (isset($_POST['year'])) {
        $nextYear = date("Y") + 1;
        if ($_POST['year'] >= 1900 && $_POST['year'] <= $nextYear) {
          $val_messages['year'] = '';
        } else {
          $val_messages['year'] = 'please enter a valid year between 1900 and ' .$nextYear;
        }
      }
      if (isset($_POST['seller_name'])) {
        if (strlen($_POST['seller_name']) >= 4 && strlen($_POST['seller_name']) <= 30) {
            $val_messages['seller_name'] = "";
        } else {
            $val_messages['seller_name'] = 'Name must be between 4 and 30 characters';
        }
    }
    if (isset($_POST['seller_email'])) {
        if (preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $_POST['seller_email'])) {
            $val_messages['seller_email'] = "";
        } else {
            $val_messages['seller_email'] = 'Please enter a valid email address';
        }
    }
    if (isset($_POST['seller_phone'])) {
        if (preg_match('/^\d{3}-\d{3}-\d{4}$/', $_POST['seller_phone'])) {
            $val_messages['seller_phone'] = "";
        } else {
            $val_messages['seller_phone'] = 'Phone number must be in the format 111-111-1111';
        }
    }

      if ($val_messages['location'] == "" && $val_messages['model'] == "" && $val_messages['brand'] == "" && $val_messages['color'] == "" && $val_messages['km'] == "" && $val_messages['price'] == "" && $val_messages['year'] == "" && $val_messages['seller_name'] == "" && $val_messages['seller_email'] == "" && $val_messages['seller_phone'] == "") {
        $valid = true;
      }
    }
    return $valid;
}

function the_validation_message($type) {

  global $val_messages;

  if($_SERVER['REQUEST_METHOD']== 'POST')
  {
    if (isset($_POST[$type])) {
      if ($val_messages[$type]) {
        echo '<a><p class="failure-message" style="color: red">'.$val_messages[$type].'</p></a>';
      }
    }
  }
}