<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <title>Add Bank</title>
    <style>
        body {
            background-color: #101119;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            color: white;
            overflow-x: hidden;
        }

        .heading h2 {
            text-align: center;
            font-size: 1rem;

        }

        .heading {
            margin-top: 20px;
            color: #ffffff;
        }

        .bank-details form {
            margin: auto;
        }

        .form-control {
            margin-bottom: 15px;
        }

        .mb-3 {
            margin-bottom: 2.5rem !important;
        }

        .caution-box {
            display: flex;
            align-items: center;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            margin: 20px 0;
            background: #293C3B;
            border: 1px solid #787E2F;
        }

        .caution-box .icon {
            margin-right: 10px;
            font-size: 1.5em;
        }

        .fas {
            color: #ffcb00 !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid orders-section text-center">
        <h4>My bank Info</h4>
    </div>
    <div class="container">
        <div class="heading mt-5">
            <h2>Please enter your bank details below to withdraw your balance to your bank account.</h2>
        </div>
    </div>
    <div class="container text-center mt-5">
        <div class="bank-details">
            <form>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Enter your full name">
                </div>
                <div class="mb-3">
                    <input type="number" class="form-control" placeholder="Enter your bank card numbers">
                </div>
                <div class="mb-3">
                    <input type="text" maxlength="11" class="form-control" placeholder="Enter your IFSC code">
                </div>
                <button type="submit" class="btn btn-primary submit">Submit</button>
            </form>

            <div class="caution-box">
                <i class="fas fa-exclamation-triangle icon"></i>
                <span>Please type the information of bank account accurately. We will not be responsible for capital loss caused by information </span>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>