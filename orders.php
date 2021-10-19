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
    (delivered, name, contact, email, address, zip)
      VALUES(false, \"{$name}\", \"{$contact}\", \"{$email}\", \"{$address}\", \"{$zip}\")";
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
            (order_id, stall, product, type, addons, total_price)
             VALUES({$lastIndex}, \"{$value['stall']}\", \"{$value['product']}\", \"{$value['type']}\", \"{$a}\", {$value['itemSubtotal']})";
            echo "<br>";
            echo "<br>";

            echo $query;
            $result = $db->query($query);
    
            if ($result) {
                unset($_SESSION['cart']);
                unset($_SESSION['subtotal']);
            } else {
                echo "<br>An error has occurred.  The item was not added.";
            }
        }
        header('location: ' . $_SERVER['PHP_SELF']);
        exit();
        echo "<br>";
        print_r( $_SESSION['cart']);
  }else{
    echo "CART IS EMPTY";
  }
// if($_SESSION['cart']){
//     // Iterate cart object, $key->product index, $value-> Array of info
//     foreach($_SESSION['cart'] as $key=>$value) {
//       // Strip spaces and tolower for img tagg path
//       $itemSubtotal = $value['type_price'];
//       $zname_clean = $value['product'];
//       echo "{$value['stall']}";
//       echo "<br>";
//       echo "<b>{$key}: {$value['type']} \${$value['type_price']}</b>";
//       if($value['addons']){
//         foreach($value['addons'] as $item=>$price) {
//           $addonsPrices = explode(",", $price);
//           $itemSubtotal += $addonsPrices[1];
//           echo "<li>{$addonsPrices[0]} \${$addonsPrices[1]}</li>";
//         }
//         echo "$ {$itemSubtotal}";
//       }else{
//         echo "<li>No add ons</li>";
//       }
//     }
//   }else{
//     echo "CART IS EMPTY";
//   }
  
?>
