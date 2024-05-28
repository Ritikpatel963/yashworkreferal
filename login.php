<?php
include 'inc/db.php';

if (isset($_SESSION['user'])) {
    header("Location: index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST['phone_number'];
    $password = $_POST['password'];

    // Validate inputs
    if (empty($phone) || empty($password)) {
        $error = "<p class='text-danger'>Phone number and password are required.</p>";
    }

    if (!isset($error)) {
        // Hash the password with MD5 (Not recommended for production use)
        $hashed_password = md5($password);

        // Query the database for the user
        $stmt = $conn->prepare("SELECT * FROM users WHERE phone = ? AND password = ?");
        $stmt->bind_param("ss", $phone, $hashed_password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // User found
            $user = $result->fetch_assoc();
            $_SESSION['user'] = $user['id'];
            $_SESSION['user_no'] = $user['phone'];
            $_SESSION['user_refer'] = $user['refer_code'];
            $_SESSION['user_referrer'] = $user['referrer_code'];

            // Redirect to a secure page or dashboard
            header("Location: index.php");
            exit();
        } else {
            // User not found
            $error = "Invalid phone number or password.";
        }
    }

    $stmt->close();
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Login</title>
    <style>
        .gradient-custom {
            background: linear-gradient(to right, rgb(207, 25, 223), rgb(73, 22, 134));
        }

        .phone-input {
            display: flex;
            justify-content: center;
            align-content: center;
            align-items: center;
        }

        .country-code {
            display: flex;
            align-items: center;
            padding: 11px;
        }

        #country-code {
            background-color: white;
        }

        .country-code select {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px 0 0 5px;
            appearance: none;
            /* Remove default dropdown arrow */
            background: transparent;
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 16px;
        }

        #phone-number {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 0 5px 5px 0;
            border-left: none;
            flex: 1;
            width: 100%;
            padding: 10px;
        }

        .form-control-lg {
            font-size: 1.1em
        }
    </style>
</head>

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <form method="POST" action="">
                                <div class="mb-md-5 mt-md-4 pb-3">
                                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                    <p class="text-white-50 mb-5">Please enter your login and password!</p>

                                    <?php
                                    if (isset($error)) {
                                    ?>
                                        <div class="alert alert-danger"><?= $error ?></div>
                                    <?php
                                    }
                                    ?>

                                    <div class="form-outline form-white mb-4">
                                        <div class="phone-input">
                                            <input type="tel" id="phone-number" name="phone_number" placeholder="Phone Number" required>
                                        </div>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input type="password" id="typePasswordX" name="password" placeholder="Password" class="form-control form-control-lg" required />
                                    </div>
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                                </div>
                                <p class="mb-0">Don't have an account? <a href="register.php" class="text-white-50 fw-bold">Signup</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>