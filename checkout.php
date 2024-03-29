<!DOCTYPE html>
<html lang="en">
  <head>
    <title>EAT @ NTU</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="checkout.css" />
    <link rel="stylesheet" href="styles.css" />
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  </head>

  <?php 
    // Session to pull data into cart
    session_start();
    ?>
<body id="body">
    <div id="wrapper">
      <div class="navbar">
          <a href="index.html"
            ><img
              class="logo-image"
              href="cart.php"
              src="assets/logo.png"
              width="84px"
              height="57px"
          /></a>
          <div class="nav-link">
            <a href="index.html"
              ><i class="fa fa-fw fa-home"></i> HOME</a
            >
            <a href="store.php"><i class="fa fa-fw fa-search"></i> STORE</a>
            <a href="contactus.php"
              ><i class="fa fa-fw fa-envelope"></i> CONTACT US</a
            >
            <a href="faq.html"><i class="fa fa-fw fa-user"></i> FAQ</a>
          </div>
          <a href="cart.php"><i class="fa fa-fw fa-user"></i>Cart</a>
        </div>

      <div class="row">
  <div class="col-75">
    <div class="container">
      <form action="orders.php" method="post">

        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="firstname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="firstname" name="firstname" placeholder="John M. Doe" onchange="validateName()">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com" onchange="validateEmail()">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="50 Nanyang Crescent">

            <div class="row">
              <div class="col-50">
                <label for="contact">Contact Number</label>
                <input type="text" id="contact" name="contact" placeholder="91234567" onchange="validateContact()">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment (Dummy data only)</h3>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" value="Random Name">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" value="Random Card Number">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" value="Random Month">

            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" value="Random Year">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" value="Random CVV">
              </div>
            </div>
          </div>

        </div>
        
        <input type="submit" value="Continue to checkout" class="btn">
      </form>
    </div>
  </div>

  <div class="col-25">
    <div class="container">
      <h4>Cart
        <span class="price" style="color:black">
          <i class="fa fa-shopping-cart"></i>
        </span>
      </h4>
      <?php
          // Deleting item from cart
    if (isset($_GET['delete'])) {
      $_SESSION['subtotal'] -= $_SESSION['cart'][$_GET['delete']]['itemSubtotal'];
      $_SESSION['subtotal'] = number_format($_SESSION['subtotal'], 2);
      unset($_SESSION['cart'][$_GET['delete']]);
      header('location: ' . $_SERVER['PHP_SELF']);
      exit();
    }

          if($_SESSION['cart']){
            // Iterate cart object, $key->product index, $value-> Array of info
            foreach($_SESSION['cart'] as $key=>$value) {
              // Strip spaces and tolower for img tagg path
              $itemSubtotal = $value['type_price'];
              $zname_clean = $value['product'];
              $zname_clean = preg_replace('/\s*/', '', $zname_clean);
              $zname_clean = strtolower($zname_clean);
              echo "<div class=\"card\">"; 
              echo "<img src=\"assets/{$zname_clean}.png\" alt=\"\">
              <div class=\"cart-desc\">
              <ul>
              <b>{$value['type']} \${$value['type_price']}</b>";
              if($value['addons']){
                foreach($value['addons'] as $item=>$price) {
                  $addonsPrices = explode(",", $price);
                  $itemSubtotal += $addonsPrices[1];
                  echo "<li>{$addonsPrices[0]} \${$addonsPrices[1]}</li>";
                }
                echo "<b>Subtotal: \${$itemSubtotal}</b>";
              }else{
                echo "<li>No add ons</li>";
              }
              echo "</ul>
              </div>";
              echo "<a href=\"{$_SERVER['PHP_SELF']}?delete={$key}\" class=\"deletebtn\">×</a>";
            echo "</div>";
            }
          }else{
            echo "CART IS EMPTY";
          }

          ?>

      <hr>
      <p>Total <span class="price"><?php echo "\$ {$_SESSION['subtotal']}";?></span></p>
    </div>
  </div>
</div>


  <footer class="footer-distributed">
        <div class="footer-left">
          <h3>EAT @ <span>NTU</span></h3>

          <p class="footer-links">
            <a href="index.html">Home</a>
            ·
            <a href="store.php">Store</a>
            ·
            <a href="contactus.php">Contact Us</a>
            ·
            <a href="faq.html">FAQ</a>
          </p>

          <p class="footer-company-name">EAT @ NTU &copy; 2021</p>
        </div>

        <div class="footer-center">
          <div>
            <p><span>50 Nanyang Avenue</span> Singapore 639798</p>
          </div>

          <div>
            <p>+65 68765432</p>
          </div>

          <div>
            <p>
              <a href="mailto:contactus@eatatntu.com">contactus@eatatntu.com</a>
            </p>
          </div>
        </div>

        <div class="footer-right">
          <p class="footer-company-about">
            <span>About Us</span>
            EAT @ NTU!<br />
            Support our canteens while enjoying free delivery!<br />
            Order online, enjoy it in the comfort of your place. Stay healthy,
            not hungry.
          </p>
        </div>
      </footer>
      </div>
  </body>
    <script type="text/javascript" src="checkout.js"></script>

  </html>