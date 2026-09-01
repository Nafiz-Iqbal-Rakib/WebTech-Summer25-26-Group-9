<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


/* Remove all session variables */

session_unset();


/* Destroy logged-in session */

session_destroy();


/* Go back to Login page */

header(
    "Location: ../View/Common/Pages/loginPage.php"
);

exit;

?>