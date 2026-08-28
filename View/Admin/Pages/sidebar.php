<?php

include_once "../../../Controller/SidebarController.php";

$sidebarController = new SidebarController();

$adminData = $sidebarController->getAdminData();

?>

<aside class="sidebar">

    <nav class="sidebar-nav">

        <ul>

            <li>
                <a href="\WebTech-Summer25-26-Group-9\View\Admin\Pages\adminDashboardPage.php">
                    <i class="fas fa-border-all"></i>
                    Dashboard
                </a>
            </li>

            <li>
                <a href="\WebTech-Summer25-26-Group-9\View\Admin\Pages\adminUserPage.php">
                    <i class="far fa-user"></i>
                    Users
                </a>
            </li>

            <li>
                <a href="\WebTech-Summer25-26-Group-9\View\Admin\Pages\adminProductPage.php">
                    <i class="fas fa-box"></i>
                    Products
                </a>
            </li>

            <li>
                <a href="\WebTech-Summer25-26-Group-9\View\Admin\Pages\adminOrderPage.php">
                    <i class="far fa-clipboard"></i>
                    Orders
                </a>
            </li>

        </ul>

    </nav>

    <div class="sidebar-footer">

        <div class="user-info">

            <div class="avatar">
                <?php echo $adminData["adminInitial"]; ?>
            </div>

            <div class="details">

                <span class="role">
                    <?php echo $adminData["adminRole"]; ?>
                </span>

                <span class="name">
                    <?php echo $adminData["adminName"]; ?>
                </span>

                <span class="email">
                    <?php echo $adminData["adminEmail"]; ?>
                </span>

            </div>

        </div>

        <a href="\WebTech-Summer25-26-Group-9\View\updateInfopage.php">
            <i class="fas fa-user-edit"></i>
        </a>

        <a href="\WebTech-Summer25-26-Group-9\View\landingPage.php">
            <i class="fas fa-sign-out-alt logout-btn"></i>
        </a>

    </div>

</aside>