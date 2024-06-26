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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <title>Homepage</title>
</head>

<body>
    <!-- Just an image -->
    <nav class="navbar navbar-light">
        <div class="container">
            <div class="navbar-brand mx-auto">
                <img src="assets/image/logo.png" width="70" height="70" alt="">
            </div>
        </div>
    </nav>