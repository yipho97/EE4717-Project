<?php
  // var_dump($_POST);
  session_start();
if (!isset($_SESSION['cart'])){
	$_SESSION['cart'] = array();
}
if ($_POST['product']) {
  echo "HERE";
	$_SESSION['cart'][] = $_POST['product'];
	header('location: ' . $_SERVER['PHP_SELF']. '?' . SID);
	exit();
}

print_r($_SESSION['cart']) ;
?>
