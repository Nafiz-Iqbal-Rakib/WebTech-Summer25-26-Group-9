<?php

include "../../../Controller/OrderController.php";

$controller = new OrderController();

$data = $controller->getOrders();

$orders = $data["orders"];
$deliveryAgents = $data["deliveryAgents"];

?>

<?php include '../../Layouts/header.php'; ?>

<div class="app-container">

    <?php include 'sidebar.php'; ?>


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
                            <th>ACTION</th>
                        </tr>

                    </thead>


                    <tbody>

                        <?php foreach ($orders as $order): ?>

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


                                <td class="date-col">
                                    <?php echo $order["date"]; ?>
                                </td>


                                <td>
                                    <span class="badge-status <?php echo $order["statusClass"]; ?>">
                                        <?php echo $order["status"]; ?>
                                    </span>
                                </td>


                                <td>

                                    <?php if (!empty($order["delivery"])): ?>

                                        <div class="delivery-agent">

                                            <span class="agent-avatar">
                                                <?php echo $order["deliveryInitial"]; ?>
                                            </span>

                                            <span>
                                                <?php echo $order["delivery"]; ?>
                                            </span>

                                        </div>

                                    <?php else: ?>

                                        <span class="unassigned">
                                            Unassigned
                                        </span>

                                    <?php endif; ?>

                                </td>


                                <td class="action-column">

                                    <?php if (empty($order["delivery"])): ?>

                                        <form method="post" class="delivery-assign-form">

                                            <input
                                                type="hidden"
                                                name="orderId"
                                                value="<?php echo $order["id"]; ?>"
                                            >

                                            <select
                                                name="deliveryAgentId"
                                                class="delivery-select"
                                                required
                                            >

                                                <option value="" selected disabled>
                                                    Select Agent
                                                </option>

                                                <?php foreach ($deliveryAgents as $agent): ?>

                                                    <option value="<?php echo $agent["id"]; ?>">
                                                        <?php echo $agent["name"]; ?>
                                                    </option>

                                                <?php endforeach; ?>

                                            </select>

                                            <button
                                                type="submit"
                                                name="assign"
                                                class="action-btn"
                                            >
                                                ASSIGN
                                            </button>

                                        </form>


                                    <?php elseif ($order["status"] !== "DELIVERED"): ?>

                                        <button
                                            type="button"
                                            class="action-btn"
                                        >
                                            REASSIGN
                                        </button>

                                    <?php endif; ?>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </main>

</div>