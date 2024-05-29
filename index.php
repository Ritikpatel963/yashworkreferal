<?php
include 'header.php';
?>
<!-- Slider section -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="assets/image/baanner1.jpeg" class="d-block w-100" alt="Slide 1">
        </div>
        <div class="carousel-item">
            <img src="assets/image/baanner2.jpeg" class="d-block w-100" alt="Slide 2">
        </div>
        <div class="carousel-item">
            <img src="assets/image/baanner3.jpeg" class="d-block w-100" alt="Slide 3">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- marquee section -->
<div class="" style="padding-left:18px;">
    <div class="marquee-container">
        <div class="fixed-icon">
            <i class="fa-solid fa-volume-high" style="color: white;"></i>
        </div>
        <div class="marquee-content">
            <p>This is a vertically scrolling marquee example.</p>
            <p>You can add any content here.</p>
            <p>It will scroll from bottom to top.</p>
        </div>
    </div>
</div>


<!-- First section -->
<div class="container mt-5">
    <div class="row">
        <!-- Balance Card -->
        <div class="col-md-6">
            <div class="card-custom">
                <div>
                    <h5>My Balance</h5>
                    <h2>₹<?= number_format(($conn->query("SELECT wallet FROM users WHERE id='{$_SESSION['user']}'")->fetch_assoc()['wallet']), 2) ?></h2>
                    <p class="text-small">Min. Withdrawl 500</p>
                    <p class="text-small">Your Deposit Balance</p>
                </div>
                <div>
                    <i class="fas fa-wallet icon"></i>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <!-- Referral Card -->
                <div class="col-md-12">
                    <div class="card-referral">
                        <div>
                            <h5>Get Referral Link</h5>
                            <p class="text-small">( Invite Friends, Get Paid )</p>
                        </div>
                        <div>
                            <i class="fas fa-user-friends icon"></i>
                        </div>
                    </div>
                </div>
                <!-- Telegram Card -->
                <div class="col-md-12">
                    <div class="card-telegram">
                        <div>
                            <h5>Telegram Channel</h5>
                        </div>
                        <div>
                            <i class="fas fa-bolt icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Featured Section -->
<section class="container featured-section">
    <div class="content">
        <h1><b>Featured</b></h1>
        <p>Select a Project plan below to start your journey.</p>
    </div>
</section>

<!-- Featured Section Started -->
<div class="container mt-4">
    <div class="row">
        <?php
        $projects = $conn->query("SELECT * FROM projects");
        if ($projects->num_rows > 0) {
            foreach ($projects as $project) {
        ?>
                <div class="col-6 col-md-4 mb-4 featured-card">
                    <div class="card">
                        <img src="<?php echo $project['image']; ?>" class="card-img-top" alt="<?= $project['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $project['name'] ?></h5>
                            <p class="card-text"><strong>Daily Income:</strong> ₹<?= $project['daily_inc'] ?></p>
                            <p class="card-text"><strong>Total Income:</strong> ₹<?= $project['total_inc'] ?></p>
                            <p class="card-text"><strong>Serving Time:</strong> <?= $project['serving_time'] ?> Days</p>
                            <a href="book_project.php?id=<?= $project['id'] ?>" onclick="javascript: return confirm('Are you sure you want to purchase this project?')" class="btn btn-primary">₹<?= $project['price'] ?></a>
                        </div>
                    </div>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="col-12 col-md-12 mb-4">
                <h4 class="text-white">No Projects Available Currently</h4>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<div class="upperfooter" style="padding-bottom: 100px;">
    <div class="upperfooter-content">
        <div class="upperfooter-logo">
            <img src="assets/image/logo.png" alt="Company Logo">
        </div>
        <div class="upperfooter-text">
            <p>DS-1, 465, Sec. 10, Ukraine</p>
            <p>2007 © Indus Power All Rights Reserved</p>
        </div>
        <div class="upperfooter-links">
            <a href="#">Terms of Service</a> |
            <a href="#">Privacy Policy</a> |
            <a href="#">Risk Disclosure Agreement</a>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>