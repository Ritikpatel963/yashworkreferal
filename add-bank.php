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
            /* Prevent horizontal overflow */
        }

        .heading h2 {
            text-align: center;
            font-size: 1.5rem;

        }

        .orders-section {
            background: linear-gradient(180deg, rgba(4, 8, 20, 1) 0%, rgba(15, 37, 104, 1) 100%);
            padding: 20px 0;
            border-bottom: 2px solid #0800ff;
            border-radius: 0 0 12px 12px;
        }
    </style>
</head>

<body>
    <div class="container-fluid orders-section text-center">
        <h4>My bank Info</h4>
    </div>
    <div class="heading mt-5">
        <h2>Please enter your bank details below to withdraw your balance to your bank account.</h2>
    </div>
    <div class="container text-center">
        <div class="bank-details">
            <form>
                <div class="mb-3">
                    <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Enter your full name">
                </div>
                <div class="mb-3">
                <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter your bank card numbers">
                </div>
                <div class="mb-3">
                <input type="number" class="form-control" id="exampleInputEmail1"  placeholder="Enter your IFSC codes">
                </div>
                <div class="mb-3">
                <input type="phone" class="form-control" id="exampleInputEmail1"  placeholder="Phone Number">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <?php include 'footer.php'; ?>