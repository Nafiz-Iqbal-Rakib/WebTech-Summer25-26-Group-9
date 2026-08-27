<?php include '../Layouts/header.php'; ?>

<div class="app-container">

    <!-- Sidebar / Aside -->
    <?php include 'sidebar.php'; ?>

    <!-- Main Content -->
    <main class="main-content">

        <div class="content-body">
            <p class="section-subtitle">MANAGE</p>
            <h1 class="page-title">Orders</h1>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ORDER</th>
                            <th>CUSTOMER</th>
                            <th>PRODUCT</th>
                            <th>AMOUNT</th>
                            <th>DATE</th>
                            <th>STATUS</th>
                            <th>DELIVERY</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="order-id">#ORD-001</td>
                            <td>Ayaan Rahman</td>
                            <td class="product-name">Oslo Lounge Chair</td>
                            <td>৳12,500</td>
                            <td class="date-col">Aug 10, 2026</td>
                            <td><span class="badge-status badge-pending">PENDING</span></td>
                            <td class="unassigned">Unassigned</td>
                            <td><button class="action-btn">ASSIGN</button></td>
                        </tr>

                        <tr>
                            <td class="order-id">#ORD-002</td>
                            <td>Nadia Islam</td>
                            <td class="product-name">Linen Throw Pillow Set</td>
                            <td>৳1,800</td>
                            <td class="date-col">Aug 11, 2026</td>
                            <td><span class="badge-status badge-processing">PROCESSING</span></td>
                            <td class="unassigned">Unassigned</td>
                            <td><button class="action-btn">ASSIGN</button></td>
                        </tr>

                        <tr>
                            <td class="order-id">#ORD-003</td>
                            <td>Fatima Khanam</td>
                            <td class="product-name">Marble Side Table</td>
                            <td>৳8,900</td>
                            <td class="date-col">Aug 12, 2026</td>
                            <td><span class="badge-status badge-shipped">SHIPPED</span></td>
                            <td>
                                <div class="delivery-agent">
                                    <span class="agent-avatar">K</span>
                                    <span>Karim Hossain</span>
                                </div>
                            </td>
                            <td><button class="action-btn">REASSIGN</button></td>
                        </tr>

                        <tr>
                            <td class="order-id">#ORD-004</td>
                            <td>Omar Faruk</td>
                            <td class="product-name">Rattan Pendant Light</td>
                            <td>৳5,400</td>
                            <td class="date-col">Aug 13, 2026</td>
                            <td><span class="badge-status badge-delivered">DELIVERED</span></td>
                            <td>
                                <div class="delivery-agent">
                                    <span class="agent-avatar">R</span>
                                    <span>Rafiq Ahmed</span>
                                </div>
                            </td>
                            <td></td>
                        </tr>

                        <tr>
                            <td class="order-id">#ORD-005</td>
                            <td>Mim Sultana</td>
                            <td class="product-name">Jute Storage Basket</td>
                            <td>৳900</td>
                            <td class="date-col">Aug 14, 2026</td>
                            <td><span class="badge-status badge-pending">PENDING</span></td>
                            <td class="unassigned">Unassigned</td>
                            <td><button class="action-btn">ASSIGN</button></td>
                        </tr>

                        <tr>
                            <td class="order-id">#ORD-006</td>
                            <td>Sumaiya Begum</td>
                            <td class="product-name">Minimalist Wall Clock</td>
                            <td>৳2,200</td>
                            <td class="date-col">Aug 15, 2026</td>
                            <td><span class="badge-status badge-processing">PROCESSING</span></td>
                            <td class="unassigned">Unassigned</td>
                            <td><button class="action-btn">ASSIGN</button></td>
                        </tr>

                        <tr>
                            <td class="order-id">#ORD-007</td>
                            <td>Shirina Akter</td>
                            <td class="product-name">Cedar Bookshelf</td>
                            <td>৳16,000</td>
                            <td class="date-col">Aug 16, 2026</td>
                            <td><span class="badge-status badge-pending">PENDING</span></td>
                            <td class="unassigned">Unassigned</td>
                            <td><button class="action-btn">ASSIGN</button></td>
                        </tr>

                        <tr>
                            <td class="order-id">#ORD-008</td>
                            <td>Ayaan Rahman</td>
                            <td class="product-name">Arabi Scented Candle</td>
                            <td>৳650</td>
                            <td class="date-col">Aug 17, 2026</td>
                            <td><span class="badge-status badge-shipped">SHIPPED</span></td>
                            <td>
                                <div class="delivery-agent">
                                    <span class="agent-avatar">T</span>
                                    <span>Tariq Miah</span>
                                </div>
                            </td>
                            <td><button class="action-btn">REASSIGN</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </main>

</div>