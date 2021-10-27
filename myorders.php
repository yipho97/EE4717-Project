<!DOCTYPE html>
<html lang="en">
  <head>
    <title>EAT @ NTU</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="checkout.css" />
    <link rel="stylesheet" href="styles.css" />
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  </head>

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
      <div style="
      display:flex; width: 1061px;
justify-content:center; background: #FBE8A6;
border: 5px solid #000000;
box-sizing: border-box;
border-radius: 10px;
margin-left:auto; margin-right:auto;">
    <form action="myorders.php" method="get">
        <input type="number" name="order_id" placeholder="ORDER ID">
        <input type="submit" value="Track Order">
    </form>
</div>
    <?php

if ($_GET['order_id'] || $_GET['order_confirmed']) {
  $id = $_GET['order_id'];
  echo $id;
}

if($_GET['order_confirmed']){
  $id = $_GET['order_confirmed'];
  echo "
  <p style ='font-family: Roboto;
  font-style: normal;
  font-weight: normal;
  font-size: 22px;
  line-height: 26px;
  text-align: center;
  
  color: #000000;'>Your Order has been received! 
  The store is currently preparing your order
  A receipt is also sent to your email
  
  Thank you for ordering and enjoy your meal!</p>
  ";
}
    // Fetch product rows from DB to array $arr 
    @ $db = new mysqli('localhost', 'f32ee', 'f32ee', 'f32ee');
    if (mysqli_connect_errno()) {
      echo 'Error: Could not connect to database.  Please try again later.';
      exit;
    }
    $query = "SELECT * FROM `orders-log` INNER JOIN `orders-detail` ON `orders-log`.order_id = `orders-detail`.order_id 
              WHERE contact LIKE \"%\" AND `orders-log`.order_id = {$id}";
    // echo $query;
    $result = $db->query($query);
    $num_results = $result->num_rows;
    $arr = array();
    for ($i=0; $i <$num_results; $i++) {
      $row = $result->fetch_assoc();
      array_push($arr, $row);
    }
    // print_r($arr);
    echo "<div style='width: 1061px;
    background: #FBE8A6;
    border: 5px solid #000000;
    box-sizing: border-box;
    border-radius: 10px; margin-left:auto; margin-right:auto;'> 
                    <table class=\"cart-table\">
                      <tr>
                        <th>DateTime</th>
                        <th>Photo</th>
                        <th>Item Name</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Add ons</th>
                        <th>Total</th>
                      </tr>";
      foreach($arr as $key=>$value) {
        // print_r($value);
        $zname_clean = $value['product'];
        $zname_clean = preg_replace('/\s*/', '', $zname_clean);
        $zname_clean = strtolower($zname_clean);
        echo "<tr>
                <td>{$value['datetime']}</td>
                <td><img style=\"width:58px; height:61px;\" src=\"assets/{$zname_clean}.png\" alt=\"\"</td>
                <td>{$value['product']}</td>
                <td>{$value['type']}</td>
                <td>\${$value['type_price']}</td>
                <td>";
                if($value['addons']){
                  $addonAndPrices = explode("|", $value['addons']);
                  foreach($addonAndPrices as $index=>$row) {
                      echo "<li>{$row}</li>";
                  }
                  echo"</td>";
                }else{
                  echo "<li>No add ons</li>";
                }
                echo "<td>\${$value['total_price']}</td></tr>";
        } echo "</table></div>";
  
?>

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
    <script type="text/javascript" src="store.js"></script>

  </html>