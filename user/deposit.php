<?php

$pageName  = "Add Money";
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/header.php");

// Ofofonobs Developer WhatsAPP +2348114313795

// Other scripts Available

// Bank Script Developer - Use For Educational Purpose Only

// Other scripts Available
$user_id = userDetails('id');

?>

<!-- App Header -->
<div class="appHeader text-light btn-primary">
    <div class="left">
        <!--<a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#sidebarPanel">-->
        <!--    <ion-icon name="menu-outline"></ion-icon>-->
        <!--</a>-->
        <a href="<?= $web_url ?>/user/settings.php" class="headerButton">
            <img src="<?= $web_url ?>/assets/user/profile/<?= $row['acct_image'] ?>" alt="image" class="imaged w32">
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



<div class="listview-title mt-2">Add Money</div>
<ul class="listview image-listview inset">
    <li>
        <a href="<?= $web_url ?>/user/crypto-deposit.php" class="item">
            <div class="icon-box bg-primary">
                <ion-icon name="logo-bitcoin"></ion-icon>
            </div>
            <div class="in">
                <div>Crypto Deposit
                    <div class="text-muted">Add money using cryptocurrency.</div>
                </div>

            </div>
        </a>
    </li>
    <li>
        <a href="#" class="item" data-bs-toggle="modal" data-bs-target="#depositActionSheet">
            <div class="icon-box bg-primary">
                <ion-icon name="send"></ion-icon>
            </div>
            <div class="in">
                <div>Bank Transfer
                    <div class="text-muted">Recieve money with bank details.</div>
                </div>

            </div>
        </a>
    </li>
    <li>
        <a href="<?= $web_url ?>/user/ticket.php" class="item">
            <div class="icon-box bg-primary">
                <ion-icon name="book"></ion-icon>
            </div>
            <div class="in">
                <div>Cheque Payments
                    <div class="text-muted">Recieve cheque payments.</div>
                </div>

            </div>
        </a>
    </li>

</ul>

<!-- Ofofonobs Developer WhatsAPP +2348114313795 -->

</div>


<div class="listview-title mt-2">Digital Payments</div>
<ul class="listview image-listview inset">

    <li>
        <a href="#" class="item">
            <div class="icon-box bg-primary">
                <ion-icon name="apps"></ion-icon>
            </div>
            <div class="in">
                <div>Share QR Code
                    <div class="text-muted">add money using QR codes.</div>
                </div>
            </div>
        </a>
    </li>

</ul>
<!-- Ofofonobs Developer WhatsAPP +2348114313795 -->


<!-- Ofofonobs Developer WhatsAPP +2348114313795 -->

<?php
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/bottom.php");
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/footer.php");



?>