<!-- Endpoint to receive form from checkout.php, pushes data into db and renders myorders.php -->
<?php
session_start();
  var_dump($_POST);
echo "<br>";
echo "<br>";
print_r($_SESSION['cart']);
echo "<br>";
// Establish connection to db
@ $db = new mysqli('localhost', 'f32ee', 'f32ee', 'f32ee');
if (mysqli_connect_errno()) {
    echo 'Error: Could not connect to database.  Please try again later.';
    exit;
}
$name=$_POST['firstname'];
$email=$_POST['email'];
$address=$_POST['address'];
$contact=$_POST['contact'];
$zip=$_POST['zip'];
if($_SESSION['cart']){
    // Log customer info to orders-log
    $query = "INSERT INTO `orders-log` 
    (delivered, name, contact, email, address, zip, total)
      VALUES(false, \"{$name}\", \"{$contact}\", \"{$email}\", \"{$address}\", \"{$zip}\", {$_SESSION['subtotal']})";
    echo "<br>";
    echo "<br>";

    echo $query;
    $result = $db->query($query);

    // Get the last index in the log to be assigned the order_id, push order into orders-details
    $queryLastIndex = "SELECT MAX( order_id ) FROM `orders-log`;";
    echo $queryLastIndex;
    $lastIndex = $db->query($queryLastIndex);
    $row = $lastIndex->fetch_assoc();
    $lastIndex = $row['MAX( order_id )'];
    echo ( $lastIndex);

    // Iterate cart object, $key->product index, $value-> Array of info
    foreach($_SESSION['cart'] as $key=>$value) {
        echo $value['product'];
        echo $value['type'];
        echo $value['addons'];
        echo $value['stall'];
        echo $value['itemSubtotal'];

        echo "<br>";
        $a = implode("|",$value['addons']);
        echo $a;
        echo "<br>";

            $query = "INSERT INTO `orders-detail` 
            (order_id, stall, product, type, type_price, addons, total_price)
             VALUES({$lastIndex}, \"{$value['stall']}\", \"{$value['product']}\", \"{$value['type']}\", \"{$value['type_price']}\", \"{$a}\", {$value['itemSubtotal']})";
            echo "<br>";
            echo "<br>";

            echo $query;
            $result = $db->query($query);
    
          }
          if ($result) {
            // Transaction successful, delete existing cart and send customer email
              // array_push($_SESSION['cart'] );
              unset($_SESSION['cart']);
              unset($_SESSION['subtotal']);
              $to      = 'f32ee@localhost';
              $subject = "Thank You {$name}. Your Order ID is: {$lastIndex}";
              $message = "Greetings from EAT @ NTU. Your order has been placed and confirmed! \nOrder Id: {$lastIndex}. 
              \nYour order ID can be used to track the status of your delivery status on the \"Track Order\" section.
              \n or http://192.168.56.2/f32ee/EE4717-Project/myorders.php?order_confirmed={$lastIndex}\n
              Please click on confirm delivery after you have received your order.\n
              Thank You and enjoy your meal!";
              $headers = 'From: f32ee@localhost' . "\r\n" .
                  'Reply-To: f32ee@localhost' . "\r\n" .
                  'X-Mailer: PHP/' . phpversion();
              mail($to, $subject, $message, $headers,'-ff32ee@localhost');

          } else {
              echo "<br>An error has occurred.  The item was not added.";
          }
        header('location: ' ."myorders.php?order_confirmed={$lastIndex}");
        exit();
        echo "<br>";
  }else{
    echo "CART IS EMPTY";
  }

  
?>
