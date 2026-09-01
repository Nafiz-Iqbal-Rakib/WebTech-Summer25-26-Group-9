MiniMart Buyer - Simple Complete MVC
======================================

This version includes the professor's required topics while keeping the code simple.

MVC
---
View:
View/Buyer/Page/

Controller:
Controller/

Model:
Model/


1. FRONTEND VALIDATION
----------------------
Login.php
Cart.php
EditProfile.php

Uses simple JavaScript:
getElementById()
trim()
length checks
alert()
return true/false


2. BACKEND VALIDATION
---------------------
Controller/LoginValidation.php
Controller/CartValidation.php
Controller/ProfileValidation.php


3. DATABASE CONNECTION
----------------------
Uses the FRIEND'S database files exactly:

Model/Database.php
Model/ecommerce_db.sql

Database:
ecommerce_db

Tables:
users
products
orders

Buyer login reads users.
Edit Profile reads/updates users.
Checkout inserts into orders.
My Orders reads orders.


4. SESSION MANAGEMENT
---------------------
Login creates:
$_SESSION["user_id"]
$_SESSION["email"]
$_SESSION["role"]
$_SESSION["first_name"]

SessionCheck.php protects:
BuyerDashboard.php
Cart.php
MyOrders.php
EditProfile.php

LogoutController.php destroys the session.


5. COOKIE
---------
Remember Me:
buyer_email

Cart remembers:
buyer_city


6. JSON
-------
On successful checkout, a small order copy is written to:

Model/order.json

Functions used:
file_get_contents()
json_decode()
json_encode()
file_put_contents()


7. AJAX
-------
Cart coupon input calls:

View/Buyer/JS/CheckCoupon.js
Controller/CheckCoupon.php

Uses:
XMLHttpRequest

Demo coupon:
MINI10


DATABASE SETUP
--------------
Import your friend's:
Model/ecommerce_db.sql

For login testing, add a buyer row to users with:
role = buyer

This simple class project expects the password value in the users table
to match the password entered on Login.php.


IMPORTANT
---------
No framework.
No API.
No advanced routing.
No prepared statement.
No extra project feature was added.
