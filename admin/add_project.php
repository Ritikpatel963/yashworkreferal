<?php
include 'inc/header.php';
include 'inc/navbar.php';
include 'inc/sidebar.php';

$message = '';
$messageType = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $daily_inc = $_POST['daily_inc'];
    $total_inc = $_POST['total_inc'];
    $serving_time = $_POST['serving_time'];
    $price = $_POST['price'];

    // Handle file upload
    $target_dir = "../uploads/images/projects/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $message = "File is not an image.";
        $messageType = "error";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $message = "Sorry, file already exists.";
        $messageType = "error";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        $message = "Sorry, your file is too large.";
        $messageType = "error";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $messageType = "error";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $message = $message ?: "Sorry, your file was not uploaded.";
        $messageType = "error";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = "uploads/images/projects/" . basename($_FILES["image"]["name"]);

            $sql = "INSERT INTO projects (name, image, daily_inc, total_inc, serving_time, price) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssddsd", $name, $image, $daily_inc, $total_inc, $serving_time, $price);

            if ($stmt->execute()) {
                echo("<script>location.href = 'projects.php'</script>");
                exit();
            } else {
                $message = "Error adding project";
                $messageType = "error";
            }

            $stmt->close();
        } else {
            $message = "Sorry, there was an error uploading your file.";
            $messageType = "error";
        }
    }
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Project</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="daily_inc">Daily Income</label>
                                    <input type="number" step="0.01" name="daily_inc" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="total_inc">Total Income</label>
                                    <input type="number" step="0.01" name="total_inc" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="serving_time">Serving Time</label>
                                    <input type="number" step="1" name="serving_time" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" step="0.01" name="price" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Project</button>
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

<?php if ($message) : ?>
    <script>
        alert("<?php echo $message; ?>");
    </script>
<?php endif; ?>