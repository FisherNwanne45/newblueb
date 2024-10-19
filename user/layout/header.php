<?php
ob_start();
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . "/include/Function.php");

$user_id = userDetails('id');
if (isset($_SESSION["name"])) {
    if ((time() - $_SESSION['last_login_timestamp']) > 60) // 900 = 15 * 60  
    {
        header("location:logout");
    } else {
        $_SESSION['last_login_timestamp'] = time();
        echo "<h1 align='center'>" . $_SESSION["name"] . "</h1>";
        echo '<h1 align="center">' . $_SESSION['last_login_timestamp'] . '</h1>';
        echo "<p align='center'><a href='logout.php'>Logout</a></p>";
    }
}


if (!$_SESSION['acct_no']) {
    header("location:../login.php");
    exit;
}

$sql = "SELECT * FROM settings WHERE id ='1'";
$stmt = $conn->prepare($sql);
$stmt->execute();

$page = $stmt->fetch(PDO::FETCH_ASSOC);
 
$tawk = $page['tawk'];
$translate = $page['translate'];

$title = new pageTitle();
$email_message = new message();
$sendMail = new emailMessage();
$sendSms = new twilioController();

$user_id = userDetails('id');


$sql2 = "SELECT * FROM card WHERE user_id=:user_id";
$cardstmt = $conn->prepare($sql2);
$cardstmt->execute([
    'user_id' => $user_id
]);

$cardCheck = $cardstmt->fetch(PDO::FETCH_ASSOC);





?>

<!doctype html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport"
            content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="theme-color" content="#000000">
        <title>
            <?= $pageName ?> - <?= $web_title ?>
        </title>
        <meta name="description" content="<?= $web_title ?> Mobile Banking">
        <meta name="keywords" content="Reliable Online Service" />
        <link rel="icon" type="image/png" href="<?= $web_url ?>/assets/images/logo/favicon.png" sizes="32x32">
        <link rel="apple-touch-icon" sizes="180x180" href="<?= $web_url ?>/assets/images/logo/favicon.png">
        <link rel="stylesheet" href="<?= $web_url ?>/assets/panel/css/style.css">
        <link rel="manifest" href="__manifest.json">


        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
            integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>


    </head>

    <body>

        <!-- Menu for wider screens -->
        <div class="menu-wrapper"><br><br>
            <h6><?php echo $translate ?></h6><br>
            <small>
                <h6 style="display: flex; align-items: center;"><strong>Account Status: </strong> &nbsp;
                    <?php 
    if ($row['acct_status'] === 'active') {
        echo ' ACTIVE &nbsp; <span style="width: 12px; height: 12px; background-color: green; border-radius: 50%; display: inline-block; margin-right: 8px;"></span> ';
    } elseif ($row['acct_status'] === 'suspend') {
        echo ' ON HOLD &nbsp;<span style="width: 12px; height: 12px; background-color: red; border-radius: 50%; display: inline-block; margin-right: 8px;"></span> ';
    }
    ?>
                </h6>
            </small>
            <ul class="menu-list">
                <li>
                    <a href="dashboard.php">
                        &nbsp; <ion-icon name="speedometer"></ion-icon> &nbsp; &nbsp;
                        <!-- Ionicon for Dashboard -->
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#" class="submenu-toggle" onclick="toggleSubmenu()">
                        <!-- Add class submenu-toggle -->
                        &nbsp; <ion-icon name="swap-horizontal"></ion-icon> &nbsp;
                        <!-- Ionicon for Transfer -->
                        Transfer &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &gt;

                    </a>
                    <ul class="submenu">
                        <li><a href="interbank-transfer.php">Same Bank Transfer</a></li>
                        <li><a href="domestic-transfer.php">Domestic Transfer</a></li>
                        <li><a href="wire-transfer.php">Wire /International </a></li>
                    </ul>
                </li>
                <li>
                    <a href="deposit.php">
                        &nbsp; <ion-icon name="cash"></ion-icon> &nbsp; &nbsp;
                        <!-- Ionicon for Deposit -->
                        Deposit
                    </a>
                </li>
                <li>
                    <a href="transaction.php">
                        &nbsp; <ion-icon name="time"></ion-icon> &nbsp; &nbsp;
                        <!-- Ionicon for History -->
                        History
                    </a>
                </li>
                <li>
                    <a href="loan.php">
                        &nbsp; <ion-icon name="wallet"></ion-icon> &nbsp; &nbsp;
                        <!-- Ionicon for Loans -->
                        Loans
                    </a>
                </li>
                <li>
                    <a href="cards.php">
                        &nbsp; <ion-icon name="card"></ion-icon> &nbsp; &nbsp;
                        <!-- Ionicon for Cards -->
                        Cards
                    </a>
                </li>
                <li>
                    <a href="settings.php">
                        &nbsp; <ion-icon name="person-circle-outline"></ion-icon> &nbsp; &nbsp;
                        <!-- Ionicon for Settings -->
                        Profile
                    </a>
                </li>
                <li>
                    <a href="support.php">
                        &nbsp; <ion-icon name="headset"></ion-icon> &nbsp; &nbsp;
                        <!-- Ionicon for Support -->
                        Support
                    </a>
                </li>

                <li>
                    <a href="logout.php">
                        &nbsp; <ion-icon name="log-out-outline"></ion-icon> &nbsp; &nbsp;
                        <!-- Ionicon for Settings -->
                        Logout
                    </a>
                </li>
            </ul>
        </div>

        <!-- Rest of the header.php code... -->


        <!-- loader -->
        <!--<div id="loader">-->
        <!--    <img src="assets/img/loading-icon.png" alt="icon" class="loading-icon">-->
        <!--</div>-->
        <!-- * loader -->

        <div id="loader">
            <span class="spinner-grow spinner-grow-sm me-05" role="status" aria-hidden="true"
                class="loading-icon"></span>
            Loading...
        </div>



        <!-- App Capsule -->
        <div id="appCapsule">