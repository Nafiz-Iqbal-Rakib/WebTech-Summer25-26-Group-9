MiniMart Buyer - MVC + Frontend/Backend Validation
====================================================

ALL BUYER VIEW PAGES ARE NOW PHP FILES.

STRUCTURE
---------
Controller/
    LoginValidation.php
    ProfileValidation.php
    CartValidation.php

Model/
    Model.txt

View/Buyer/Page/
    Login.php
    BuyerDashboard.php
    Cart.php
    MyOrders.php
    EditProfile.php
    Logout.php

View/Buyer/Design/
    Style.css
    Login.css
    EditProfile.css
    Logout.css


WHY ALL PAGES ARE PHP
---------------------
The final MVC project will later use PHP for database/session work, so all Buyer
pages use the .php extension for consistency.

VALIDATION IS ONLY USED WHERE INPUT EXISTS
------------------------------------------
Login.php
    Frontend Validation
    Backend Validation -> Controller/LoginValidation.php

Cart.php
    Frontend Validation
    Backend Validation -> Controller/CartValidation.php

EditProfile.php
    Frontend Validation
    Backend Validation -> Controller/ProfileValidation.php

BuyerDashboard.php
    Display page only
    No validation needed

MyOrders.php
    Display page only
    No validation needed

Logout.php
    View page only for now
    No validation needed

NOT ADDED YET
-------------
Database Connection
Session / Cookie
JSON
AJAX

This step remains limited to MVC + Frontend Validation + Backend Validation.
