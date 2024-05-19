<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>Admin Panel</title>
    <style>
        body {
            background-color: #20262E;
            color: #ABB2BF;
        }

        .sidebar {
            background-color: #2C323C;
            min-height: 100vh;
            padding-top: 20px;
        }

        .sidebar a {
            color: #ABB2BF;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
        }

        .sidebar a:hover {
            background-color: #3E4451;
            color: white;
        }

        .sidebar .active {
            background-color: #3E4451;
            color: white;
        }

        .main-content {
            padding: 20px;
        }

        .card {
            background-color: #2C323C;
            border: none;
        }

        .card-body {
            color: #FFFFFF;
        }

        .profile {
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <nav class="sidebar col-md-2">
            <div class="text-center mb-4">
                <h3 class="text-white">KAR CIZ</h3>
            </div>
            <a href="#" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="#eventSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-calendar-alt"></i> Event <span class="badge badge-pill badge-warning ml-2">2</span>
            </a>
            <ul class="collapse list-unstyled" id="eventSubmenu">
                <li>
                    <a href="#" class="pl-4">Add New</a>
                </li>
                <li>
                    <a href="#" class="pl-4">Check Schedule</a>
                </li>
                <li>
                    <a href="#" class="pl-4">Order List</a>
                </li>
            </ul>
            <div>
                <a class="fas fa-user" href="#">Bank Account</a>
            </div>
            <div>
                <a class="fas fa-user" href="#">Setting</a>
            </div>
            <div>
                <a class="fas fa-user" href="#">Recharge</a>
            </div>
            <div>
                <a class="fas fa-user" href="#">Withdraw</a>
            </div>
            <div>
                <a class="fas fa-user" href="#">Team</a>
            </div>
            <div>
                <a class="fas fa-user" href="#">Account Record</a>
            </div>
            <a href="#"><i class="fas fa-user"></i> Customer</a>
            <a href="#"><i class="fas fa-theater-masks"></i> Theater</a>
            <a href="#"><i class="fas fa-cogs"></i> Settings</a>
        </nav>
        <div class="main-content col-md-10">
            <div class="d-flex justify-content-end mb-4">
                <div class="profile">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="https://via.placeholder.com/40" alt="Profile">
                            <span>David</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">

                            <a class="dropdown-item" href="#">Settings</a>
                            <div class="dropdown-divider">
                                <a class="dropdown-item" href="#">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>