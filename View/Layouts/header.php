<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?= $title ?? 'My Website' ?>
    </title>


    <!-- Header CSS -->
    <link
        rel="stylesheet"
        href="../../Layouts/header.css"
    >


    <!-- Footer CSS -->
    <link
        rel="stylesheet"
        href="../../Layouts/footer.css"
    >


    <!-- Landing Page CSS -->
    <link
        rel="stylesheet"
        href="../../Common/Designs/landingPage.css"
    >


    <!-- Login Page CSS -->
    <link
        rel="stylesheet"
        href="../../Common/Designs/loginPage.css"
    >


    <!-- Sign Up Page CSS -->
    <link
        rel="stylesheet"
        href="../../Common/Designs/signUp.css"
    >


    <!-- Admin Dashboard CSS -->
    <link
        rel="stylesheet"
        href="../../Admin/Designs/dashboard.css"
    >


    <!-- Admin Sidebar CSS -->
    <link
        rel="stylesheet"
        href="../../Admin/Designs/sidebar.css"
    >


    <!-- Admin Order CSS -->
    <link
        rel="stylesheet"
        href="../../Admin/Designs/order.css"
    >


    <!-- Admin User CSS -->
    <link
        rel="stylesheet"
        href="../../Admin/Designs/adminUser.css"
    >


    <!-- Admin Product CSS -->
    <link
        rel="stylesheet"
        href="../../Admin/Designs/adminProduct.css"
    >


    <!-- Information Update CSS -->
    <link
        rel="stylesheet"
        href="../../Common/Designs/updateInfo.css"
    >


    <!-- Forgotten Password CSS -->
    <link
        rel="stylesheet"
        href="../../Common/Designs/forgetPass.css"
    >


    <!-- Shop CSS -->
    <link
        rel="stylesheet"
        href="../../Common/Designs/shop.css"
    >


    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

</head>


<body>


    <!-- Main Header -->

    <header class="main-header">


        <div class="main-nav-bar">


            <div class="header-wrapper">


                <!-- Logo -->

                <img
                    src="../../../Asset/Logo.png"
                    alt="Brand Logo"
                >


                <!-- Navigation -->

                <nav class="nav-links">

                    <ul>


                        <li>

                            <a href="../../Common/Pages/landingPage.php">
                                Home
                            </a>

                        </li>


                        <li>

                            <a href="../../Common/Pages/shop.php">
                                Shop
                            </a>

                        </li>


                        <!-- Buyer My Orders -->

                        <?php
                        if (($_SESSION["role"] ?? "") === "buyer"):
                        ?>

                            <li>

                                <a href="../../Buyer/Pages/MyOrders.php">
                                    My Orders
                                </a>

                            </li>

                        <?php
                        endif;
                        ?>


                        <li>

                            <a href="../../Common/Pages/landingPage.php#new-items-section">
                                New Collection
                            </a>

                        </li>


                        <li>

                            <a href="#main-footer">
                                Contact
                            </a>

                        </li>


                    </ul>

                </nav>


                <!-- Header Icons -->

                <div class="header-actions">


                    <!-- Search -->

                    <a
                        href="#"
                        aria-label="Search"
                    >

                        <i class="fas fa-search"></i>

                    </a>


                    <!-- Cart -->

                    <?php
                    if (($_SESSION["role"] ?? "") === "buyer"):
                    ?>

                        <a
                            href="../../Common/Pages/shop.php"
                            aria-label="Cart"
                        >

                            <i class="fas fa-shopping-cart"></i>

                        </a>

                    <?php
                    else:
                    ?>

                        <a
                            href="../../Common/Pages/shop.php"
                            aria-label="Shop"
                        >

                            <i class="fas fa-shopping-cart"></i>

                        </a>

                    <?php
                    endif;
                    ?>


                    <!-- Logged In -->

                    <?php
                    if (isset($_SESSION["user_id"])):
                    ?>


                        <!-- Profile -->

                        <a
                            href="../../Common/Pages/updateInfopage.php"
                            aria-label="Profile"
                        >

                            <i class="fas fa-user"></i>

                        </a>


                        <!-- Logout -->

                        <a
                            href="../../../Controller/LogoutController.php"
                            aria-label="Logout"
                        >

                            <i class="fas fa-sign-out-alt"></i>

                        </a>


                    <?php
                    else:
                    ?>


                        <!-- Login -->

                        <a
                            href="../../Common/Pages/loginPage.php"
                            aria-label="Login"
                        >

                            <i class="fas fa-user"></i>

                        </a>


                    <?php
                    endif;
                    ?>


                </div>


            </div>


        </div>


    </header>


    <main>