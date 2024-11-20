<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Auto Marketplace</title>
    <link rel="stylesheet" href="buy.css" />
    <link rel="icon" type="image/x-icon" href="./images/auto_marketplace_logo.ico">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"
    />
  </head>
  <body>
    <nav>
      <img src="./images/auto_marketplace_logo.png" alt="logo" />
      <div class="nav-title">AUTO MARKETPLACE - BUY</div>
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
          <h1>Choose the <span>perfect</span> car for you!</h1>
        </div>
        <form method="POST">
        <label for="location"> Location </label>
            <select name="location">
                <option value="no-selection" selected>No selection</option>
                <option value="calgary">Calgary, AB</option>
                <option value="Montreal">Montreal, QC</option>
                <option value="toronto">Toronto, ON</option>
                <option value="vancouver">Vancouver, BC</option>
                <option value="winnipeg">Winnipeg, MB</option>
            </select>
          <label for="model">Model</label>
            <input type="text" name="model" placeholder="Example: Corolla"></input>
          <label for="brand">Brand</label>
            <input type="text" name="brand" placeholder="Example: Toyota"></input>
          <label for="color">Color</label>
            <select name="color">
                <option value="" disabled selected>Select a color</option>
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
          <label for="km">Km</label>
            <input type="number" name="km" placeholder="Example: 14000"></input>
          <label for="price">Maximum Price</label>
            <input type="number" name="price" placeholder="$"></input>
          <button type="submit" id="filterForm">Search</button>
        </form>
      </header>
      <main>
        <div class="car-list">
          <?php
          the_cars();
          ?>
        </div>
      </main>
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
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const carList = document.querySelector('.car-list');
        const sellerInfoModal = document.getElementById('seller-info-modal');
        const closeButton = document.getElementById('close-info');
        const sellerNameSpan = document.getElementById('seller-name');
        const sellerEmailSpan = document.getElementById('seller-email');
        const sellerPhoneSpan = document.getElementById('seller-phone');

        if (carList) {
          carList.addEventListener('click', function(event) {
            const carBox = event.target.closest('.car-box');

            if (!carBox) return;

            const sellerInfo = carBox.querySelector('.seller-info');
            const sellerName = carBox.dataset.sellerName;
            const sellerEmail = carBox.dataset.sellerEmail;
            const sellerPhone = carBox.dataset.sellerPhone;

            if (event.target.classList.contains('buynow')) {
              event.stopPropagation();

              sellerNameSpan.textContent = sellerName;
              sellerEmailSpan.textContent = sellerEmail;
              sellerPhoneSpan.textContent = sellerPhone;

              sellerInfoModal.classList.add('show');
              return;
            }
          });

          closeButton.addEventListener('click', function() {
            sellerInfoModal.classList.remove('show');
          });
        }
      });
    </script>
  </body>
</html>
