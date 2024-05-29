<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato&family=Poppins&display=swap');

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box
        }

        body {
            background-color: #777;
            font-family: 'Poppins', sans-serif
        }

        .wrapper {
            background-color: #222;
            min-height: 100px;
            max-width: 800px;
            margin: 10px auto;
            padding: 10px 30px
        }

        .dark,
        .input:focus {
            background-color: #222
        }

        .navbar {
            padding: 0.5rem 0rem
        }

        .navbar .navbar-brand {
            font-size: 30px
        }

        #income {
            border-right: 1px solid #bbb
        }

        .notify {
            display: none
        }

        .nav-item .nav-link .fa-bell-o,
        .fa-long-arrow-down,
        .fa-long-arrow-up {
            padding: 10px 10px;
            background-color: #444;
            border-radius: 50%;
            position: relative;
            font-size: 18px
        }

        .nav-item .nav-link .fa-bell-o::after {
            content: '';
            position: absolute;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background-color: #ffc0cb;
            right: 10px;
            top: 10px
        }

        .nav-item input {
            border: none;
            outline: none;
            box-shadow: none;
            padding: 3px 8px;
            width: 75%;
            color: #eee
        }

        .nav-item .fa-search {
            font-size: 18px;
            color: #bbb;
            cursor: pointer
        }

        .navbar-nav:last-child {
            display: flex;
            align-items: center;
            width: 40%
        }

        .navbar-nav .nav-item {
            padding: 0px 0px 0px 10px
        }

        .navbar-brand p {
            display: block;
            font-size: 14px;
            margin-bottom: 3px
        }

        .text {
            color: #bbb
        }

        .money {
            font-family: 'Lato', sans-serif
        }

        .fa-long-arrow-down,
        .fa-long-arrow-up {
            padding-left: 12px;
            padding-top: 8px;
            height: 30px;
            width: 30px;
            border-radius: 50%;
            font-size: 1rem;
            font-weight: 100;
            color: #28df99
        }

        .fa-long-arrow-up {
            color: #ffa500
        }

        .nav.nav-tabs {
            border: none
        }

        .nav.nav-tabs .nav-item .nav-link {
            color: #bbb;
            border: none
        }

        .nav.nav-tabs .nav-link.active {
            background-color: #222;
            border: none;
            color: #fff;
            border-bottom: 4px solid #fff
        }

        .nav.nav-tabs .nav-item .nav-link:hover {
            border: none;
            color: #eee
        }

        .nav.nav-tabs .nav-item .nav-link.active:hover {
            border-bottom: 4px solid #fff
        }

        .nav.nav-tabs .nav-item .nav-link:focus {
            border-bottom: 4px solid #fff;
            color: #fff
        }

        .table-dark {
            background-color: #222
        }

        .table thead th {
            text-transform: uppercase;
            color: #bbb;
            font-size: 12px
        }

        .table thead th,
        .table td,
        .table th {
            border: none;
            overflow: auto auto
        }

        td .fa-briefcase,
        td .fa-bed,
        td .fa-exchange,
        td .fa-cutlery {
            color: #ff6347;
            background-color: #444;
            padding: 5px;
            border-radius: 50%
        }

        td .fa-bed,
        td .fa-cutlery {
            color: #40a8c4
        }

        td .fa-exchange {
            color: #b15ac7
        }

        tbody tr td .fa-cc-mastercard,
        tbody tr td .fa-cc-visa {
            color: #bbb
        }

        tbody tr td.text-muted {
            font-family: 'Lato', sans-serif
        }

        tbody tr td .fa-long-arrow-up,
        tbody tr td .fa-long-arrow-down {
            font-size: 12px;
            padding-left: 7px;
            padding-top: 3px;
            height: 20px;
            width: 20px
        }

        .results span {
            color: #bbb;
            font-size: 12px
        }

        .results span b {
            font-family: 'Lato', sans-serif
        }

        .pagination .page-item .page-link {
            background-color: #444;
            color: #fff;
            padding: 0.3rem .75rem;
            border: none;
            border-radius: 0
        }

        .pagination .page-item .page-link span {
            font-size: 16px
        }

        .pagination .page-item.disabled .page-link {
            background-color: #333;
            color: #eee;
            cursor: crosshair
        }

        @media(min-width:768px) and (max-width: 991px) {
            .wrapper {
                margin: auto
            }

            .navbar-nav:last-child {
                display: flex;
                align-items: start;
                justify-content: center;
                width: 100%
            }

            .notify {
                display: inline
            }

            .nav-item .fa-search {
                padding-left: 10px
            }

            .navbar-nav .nav-item {
                padding: 0px
            }
        }

        @media(min-width: 300px) and (max-width: 767px) {
            .wrapper {
                margin: auto
            }

            .navbar-nav:last-child {
                display: flex;
                align-items: start;
                justify-content: center;
                width: 100%
            }

            .notify {
                display: inline
            }

            .nav-item .fa-search {
                padding-left: 10px
            }

            .navbar-nav .nav-item {
                padding: 0px
            }

            #income {
                border: none
            }
        }

        @media(max-width: 400px) {
            .wrapper {
                padding: 10px 15px;
                margin: auto
            }

            .btn {
                font-size: 12px;
                padding: 10px
            }

            .nav.nav-tabs .nav-link {
                padding: 10px
            }
        }
    </style>
</head>

<body>
    <div class="wrapper rounded">
        <div class="table-responsive mt-3">
            <table class="table table-dark table-borderless">
                <thead>
                    <tr>
                        <th scope="col">Activity</th>
                        <th scope="col">Mode</th>
                        <th scope="col">Date</th>
                        <th scope="col" class="text-right">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row"> <span class="fa fa-briefcase mr-1"></span> Coorg Trip </td>
                        <td><span class="fa fa-cc-mastercard"></span></td>
                        <td class="text-muted">12 Jul 2020, 12:30 PM</td>
                        <td class="d-flex justify-content-end align-items-center"> <span class="fa fa-long-arrow-up mr-1"></span> $52.9 </td>
                    </tr>
                    <tr>
                        <td scope="row"> <span class="fa fa-bed mr-1"></span> Hotel Leela Palace </td>
                        <td><span class="fa fa-cc-mastercard"></span></td>
                        <td class="text-muted">11 Jul 2020, 2:00 PM</td>
                        <td class="d-flex justify-content-end align-items-center"> <span class="fa fa-long-arrow-up mr-1"></span> $18.9 </td>
                    </tr>
                    <tr>
                        <td scope="row"> <span class="fa fa-exchange mr-1"></span> Monthly Salary </td>
                        <td><span class="fa fa-cc-visa"></span></td>
                        <td class="text-muted">10 Jul 2020, 8:30 PM</td>
                        <td class="d-flex justify-content-end align-items-center"> <span class="fa fa-long-arrow-down mr-1"></span> $9,765.00 </td>
                    </tr>
                    <tr>
                        <td scope="row"> <span class="fa fa-exchange mr-1"></span> Xbox Purchase </td>
                        <td><span class="fa fa-cc-mastercard"></span></td>
                        <td class="text-muted">12 May 2020, 4:30 PM</td>
                        <td class="d-flex justify-content-end align-items-center"> <span class="fa fa-long-arrow-up mr-1"></span> $198.90 </td>
                    </tr>
                    <tr>
                        <td scope="row"> <span class="fa fa-cutlery mr-1"></span> Dinner Party </td>
                        <td><span class="fa fa-cc-visa"></span></td>
                        <td class="text-muted">11 May 2020, 5:30 PM</td>
                        <td class="d-flex justify-content-end align-items-center"> <span class="fa fa-long-arrow-up mr-1"></span> $12.90 </td>
                    </tr>
                    <tr>
                        <td scope="row"> <span class="fa fa-briefcase mr-1"></span> Nandini Hills Ride </td>
                        <td><span class="fa fa-cc-mastercard"></span></td>
                        <td class="text-muted">10 May 2020, 01:30 PM</td>
                        <td class="d-flex justify-content-end align-items-center"> <span class="fa fa-long-arrow-up mr-1"></span> $97.9 </td>
                    </tr>
                    <tr>
                        <td scope="row"> <span class="fa fa-briefcase mr-1"></span> Goa Beach Party </td>
                        <td><span class="fa fa-cc-visa"></span></td>
                        <td class="text-muted">09 May 2020, 01:30 PM</td>
                        <td class="d-flex justify-content-end align-items-center"> <span class="fa fa-long-arrow-up mr-1"></span> $97.9 </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between align-items-center results"> <span class="pl-md-3">Showing<b class="text-white"> 1-7 0f 200 </b> trasactions</span>
            <div class="pt-3">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item disabled"> <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true">&lt;</span> </a> </li>
                        <li class="page-item"> <a class="page-link" href="#" aria-label="Next"> <span aria-hidden="true">&gt;</span> </a> </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
