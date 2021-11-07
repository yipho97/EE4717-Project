<!DOCTYPE html>
<html lang="en">
  <head>
    <title>EAT @ NTU</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="checkout.css" />
    <link rel="stylesheet" href="styles.css" />
    <link
      href="http://fonts.googleapis.com/css?family=Roboto"
      rel="stylesheet"
      type="text/css"
    />
  </head>
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
      <a href="cart.php"><i class="fa fa-fw fa-user"></i>Cart</a>
    </div>

<?php 
if($_POST['firstname']){
    @ $db = new mysqli('localhost', 'f32ee', 'f32ee', 'f32ee');
    if (mysqli_connect_errno()) {
      echo 'Error: Could not connect to database.  Please try again later.';
      exit;
    }
    $query = "INSERT INTO `contact-us` VALUES('{$_POST['firstname']}', '{$_POST['email']}', '{$_POST['contact']}', '{$_POST['id']}', '{$_POST['feedback']}')";
    $db->query($query);
    header('location: ' . $_SERVER['PHP_SELF']. "?success=1");
}
if($_GET['success']){
  echo "<div class='contactus'style='text-align:center'>
          <h3>Your feedback has been received. We'll take approximately 3 working days to attend to it.</h3>
        </div>";
}
?>
    <div class=contactus>
        <h1 style="text-align: center;">Contact Us!</h1>
        <form action="contactus.php" method="post">
  <div class="row">
    <div class="col-50">
      <h3>Have a feedback for your order? Drop us a feedback and we'll get back to you soon.</h3>
      <label>Full Name</label>
      <input
        type="text"
        id="firstname"
        name="firstname"
        placeholder="John Tan"
        onchange="validateName()"
        required
      />
      <label>Email</label>
      <input
        type="text"
        id="email"
        name="email"
        placeholder="john@example.com"
        onchange="validateEmail()"
        required
      />
    </div>
  </div>
  <div class="row">
    <div class="col-50">
      <label>Contact Number</label>
      <input
        type="text"
        id="contact"
        name="contact"
        placeholder="91234567"
        onchange="validateContact()"
        required
      />
    </div>
    <div class="col-50">
      <label>Order ID/Stall name</label>
      <input type="text" name="id" placeholder="ID is found in email" required/>
    </div>
  </div>

  <div class="row">
    <div class="col-50">
      <label>Feedback</label>
      <textarea name="feedback" rows="4" cols="50" style="width:100%" required></textarea>
    </div>
  </div>
  <input type="submit" value="Submit Feedback" class="btn" />
  </form>
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
  </body>
  <script type="text/javascript" src="checkout.js"></script>
</html>
