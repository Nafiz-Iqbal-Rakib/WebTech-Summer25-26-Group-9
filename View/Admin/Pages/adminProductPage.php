<?php include '../Layouts/header.php'; ?>

<div class="app-container">

    <!-- Sidebar / Aside -->
    <?php include 'sidebar.php'; ?>

    <!-- Main Content -->
    <main class="main-content">

        <div class="content-body">
            <p class="section-subtitle">MANAGE</p>
            <h1 class="page-title">Products</h1>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NAME</th>
                            <th>CATEGORY</th>
                            <th>PRICE</th>
                            <th>STOCK</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="text-muted">1</td>
                            <td class="product-name-bold">Oslo Lounge Chair</td>
                            <td class="text-muted">Furniture</td>
                            <td>$500</td>
                            <td>8</td>
                            <td><span class="badge-status-outline badge-active">ACTIVE</span></td>
                        </tr>

                        <tr>
                            <td class="text-muted">2</td>
                            <td class="product-name-bold">Linen Throw Pillow Set</td>
                            <td class="text-muted">Textiles</td>
                            <td>$800</td>
                            <td>3</td>
                            <td><span class="badge-status-outline badge-low-stock">LOW STOCK</span></td>
                        </tr>

                        <tr>
                            <td class="text-muted">3</td>
                            <td class="product-name-bold">Marble Side Table</td>
                            <td class="text-muted">Furniture</td>
                            <td>$8,900</td>
                            <td>12</td>
                            <td><span class="badge-status-outline badge-active">ACTIVE</span></td>
                        </tr>

                        <tr>
                            <td class="text-muted">4</td>
                            <td class="product-name-bold">Arabi Scented Candle</td>
                            <td class="text-muted">Decor</td>
                            <td>$650</td>
                            <td>0</td>
                            <td><span class="badge-status-outline badge-out-of-stock">OUT OF STOCK</span></td>
                        </tr>

                        <tr>
                            <td class="text-muted">5</td>
                            <td class="product-name-bold">Rattan Pendant Light</td>
                            <td class="text-muted">Lighting</td>
                            <td>$400</td>
                            <td>6</td>
                            <td><span class="badge-status-outline badge-active">ACTIVE</span></td>
                        </tr>

                        <tr>
                            <td class="text-muted">6</td>
                            <td class="product-name-bold">Jute Storage Basket</td>
                            <td class="text-muted">Decor</td>
                            <td>&900</td>
                            <td>25</td>
                            <td><span class="badge-status-outline badge-active">ACTIVE</span></td>
                        </tr>

                        <tr>
                            <td class="text-muted">7</td>
                            <td class="product-name-bold">Minimalist Wall Clock</td>
                            <td class="text-muted">Decor</td>
                            <td>$200</td>
                            <td>2</td>
                            <td><span class="badge-status-outline badge-low-stock">LOW STOCK</span></td>
                        </tr>

                        <tr>
                            <td class="text-muted">8</td>
                            <td class="product-name-bold">Cedar Bookshelf</td>
                            <td class="text-muted">Furniture</td>
                            <td>$6000</td>
                            <td>4</td>
                            <td><span class="badge-status-outline badge-active">ACTIVE</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </main>

</div>
