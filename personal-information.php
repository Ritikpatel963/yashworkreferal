<?php
include 'inc/db.php';
if (!isset($_SESSION['user'])) {
    header("location: login.php");
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <title>Personal Information</title>
</head>

<body>
    <div class="container-fluid orders-section text-center">
        <h4>Personal Information</h4>
    </div>

    <div class="container">
        <div class="info-container w-100">
            <div class="info-item">
                <div>
                    <i class="fa fa-user"></i> ID
                </div>
                <div>
                    9729771689
                </div>
            </div>
            <div class="info-item change-password">
                <div>
                    <i class="fa fa-edit"></i> Change Password
                </div>
                <div>
                    <i class="fa fa-arrow-right"></i>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>