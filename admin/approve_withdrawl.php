<?php
include '../inc/db.php';
if (!isset($_SESSION['admin_id'])) {
    header("location: login.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['withdrawl_id'];
    $txn_id = $_POST['txn_id'];
    $remarks = $_POST['remarks'];
    $status = $_POST['status'];

    $sql = "UPDATE withdrawls SET txn_id = ?, status = ?, remarks = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $txn_id, $status, $remarks, $id);

    if ($stmt->execute()) {

        if ($status == 'rejected') {
            $amount = $conn->query("SELECT amount FROM withdrawls WHERE user_id id='$id'")->fetch_assoc()['amount'] ?? 0;
            $conn->query("UPDATE users SET `withdraw_bal` = (withdraw_bal+$amount) WHERE id = '{$_POST['usr_id']}'");
        }
        echo "Withdrawal request updated successfully";
    } else {
        echo "Error updating withdrawal request";
    }

    $stmt->close();
    $conn->close();
}
