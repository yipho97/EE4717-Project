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
if (isset($_GET['empty'])) {
	unset($_SESSION['cart']);
	header('location: ' . $_SERVER['PHP_SELF']);
	exit();
}

print_r($_SESSION['cart']) ;
?>
<a href="<?php echo $_SERVER['PHP_SELF']; ?>?empty=1">Empty your cart</a></p>