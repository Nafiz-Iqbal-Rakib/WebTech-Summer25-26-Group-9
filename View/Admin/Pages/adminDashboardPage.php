<?php

include "../../../Controller/DashboardController.php";

$controller = new DashboardController();

$data = $controller->getDashboardData();

?>

<?php include '../../Layouts/header.php'; ?>

<div class="app-container">

    <!-- Sidebar / Aside -->

    <?php include 'sidebar.php'; ?>


    <!-- Main Content -->

    <main class="main-content">

        <div class="content-body">

            <p class="section-subtitle">OVERVIEW</p>

            <h1 class="page-title">Dashboard</h1>


            <!-- Stats Cards -->

            <div class="stats-grid">


                <!-- TOTAL USERS -->

                <div class="stat-card">

                    <div class="stat-header">

                        <h3>TOTAL USERS</h3>

                        <i class="fas fa-user-friends"></i>

                    </div>

                    <div class="stat-value">
                        <?php echo $data["totalUsers"]; ?>
                    </div>

                    <div class="stat-subtext">
                        <?php echo $data["deliveryAgents"]; ?> delivery agents
                    </div>

                </div>


                <!-- TOTAL PRODUCTS -->

                <div class="stat-card">

                    <div class="stat-header">

                        <h3>TOTAL PRODUCTS</h3>

                        <i class="fas fa-cube"></i>

                    </div>

                    <div class="stat-value">
                        <?php echo $data["totalProducts"]; ?>
                    </div>

                    <div class="stat-subtext">
                        <?php echo $data["activeListings"]; ?> active listings
                    </div>

                </div>


                <!-- TOTAL ORDERS -->

                <div class="stat-card">

                    <div class="stat-header">

                        <h3>TOTAL ORDERS</h3>

                        <i class="far fa-clipboard"></i>

                    </div>

                    <div class="stat-value">
                        <?php echo $data["totalOrders"]; ?>
                    </div>

                    <div class="stat-subtext">
                        <?php echo $data["pendingToday"]; ?> pending today
                    </div>

                </div>


                <!-- DELIVERIES ASSIGNED -->

                <div class="stat-card">

                    <div class="stat-header">

                        <h3>DELIVERIES ASSIGNED</h3>

                        <i class="fas fa-truck"></i>

                    </div>

                    <div class="stat-value">
                        <?php echo $data["deliveriesAssigned"]; ?>
                    </div>

                    <div class="stat-subtext">
                        <?php echo $data["unassignedDeliveries"]; ?> unassigned
                    </div>

                </div>

            </div>


            <!-- Recent Orders -->

            <p class="section-subtitle">RECENT ORDERS</p>


            <div class="table-container">

                <table>

                    <thead>

                        <tr>
                            <th>ORDER</th>
                            <th>CUSTOMER</th>
                            <th>SELLER</th>
                            <th>PRODUCT</th>
                            <th>AMOUNT</th>
                            <th>STATUS</th>
                        </tr>

                    </thead>


                    <tbody>

                        <?php foreach ($data["recentOrders"] as $order): ?>

                            <tr>

                                <!-- ORDER -->

                                <td class="order-id">
                                    <?php echo $order["id"]; ?>
                                </td>


                                <!-- CUSTOMER -->

                                <td>
                                    <?php echo $order["customer"]; ?>
                                </td>


                                <!-- SELLER -->

                                <td>
                                    <?php echo $order["seller"]; ?>
                                </td>


                                <!-- PRODUCT -->

                                <td class="product-name">
                                    <?php echo $order["product"]; ?>
                                </td>


                                <!-- AMOUNT -->

                                <td>
                                    <?php echo $order["amount"]; ?>
                                </td>


                                <!-- STATUS -->

                                <td>

                                    <span class="badge-status <?php echo $order["statusClass"]; ?>">
                                        <?php echo $order["status"]; ?>
                                    </span>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </main>

</div>