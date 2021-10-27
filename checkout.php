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
      <header>
        <h1>EAT @ NTU</h1>
      </header>

      <nav>
        <b>
          <div class="navbar-center">
            <!-- <span class="nav-icon"> </span> -->
            <span class="nav-list">
              <a href="index.html">HOME</a>
              <a href="store.php">STORE</a>
              <a href="women.html">CONTACT US</a>
              <a href="sale.html">FAQ</a>
              <a href="myorders.php">MY ORDER</a>
              <button onclick="openNav()" &#9776;>Cart</button>
            </span>
          </div>
        </b>
      </nav>

      <div class="row">
  <div class="col-75">
    <div class="container">
      <form action="orders.php" method="post">

        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="50 Nanyang Crescent">


            <!-- <div class="row">
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="654321">
            </div>
          </div> -->
          <div class="row">
              <div class="col-50">
                <label for="contact">Contact Number</label>
                <input type="text" id="contact" name="contact" placeholder="91234567">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
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
          if($_SESSION['cart']){
            // Iterate cart object, $key->product index, $value-> Array of info
            foreach($_SESSION['cart'] as $key=>$value) {
              // Strip spaces and tolower for img tagg path
              $itemSubtotal = $value['type_price'];
              $zname_clean = $value['product'];
              $zname_clean = preg_replace('/\s*/', '', $zname_clean);
              $zname_clean = strtolower($zname_clean);
              echo "<div class=\"card\">"; 
              echo "<img class=\"product-img\" src=\"assets/{$zname_clean}.png\" alt=\"\">
              <div class=\"cart-desc\">
              <ul>
              <b>{$key}: {$value['type']} \${$value['type_price']}</b>";
              if($value['addons']){
                foreach($value['addons'] as $item=>$price) {
                  $addonsPrices = explode(",", $price);
                  $itemSubtotal += $addonsPrices[1];
                  echo "<li>{$addonsPrices[0]} \${$addonsPrices[1]}</li>";
                }
                echo "$ {$itemSubtotal}";
              }else{
                echo "<li>No add ons</li>";
              }
              echo "</ul>
              </div>";
              echo "<span class=\"close\"><a href=\"{$_SERVER['PHP_SELF']}?delete={$key}\">×</a></span>";
            echo "</div>";
            }
          }else{
            echo "CART IS EMPTY";
          }

          ?>

      <hr>
      <p>Total <span class="price" style="color:black"><b><?php echo "\$ {$_SESSION['subtotal']}";?></b></span></p>
    </div>
  </div>
</div>
      </div>
  </body>

    <footer>
      <div class="flex-row-container">
        <div class="flex-row-item1">
          <h3>About Us</h3>
          We are a group on NTU who are passionate about the NTU’s food! NTU’s canteen has been a big part of every student's life. However, ever since COVID-19 in 2019, it has affected both the canteen and student. With the ever-changing rules and regulations, students may find it hard to eat in canteen either due to lack of space or no-dine rules. Government has also frequently encouraged us to not stay in crowded areas and practice social distancing. Thus, we have decided to come out with a food web where users are able to order food online and have them delivered to them. Not only will the students get to enjoy the food, they are also able to avoid the crowds and eat in their room’s comfrotably.
        </div>
        <div class="flex-row-item2" style="text-align: center;">
          Home<br><br>
          Stores<br><br>
          Contact Us<br><br>
          FAQ<br><br>
          My Orders<br><br>
        </div>
        <div class="flex-row-item3" style="text-align: center;">
          Get the latest update from us!
          <br>
          <input type="email" id="email" name="email" placeholder="Your Email Address">
        </div>
      </div>
    </footer>
    <script type="text/javascript" src="store.js"></script>

  </html>