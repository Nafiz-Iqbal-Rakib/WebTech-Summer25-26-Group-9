<!-- views/layout/header.php -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title><?= $title ?? 'My Website' ?></title>

      

        <link rel="stylesheet" href="\WebTech-Summer25-26-Group-9\View\style.css">
        <link rel="stylesheet" href="\WebTech-Summer25-26-Group-9\View\updateInfo.css">
        <link rel="stylesheet" href="\WebTech-Summer25-26-Group-9\View\Admin\sidebar.css">
        <link rel="stylesheet" href="\WebTech-Summer25-26-Group-9\View\Admin\order.css">
        <link rel="stylesheet" href="\WebTech-Summer25-26-Group-9\View\Admin\adminUser.css">
        <link rel="stylesheet" href="\WebTech-Summer25-26-Group-9\View\Admin\adminProduct.css">


        <link rel="stylesheet" href="loginPage.css">
        <link rel="stylesheet" href="signUp.css">
        <link rel="stylesheet" href="dashboard.css">

        <!-- header css -->
        <link rel="stylesheet" href="\WebTech-Summer25-26-Group-9\View\Layouts\header.css">

        <!-- footer css -->
        <link rel="stylesheet" href="\WebTech-Summer25-26-Group-9\View\Layouts\footer.css">

        <!-- font awesome icon -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    </head>

    <body>

        <!-- Main Header -->

        <header class="main-header">
        
            <!-- Main Navigation Bar -->

            <div class="main-nav-bar">

                <div class="header-wrapper">

                    <!-- Logo -->
                    <img src="\WebTech-Summer25-26-Group-9\Asset\Logo.png" alt="Brand Logo">

                    <!-- Navigation Links -->

                    <nav class="nav-links">
                        <ul>
                            <li><a href="/WebTech-Summer25-26-Group-9/View/landingPage.php">Home</a></li>
                            <li><a href="/WebTech-Summer25-26-Group-9/View/Admin/adminDashboardPage.php">Shop</a></li>
                        </ul>
                    </nav>
            
                    <!-- Action Icons -->
                      
                    <div class="header-actions">

                        <a href="#" aria-label="Search">
                            <i class="fas fa-search"></i>
                        </a>    
                        <a href="#" aria-label="Cart">
                            <i class="fas fa-shopping-cart"></i>
                        </a>    
                        <a href="loginPage.php" aria-label="User">
                            <i class="fas fa-user"></i>
                        </a>

                     </div>
                    
                </div>
            </div>
        </header>

        <main>