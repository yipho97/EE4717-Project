<!DOCTYPE html>
<html lang="en">
  <head>
    <title>EAT @ NTU</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="styles.css" />
    <link
      href="http://fonts.googleapis.com/css?family=Roboto"
      rel="stylesheet"
      type="text/css"
    />
  </head>
  <body id="body">
    <div id="wrapper">
      <div class="navbar" style="margin-bottom: 0px;">
        <a href="index.html"
          ><img
            class="logo-image"
            href="cart.php"
            src="assets/logo.png"
            width="84px"
            height="57px"
        /></a>
        <div class="nav-link">
          <a href="index.html"> HOME</a>
          <a href="store.php"><i class="fa fa-fw fa-search"></i> STORE</a>
          <a href="contactus.php">CONTACT US</a>
          <a href="faq.html">FAQ</a>
          <!-- <a onclick="openNav()" &#9776;
                ><img class="logo-image" href="cart.php" src="assets/logo.png" />
              </a> -->
        </div>
          <form action="myorders.php" method="post" class="form-container">
            <input
              type="number"
              name="order_id"
              min="0"
              placeholder="Order ID"
            />
            <input type="number" name="contact" placeholder="Contact number" />
            <button type="submit">Track Order</button>
          </form>
      </div>
      <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"
          >&times;
        </a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
        <a href="#">Contact</a>
      </div>
<?php 
if($_POST['name']){
    @ $db = new mysqli('localhost', 'f32ee', 'f32ee', 'f32ee');
    if (mysqli_connect_errno()) {
      echo 'Error: Could not connect to database.  Please try again later.';
      exit;
    }
    $query = "INSERT INTO `contact-us` VALUES('{$_POST['name']}', '{$_POST['email']}', '{$_POST['contact']}', {$_POST['id']}, '{$_POST['feedback']}')";
    $db->query($query);
}
?>
      <main>

        <br>
        
        <div class=contactus>

        <h1 style="text-align: center;">Contact Us!</h1>

        <form action="contactus.php" method="post" id="loginForm">
          <div class="form-input">
            <label for="myName">*Name:</label>
            <input
              type="text"
              name="name"
              id="firstname"
              required
              onchange="validateName()"
            />
            <br />
          </div>

          <div class="form-input">
            <label for="email">*E-mail:</label>
            <input
              name="email"
              id="email"
              required
              onchange="validateEmail()"
            />
            <br />
          </div>

          <div class="form-input">
            <label for="phoneNum">*Phone No.:</label>
            <input
              type="value"
              name="contact"
              id="contact"
              onchange="validateContact()"
            /><br />
          </div>

          <div class="form-input">
          <label for="outlet">Order ID:</label>
          <input type="number" name="id">
          </div>

          <div class="form-input">
            <label
              style="vertical-align: top; margin-top: 0px"
              for="myfeedback"
              >*Feedback:</label
            >
            <textarea
              name="feedback"
              rows="4"
              cols="29"
              placeholder="Enter your feedback here"
              style="margin-left: 9%"
              required
            ></textarea>
          </div>

          <br />

          <div>
            <input type="submit" value="Submit" />
          </div>

          <br>

        </form>
        <br>

      </div>

      <br>
       
    </div>

    </div>
      </main>
    </div>
  </body>
  <script type="text/javascript" src="checkout.js"></script>

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
        <a href=index.html>Home</a><br /><br />
        <a href=store.php>Stores</a><br /><br />
        <a href=contactus.html>Contact Us</a><br /><br />
        <a href=faq.html>FAQ</a><br /><br />
        <a href=myorders.php>My Orders</a><br /><br />
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
</html>
