<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <title>Recharge</title>
</head>

<body>
    <div class="container-fluid orders-section text-center">
        <h4>Recharge</h4>
    </div>
    <div class="container">
        <div class="balance-container">
            <h4>Current Balance</h4>
            <div class="balance-amount">₹<?= number_format(($conn->query("SELECT wallet FROM users WHERE id='{$_SESSION['user']}'")->fetch_assoc()['wallet']), 2) ?></div>
        </div>
        <div class="info-box">
            <ul>
                <li>Minimum Deposit: ₹400</li>
                <li>Arrival Time: Within 24 Hours</li>
            </ul>
        </div>
        <div class="deposit-container">
            <div class="deposit-header">
                <h5>Please Enter Amount To Deposit</h5>
            </div>
            <form action="" method="post">
                <div class="deposit-input">
                    <input type="number" min="400" name="amount" step="0.01" placeholder="Enter amount">
                </div>
                <button type="submit" class="deposit-button">Deposit Now</button>
            </form>
            <div class="disclaimer">
                If the funds do not arrive in time, please contact the APP online customer service immediately. Only the online customer service obtained in the APP is authentic and credible, do not trust impostors outside the APP.
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>