
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <title>Withdraw</title>
    <style>
        body {
            background-color: #101119;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            color: white;
            overflow-x: hidden;
            /* Prevent horizontal overflow */
        }

        .orders-section {
            background: linear-gradient(180deg, rgba(4, 8, 20, 1) 0%, rgba(15, 37, 104, 1) 100%);
            padding: 20px 0;
            border-bottom: 2px solid #0800ff;
            border-radius: 0 0 12px 12px;
        }

        .stat-box {
            background: transparent;
            color: white;
            padding: 20px;
            border-radius: 10px;
            position: relative;
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

        .logo {
            width: 100px;
            display: block;
            margin: 0 auto 20px;
        }

        .menu-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            transition: background 0.3s;
            color: white;
        }

        .menu-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .menu-item-icon {
            font-size: 1.5rem;
            width: 24px;
            height: 24px;
            color: #4839bb;
        }

        .menu-item-text {
            flex-grow: 1;
            margin-left: 15px;
            color: white;
        }

        .menu-section {
            margin: 20px auto;
        }

        a {
            text-decoration: none;
        }

        @media only screen and (max-width: 600px) {
            .stat-title {
                font-size: 0.8rem;
            }

            .stat-value {
                font-size: 0.8rem;
            }

            .divider {
                height: 60%;
                /* Adjust the height for smaller screens if needed */
            }
        }
    </style>
</head>

<body0>
    <div class="container-fluid orders-section">
        <img src="assets/image/logo.png" alt="" class="logo">
        <div class="row text-center">
            <div class="col-6 col-sm-6 position-relative">
                <div class="stat-box">
                    <p class="stat-title">Lifetime
Withdrawal</p>
                    <p class="stat-value">₹0.00</p>
                    <div class="divider"></div>
                </div>
            </div>
            <div class="col-6 col-sm-6 position-relative">
                <div class="stat-box">
                    <p class="stat-title">Withdrawable
Balance</p>
                    <p class="stat-value">₹0.00</p>
                    <div class="divider"></div>
                </div>
            </div>
            
        </div>
    </div>

    <div class="container">
    <div class="withdraw-section">
        <i class="fa-solid fa-shield"></i>

            <p>Please contact Customer Service for assistance if the withdrawal hasn't arrived within 24 hours after request.</p>
            <button>Withdraw Now</button>
        </div>
    </div>