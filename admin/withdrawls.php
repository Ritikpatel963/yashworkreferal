<?php
include 'inc/header.php';
include 'inc/navbar.php';
include 'inc/sidebar.php';

// Fetch withdrawal requests from the database
$sql = "SELECT w.id, w.user_id, u.name, u.ifsc_code, u.bank_acc_no, w.amount, w.txn_id, w.status, w.created_at, w.remarks 
        FROM withdrawls w 
        JOIN users u ON w.user_id = u.id";
$result = $conn->query($sql);
?>

<!-- DataTables -->
<link rel="stylesheet" href="./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="./plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="./plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Withdrawal Requests</h1>
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
                            <h3 class="card-title">Withdrawal Request List</h3>
                        </div>
                        <div class="card-body">
                            <table id="withdrawlsTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User Name</th>
                                        <th>Amount</th>
                                        <th>Transaction ID</th>
                                        <th>Status</th>
                                        <th>Remarks</th>
                                        <th>Account Number</th>
                                        <th>IFSC Code</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    while ($row = $result->fetch_assoc()) : ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['amount']; ?></td>
                                            <td><?php echo $row['txn_id'] ?? "N/A"; ?></td>
                                            <td><?php echo ucfirst($row['status']); ?></td>
                                            <td><?php echo $row['remarks'] ?? "N/A"; ?></td>
                                            <td><?php echo $row['bank_acc_no'] ?? "N/A"; ?></td>
                                            <td><?php echo $row['ifsc_code'] ?? "N/A"; ?></td>
                                            <td><?php echo $row['created_at']; ?></td>
                                            <td>
                                                <button class="btn btn-sm btn-warning" onclick="openModal(<?php echo $row['id']; ?>, '<?php echo $row['txn_id']; ?>', '<?php echo $row['status']; ?>', '<?php echo $row['remarks']; ?>', '<?php echo $row['user_id']; ?>')">Update Status</button>
                                                <a href="delete.php?withdrawal=1&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this withdrawl request?');">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>User Name</th>
                                        <th>Amount</th>
                                        <th>Transaction ID</th>
                                        <th>Status</th>
                                        <th>Remarks</th>
                                        <th>Account Number</th>
                                        <th>IFSC Code</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
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

<!-- Modal -->
<div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="approveModalLabel">Approve Withdrawal Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="approveForm">
                    <input type="hidden" id="withdrawl_id" name="withdrawl_id">
                    <div class="form-group">
                        <label for="txn_id">Transaction ID</label>
                        <input type="text" class="form-control" id="txn_id" name="txn_id">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="pending">Pending</option>
                            <option value="completed">Completed</option>
                            <option value="in progress">In Progress</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <input type="text" class="form-control" id="remarks" name="remarks">
                    </div>
                    <input type="hidden" id="usr_id" name="usr_id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="approveWithdrawl()">Save changes</button>
            </div>
        </div>
    </div>
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
        $("#withdrawlsTable").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#withdrawlsTable_wrapper .col-md-6:eq(0)');
    });

    function openModal(id, txn_id, status, remarks, usr_id) {
        $('#withdrawl_id').val(id);
        $('#txn_id').val(txn_id);
        $('#status').val(status);
        $('#remarks').val(remarks);
        $('#usr_id').val(usr_id);
        $('#approveModal').modal('show');
    }

    function approveWithdrawl() {
        var formData = $('#approveForm').serialize();

        $.ajax({
            type: 'POST',
            url: 'approve_withdrawl.php',
            data: formData,
            success: function(response) {
                alert(response);
                location.reload();
            },
            error: function() {
                alert('Error updating withdrawal request');
            }
        });
    }
</script>