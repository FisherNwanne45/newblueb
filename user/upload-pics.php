<?php
session_start();
$pageName = "Upload Picture";
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/header.php");

// Ensure the user is authenticated
if (!isset($_SESSION['user_id'])) {
    die("Unauthorized access.");
}

$user_id = intval($_SESSION['user_id']); // Ensuring user_id is an integer

if (isset($_POST['upload_picture']) && isset($_FILES['image'])) {
    $file = $_FILES['image'];
    $name = basename($file['name']);
    $path = pathinfo($name, PATHINFO_EXTENSION);

    // Allowed file types
    $allowed = ['jpg', 'jpeg', 'png'];

    // Validate file extension
    if (!in_array(strtolower($path), $allowed)) {
        die("Invalid file type.");
    }

    // Verify MIME type
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    $allowed_mimes = ['image/jpeg', 'image/png', 'image/jpg'];

    if (!in_array($mime, $allowed_mimes)) {
        die("Invalid file type detected.");
    }

    // Secure unique filename generation
    $safe_name = uniqid() . '.' . $path;
    $destination = "../assets/user/profile/" . $safe_name;

    // Move file securely
    if (move_uploaded_file($file['tmp_name'], $destination)) {
        require_once $_SERVER['DOCUMENT_ROOT'] . "/config/database.php"; // Secure database connection

        $sql = "UPDATE users SET acct_image=:image WHERE id=:user_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'image' => $safe_name,
            'user_id' => $user_id
        ]);

        // Success message with a safe meta redirect
        $msg1 = "
        <div class='alert alert-success'>
            <meta http-equiv='refresh' content='3;url=./settings.php'>
            <center><img src='../assets/images/loading.gif' width='180px' /></center>
            <center><strong style='color:black;'>Uploaded Successfully, Redirecting...</strong></center>
        </div>";
    } else {
        $msg1 = "<div class='alert alert-danger'>File upload failed.</div>";
    }
}
?>

<!-- App Header -->
<div class="appHeader">
    <div class="left">
        <a href="javascript:history.go(-1)" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">
        <?= htmlspecialchars($pageName, ENT_QUOTES, 'UTF-8') ?>
    </div>
    <div class="right">
        <a onclick="location.reload();" class="headerButton">
            <ion-icon name="refresh"></ion-icon>
        </a>
    </div>
</div>
<!-- * App Header -->
<br>

<div class="col-12">
    <?php if (isset($msg1)) echo $msg1; ?>
    <br>
    <div class="card mb-5">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">Upload Picture</label><br>
                        <input type="file" required class="form-control" name="image" accept="image/jpeg, image/png" />
                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div><br>
                <div class="form-group basic">
                    <div class="row">
                        <div class="col-6">
                            <a href="./settings.php" class="btn btn-lg btn-danger btn-block">Go Back</a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-lg btn-primary btn-block"
                                name="upload_picture">Upload</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/bottom.php");
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/footer.php");
?>