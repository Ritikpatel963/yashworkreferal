<?php
include 'inc/header.php';
include 'inc/navbar.php';
include 'inc/sidebar.php';

if (!isset($_GET['usr_id'])) {
    echo "User ID not provided";
    exit;
}

$userId = intval($_GET['usr_id']);
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User's Team</h1>
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
                            <h3 class="card-title">Referred Users (Up to 3 Levels)</h3>
                        </div>
                        <div class="card-body">
                            <div>
                                <h4>Level 1:</h4>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Number Of Members</th>
                                            <th>Commision</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT id FROM users WHERE referrer_code = (SELECT refer_code FROM users WHERE id = $userId)";
                                        $result = $conn->query($sql);
                                        ?>
                                        <tr>
                                            <td><?= $result->num_rows ?></td>
                                            <td>N/A</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-2">
                                <h4>Level 2:</h4>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Number Of Members</th>
                                            <th>Commision</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT id FROM users WHERE referrer_code IN (SELECT refer_code FROM users WHERE referrer_code IN (SELECT refer_code FROM users WHERE id = $userId))";
                                        $result = $conn->query($sql);
                                        ?>
                                        <tr>
                                            <td><?= $result->num_rows ?></td>
                                            <td>N/A</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-2">
                                <h4>Level 3:</h4>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Number Of Members</th>
                                            <th>Commision</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT id FROM users WHERE referrer_code IN (SELECT refer_code FROM users WHERE referrer_code IN (SELECT refer_code FROM users WHERE referrer_code = (SELECT refer_code FROM users WHERE id = $userId)))";
                                        $result = $conn->query($sql);
                                        ?>
                                        <tr>
                                            <td><?= $result->num_rows ?></td>
                                            <td>N/A</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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