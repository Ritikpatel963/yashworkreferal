<?php
include 'header.php';
?>
<style>
    body {
        background-color: #101119;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    .orders-section {
        padding: 20px 0;
        border-bottom: none;
        border-radius: 12px;
    }

    .stat-box {
        background: transparent;
        color: white;
        padding: 20px;
        border-radius: 10px;
    }

    .stat-title {
        font-size: 1.0rem;
    }

    .stat-value {
        font-size: 1rem;
        font-weight: bold;
    }

    .divider {
        position: absolute;
        top: 50%;
        right: 0;
        width: 1px;
        height: 80%;
        background-color: white;
        transform: translateY(-50%);
    }

    .infromation ul li {
        font-size: 0.8rem;
        color: white;
    }

    /* order section */
    .order-card {
        background: linear-gradient(153deg, #6a11cb 0%, #b711cb 100%);
        border: 1px solid #6a11cb;
        border-radius: 10px;
        padding: 15px;
        color: white;
        width: 49.2%;
    }

    #orders_container {
        flex-wrap: wrap;
    }

    @media (max-width: 560px) {
        .order-card {
            width: 100%;
        }
    }

    .order-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid white;
        padding-bottom: 10px;
        margin-bottom: 10px;
    }

    .order-header .order-status {
        background: #0F1119;
        padding: 2px 10px;
        border-radius: 5px;
        font-size: 0.9rem;
    }

    .order-body {
        padding-left: 10px;
    }
</style>

<div class="main-content py-5">
    <div class="container">
        <div class="container-fluid orders-section">
            <div class="row text-center">
                <div class="col-6 col-sm-6 position-relative">
                    <div class="stat-box">
                        <p class="stat-title">Lifetime Profit</p>
                        <p class="stat-value">₹<?= number_format(($conn->query("SELECT SUM(amt) as totalAmt FROM `transactions` WHERE user_id='{$_SESSION['user']}' AND type='income'")->fetch_assoc()['totalAmt'] ?? 0), 2) ?></p>
                    </div>
                    <div class="divider"></div>
                </div>
                <div class="col-6 col-sm-6">
                    <div class="stat-box">
                        <p class="stat-title">Total Balance</p>
                        <p class="stat-value">₹<?= number_format(($conn->query("SELECT withdraw_bal FROM users WHERE id='{$_SESSION['user']}'")->fetch_assoc()['withdraw_bal']), 2) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- information section -->
    <div class="container box mt-5">
        <div class="infromation">
            <ul>
                <li>You receive its daily income at 00:05 AM everyday. if you purchase the product after 11:59 PM, then your first daily income will arrive on the next day at 00:05 AM.</li>
            </ul>
        </div>
    </div>
    <!-- Order section -->
    <div class="container" style="padding-bottom: 80px;">
        <div class="d-flex align-items-center gap-2" id="orders_container">
            <?php
            $orders = $conn->query("SELECT * FROM orders WHERE user_id = '{$_SESSION['user']}'");
            if ($orders->num_rows > 0) {
                foreach ($orders as $order) {
            ?>
                    <div class="order-card">
                        <div class="order-header">
                            <div>
                                <small><?= date("d-m-Y H:i A", strtotime($order['created_at'])) ?></small>
                            </div>
                            <div class="order-status">
                                <?= $order['status'] == 0 ? "Pending" : "Confirmed" ?>
                            </div>
                        </div>
                        <div class="order-body">
                            <p>Order No. <strong><?= $order['order_id'] ?></strong></p>
                            <p>Amount: <strong>₹<?= $order['amount'] ?></strong></p>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>