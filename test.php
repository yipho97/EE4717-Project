<?php
echo "TEST";
echo getcwd(); 
?>

<?php
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
    for ($i=0; $i <$num_results; $i++) {
        echo "<img src=\"". $arr[$i]["image"] ."\" alt=\"teho\">";
        echo $arr[$i]["addons"];
        echo $arr[$i]["addons_price"];
        echo "<br>";
     }
    // print_r($arr);
 ?>
 <!-- <img src="assets/teho.png" alt=""> -->