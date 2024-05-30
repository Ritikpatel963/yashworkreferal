<?php
include 'inc/db.php';
if (!isset($_SESSION['user'])) {
    header("location: login.php");
    exit();
}

// Function to generate a random 10-character alphanumeric string
function generateOrderId($length = 15)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['txn_id'])) {
    $userId = $_SESSION['user'];
    $amount = $_POST['amount'];
    $txnId = $_POST['txn_id'];
    $orderId = generateOrderId(15);
    $type = 'recharge';
    $status = 0;

    $stmt = $conn->prepare("INSERT INTO transactions (user_id, type, amt, order_id, status, remarks) VALUES (?, ?, ?, ?, ?, ?)");
    $remarks = "Txn ID: $txnId";
    $stmt->bind_param('isdsss', $userId, $type, $amount, $orderId, $status, $remarks);

    if ($stmt->execute()) {
        echo ("<script>alert('Recharge request submitted successfully');location.href='recharge.php';</script>");
    } else {
        echo ("<script>alert('Error submitting recharge request');location.href='recharge.php';</script>");
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
            <div class="deposit-input">
                <input type="number" min="400" name="amount" step="0.01" placeholder="Enter amount" required>
            </div>
            <button type="button" class="deposit-button" data-bs-toggle="modal" data-bs-target="#qrModal">Deposit Now</button>
            <div class="disclaimer">
                If the funds do not arrive in time, please contact the APP online customer service immediately. Only the online customer service obtained in the APP is authentic and credible, do not trust impostors outside the APP.
            </div>
        </div>
    </div>

    <!-- QR Code Modal -->
    <div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="qrModalLabel">Scan QR Code to Pay</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="./uploads/images/qr-code.png" alt="QR Code" class="img-fluid">
                    <p>Scan the QR code and complete the payment. Enter the transaction ID below.</p>
                    <form id="txnForm" action="" method="post">
                        <input type="hidden" name="amount" id="amountInput">
                        <div class="mb-3">
                            <input type="text" name="txn_id" class="form-control" placeholder="Enter Transaction ID" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlYp+XX0p+3gFCSk5nkHECTar+PCwpNHf9sygI65D9KZRx0A00R+ODC8+Rk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhG0jKmgYkB6pL5YkN1KS7p5Akk+7Adw5Dh5PrX+8CABVKZyejS7BX0MGp8+" crossorigin="anonymous"></script>
    <script>
        document.querySelector('.deposit-button').addEventListener('click', function() {
            document.getElementById('amountInput').value = document.querySelector('input[name="amount"]').value;
        });
    </script>
</body>

</html>