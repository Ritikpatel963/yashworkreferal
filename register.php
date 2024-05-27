<?php
include 'inc/db.php';

// Generate a random referral code
function generateReferralCode($length = 6)
{
    return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST['phone_number'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $captcha = $_POST['captcha'];
    $refer_code = $_POST['refer_code'] ?: generateReferralCode();

    // Validate form data
    $errors = [];

    if (empty($phone)) {
        $errors[] = "Phone number is required.";
    }

    if (empty($password) || strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long.";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    if (empty($captcha)) {
        $errors[] = "Captcha is required.";
    } else if ($captcha != $_SESSION['captcha']) {
        $errors[] = "Wrong Captcha.";
    }

    if (empty($errors)) {
        $hashed_password = md5($password);

        // Insert data into database
        $stmt = $conn->prepare("INSERT INTO users (phone, password, refer_code) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $phone, $hashed_password, $refer_code);

        if ($stmt->execute()) {
            $_SESSION['user'] = $conn->insert_id;
            $_SESSION['user_no'] = $phone;
            $_SESSION['user_refer'] = $refer_code;

            echo "Registration successful!";
            header("location: index.php");
        }

        $stmt->close();
    } else {
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";

        echo "<script>setTimeout(function(){history.back();}, 2000)</script>";
        die;
    }
}
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Register</title>
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
        }

        .form-control-lg {
            font-size: 1.1em;
        }

        .captcha {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 1rem;
        }

        .captcha img {
            margin-right: 10px;
        }

        .captcha-input {
            flex: 1;
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
                                    <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                                    <p class="text-white-50 mb-5">Please fill in the form to create an account!</p>
                                    <div class="form-outline form-white mb-4">
                                        <div class="phone-input">
                                            <input type="tel" id="phone-number" name="phone_number" placeholder="Phone Number" required>
                                        </div>
                                    </div>
                                    <div class="captcha">
                                        <img src="captcha-image-url.php" alt="Captcha Image" id="captcha-image">
                                        <input type="text" id="captcha" name="captcha" placeholder="Enter Captcha" class="form-control captcha-input form-control-lg" required>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input type="password" id="typePasswordX" name="password" placeholder="Password (6 Characters)" class="form-control form-control-lg" required />
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input type="password" id="typePasswordConfirm" name="confirm_password" placeholder="Confirm Password" class="form-control form-control-lg" required />
                                    </div>
                                    <input type="hidden" name="refer_code" value="<?= $_GET['ref'] ?? '' ?>">
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>
                                </div>
                                <p class="mb-0">Already have an account? <a href="login.php" class="text-white-50 fw-bold">Login</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>