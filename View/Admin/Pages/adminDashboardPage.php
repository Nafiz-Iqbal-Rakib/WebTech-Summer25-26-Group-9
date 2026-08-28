<?php

include "../../../Controller/DashboardController.php";

$controller = new DashboardController();

$data = $controller->getDashboardData();

extract($data);

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

                <div class="stat-card">

                    <div class="stat-header">
                        <h3>TOTAL USERS</h3>
                        <i class="fas fa-user-friends"></i>
                    </div>

                    <div class="stat-value">
                        <?php echo $totalUsers; ?>
                    </div>

                    <div class="stat-subtext">
                        <?php echo $deliveryAgents; ?> delivery agents
                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-header">
                        <h3>TOTAL PRODUCTS</h3>
                        <i class="fas fa-cube"></i>
                    </div>

                    <div class="stat-value">
                        <?php echo $totalProducts; ?>
                    </div>

                    <div class="stat-subtext">
                        <?php echo $activeListings; ?> active listings
                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-header">
                        <h3>TOTAL ORDERS</h3>
                        <i class="far fa-clipboard"></i>
                    </div>

                    <div class="stat-value">
                        <?php echo $totalOrders; ?>
                    </div>

                    <div class="stat-subtext">
                        <?php echo $pendingToday; ?> pending today
                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-header">
                        <h3>DELIVERIES ASSIGNED</h3>
                        <i class="fas fa-truck"></i>
                    </div>

                    <div class="stat-value">
                        <?php echo $deliveriesAssigned; ?>
                    </div>

                    <div class="stat-subtext">
                        <?php echo $unassignedDeliveries; ?> unassigned
                    </div>

                </div>

            </div>


            <!-- Orders Table -->

            <p class="section-subtitle">RECENT ORDERS</p>

            <div class="table-container">

                <table>

                    <thead>

                        <tr>
                            <th>ORDER</th>
                            <th>CUSTOMER</th>
                            <th>PRODUCT</th>
                            <th>AMOUNT</th>
                            <th>STATUS</th>
                        </tr>

                    </thead>


                    <tbody>

                        <?php foreach ($recentOrders as $order): ?>

                            <tr>

                                <td class="order-id">
                                    <?php echo $order["id"]; ?>
                                </td>

                                <td>
                                    <?php echo $order["customer"]; ?>
                                </td>

                                <td class="product-name">
                                    <?php echo $order["product"]; ?>
                                </td>

                                <td>
                                    <?php echo $order["amount"]; ?>
                                </td>

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