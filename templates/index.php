<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Auto Marketplace</title>
    <link rel="stylesheet" href="index.css" />
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
          <h1>Looking to <span>buy</span> or <span>sell</span> a car?</h1>
          <p>
            Auto Marketplace provides a great opportunity for you to connect to other car buyers and sellers to find the best deal! Here you will find a whole variety of vehicles around Canada.
          </p>
          <div class="app-icons">
            <img src="./images/googleplay.png" alt="google play app" />
            <img src="./images/appstore.png" alt="app store app" />
          </div>
        </div>
        <div class="main-car">
          <img src="./images/minips.png" alt="mini cooper picture" />
        </div>
        <div class="buysell-icons">
          <a href="./buy.php" class="button-link">Buy</a>
          <a href="./sell.php" class="button-link">Sell</a>
        </div>
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
