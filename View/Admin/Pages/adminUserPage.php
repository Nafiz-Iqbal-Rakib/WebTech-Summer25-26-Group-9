<?php include '../../Layouts/header.php'; ?>
<?php include "../../../Controller/UserController.php"; ?>

<?php

$controller = new UserController();

$users = $controller->getUsers();

?>

<div class="app-container">

    <?php include 'sidebar.php'; ?>

    <main class="main-content">

        <div class="content-body">

            <div class="page-header">

                <div>
                    <p class="section-subtitle">MANAGE</p>
                    <h1 class="page-title">Users</h1>
                </div>

                <div class="search-container">

                    <input
                        type="text"
                        placeholder="Search users..."
                        class="search-input">

                </div>

            </div>


            <div class="table-container">

                <table>

                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>ROLE</th>
                            <th>ORDERS</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>

                    </thead>


                    <tbody>

                        <?php foreach ($users as $user): ?>

                            <tr>

                                <!-- ID -->

                                <td class="user-id">
                                    <?php echo $user["id"]; ?>
                                </td>


                                <!-- NAME -->

                                <td>

                                    <div class="user-name-col">

                                        <span class="user-fullname">
                                            <?php echo $user["name"]; ?>
                                        </span>

                                    </div>

                                </td>


                                <!-- EMAIL -->

                                <td class="text-muted">

                                    <?php echo $user["email"]; ?>

                                </td>


                                <!-- ROLE -->

                                <td>

                                    <?php echo $user["role"]; ?>

                                </td>


                                <!-- ORDERS -->

                                <td>

                                    <?php echo $user["orders"]; ?>

                                </td>


                                <!-- STATUS -->

                                <td>

                                    <select class="user-status">

                                        <option
                                            value="active"
                                            <?php echo $user["status"] === "active" ? "selected" : ""; ?>>
                                            ACTIVE
                                        </option>

                                        <option
                                            value="suspended"
                                            <?php echo $user["status"] === "suspended" ? "selected" : ""; ?>>
                                            SUSPENDED
                                        </option>

                                        <option
                                            value="deactivated"
                                            <?php echo $user["status"] === "deactivated" ? "selected" : ""; ?>>
                                            DEACTIVATED
                                        </option>

                                    </select>

                                </td>


                                <!-- ACTION -->

                                <td>

                                    <button
                                        type="button"
                                        class="delete-user-btn"
                                        data-id="<?php echo $user["id"]; ?>">

                                        DELETE

                                    </button>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </main>

</div>


<script src="../../Common/JS/user.js"></script>
<script src="../JS/user.js"></script>