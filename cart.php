<!DOCTYPE html>
<html lang="en">
  <head>
    <title>EAT @ NTU</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="styles.css" />
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  </head>
  <?php 
    // Session to pull data into cart
    session_start();
    // Deleting item from cart
    if (isset($_GET['delete'])) {
      $_SESSION['subtotal'] -= $_SESSION['cart'][$_GET['delete']]['itemSubtotal'];
      $_SESSION['subtotal'] = number_format($_SESSION['subtotal'], 2);
      unset($_SESSION['cart'][$_GET['delete']]);
      header('location: ' . $_SERVER['PHP_SELF']);
      exit();
    }
    //  Empty cart object
    if (isset($_GET['empty'])) {
      unset($_SESSION['cart']);
      unset($_SESSION['subtotal']);
      header('location: ' . $_SERVER['PHP_SELF']);
      exit();
    }
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
            <a href="index.html"> HOME</a>
            <a href="store.php"><i class="fa fa-fw fa-search"></i> STORE</a>
            <a href="contactus.php">CONTACT US</a>
            <a href="faq.html">FAQ</a>
          </div>
          <form action="myorders.php" method="post" class="form-container">
            <input type="number" name="order_id" min="0" placeholder="Order ID" />
            <input type="number" name="contact" placeholder="Contact number" />
            <button type="submit">Track Order</button>
          </form>
      </div>
      <div style="
      display:flex; width: 1061px;
      flex-direction:column;
      justify-content:center; background: #FBE8A6;
      border: 5px solid #000000;
      box-sizing: border-box;
      border-radius: 10px;
      margin-left:auto; margin-right:auto;">
          <?php
          // If cart not empty, render cart items to cart tables
          if($_SESSION['cart']){
            echo "<div class='cart-header'>
            <span>Cart</span>
            <img src='assets/shopping-cart.png' alt='shopping-cart.png'>
          </div>";
              echo " <table class=\"cart-table\">
                      <tr>
                        <th>Del</th>
                        <th>Stall</th>
                        <th>Image</th>
                        <th>Item</th>
                        <th>Type</th>
                        <th>Add ons</th>
                        <th>Subtotal</th>
                      </tr>";
          // Iterate cart object, $key->product index, $value-> Array of info
          foreach($_SESSION['cart'] as $key=>$value) {
            // Strip spaces and tolower for img tagg path
            $itemSubtotal = $value['type_price'];
            $zname_clean = $value['product'];
            $zname_clean = preg_replace('/\s*/', '', $zname_clean);
            $zname_clean = strtolower($zname_clean);
            echo "<tr>
                    <td><a href=\"{$_SERVER['PHP_SELF']}?delete={$key}\" class='cart-delete'>×</a></span></td>
                    <td>{$value['stall']}</td>
                    <td><img style=\"width:58px; height:61px;\" src=\"assets/{$zname_clean}.png\" alt=\"\"</td>
                    <td>{$value['product']}</td>
                    <td>{$value['type']} \${$value['type_price']}</td>
                    <td>";

            if($value['addons']){
              foreach($value['addons'] as $item=>$price) {
                $addonsPrices = explode(",", $price);
                $itemSubtotal += $addonsPrices[1];
                $itemSubtotal = number_format($itemSubtotal, 2);
                echo "<li>{$addonsPrices[0]} \${$addonsPrices[1]}</li>";
              }
              echo"</td>";
            }else{
              echo "<li>No add ons</li>";
            }
            echo "<td>$ {$itemSubtotal}<span class=\"close\"></td>";
          }
          echo "</tr>
                <tr>
                <td>
                  Total:
                </td>
                <td colspan='6' style='text-align:right;'>
                \$ {$_SESSION['subtotal']}
                </td></tr>";
          echo "</table>

          <a href='checkout.php' class='btn-w-icon-label'>
          <span class='cart-desc'>Check Out</span>
          <img src='assets/payment-icon.png' alt=''>
        </a>'";
        }else{
          echo "<h2>CART IS EMPTY</h2>";
        }
        ?>
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
</html>
