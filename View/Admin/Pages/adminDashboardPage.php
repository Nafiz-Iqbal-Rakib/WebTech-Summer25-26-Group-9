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
                    <div class="stat-value">10</div>
                    <div class="stat-subtext">3 delivery agents</div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <h3>TOTAL PRODUCTS</h3>
                        <i class="fas fa-cube"></i>
                    </div>
                    <div class="stat-value">8</div>
                    <div class="stat-subtext">5 active listings</div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <h3>TOTAL ORDERS</h3>
                        <i class="far fa-clipboard"></i>
                    </div>
                    <div class="stat-value">8</div>
                    <div class="stat-subtext">3 pending today</div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <h3>DELIVERIES ASSIGNED</h3>
                        <i class="fas fa-truck"></i>
                    </div>
                    <div class="stat-value">3</div>
                    <div class="stat-subtext">5 unassigned</div>
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
                        <tr>
                            <td class="order-id">#ORD-001</td>
                            <td>Ayaan Rahman</td>
                            <td class="product-name">Oslo Lounge Chair</td>
                            <td>৳12,500</td>
                            <td>
                                <span class="badge-status badge-pending">PENDING</span>
                            </td>
                        </tr>

                        <tr>
                            <td class="order-id">#ORD-002</td>
                            <td>Nadia Islam</td>
                            <td class="product-name">Linen Throw Pillow Set</td>
                            <td>৳1,800</td>
                            <td>
                                <span class="badge-status badge-processing">PROCESSING</span>
                            </td>
                        </tr>

                        <tr>
                            <td class="order-id">#ORD-003</td>
                            <td>Fatima Khanam</td>
                            <td class="product-name">Marble Side Table</td>
                            <td>৳8,900</td>
                            <td>
                                <span class="badge-status badge-shipped">SHIPPED</span>
                            </td>
                        </tr>

                        <tr>
                            <td class="order-id">#ORD-004</td>
                            <td>Omar Faruk</td>
                            <td class="product-name">Rattan Pendant Light</td>
                            <td>৳5,400</td>
                            <td>
                                <span class="badge-status badge-delivered">DELIVERED</span>
                            </td>
                        </tr>

                        <tr>
                            <td class="order-id">#ORD-005</td>
                            <td>Mim Sultana</td>
                            <td class="product-name">Jute Storage Basket</td>
                            <td>৳900</td>
                            <td>
                                <span class="badge-status badge-pending">PENDING</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </main>

</div>