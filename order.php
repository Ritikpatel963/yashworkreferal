<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Section</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <style>
        body {
            background-color: #101119;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .orders-section {
            background: linear-gradient(180deg, rgba(4,8,20,1) 0%, rgba(15,37,104,1) 100%); 
            padding: 20px 0;
            border-bottom: 2px solid #0800ff;
            border-radius: 0 0 12px 12px;
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
        .infromation ul li{
            font-size: 0.8rem;
            color: white;
        }
        /* order section */
        .order-card {
            background: linear-gradient(180deg, rgba(245,38,89,1) 0%, rgba(226,30,82,1) 100%); 
            border: 1px solid  #cd3575;
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

    </style>
</head>

<body>
    <div class="container-fluid orders-section">
        <h3 style="text-align: center; color:white;">Order</h3>
        <div class="row text-center">
            <div class="col-6 col-sm-6 position-relative">
                <div class="stat-box">
                    <p class="stat-title">Lifetime Profit</p>
                    <p class="stat-value">₹0.00</p>
                </div>
                <div class="divider"></div>
            </div>
            <div class="col-6 col-sm-6">
                <div class="stat-box">
                    <p class="stat-title">Total Balance</p>
                    <p class="stat-value">₹0.00</p>
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
    <div class="container">
        <div class="order-card">
            <div class="order-header">
                <div>
                    <small>16/05/2024 19:26:22</small>
                </div>
                <div class="order-status">
                    Pending
                </div>
            </div>
            <div class="order-body">
                <p>Order No. <strong>99a3812141d4296fa601af8724d8a7f</strong></p>
                <p>Amount: <strong>₹400</strong></p>
                <p>Txn Id: <strong>SP16052024CRdMECtC9kMghHRYH</strong></p>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>

