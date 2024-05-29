<?php
include 'inc/db.php';

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header("location: login.php");
    exit(); // Stop further execution
}

// Function to generate a random 15-character alphanumeric string
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

if (isset($_GET['id'])) {
    $project = $_GET['id'];
    $usr = $_SESSION['user'];

    $projectDetails = $conn->query("SELECT * FROM projects WHERE id = '$project'")->fetch_assoc();
    $getBalance = $conn->query("SELECT wallet FROM users WHERE id = '$usr'")->fetch_assoc()['wallet'] ?? 0;

    $projectCost = $projectDetails['price'];

    if ($getBalance >= $projectCost) {
        $order_id = generateOrderId();
        $order = $conn->query("INSERT INTO orders (`user_id`, `order_id`, `amount`, `project_id`, `status`) VALUES ('$usr', '$order_id', '$projectCost', '$project', '0')");

        if ($order) {
            $conn->query("UPDATE users SET `wallet` = (`wallet` - '$projectCost') WHERE id = '$usr'");
            $conn->query("INSERT INTO `transactions`(`user_id`, `type`, `amt`, `order_id`, `status`, `remarks`) VALUES ('$usr', 'purchase', '$projectCost', '$order_id', '1', 'Order Placed - $order_id')");

            // Commission distribution logic
            $levels = [1 => $lvl1_commission, 2 => $lvl2_commission, 3 => $lvl3_commission];
            $currentUserId = $usr;

            for ($level = 1; $level <= 3; $level++) {
                // Get referrer code of current user
                $referrerCode = $conn->query("SELECT referrer_code FROM users WHERE id = '$currentUserId'")->fetch_assoc()['referrer_code'];

                if ($referrerCode) {
                    // Get referrer's user ID
                    $referrer = $conn->query("SELECT id FROM users WHERE refer_code = '$referrerCode'")->fetch_assoc()['id'];

                    if ($referrer) {
                        // Calculate commission amount
                        $commission = ($projectCost * $levels[$level]) / 100;

                        // Update referrer's refer_balance
                        $conn->query("UPDATE users SET refer_balance = refer_balance + $commission WHERE id = '$referrer'");

                        // Insert commission transaction
                        $remarks = "Level $level commission for order_id $order_id";
                        $conn->query("INSERT INTO transactions (`user_id`, `type`, `amt`, `order_id`, `status`, `remarks`) VALUES ('$referrer', 'refer', '$commission', '$order_id', '1', '$remarks')");

                        // Set current user to referrer for next level
                        $currentUserId = $referrer;
                    } else {
                        break; // No further referrer found
                    }
                } else {
                    break; // No further referrer code found
                }
            }

            echo ("<script>alert('Order Successfully Placed');location.href = 'orders.php'</script>");
        } else {
            echo ("<script>alert('Error while placing order');location.href = 'index.php'</script>");
        }
    } else {
        echo ("<script>alert('Insufficient Balance. Please Recharge First');location.href = 'recharge.php'</script>");
    }
} else {
    echo ("<script>location.href = 'index.php'</script>");
}
