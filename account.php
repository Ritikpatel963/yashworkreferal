<title>My Account</title>
<?php include 'header.php'; ?>

<style>
    body {
        background-color: #101119;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        color: white;
        overflow-x: hidden;
    }

    .orders-section {
        margin-top: 20px;
        background: linear-gradient(180deg, rgba(4, 8, 20, 1) 0%, rgba(15, 37, 104, 1) 100%);
        padding: 20px;
        border-bottom: 2px solid #0800ff;
        border-radius: 12px;
    }

    .stat-box {
        background: transparent;
        color: white;
        padding: 20px;
        border-radius: 10px;
        position: relative;
    }

    .stat-title {
        font-size: 1.0rem;
    }

    .stat-value {
        font-size: 1rem;
        font-weight: bold;
    }

    .divider {
        position: absolute;
        top: 50%;
        right: 0;
        width: 1px;
        height: 80%;
        background-color: white;
        transform: translateY(-50%);
    }

    .logo {
        width: 100px;
        display: block;
        margin: 0 auto 20px;
    }

    .menu-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 15px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        transition: background 0.3s;
        color: white;
    }

    .menu-item:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .menu-item-icon {
        font-size: 1.5rem;
        width: 24px;
        height: 24px;
        color: #4839bb;
    }

    .menu-item-text {
        flex-grow: 1;
        margin-left: 15px;
        color: white;
    }

    .menu-section {
        margin: 20px auto;
    }

    a {
        text-decoration: none;
    }

    @media only screen and (max-width: 600px) {
        .stat-title {
            font-size: 0.8rem;
        }

        .stat-value {
            font-size: 0.8rem;
        }

        .divider {
            height: 60%;
            /* Adjust the height for smaller screens if needed */
        }
    }
</style>
<div class="container">
    <div class="container-fluid orders-section">
        <div class="row text-center">
            <div class="col-3 col-sm-3 position-relative">
                <div class="stat-box">
                    <p class="stat-title">Lifetime Profit</p>
                    <p class="stat-value">₹0.00</p>
                    <div class="divider"></div>
                </div>
            </div>
            <div class="col-3 col-sm-3 position-relative">
                <div class="stat-box">
                    <p class="stat-title">Total Balance</p>
                    <p class="stat-value">₹0.00</p>
                    <div class="divider"></div>
                </div>
            </div>
            <div class="col-3 col-sm-3 position-relative">
                <div class="stat-box">
                    <p class="stat-title">Total Balance</p>
                    <p class="stat-value">₹0.00</p>
                    <div class="divider"></div>
                </div>
            </div>
            <div class="col-3 col-sm-3">
                <div class="stat-box">
                    <p class="stat-title">Total Balance</p>
                    <p class="stat-value">₹0.00</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Section -->
<div class="container menu-section">
    <a href="add-bank.php">
        <div class="menu-item">
            <i class="fas fa-university menu-item-icon"></i>
            <span class="menu-item-text">Bank Account</span>
            <i class="fas fa-chevron-right"></i>
        </div>
    </a>
    <a href="personal-information.php">
        <div class="menu-item">
            <i class="fas fa-cog menu-item-icon"></i>
            <span class="menu-item-text">Settings</span>
            <i class="fas fa-chevron-right"></i>
        </div>
    </a>
    <a href="recharge.php">
        <div class="menu-item">
            <i class="fas fa-bolt menu-item-icon"></i>
            <span class="menu-item-text">Recharge</span>
            <i class="fas fa-chevron-right"></i>
        </div>
    </a>
    <div class="menu-item">
        <i class="fas fa-wallet menu-item-icon"></i>
        <span class="menu-item-text">Withdraw</span>
        </a>
        <i class="fas fa-chevron-right"></i>
    </div>
    <a href="team.php">
        <div class="menu-item">
            <i class="fas fa-users menu-item-icon"></i>
            <span class="menu-item-text">Team</span>
            <i class="fas fa-chevron-right"></i>
        </div>
    </a>
    <div class="menu-item">
        <i class="fas fa-file-alt menu-item-icon"></i>
        <span class="menu-item-text">Account Record</span>
        </a>
        <i class="fas fa-chevron-right"></i>
    </div>
    <a href="recharge-records.php">
    <div class="menu-item">
        <i class="fas fa-receipt menu-item-icon"></i>
        <span class="menu-item-text">Recharge Record</span>
        </a>
        <i class="fas fa-chevron-right"></i>
    </div>
    <a href="withdrawal-records.php">
    <div class="menu-item">
        <i class="fas fa-file-invoice-dollar menu-item-icon"></i>
        <span class="menu-item-text">Withdrawal Record</span>      
    </a>
        <i class="fas fa-chevron-right"></i>
    </div>
    <div class="menu-item">
        <i class="fas fa-info-circle menu-item-icon"></i>
        <span class="menu-item-text">About Us</span>
        <i class="fas fa-chevron-right"></i>
    </div>
    <div class="menu-item">
        <i class="fab fa-telegram-plane menu-item-icon"></i>
        <span class="menu-item-text">Telegram Channel</span>
        <i class="fas fa-chevron-right"></i>
    </div>
    <a href="logout.php">
        <div class="menu-item">
            <i class="fa-solid fa-right-from-bracket  menu-item-icon"></i>
            <span class="menu-item-text">Logout</span>
            <i class="fas fa-chevron-right"></i>
        </div>
    </a>
</div>

<?php include 'footer.php'; ?>
