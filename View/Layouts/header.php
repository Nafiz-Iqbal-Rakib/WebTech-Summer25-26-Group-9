<!-- views/layout/header.php -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title><?= $title ?? 'My Website' ?></title>

        <!-- header css -->
        <link rel="stylesheet" href="\WebTech-Summer25-26-Group-9\View\Layouts\header.css">

        <!-- footer css -->
        <link rel="stylesheet" href="\WebTech-Summer25-26-Group-9\View\Layouts\footer.css">

        <!-- landing page css -->
        <link rel="stylesheet" href="\WebTech-Summer25-26-Group-9\View\Common\Designs\landingPage.css">

        <!-- login page css -->
        <link rel="stylesheet" href="\WebTech-Summer25-26-Group-9\View\Common\Designs\loginPage.css">

        <!-- sign up page css -->
        <link rel="stylesheet" href="\WebTech-Summer25-26-Group-9\View\Common\Designs\signUp.css">

        <!-- admin dashboard css -->


        <!-- admin sidebar css -->
        <link rel="stylesheet" href="\WebTech-Summer25-26-Group-9\View\Admin\Designs\sidebar.css">
        <!-- admin dashboard -->
        <link rel="stylesheet" href="\WebTech-Summer25-26-Group-9\View\Admin\Designs\dashboard.css">
        <!-- admin order css -->
        <link rel="stylesheet" href="\WebTech-Summer25-26-Group-9\View\Admin\Designs\order.css">
        <!-- Admin User View css -->
        <link rel="stylesheet" href="\WebTech-Summer25-26-Group-9\View\Admin\Designs\adminUser.css">
        <!-- product view -->
        <link rel="stylesheet" href="\WebTech-Summer25-26-Group-9\View\Admin\Designs\adminProduct.css">

        <!-- information update css -->
        <link rel="stylesheet" href="\WebTech-Summer25-26-Group-9\View\Common\Designs\updateInfo.css">


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
                            <li><a href="\WebTech-Summer25-26-Group-9\View\Common\Pages\landingPage.php">Home</a></li>
                            <li><a href="#collections-section">Shop</a></li>
                            <li><a href="#collections-section">New Collection</a></li>
                            <li><a href="#collections-section">Contact</a></li>
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
                        <a href="\WebTech-Summer25-26-Group-9\View\Common\Pages\loginPage.php" aria-label="User">
                            <i class="fas fa-user"></i>
                        </a>

                     </div>
                    
                </div>
            </div>
        </header>

        <main>