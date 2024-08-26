<?php

$pageName  = "Send Money";
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/header.php");

// Ofofonobs Developer WhatsAPP +2348114313795


// Bank Script Developer - Use For Educational Purpose Only

// Other scripts Available
$user_id = userDetails('id');
 
if ($row['acct_status'] === 'suspend') {
    header('Location: dashboard.php?dormant#dormant');
	exit();
  }
?>

<!-- App Header -->
<div class="appHeader text-light btn-primary">
    <div class="left">
        <!--<a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#sidebarPanel">-->
        <!--    <ion-icon name="menu-outline"></ion-icon>-->
        <!--</a>-->
        <a href="<?= $web_url ?>/user/settings.php" class="headerButton">
           <?php
    // Fetch the image name from the database
    $user_image = $row['acct_image']; // Assuming $row contains the user data from the database

    // Define the path to the images directory
    $image_folder = $web_url . "/assets/user/profile/";

    // Set the default image
    $default_image = "default.png";

    // Check if the image exists and is not empty
    if (!empty($user_image) && file_exists($_SERVER['DOCUMENT_ROOT'] . "/assets/user/profile/" . $user_image)) {
        $image_to_display = $image_folder . $user_image;
    } else {
        $image_to_display = $image_folder . $default_image;
    }
?>

<!-- Display the image in HTML -->
<img src="<?= $image_to_display ?>" alt="image" class="imaged w32">
        </a>
    </div>
    <div class="pageTitle">
        <?= $pageName ?>
    </div>


    <div class="right">
        <a onclick="location.reload();" class="headerButton">
            <ion-icon name="refresh"></ion-icon>
        </a>
        <!-- <a href="<?= $web_url ?>/user/dashboard.php" class="headerButton">
                <ion-icon class="icon" name="notifications-outline"></ion-icon>
                <span class="badge badge-danger">New</span>
            </a> -->
    </div>
</div>
<!-- * App Header -->


<div class="listview-title mt-2">Send Money</div>
<ul class="listview image-listview inset">
    <li>
        <a href="<?= $web_url ?>/user/interbank-transfer.php" class="item">
            <div class="icon-box bg-primary">
                <ion-icon name="send"></ion-icon>
            </div>
            <div class="in">
                <div>Interbank Transfer
                    <div class="text-muted">Send to <?= $web_title ?> account.</div>
                </div>

            </div>
        </a>
    </li>
    <li>
        <a href="<?= $web_url ?>/user/domestic-transfer.php" class="item">
            <div class="icon-box bg-primary">
                <ion-icon name="send"></ion-icon>
            </div>
            <div class="in">
                <div>Domestic Transfer
                    <div class="text-muted">Send to a domestic account.</div>
                </div>

            </div>
        </a>
    </li>
    <li>
        <a href="<?= $web_url ?>/user/wire-transfer.php" class="item">
            <div class="icon-box bg-primary">
                <ion-icon name="send"></ion-icon>
            </div>
            <div class="in">
                <div>Wire Transfer
                    <div class="text-muted">Send wire transfer payment.</div>
                </div>

            </div>
        </a>
    </li>
    <li>
        <a href="<?= $web_url ?>/user/crypto-withdrawal.php" class="item">
            <div class="icon-box bg-primary">
                <ion-icon name="swap-vertical"></ion-icon>
            </div>
            <div class="in">
                <div>Cryptocurrency
                    <div class="text-muted">Recieve to your crypto wallets.</div>
                </div>

            </div>
        </a>
    </li>
  <!--  <li>
        <a href="#" class="item">
            <div class="icon-box bg-primary">
                <ion-icon name="book"></ion-icon>
            </div>
            <div class="in">
                <div>Cheque Payments
                    <div class="text-muted">Make cheque payments.</div>
                </div>
                <span class="text-danger">soon</span>
            </div>
        </a>
    </li>
    <li>
        <a href="#" class="item">
            <div class="icon-box bg-primary">
                <ion-icon name="pricetags"></ion-icon>
            </div>
            <div class="in">
                <div><?= $web_title ?> tag
                    <div class="text-muted">Send to <?= $web_title ?> user.</div>
                </div>
                <span class="text-danger">soon</span>
            </div>
        </a>
    </li>-->
</ul>


</div>

<!--
<div class="listview-title mt-2">Digital Payments</div>
<ul class="listview image-listview inset">

    <li>
        <a href="#" class="item">
            <div class="icon-box bg-primary">
                <ion-icon name="apps"></ion-icon>
            </div>
            <div class="in">
                <div>Scan QR code
                    <div class="text-muted">Send money using QR codes.</div>
                </div>
                <span class="text-danger">soon</span>
            </div>
        </a>
    </li>

</ul>

-->

<!-- Ofofonobs Developer WhatsAPP +2348114313795 -->

<?php
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/bottom.php");
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/footer.php");

?>