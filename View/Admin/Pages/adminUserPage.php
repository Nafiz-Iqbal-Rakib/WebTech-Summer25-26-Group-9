<?php include '../Layouts/header.php'; ?>

<div class="app-container">

    <!-- Sidebar / Aside -->
    <?php include 'sidebar.php'; ?>

    <!-- Main Content -->
    <main class="main-content">

        <div class="content-body">

            <!-- Page Header with Search -->
            <div class="page-header">
                <div>
                    <p class="section-subtitle">MANAGE</p>
                    <h1 class="page-title">Users</h1>
                </div>

                <div class="search-container">
                    <input type="text" placeholder="Search users..." class="search-input">
                </div>
            </div>

            <!-- Users Table -->
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>ROLE</th>
                            <th>JOINED</th>
                            <th>ORDERS</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>
                                <div class="user-name-col">
                                    <span class="user-avatar">A</span>
                                    <span class="user-fullname">Ayaan Rahman</span>
                                </div>
                            </td>
                            <td class="text-muted">ayaan@example.com</td>
                            <td><span class="badge-role badge-customer">CUSTOMER</span></td>
                            <td class="text-muted">Jan 12, 2026</td>
                            <td>8</td>
                        </tr>

                        <tr>
                            <td>
                                <div class="user-name-col">
                                    <span class="user-avatar">N</span>
                                    <span class="user-fullname">Nadia Islam</span>
                                </div>
                            </td>
                            <td class="text-muted">nadia@example.com</td>
                            <td><span class="badge-role badge-customer">CUSTOMER</span></td>
                            <td class="text-muted">Feb 3, 2026</td>
                            <td>14</td>
                        </tr>

                        <tr>
                            <td>
                                <div class="user-name-col">
                                    <span class="user-avatar">K</span>
                                    <span class="user-fullname">Karim Hossain</span>
                                </div>
                            </td>
                            <td class="text-muted">karim@arabi.com</td>
                            <td><span class="badge-role badge-delivery">DELIVERY</span></td>
                            <td class="text-muted">Mar 1, 2026</td>
                            <td>—</td>
                        </tr>

                        <tr>
                            <td>
                                <div class="user-name-col">
                                    <span class="user-avatar">S</span>
                                    <span class="user-fullname">Sumaiya Begum</span>
                                </div>
                            </td>
                            <td class="text-muted">sumaiya@example.com</td>
                            <td><span class="badge-role badge-customer">CUSTOMER</span></td>
                            <td class="text-muted">Mar 18, 2026</td>
                            <td>3</td>
                        </tr>

                        <tr>
                            <td>
                                <div class="user-name-col">
                                    <span class="user-avatar">R</span>
                                    <span class="user-fullname">Rafiq Ahmed</span>
                                </div>
                            </td>
                            <td class="text-muted">rafiq@arabi.com</td>
                            <td><span class="badge-role badge-delivery">DELIVERY</span></td>
                            <td class="text-muted">Apr 2, 2026</td>
                            <td>—</td>
                        </tr>

                        <tr>
                            <td>
                                <div class="user-name-col">
                                    <span class="user-avatar">F</span>
                                    <span class="user-fullname">Fatima Khanam</span>
                                </div>
                            </td>
                            <td class="text-muted">fatima@example.com</td>
                            <td><span class="badge-role badge-customer">CUSTOMER</span></td>
                            <td class="text-muted">Apr 25, 2026</td>
                            <td>6</td>
                        </tr>

                        <tr>
                            <td>
                                <div class="user-name-col">
                                    <span class="user-avatar">T</span>
                                    <span class="user-fullname">Tariq Miah</span>
                                </div>
                            </td>
                            <td class="text-muted">tariq@arabi.com</td>
                            <td><span class="badge-role badge-delivery">DELIVERY</span></td>
                            <td class="text-muted">May 5, 2026</td>
                            <td>—</td>
                        </tr>

                        <tr>
                            <td>
                                <div class="user-name-col">
                                    <span class="user-avatar">S</span>
                                    <span class="user-fullname">Shirina Akter</span>
                                </div>
                            </td>
                            <td class="text-muted">shirina@example.com</td>
                            <td><span class="badge-role badge-customer">CUSTOMER</span></td>
                            <td class="text-muted">Jun 1, 2026</td>
                            <td>1</td>
                        </tr>

                        <tr>
                            <td>
                                <div class="user-name-col">
                                    <span class="user-avatar">O</span>
                                    <span class="user-fullname">Omar Faruk</span>
                                </div>
                            </td>
                            <td class="text-muted">omar@example.com</td>
                            <td><span class="badge-role badge-customer">CUSTOMER</span></td>
                            <td class="text-muted">Jun 14, 2026</td>
                            <td>9</td>
                        </tr>

                        <tr>
                            <td>
                                <div class="user-name-col">
                                    <span class="user-avatar">M</span>
                                    <span class="user-fullname">Mim Sultana</span>
                                </div>
                            </td>
                            <td class="text-muted">mim@example.com</td>
                            <td><span class="badge-role badge-customer">CUSTOMER</span></td>
                            <td class="text-muted">Jul 7, 2026</td>
                            <td>2</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </main>

</div>