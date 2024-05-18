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


<!-- Featured Section -->
<section class="container featured-section">
        <div class="content">
            <h1><b>Featured</b></h1>
            <p>Select a Project plan below to start your "Indus Power" journey. Click on it to enlarge the picture and view further product information.</p>
        </div>
    </section>

<!-- Featured Section Started -->
<div class="container mt-4">
        <div class="row">
            <div class="col-6 col-md-4 mb-4 featured-card">
                <div class="card">
                    <img src="assets/image/56.jpg" class="card-img-top" alt="Power Project A">
                    <div class="card-body">
                        <h5 class="card-title">Power Project A</h5>
                        <p class="card-text"><strong>Daily Income:</strong> ₹105</p>
                        <p class="card-text"><strong>Total Income:</strong> ₹9450</p>
                        <p class="card-text"><strong>Serving Time:</strong> 90 Days</p>
                        <a href="#" class="btn btn-primary">₹480</a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 mb-4 featured-card">
                <div class="card">
                    <img src="assets/image/56.jpg" class="card-img-top" alt="Power Project B">
                    <div class="card-body">
                        <h5 class="card-title">Power Project B</h5>
                        <p class="card-text"><strong>Daily Income:</strong> ₹420</p>
                        <p class="card-text"><strong>Total Income:</strong> ₹37800</p>
                        <p class="card-text"><strong>Serving Time:</strong> 90 Days</p>
                        <a href="#" class="btn btn-primary">₹1960</a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 mb-4 featured-card">
                <div class="card">
                    <img src="assets/image/56.jpg" class="card-img-top" alt="Power Project B">
                    <div class="card-body">
                        <h5 class="card-title">Power Project B</h5>
                        <p class="card-text"><strong>Daily Income:</strong> ₹420</p>
                        <p class="card-text"><strong>Total Income:</strong> ₹37800</p>
                        <p class="card-text"><strong>Serving Time:</strong> 90 Days</p>
                        <a href="#" class="btn btn-primary">₹1960</a>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php
include 'footer.php';
?>