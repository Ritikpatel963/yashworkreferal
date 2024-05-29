<?php
include 'inc/db.php';

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header("location: login.php");
    exit(); // Stop further execution
}

$userId = $_SESSION['user'];

// Fetch commission percentages from settings table
$sql = "SELECT setting_key, value FROM settings";
$result = $conn->query($sql);
$settings = [];
while ($row = $result->fetch_assoc()) {
    $settings[$row['setting_key']] = $row['value'];
}

$lvl1_commission = isset($settings['lvl1_commission']) ? $settings['lvl1_commission'] : 0;
$lvl2_commission = isset($settings['lvl2_commission']) ? $settings['lvl2_commission'] : 0;
$lvl3_commission = isset($settings['lvl3_commission']) ? $settings['lvl3_commission'] : 0;

// Fetch total commission earned for each level
$lvl1_commission_total = $conn->query("SELECT SUM(amt) as total FROM transactions WHERE user_id = $userId AND type = 'refer' AND remarks LIKE 'Level 1%'")->fetch_assoc()['total'] ?? 0;
$lvl2_commission_total = $conn->query("SELECT SUM(amt) as total FROM transactions WHERE user_id = $userId AND type = 'refer' AND remarks LIKE 'Level 2%'")->fetch_assoc()['total'] ?? 0;
$lvl3_commission_total = $conn->query("SELECT SUM(amt) as total FROM transactions WHERE user_id = $userId AND type = 'refer' AND remarks LIKE 'Level 3%'")->fetch_assoc()['total'] ?? 0;
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <title>Team</title>
</head>

<body>
    <div class="container-fluid orders-section text-center">
        <h4>My Team</h4>
    </div>
    <div class="container">
        <div class="withdraw-section">
            <i class="fa-solid fa-shield"></i>
            <p>Please contact Customer Service for assistance if the withdrawal hasn't arrived within 24 hours after request.</p>
            <a href="withdraw.php"><button>Withdraw Now</button></a>
        </div>
        <div class="info-boxs">
            <p>There are up to 3 levels in a team by referral joining by member:</p>
            <p>1. Get <?php echo htmlspecialchars($lvl1_commission); ?>% from 1st level joined members.</p>
            <p>2. Get <?php echo htmlspecialchars($lvl2_commission); ?>% from 2nd level joined members.</p>
            <p>3. Get <?php echo htmlspecialchars($lvl3_commission); ?>% from 3rd level joined members.</p>
            <p>Commission will be distributed on product purchase price.</p>
        </div>

        <div class="container mt-5">
            <table class="table custom-table">
                <thead>
                    <tr>
                        <th colspan="2">Level 1 - Commission <?php echo htmlspecialchars($lvl1_commission); ?>%</th>
                    </tr>
                    <tr>
                        <th>Members</th>
                        <th>Total Commission</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT id FROM users WHERE referrer_code = (SELECT refer_code FROM users WHERE id = $userId)";
                    $result = $conn->query($sql);
                    ?>
                    <tr>
                        <td><?= $result->num_rows ?></td>
                        <td>&#8377;<?= number_format($lvl1_commission_total, 2) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="container mt-5">
            <table class="table custom-table">
                <thead>
                    <tr>
                        <th colspan="2">Level 2 - Commission <?php echo htmlspecialchars($lvl2_commission); ?>%</th>
                    </tr>
                    <tr>
                        <th>Members</th>
                        <th>Total Commission</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT id FROM users WHERE referrer_code IN (SELECT refer_code FROM users WHERE referrer_code IN (SELECT refer_code FROM users WHERE id = $userId))";
                    $result = $conn->query($sql);
                    ?>
                    <tr>
                        <td><?= $result->num_rows ?></td>
                        <td>&#8377;<?= number_format($lvl2_commission_total, 2) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="container mt-5" style="padding-bottom: 100px;">
            <table class="table custom-table">
                <thead>
                    <tr>
                        <th colspan="2">Level 3 - Commission <?php echo htmlspecialchars($lvl3_commission); ?>%</th>
                    </tr>
                    <tr>
                        <th>Members</th>
                        <th>Total Commission</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT id FROM users WHERE referrer_code IN (SELECT refer_code FROM users WHERE referrer_code IN (SELECT refer_code FROM users WHERE referrer_code = (SELECT refer_code FROM users WHERE id = $userId)))";
                    $result = $conn->query($sql);
                    ?>
                    <tr>
                        <td><?= $result->num_rows ?></td>
                        <td>&#8377;<?= number_format($lvl3_commission_total, 2) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <?php include 'footer.php'; ?>
    </div>
</body>

</html>