<?php
include 'inc/db.php';
if (!isset($_SESSION['user'])) {
    header("location: login.php");
}

if (isset($_POST['amount']) && isset($_POST['withdraw'])) {
    $amt = $_POST['amount'];

    if (!($amt >= 500)) {
        echo "<script>alert('Minimum Withdrawl Amount is 500');location.href=''</script>";
    } else {
        $bank_acc_no = $conn->query("SELECT bank_acc_no FROM users WHERE id = '{$_SESSION['user']}'")->fetch_assoc()['bank_acc_no'] ?? '';

        if ($bank_acc_no != "") {
            $getBalance = $conn->query("SELECT withdraw_bal FROM users WHERE id = '{$_SESSION['user']}'")->fetch_assoc()['withdraw_bal'] ?? 0;

            if ($getBalance >= $amt) {
                $insert = $conn->query("INSERT INTO withdrawls (`user_id`, `amount`, `status`) VALUES ('{$_SESSION['user']}', '$amt', 'pending')");

                if ($insert) {
                    $conn->query("UPDATE users SET `withdraw_bal` = (withdraw_bal-$amt) WHERE id = '{$_SESSION['user']}'");

                    echo "<script>alert('Withdrawl Requested Successfully');location.href='withdrawl_record.php'</script>";
                } else {
                    echo "<script>alert('Error while processing');location.href=''</script>";
                }
            } else {
                echo "<script>alert('Insufficient Balance!');location.href=''</script>";
            }
        } else {
            echo "<script>alert('Please enter your bank details first!');location.href='add-bank.php'</script>";
        }
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <title>Withdraw</title>
</head>

<body>
    <div class="container-fluid orders-section text-center">
        <h4>Withdraw</h4>
    </div>
    <div class="container">
        <div class="balance-container">
            <h4>Current Balance</h4>
            <div class="balance-amount">₹<?= number_format(($conn->query("SELECT withdraw_bal FROM users WHERE id='{$_SESSION['user']}'")->fetch_assoc()['withdraw_bal']), 2) ?></div>
        </div>
        <div class="info-box">
            <ul>
                <li>Minimum Withdraw: ₹500</li>
                <li>Arrival Time: Within 24 Hours</li>
            </ul>
        </div>
        <div class="deposit-container">
            <div class="deposit-header">
                <h5>Please Enter Amount To Withdraw</h5>
            </div>
            <form action="" method="post">
                <div class="deposit-input">
                    <input type="number" name="amount" min="500" step="0.01" placeholder="Enter amount">
                </div>
                <button type="submit" name="withdraw" class="deposit-button">Withdraw Now</button>
            </form>
        </div>
    </div>

    <?php include 'footer.php'; ?>