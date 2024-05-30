<?php
include 'inc/header.php';
include 'inc/navbar.php';
include 'inc/sidebar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($_POST as $key => $value) {
        $stmt = $conn->prepare("INSERT INTO settings (setting_key, value) VALUES (?, ?) ON DUPLICATE KEY UPDATE value = ?");
        $stmt->bind_param("sss", $key, $value, $value);
        $stmt->execute();
        $stmt->close();
    }

    if (isset($_FILES['qr_code_image']) && $_FILES['qr_code_image']['error'] == 0) {
        $target_dir = "../uploads/images/";
        $imageFileType = strtolower(pathinfo($_FILES["qr_code_image"]["name"], PATHINFO_EXTENSION));
        $target_file = $target_dir . "qr-code" . '.' . $imageFileType;

        // Check if image file is an actual image or fake image
        $check = getimagesize($_FILES["qr_code_image"]["tmp_name"]);
        if ($check !== false) {
            // Allow certain file formats
            $allowed_types = ['jpg', 'png', 'jpeg', 'gif'];
            if (in_array($imageFileType, $allowed_types)) {
                if (move_uploaded_file($_FILES["qr_code_image"]["tmp_name"], $target_file)) {
                    $stmt = $conn->prepare("INSERT INTO settings (setting_key, value) VALUES (?, ?) ON DUPLICATE KEY UPDATE value = ?");
                    $setting_key = 'qr_code_image';
                    $stmt->bind_param("sss", $setting_key, $target_file, $target_file);
                    $stmt->execute();
                    $stmt->close();
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            } else {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }
        } else {
            echo "File is not an image.";
        }
    }
    $updated = 1;
}

// Fetch settings from the database
$sql = "SELECT `setting_key`, `value` FROM `settings`";
$result = $conn->query($sql);
$settings = [];
while ($row = $result->fetch_assoc()) {
    $settings[$row['setting_key']] = $row['value'];
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Settings</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Website Settings</h3>
                        </div>
                        <div class="card-body">
                            <?php if (isset($updated)) : ?>
                                <div class='alert alert-success'>Settings updated successfully</div>
                            <?php endif; ?>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="lvl1_commission">Level 1 Commission</label>
                                    <input type="text" class="form-control" id="lvl1_commission" name="lvl1_commission" value="<?php echo htmlspecialchars($settings['lvl1_commission'] ?? '', ENT_QUOTES); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="lvl2_commission">Level 2 Commission</label>
                                    <input type="text" class="form-control" id="lvl2_commission" name="lvl2_commission" value="<?php echo htmlspecialchars($settings['lvl2_commission'] ?? '', ENT_QUOTES); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="lvl3_commission">Level 3 Commission</label>
                                    <input type="text" class="form-control" id="lvl3_commission" name="lvl3_commission" value="<?php echo htmlspecialchars($settings['lvl3_commission'] ?? '', ENT_QUOTES); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="qr_code_image">QR Code Image</label>
                                    <input type="file" class="form-control" id="qr_code_image" name="qr_code_image" accept=".png">
                                    <?php if (isset($settings['qr_code_image'])) : ?>
                                        <img src="<?php echo htmlspecialchars($settings['qr_code_image'], ENT_QUOTES); ?>" alt="QR Code" style="max-width: 100px; margin-top: 10px;">
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="upi_id">UPI ID</label>
                                    <input type="text" class="form-control" id="upi_id" name="upi_id" value="<?php echo htmlspecialchars($settings['upi_id'] ?? '', ENT_QUOTES); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="telegram_link">Telegram Link</label>
                                    <input type="text" class="form-control" id="telegram_link" name="telegram_link" value="<?php echo htmlspecialchars($settings['telegram_link'] ?? '', ENT_QUOTES); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="registration_bonus">Registration Bonus</label>
                                    <input type="text" class="form-control" id="registration_bonus" name="registration_bonus" value="<?php echo htmlspecialchars($settings['registration_bonus'] ?? '', ENT_QUOTES); ?>">
                                </div>
                                <button type="submit" class="btn btn-primary">Save Settings</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
include 'inc/footer.php';
?>