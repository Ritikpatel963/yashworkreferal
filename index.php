<?php
include 'header.php';
?>
<!-- Slider section -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="assets/image/banner-1.png" class="d-block w-100" alt="Slide 1">
        </div>
        <div class="carousel-item">
            <img src="assets/image/banner-1.png" class="d-block w-100" alt="Slide 2">
        </div>
        <div class="carousel-item">
            <img src="assets/image/banner-1.png" class="d-block w-100" alt="Slide 3">
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
                    <h2>₹60</h2>
                    <p class="text-small">( Min Withdrawal ₹120 )</p>
                    <p class="text-small">· Deposit Balance</p>
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
<?php
include 'footer.php';
?>