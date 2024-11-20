<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Auto Marketplace</title>
    <link rel="stylesheet" href="sell.css" />
    <link rel="icon" type="image/x-icon" href="./images/auto_marketplace_logo.ico">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"
    />
  </head>
  <body>
    <nav>
      <img src="./images/auto_marketplace_logo.png" alt="logo" />
      <div class="nav-title">AUTO MARKETPLACE - SELL</div>
      <button>
        <div class="dropdown">
          <span class="dropbtn material-symbols-outlined"> menu </span>
          <div class="dropdown-content">
            <a href="./index.php">Home</a>
            <a href="./buy.php">Buy</a>
            <a href="./sell.php">Sell</a>
            <a href="./about.php">About</a>
          </div>
        </div>
      </button>
    </nav>
    <div class="container">
      <header>
        <div class="header-content">
          <?php the_results(); ?>
          <h1>Looking to get a <span>great</span> deal on your vehicle?</h1>
        </div>
        <form action="sell.php" method="post" enctype="multipart/form-data">
          <label for="location"> Location </label>
            <select name="location">
                <option value="no-selection" selected>No selection</option>
                <option value="calgary">Calgary, AB</option>
                <option value="Montreal">Montreal, QC</option>
                <option value="toronto">Toronto, ON</option>
                <option value="vancouver">Vancouver, BC</option>
                <option value="winnipeg">Winnipeg, MB</option>
            </select>
            <?php the_validation_message('location'); ?>
          <label for="model">Model</label>
            <input type="text" name="model" placeholder="Example: Corolla" required></input>
            <?php the_validation_message('model'); ?>
          <label for="brand">Brand</label>
            <input type="text" name="brand" placeholder="Example: Toyota" required></input>
            <?php the_validation_message('brand'); ?>
          <label for="color">Color</label>
            <select name="color">
              <option value="no-selection" selected>Select a color</option>
                <option value="black">Black</option>
                <option value="blue">Blue</option>
                <option value="green">Green</option>
                <option value="orange">Orange</option>
                <option value="red">Red</option>
                <option value="silver">Silver</option>
                <option value="white">White</option>
                <option value="yellow">Yellow</option>
                <option value="other">Other</option>
            </select>
          <?php the_validation_message('color'); ?>
          <label for="km">Km</label>
            <input type="number" name="km" placeholder="Example: 14000" required></input>
            <?php the_validation_message('km'); ?>
          <label for="price">Price</label>
            <input type="number" name="price" placeholder="$" required></input>
            <?php the_validation_message('price'); ?>
          <label for="picture">Car Picture</label>
            <input type="file" name="picture"></input>
          <label for="year">Year</label>
            <input type="number" name="year"></input>
            <?php the_validation_message('year'); ?>
          <label for="seller_name">Your Name</label>
            <input type="text" name="seller_name" required>
            <?php the_validation_message('seller_name'); ?>
          <label for="seller_email">Your Email</label>
            <input type="email" name="seller_email" required>
            <?php the_validation_message('seller_email'); ?>
          <label for="seller_phone">Your Phone Number (Format: 123-456-7890)</label>
            <input type="tel" name="seller_phone" pattern="\d{3}-\d{3}-\d{4}" required>
            <?php the_validation_message('seller_phone'); ?>
          <button type="submit">Display for sale!</button>
        </form>
      </header>
      <footer>
        <div class="newsletter">
          <form action="#" method="POST">
            <h3>Subscribe to our Newsletter</h3>
            <input type="email" placeholder="Your e-mail" required />
            <button type="submit">Subscribe</button>
          </form>
        </div>
        <div class="copyright">
          <p>&copy; Piero Friedrich</p>
          <div class="links"><a href="https://github.com/PieroFriedrich">GitHub</a></div>
        </div>
      </footer>
    </div>
  </body>
</html>
