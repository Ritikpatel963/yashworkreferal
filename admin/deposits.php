<?php
include 'inc/header.php';
include 'inc/navbar.php';
include 'inc/sidebar.php';

// Handle deletion request
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $conn->query("DELETE FROM transactions WHERE id = '$delete_id'");
    echo ("<script>alert('Transaction deleted successfully');location.href='transactions.php';</script>");
}

// Handle approve request
if (isset($_GET['approve_id'])) {
    $approve_id = $_GET['approve_id'];

    // Fetch the transaction details
    $transaction = $conn->query("SELECT * FROM transactions WHERE id = '$approve_id'")->fetch_assoc();
    if ($transaction) {
        if ($transaction['status'] != '1') {
            $user_id = $transaction['user_id'];
            $amount = $transaction['amt'];

            // Begin a transaction to ensure data consistency
            $conn->begin_transaction();

            try {
                // Update user's wallet
                $conn->query("UPDATE users SET wallet = wallet + $amount WHERE id = '$user_id'");

                // Update transaction status
                $conn->query("UPDATE transactions SET status = '1' WHERE id = '$approve_id'");

                // Commit transaction
                $conn->commit();

                echo ("<script>alert('Transaction approved successfully');location.href='deposits.php';</script>");
            } catch (Exception $e) {
                // Rollback transaction on error
                $conn->rollback();

                echo ("<script>alert('Error approving transaction');location.href='deposits.php';</script>");
            }
        } else {
            echo ("<script>alert('Transaction is already approved');location.href='deposits.php';</script>");
        }
    } else {
        echo ("<script>alert('Invalid transaction ID');location.href='deposits.php';</script>");
    }
}

// Fetch all transactions with user phone numbers
$result = $conn->query("
    SELECT t.id, t.user_id, t.type, t.amt, t.order_id, t.status, t.remarks, t.created_at, u.phone 
    FROM transactions t 
    JOIN users u ON t.user_id = u.id WHERE t.type = 'recharge' ORDER BY t.id DESC
");
?>

<!-- DataTables -->
<link rel="stylesheet" href="./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="./plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="./plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb2">
                <div class="col-sm-6">
                    <h1>Deposits</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Deposits List</h3>
                        </div>
                        <div class="card-body">
                            <table id="transactionsTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Phone</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Order ID</th>
                                        <th>Status</th>
                                        <th>Remarks</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    while ($row = $result->fetch_assoc()) : ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo htmlspecialchars($row['phone']); ?></td>
                                            <td><?php echo ucfirst(htmlspecialchars($row['type'])); ?></td>
                                            <td><?php echo htmlspecialchars($row['amt']); ?></td>
                                            <td><?php echo htmlspecialchars($row['order_id']); ?></td>
                                            <td><?php echo $row['status'] == '1' ? 'Confirmed' : 'Pending'; ?></td>
                                            <td><?php echo htmlspecialchars($row['remarks']); ?></td>
                                            <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                                            <td>
                                                <?php if ($row['type'] == 'recharge' && $row['status'] != '1') : ?>
                                                    <a href="deposits.php?approve_id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to approve this transaction?');">Approve</a>
                                                <?php endif; ?>
                                                <a href="deposits.php?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this transaction?');">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Phone</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Order ID</th>
                                        <th>Status</th>
                                        <th>Remarks</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
include 'inc/footer.php';
?>

<!-- DataTables  & Plugins -->
<script src="./plugins/datatables/jquery.dataTables.min.js"></script>
<script src="./plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="./plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="./plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="./plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="./plugins/jszip/jszip.min.js"></script>
<script src="./plugins/pdfmake/pdfmake.min.js"></script>
<script src="./plugins/pdfmake/vfs_fonts.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(function() {
        $("#transactionsTable").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#transactionsTable_wrapper .col-md-6:eq(0)');
    });
</script>