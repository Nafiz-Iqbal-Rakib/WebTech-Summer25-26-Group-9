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


    <!-- Main Content -->

    <main class="main-content">

        <div class="content-body">


            <!-- Page Header -->

            <div class="page-header">

                <div>
                    <p class="section-subtitle">MANAGE</p>
                    <h1 class="page-title">Orders</h1>
                </div>


                <!-- Search -->

                <div class="search-container">

                    <input
                        type="text"
                        placeholder="Search orders..."
                        class="search-input"
                        id="orderSearch"
                    >

                </div>

            </div>


            <!-- Orders Table -->

            <div class="table-container">

                <table>

                    <thead>

                        <tr>
                            <th>ORDER</th>
                            <th>CUSTOMER</th>
                            <th>SELLER</th>
                            <th>PRODUCT</th>
                            <th>AMOUNT</th>
                            <th>DATE</th>
                            <th>STATUS</th>
                            <th>DELIVERY</th>
                            <th>ACTION</th>
                        </tr>

                    </thead>


                    <tbody id="orderTableBody">

                        <?php foreach ($orders as $order): ?>

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


                                <!-- DATE -->

                                <td class="date-col">
                                    <?php echo $order["date"]; ?>
                                </td>


                                <!-- STATUS -->

                                <td>

                                    <span class="badge-status <?php echo $order["statusClass"]; ?>">
                                        <?php echo $order["status"]; ?>
                                    </span>

                                </td>


                                <!-- DELIVERY -->

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


                                <!-- ACTION -->

                                <td class="action-column">

                                    <?php if (empty($order["delivery"])): ?>

                                        <!-- ASSIGN -->

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

                                        <!-- REASSIGN -->

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
                                                name="reassign"
                                                class="action-btn"
                                            >
                                                REASSIGN
                                            </button>

                                        </form>

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


<!-- =========================
     Order Search
     ========================= -->

<script>

const orderSearch = document.getElementById("orderSearch");

orderSearch.addEventListener("input", function () {

    const searchValue = this.value.toLowerCase().trim();

    const rows = document.querySelectorAll("#orderTableBody tr");

    rows.forEach(function (row) {

        const orderId = row
            .querySelector(".order-id")
            .textContent
            .toLowerCase();

        const customer = row
            .children[1]
            .textContent
            .toLowerCase();

        const seller = row
            .children[2]
            .textContent
            .toLowerCase();

        const product = row
            .querySelector(".product-name")
            .textContent
            .toLowerCase();


        if (
            orderId.includes(searchValue) ||
            customer.includes(searchValue) ||
            seller.includes(searchValue) ||
            product.includes(searchValue)
        ) {

            row.style.display = "";

        } else {

            row.style.display = "none";

        }

    });

});

</script>

