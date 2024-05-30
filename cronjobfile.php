<?php
include 'inc/db.php';

// Set the timezone
date_default_timezone_set('Asia/Kolkata'); // Replace YOUR_TIMEZONE with your timezone, e.g., 'America/New_York'

// Get the current date and time
$current_time = date('H:i');
$current_date = date('Y-m-d');

// Check if the script is running at 00:05 AM
if ($current_time == '00:05') {
    // Fetch eligible orders
    $query = "
        SELECT o.id AS order_id, o.user_id, o.amount, o.created_at, 
               p.id AS project_id, p.daily_inc, p.total_inc, p.serving_time 
        FROM orders o 
        JOIN projects p ON o.project_id = p.id 
        WHERE o.status = 1"; // Assuming status 1 means active order
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($order = $result->fetch_assoc()) {
            $order_id = $order['order_id'];
            $user_id = $order['user_id'];
            $daily_inc = $order['daily_inc'];
            $total_inc = $order['total_inc'];
            $serving_time = $order['serving_time'];
            $order_date = new DateTime($order['created_at']);

            // Calculate the end date of the serving time
            $end_date = clone $order_date;
            $end_date->modify("+$serving_time days");

            // Check if today is within the serving period
            $today = new DateTime($current_date);
            if ($today >= $order_date && $today <= $end_date) {
                // Calculate the day number
                $day_number = $order_date->diff($today)->days + 1;

                // Check if the total credited income is less than total_inc
                $income_query = "
                    SELECT SUM(amt) AS total_income 
                    FROM transactions 
                    WHERE user_id = '$user_id' AND order_id = '$order_id' AND type = 'income'";
                $income_result = $conn->query($income_query);
                $income_row = $income_result->fetch_assoc();
                $total_income = $income_row['total_income'] ?? 0;

                // Check if today's income is already credited
                $today_income_query = "
                    SELECT COUNT(*) AS count 
                    FROM transactions 
                    WHERE user_id = '$user_id' AND order_id = '$order_id' AND type = 'income' AND DATE(created_at) = '$current_date'";
                $today_income_result = $conn->query($today_income_query);
                $today_income_row = $today_income_result->fetch_assoc();
                $income_already_credited = $today_income_row['count'] > 0;

                if ($total_income < $total_inc && !$income_already_credited) {
                    // Credit daily income to user's withdraw_bal
                    $update_user_query = "
                        UPDATE users 
                        SET withdraw_bal = withdraw_bal + $daily_inc 
                        WHERE id = $user_id";
                    $conn->query($update_user_query);

                    // Insert transaction record with day number in remarks
                    $insert_transaction_query = "
                        INSERT INTO transactions (user_id, order_id, type, amt, remarks, status) 
                        VALUES ('$user_id', '$order_id', 'income', '$daily_inc', 'Daily income - Day $day_number', 1)";
                    $conn->query($insert_transaction_query);
                }
            }
        }
    }
}

$conn->close();
