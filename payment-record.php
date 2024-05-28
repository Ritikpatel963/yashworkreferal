<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <title> Payment Records</title>
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
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="container text-center">
            <div class="row text-center">
                <div class="col-12 col-sm-12 position-relative">
                    <div class="stat-box">
                        <p class="stat-title"> Payment Records</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
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


</body>
<?php include 'footer.php'; ?>