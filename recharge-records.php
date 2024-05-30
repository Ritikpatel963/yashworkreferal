<?php
include 'inc/db.php';
if (!isset($_SESSION['user'])) {
    header("location: login.php");
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <title> Recharge Records</title>
    <style>
        .order-card {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            border-radius: 10px;
            padding: 15px;
            color: white;
            margin-bottom: 20px;
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

        .heading h3 {
            color: white;
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

        .caution-box {
            display: flex;
            align-items: center;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            margin: 20px 0;
            background: #293C3B;
            border: 1px solid #787E2F;
        }

        .caution-box .icon {
            margin-right: 10px;
            font-size: 1.5em;
        }

        .fas {
            color: #ffcb00 !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid orders-section text-center">
        <h4>Recharge Records</h4>
    </div>

    <div class="container-fluid">
        <div class="container text-center">
            <div class="row text-center">
                <div class="col-12 col-sm-12 position-relative">
                    <div class="container">
                        <div class="caution-box">
                            <i class="fas fa-exclamation-triangle icon"></i>
                            <span>Recharge money will arrive with in 24 Hrs. If not arrive please contact customer service.</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container" style="padding-bottom: 100px;">
        <?php
        $orders = $conn->query("SELECT * FROM transactions WHERE user_id = '{$_SESSION['user']}' AND type='recharge' ORDER BY id DESC");
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
                        <p><strong>Order No: <?= $order['order_id'] ?></strong></p>
                        <p><strong>Amount: ₹<?= $order['amt'] ?></strong></p>
                        <p><strong><?= $order['remarks'] ?></strong></p>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>

    <?php include 'footer.php'; ?>