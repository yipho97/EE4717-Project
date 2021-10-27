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
              <button onclick="openNav()"&#9776;>Cart</button>
            </span>
          </div>
        </b>
      </nav>
      

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
    </div>
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

</html>
