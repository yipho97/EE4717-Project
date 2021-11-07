<!DOCTYPE html>
<html lang="en">
  <head>
    <title>EAT @ NTU</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="store.css" />
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  </head>

  <?php
    // Session to pull data into cart
    session_start();
    // Adding food type and addons to session['cart'] object
    if ($_POST['product']) {
      $typePrice = $_POST['typePrice'];
      $typePrice = explode(",", $typePrice);
      $type = $typePrice[0];
      $type_price = $typePrice[1];
      $_SESSION['cart'][] = ['product'=>$_POST['product'], 'type'=>$type, 'type_price'=>$type_price , 'addons'=>$_POST['addons'], 'stall'=>$_POST['stall']] ;
      
      header('location: ' . $_SERVER['PHP_SELF']. "?location=" . $_SESSION['location']);
      exit();
    }
    if (isset($_GET['location'])) {
      $_SESSION['location'] = $_GET['location'];
    }else if ($_GET['location']==""){
      header('location: ' . $_SERVER['PHP_SELF']. "?location=north");
    }

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

    // Fetch product rows from DB to array $arr 
    @ $db = new mysqli('localhost', 'f32ee', 'f32ee', 'f32ee');
    if (mysqli_connect_errno()) {
      echo 'Error: Could not connect to database.  Please try again later.';
      exit;
    }
    $query = "select * FROM products
    INNER JOIN stalls ON products.stall_id = stalls.id WHERE stalls.location LIKE '{$_SESSION['location']}%'";
    $result = $db->query($query);
    $num_results = $result->num_rows;
    $arr = array();
    for ($i=0; $i <$num_results; $i++) {
      $row = $result->fetch_assoc();
      array_push($arr, $row);
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
          <a href="index.html">HOME</a>
          <a href="store.php">STORE</a>
          <a href="contactus.php">CONTACT US</a>
          <a href="faq.html">FAQ</a>
        </div>
        <a href="javascript:openNav()" style="margin-right: 240px">
        <img src="assets/shopping-cart.png" alt="shopping-cart.png">
        <span class='cart-count'><?php echo count($_SESSION['cart']); ?></span>
        </a>
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
                        echo "<table class='modal-table'>
                                <tr>
                                  <th>Type</th>
                                  <th style='width:133px;'>Price</th>
                                </tr>
                              ";
                          // Iterate types array to attach table rows
                          foreach($types as $key=>$value) {
                            echo "<tr>
                                    <td><label><input type=\"radio\" name=\"typePrice\" value=\"{$value}, {$type_prices[$key]}\" required>{$value}</label></td>
                                    <td>\${$type_prices[$key]}</td>
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

                        echo "<table class='modal-table'>
                                <tr>
                                  <th>Add ons</th>
                                  <th style='width:133px;'>Price</th>
                                </tr>
                              ";
                          // Iterate types array to attach table rows
                          foreach($addons as $key=>$value) {
                            echo "<tr>
                                    <td><label><input type=\"checkbox\" name=\"addons[]\" value=\"{$value},{$addons_prices[$key]}\">{$value}</label></td>
                                    <td>\${$addons_prices[$key]}</td>
                                  </tr>";
                          }
                      }

                      echo"
                      <input type=\"hidden\" name=\"product\" value=\"{$arr[$i]["product"]}\">
                      <input type=\"hidden\" name=\"stall\" value=\"{$arr[$i]["stall"]}\">
                      </table>
                      <input type=\"submit\" class='btn-w-icon-label' style='margin-left: 80%' value=\"Add to cart\">
                      </form>";
                      
                      echo"
                      </div>
                  </div>";
          }
        ?>
      <div> 
        <!-- Display container for products -->
      <div class="sidebar">
        <h3 class="header-w-icon">
          <img src="assets/location.png" alt="location.png">
          <span>Locations</span>
        </h3>

        <a href="store.php?location=north" id="north">North Spine Food Court</a>
        <a href="store.php?location=south" id="south">South Spine Food Court</a>
        <a href="store.php?location=food court 2" id="food court 2">Food Court 2</a>
        <a href="store.php?location=nanyang" id="nanyang">Nanyang Crescent Food Court</a>
      </div>
            <!-- Side Cart -->
            <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><img src="assets/arrow-right.png" alt=""></a>
            <h3 class="header-w-icon">
              <span>Cart Items: <?php echo count($_SESSION['cart']); ?></span>
            </h3>
            <div style="height: 600px">
          <?php
          if($_SESSION['cart']){
              // Iterate cart object, $key->product index, $value-> Array of info
              foreach($_SESSION['cart'] as $key=>$value) {
                // Strip spaces and tolower for img tagg path
                $zname_clean = $value['product'];
                $zname_clean = preg_replace('/\s*/', '', $zname_clean);
                $zname_clean = strtolower($zname_clean);
                echo "<div class=\"card\">"; 
                echo "<img class=\"product-img\" src=\"assets/{$zname_clean}.png\" alt=\"\">
                <div class=\"cart-desc\">
                <ul>
                <b>{$value['type']}</b>
                <br>
                <b>\${$value['type_price']}</b>";
                // If addon prices not added, iterate and add into itemSubtotal
                if (!$_SESSION['cart'][$key]['itemSubtotal']){
                  $itemSubtotal = $value['type_price'];
                  if($value['addons']){
                    foreach($value['addons'] as $item=>$price) {
                      $addonsPrices = explode(",", $price);
                      $itemSubtotal += $addonsPrices[1];
                      $itemSubtotal = number_format($itemSubtotal, 2);
                    }
                  }
                  // Add addon prices to total price
                  $_SESSION['cart'][$key]['itemSubtotal'] = $itemSubtotal;
                  $_SESSION['subtotal'] += $itemSubtotal;
                  $_SESSION['subtotal'] = number_format($_SESSION['subtotal'], 2);
                }
                // Display addons if there are
                if($value['addons']){
                  foreach($value['addons'] as $item=>$price) {
                    $addonsPrices = explode(",", $price);
                    echo "<li>{$addonsPrices[0]} \${$addonsPrices[1]}</li>";
                  }

                }else{
                  echo "<li>No add ons</li>";
                }

                
                echo "<hr><h3>Subtotal: <br>\$ {$_SESSION['cart'][$key]['itemSubtotal']}</h3>
                </ul>
                </div>";
                echo "<a href=\"{$_SERVER['PHP_SELF']}?delete={$key}\" class=\"deletebtn\">×</a>";
              echo "</div>";
              }
              echo"<hr style='border: 3px solid #000000;
              transform: rotate(-0.22deg);'>
              <h3 class='price-label'>Total: \${$_SESSION['subtotal']}</h3>
              <hr style='border: 3px solid #000000;
              transform: rotate(-0.22deg);'>
              <a href='{$_SERVER['PHP_SELF']}?empty=1' class='btn-w-icon-label'>
                <span class='cart-desc'>Empty cart</span>
              </a>
                <a href='cart.php' class='btn-w-icon-label'>
                  <span class='cart-desc'>Check Out</span>
                  <img src='assets/payment-icon.png' alt=''>
                </a>
                </div>";

            }else{
              echo "<h2>CART IS EMPTY</h2>
              </div>";
            }
  
          ?>
         
      </div>

          <?php
              for ($i=0; $i <$num_results; $i++) {
                  if($i==0 || $i==4 || $i==8 || $i==12 || $i==16)
                  {
                    echo "<div class='menu-container'><h3 style='text-align:center'>{$arr[$i]["stall"]}<img src=\"assets/store-icon.png\" alt=\"\"></h3>";
                    echo "<div class='menu-flex'>";
                  }
                  echo "<div class=\"product\">
                    <img class=\"product-img\" src=\"{$arr[$i]["image"]}\" alt=\"\">
                    <div class=\"product-name\">{$arr[$i]["product"]}</div>
                    <button class=\"product-button\" onclick=\"openModal({$i})\"\">\${$arr[$i]["price"]}<span style=\"font-size: 14px;\">Add </span><img src=\"assets/add-icon.png\" alt=\"\"></button>
                  </div>";
                  if($i==3 || $i==7 || $i==11 || $i==15 || $i==19)
                  {
                    echo "</div></div> ";
                  }
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
<script type="text/javascript" src="store.js"></script>

</html>
