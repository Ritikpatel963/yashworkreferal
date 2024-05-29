<?php
include 'inc/header.php';
include 'inc/navbar.php';
include 'inc/sidebar.php';
?>

<!-- DataTables -->
<link rel="stylesheet" href="./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="./plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="./plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2"></div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <h3 class="card-title">Orders</h3>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Order ID</th>
                                        <th>User ID</th>
                                        <th>Project Name</th>
                                        <th>Amount</th>
                                        <th>Daily income</th>
                                        <th>Total income</th>
                                        <th>Serving Time</th>
                                        <th>Status</th>
                                        <th>Order Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $orders = $conn->query("SELECT o.*, u.phone, p.name, p.daily_inc, p.total_inc, p.serving_time FROM orders o LEFT JOIN users u ON u.id = o.user_id LEFT JOIN projects p ON p.id = o.project_id ORDER BY o.id DESC");
                                    foreach ($orders as $key => $order) {
                                    ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $order['order_id'] ?></td>
                                            <td><?= $order['phone'] ?></td>
                                            <td><?= $order['name'] ?></td>
                                            <td><?= $order['amount'] ?></td>
                                            <td><?= $order['daily_inc'] ?></td>
                                            <td><?= $order['total_inc'] ?></td>
                                            <td><?= $order['serving_time'] ?></td>
                                            <td><?= $order['status'] == 0 ? "Pending" : "Confirmed" ?></td>
                                            <td><?= date("d-m-Y", strtotime($order['created_at'])) ?></td>
                                            <td><a href="delete.php?order=1&id=<?= $order['id'] ?>" class="btn btn-sm btn-danger">DELETE</a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Order ID</th>
                                        <th>User ID</th>
                                        <th>Project Name</th>
                                        <th>Amount</th>
                                        <th>Daily income</th>
                                        <th>Total income</th>
                                        <th>Serving Time</th>
                                        <th>Status</th>
                                        <th>Order Date</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
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
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>