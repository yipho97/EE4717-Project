# EAT @ NTU - Food ordering app in NTU
#### **Video Demo**:  <https://youtu.be/AIFZzr6gsaU>
#### **Description**:
Free food ordering app with over 80 different food and add on choices in NTU to support canteens. Frontend is built on vanilla HTML CSS JS. LAMP stack, Linux/Apache/MySQL/PHP running on VirtualBox.

**Aim**: 
Allow users to order food and keep track of their orders within NTU.

**Environment setup**:
- Initialize VirtualBox VM
- Map networkdrive \\\192.168.56.2\f32ee , User & Pw f32ee
- Import SQL files into phpMyAdmin at http://192.168.56.2/phpmyadmin

**Accessing MySQL DB**
http://192.168.56.2/phpmyadmin
#### **`stalls`**:
Stalls and locations categorised by location

#### **`products`**:
Products with stall_id referenced to stalls.id. type, type_prices, addons, addons_price comma separated values

#### **`orders-log`**:
Logs down datetime, particulars and total amount paid by customer

#### **`orders-detail`**:
Logs down products bought by customer referenced by orders-log.order_id

#### **`contact-us`**:
Logs down particulars of customer and individual feedback, order_id is a text field that could be the order id or stall's name.

**Pages**
#### **`index.html`**:
- Nav bar element with order tracking form to be inherited in subsequent pages.
- Slideshow component to display hero image for canteens href to store.php
- Flipcard component to showcase various canteen and their operating hours href to store.php
- Footer to be inherited by subsequent pages
- JS.js, styles.css dependencies for slideshow and flipcard 

#### **`store.php`**
- Endpoints to add products into cart, fetch store data according to location, delete item from cart and to empty cart.
- PHP script to render product information into modals with forms attached for type and addons selection
- Side nav at the left hrefs to different locations with location=" " as the query string
- Side cart pulls data from session['cart'] object to render products by the side
- Form is posted back to store.php to be interfaced with endpoint for adding into session['cart'] object
- store.js, styles.css, store.css dependancies for modals

#### **`cart.php`**
- Pulls data from session['cart'] object to render a table for users to check their orders before proceeding to check out

#### **`checkout.php`**
- Form with a side cart, Side cart pulls data from session['cart'] object to render products for cart display
- Form with Billing info to be filled up by users, form validated through checkout.js
- Name, Email, Contact number to be validated
- Payment portion is for display purposes and will not be used at the backend
- Once checked out, form is posted to orders.php endpoint

#### **`orders.php`**
- Endpoint for receiving form from checkout.php which logs entry on DB and redirects users to myorders.php
- Customer's particulars and order status logged in `orders-log` table returning the last index on the table
- Last index is to be referenced to the order details logged in the `orders-detail` table with customer's products
- Mail customer a receipt and URL to access their order details in myorders.php

#### **`myorders.php`**
- Endpoint to receive order id and queries db for order details
- User is redirected here with their order id as part of the query string after successful purchase
- Page is accessible through "Track Order" form located on the navbar of most pages.
- Order ID and contact number must match entries in the db to authenticate user's order history.

#### **`contactus.php`**
- Form to be posted to self to log user's particulars and feedback into `contact-us` table in db
- User is redirected back to self with success=1 as part of the query parameter to render successly posted notification

#### **`faq.html`**
- Static page with curated questions and answers displayed in accordion contatiners
- faq.js and styles.css as dependencies

