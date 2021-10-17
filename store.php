<!DOCTYPE html>
<html lang="en">
  <head>
    <title>EAT @ NTU</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="styles.css" />
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  </head>
  <?php
    // Fetch product rows from DB to array $arr 
    @ $db = new mysqli('localhost', 'f32ee', 'f32ee', 'f32ee');
    if (mysqli_connect_errno()) {
      echo 'Error: Could not connect to database.  Please try again later.';
      exit;
    }
    $query = "select * from products";
    $result = $db->query($query);
    $num_results = $result->num_rows;
    $arr = array();
    for ($i=0; $i <$num_results; $i++) {
      $row = $result->fetch_assoc();
      array_push($arr, $row);
    }
    // Session to pull data into cart
    session_start();
    // Adding food type and addons to session['cart'] object
    if ($_POST['product']) {
      foreach($_POST['addons'] as $index=>$row) {
        // Iterate addons,price string to retrieve price for computation
        preg_match_all('!\d+\.*\d*!', $row, $matches);
        $_SESSION['row'][] = $matches;
        $_SESSION['subtotal'] += floatval($matches[0][0]);
      }
      $_SESSION['cart'][] = ['product'=>$_POST['product'], 'type'=>$_POST['type'], 'type_price'=>$_POST['type_price'], 'addons'=>$_POST['addons']] ;
      
      $_SESSION['subtotal'] += $_POST['type_price'];

      header('location: ' . $_SERVER['PHP_SELF']);
      exit();
    }
    // Deleting item from cart
    if (isset($_GET['delete'])) {
      $_SESSION['subtotal'] -= $_SESSION['cart'][$_GET['delete']]['type_price'];
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

    // Render cart object into list

  ?>

  <body id="body">
    <div id="wrapper">
      <header>
        <h1>EAT @ NTU</h1>
      </header>

      <nav>
        <b>
          <div class="navbar-center">
            <span class="nav-list">
              <a href="index.html">HOME</a>
              <a href="store.php">STORE</a>
              <a href="women.html">CONTACT US</a>
              <a href="sale.html">FAQ</a>
              <a href="location.html">MY ORDER</a>
              <button onclick="openNav()"&#9776;>Cart</button>
            </span>
          </div>
        </b>
      </nav>

      <!-- Side Cart -->
      <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <a href="<?php echo $_SERVER['PHP_SELF']; ?>?empty=1">Empty your cart</a></p>
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

                }else{
                  echo "<li>No add ons</li>";

                }
                echo "<h3>Subtotal: \$ {$itemSubtotal}</h3>
                </ul>
                </div>";
                echo "<span class=\"close\"><a href=\"{$_SERVER['PHP_SELF']}?delete={$key}\">×</a></span>";
              echo "</div>";
              }
            }else{
              echo "CART IS EMPTY";
            }
  
          ?>
        <div>
          <?php print_r($_SESSION['subtotal']);?>
        </div> 
        <div class="img-button">
          <a href="cart.php" class="img-button-label"><span>Check Out</span><img src="assets/payment-icon.png" alt=""></a>
        </div>
      </div>
        <!-- PHP script to inject modals -->
        <?php
        for ($i=0; $i <$num_results; $i++) {
            echo "<div id=\"myModal{$i}\" class=\"modal\">
                    <div class=\"modal-content\">
                      <span onclick=\"closeModal($i)\" class=\"close\">&times;</span>
                        <div class=\"product\">
                        <img class=\"product-img\" src=\"{$arr[$i]["image"]}\" alt=\"\">
                        <div class=\"product-name\"><span>{$arr[$i]["product"]}</span></div>
                      </div>
                      <form action=\"store.php\" method=\"post\">";
                      
                      // Render types if there is
                      if ($arr[$i]["type"]){
                        // Split comma separated types into array
                        $types = explode(",", $arr[$i]["type"]);
                        $type_prices = explode(",", $arr[$i]["type_price"]);
                        echo "<table>
                                <tr>
                                  <th>Type</th>
                                  <th>Price</th>
                                </tr>
                              ";
                          // Iterate types array to attach table rows
                          foreach($types as $key=>$value) {
                            echo "<tr>
                                    <td><input type=\"radio\" name=\"type\" value=\"{$value}\" required>{$value}</td>
                                    <td>{$type_prices[$key]}</td>
                                    <input type=\"hidden\" name=\"type_price\" value=\"{$type_prices[$key]}\">
                                  </tr>";
                          }
                          echo"
                          </table>";
                      }
                      if ($arr[$i]["addons"]){
                        // Split comma separated types into array
                        $addons = explode(",", $arr[$i]["addons"]);
                        $addons_prices = explode(",", $arr[$i]["addons_price"]);

                        echo "<table>
                                <tr>
                                  <th>Add ons</th>
                                  <th>Price</th>
                                </tr>
                              ";
                          // Iterate types array to attach table rows
                          foreach($addons as $key=>$value) {
                            echo "<tr>
                                    <td><input type=\"checkbox\" name=\"addons[]\" value=\"{$value},{$addons_prices[$key]}\">{$value}</td>
                                    <td>{$addons_prices[$key]}</td>
                                  </tr>";
                          }
                      }

                      echo"
                      <input type=\"submit\" style=\"background: #B4DFE5;border-radius: 10px;\" value=\"Add to cart\">
                      <input type=\"hidden\" name=\"product\" value=\"{$arr[$i]["product"]}\">
                      </form></table>";
                      
                      echo"
                    </div>
                  </div>";
          }
        ?>
      <div> 
        <!-- Display container for products -->
          <?php
              for ($i=0; $i <$num_results; $i++) {
                  echo "<br>";
                  if($i==0 || $i==4 || $i==8 || $i==12 || $i==16)
                  {
                    echo "<div style= \"display: flex; justify-content: space-evenly;\"> ";
                  }
                  echo "<div class=\"product\">
                    <img class=\"product-img\" src=\"{$arr[$i]["image"]}\" alt=\"\">
                    <div class=\"product-name\"><span>{$arr[$i]["product"]}</span></div>
                    <button class=\"product-button\" onclick=\"openModal({$i})\"\">\${$arr[$i]["price"]}<span style=\"font-size: 14px;\">Add </span><img src=\"assets/add-icon.png\" alt=\"\"></button>
                  </div>";
                  if($i==3 || $i==7 || $i==11 || $i==15 || $i==19)
                  {
                    echo "</div> ";
                  }
                }
                ?>
        </div>

<footer>
  <div class="flex-row-container">
    <div class="flex-row-item1">
      <h3>About Us</h3>
      We are a group on NTU who are passionate about the NTU’s food! NTU’s
      canteen has been a big part of every student's life. However, ever since
      COVID-19 in 2019, it has affected both the canteen and student. With the
      ever-changing rules and regulations, students may find it hard to eat in
      canteen either due to lack of space or no-dine rules. Government has
      also frequently encouraged us to not stay in crowded areas and practice
      social distancing. Thus, we have decided to come out with a food web
      where users are able to order food online and have them delivered to
      them. Not only will the students get to enjoy the food, they are also
      able to avoid the crowds and eat in their room’s comfrotably.
    </div>
    <div class="flex-row-item2" style="text-align: center">
      Home<br /><br />
      Stores<br /><br />
      Contact Us<br /><br />
      FAQ<br /><br />
      My Orders<br /><br />
    </div>
    <div class="flex-row-item3" style="text-align: center">
      Get the latest update from us!
      <br />
      <input
        type="email"
        id="email"
        name="email"
        placeholder="Your Email Address"
      />
    </div>
  </div>
</footer>
<script type="text/javascript" src="store.js"></script>

</html>
