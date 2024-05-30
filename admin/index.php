<?php
include 'inc/header.php';
include 'inc/navbar.php';
include 'inc/sidebar.php';

// Fetch the number of deposits today
$deposits_today = $conn->query("SELECT COUNT(*) AS count FROM transactions WHERE type='recharge' AND DATE(created_at) = CURDATE()")->fetch_assoc()['count'];

// Fetch the number of new orders
$new_orders = $conn->query("SELECT COUNT(*) AS count FROM orders WHERE DATE(created_at) = CURDATE()")->fetch_assoc()['count'];

// Fetch the number of new users
$new_users = $conn->query("SELECT COUNT(*) AS count FROM users WHERE DATE(created_at) = CURDATE()")->fetch_assoc()['count'];

// Fetch the number of withdrawal requests pending
$withdrawal_requests_pending = $conn->query("SELECT COUNT(*) AS count FROM withdrawls WHERE status='pending'")->fetch_assoc()['count'];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $new_orders; ?></h3>
              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="orders.php" class="small-box-footer">View Orders <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php echo $new_users; ?></h3>
              <p>New Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="users.php" class="small-box-footer">View Users <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php echo $withdrawal_requests_pending; ?></h3>
              <p>Withdrawal Requests Pending</p>
            </div>
            <div class="icon">
              <i class="fa fa-rupee-sign"></i>
            </div>
            <a href="withdrawals.php" class="small-box-footer">View All <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo $deposits_today; ?></h3>
              <p>Deposits Today</p>
            </div>
            <div class="icon">
              <i class="fa fa-university"></i>
            </div>
            <a href="deposits.php" class="small-box-footer">View Deposits <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<?php include 'inc/footer.php'; ?>