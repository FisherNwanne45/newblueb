<?php

$pageName  = "My Cards";
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/header.php");

// Ofofonobs Developer WhatsAPP +2348114313795


// Bank Script Developer - Use For Educational Purpose Only

// Other scripts Available
require_once($_SERVER['DOCUMENT_ROOT'] . "/include/Function/cardFunction.php");

$user_id = userDetails('id');


if (isset($_POST['hold_card'])) {
    $status = 3;
    $sql2 = "UPDATE card SET card_status=:card_status WHERE user_id=:user_id";
    $stmt = $conn->prepare($sql2);
    $stmt->execute([
        'card_status' => $status,
        'user_id' => $user_id
    ]);


    if (true) {
        $msg1 = "<div class='alert alert-warning'>
                            
                            <script type='text/javascript'>
                                 
                                    function Redirect() {
                                    window.location='./cards.php';
                                    }
                                    document.write ('');
                                    setTimeout('Redirect()', 3000);
                                 
                                    </script>
                                    
                            <center><img src='../assets/images/loading.gif' width='180px'  /></center>
                            
                            
                            <center>	<strong style='color:black;'>Please Wait while we validate your request...
                                   </strong></center>
                              </div>
                            ";
    } else {
        toast_alert('danger', 'Something went wrong!');
    }
}

if (isset($_POST['active_card'])) {
    $status = 1;

    $sql2 = "UPDATE card SET card_status=:card_status WHERE user_id=:user_id";
    $stmt = $conn->prepare($sql2);
    $stmt->execute([
        'card_status' => $status,
        'user_id' => $user_id
    ]);


    if (true) {

        $msg1 = "<div class='alert alert-warning'>
                            
                            <script type='text/javascript'>
                                 
                                    function Redirect() {
                                    window.location='./cards.php';
                                    }
                                    document.write ('');
                                    setTimeout('Redirect()', 3000);
                                 
                                    </script>
                                    
                            <center><img src='../assets/images/loading.gif' width='180px'  /></center>
                            
                            
                            <center>	<strong style='color:black;'>Please Wait while we validate your request...
                                   </strong></center>
                              </div>
                            ";
    } else {
        toast_alert('danger', 'Something went wrong!');
    }
}



?>
<!-- App Header -->
<div class="appHeader">
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

<!-- App Capsule -->
<div class="section mt-3">


    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs capsuled" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#ngn" role="tab">
                        Credit Card
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#usd" role="tab" disabled>
                        Debit Card (disabled)
                    </a>
                </li>

            </ul>
        </div>
    </div><br>

    <?php
    $sql2 = "SELECT * FROM card WHERE user_id=:user_id";
    $stmt = $conn->prepare($sql2);
    $stmt->execute([
        'user_id' => $user_id
    ]);

    $cardCheck = $stmt->fetch(PDO::FETCH_ASSOC);



    if ($stmt->rowCount() == 0) {
    ?>


        <div class="tab-content mt-1">
            <div class="tab-pane fade show active" id="ngn" role="tabpanel">

                <div class="card-block bg-dark mb-2">
                    <div class="card-main">
                        <div class="card-button dropdown">
                            <img src="<? $web_url ?>/assets/images/mastercard.png" alt="img" class="image-block imaged w48 lazy animate">

                        </div>
                        <div class="balance">
                            <span class="label"><?= $web_title ?></span>
                            <h1 class="title"><?= $fullName ?></h1>
                        </div>
                        <div class="in">
                            <div class="card-number">
                                <span class="label">Card Number</span>
                                XXXX-XXXX-XXXX-XXXX
                            </div>
                            <div class="bottom">
                                <div class="card-expiry">
                                    <span class="label">Expiry</span>
                                    XX / XX
                                </div>
                                <div class="card-ccv">
                                    <span class="label">CCV</span>
                                    XXX
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="section mt-2">
                    <center>
                        <div class="card-body pb-1">
                            <a href="#" class="btn btn-outline-warning me-1 mb-1" data-bs-toggle="modal" data-bs-target="#CardActionSheet">Request Card</a>
                            <a href="<?= $web_url ?>/user/support.php" type="button" class="btn btn-outline-info me-1 mb-1">Need Help?</a>

                        </div>
                    </center>
                </div><br>
                <!-- Wallet Card -->


                <div class="card">
                    <ul class="listview flush transparent image-listview text">
                        <li>
                            <a href="#" class="item">
                                <div class="in">
                                    <div>Card Balance
                                        <div class="text-muted">
                                            <?= $currency ?><?php echo number_format($acct_balance, 2, '.', ','); ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="item">
                                <div class="in">
                                    <div>Card Number
                                        <div class="text-muted">
                                            XXXX-XXX-XXXX-XXXX
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="item">
                                <div class="in">
                                    <div>Expiry Date
                                        <div class="text-muted">
                                            XX/XXXX
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>


                        <li>
                            <a href="#" class="item">
                                <div class="in">
                                    <div>CVC
                                        <div class="text-muted">
                                            ***
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>


                    </ul>
                </div>




                <!-- * carousel single -->
            </div>


            <div class="tab-pane fade" id="usd" role="tabpanel">

                <div class="card-block mb-2">
                    <div class="card-main">
                        <div class="card-button dropdown">
                            <img src="logo.png" alt="img" class="image-block imaged w48 lazy animate">

                        </div>
                        <div class="balance">
                            <span class="label"><?= $web_title ?></span>
                            <h1 class="title"><?= $fullName ?></h1>
                        </div>
                        <div class="in">
                            <div class="card-number">
                                <span class="label">Card Number</span>
                                XXXX-XXXX-XXXX-XXXX
                            </div>
                            <div class="bottom">
                                <div class="card-ccv">
                                    <img src="mastercard.png" alt="img" class="image-block imaged w48 lazy animate">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="section mt-2">
                    <center>
                        <div class="card-body pb-1">
                            <a href="<?= $web_url ?>/user/deposit.php" type="button" class="btn btn-outline-warning me-1 mb-1">Top-up</a>
                            <a href="<?= $web_url ?>/user/pay.php" type="button" class="btn btn-outline-info me-1 mb-1">Withdraw</a>
                            <button type="submit" class="btn btn-outline-dark me-1 mb-1" name="lock">Lock</button>
                        </div>
                    </center>
                </div><br>
                <!-- Wallet Card -->


                <div class="card">
                    <ul class="listview flush transparent image-listview text">
                        <li>
                            <a href="#" class="item">
                                <div class="in">
                                    <div>Card Balance
                                        <div class="text-muted">
                                            <?= $currency ?><?php echo number_format($acct_balance, 2, '.', ','); ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="item">
                                <div class="in">
                                    <div>Card Number
                                        <div class="text-muted">
                                            XXXX-XXX-XXXX-XXXX
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="item">
                                <div class="in">
                                    <div>Expiry Date
                                        <div class="text-muted">
                                            XX/XXXX
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>


                        <li>
                            <a href="#" class="item">
                                <div class="in">
                                    <div>CVC
                                        <div class="text-muted">
                                            ***
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="item">
                                <div class="in">
                                    <div>Billing Address
                                        <div class="text-muted">
                                            <?= $row['acct_address'] ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="item">
                                <div class="in">
                                    <div>State
                                        <div class="text-muted">
                                            <?= $row['state'] ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="item">
                                <div class="in">
                                    <div>Zipcode
                                        <div class="text-muted">
                                            <?= $row['zipcode'] ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>


                <br>

                <!-- * carousel single -->
            </div>

        </div>



    <?php
    } else {
    ?>



        <div class="tab-content mt-1">
            <div class="tab-pane fade show active" id="ngn" role="tabpanel">

                <div class="card-block bg-dark mb-2">
                    <div class="card-main">
                        <div class="card-button dropdown">
                            <img src="<? $web_url ?>/assets/images/mastercard.png" alt="img" class="image-block imaged w48 lazy animate">

                        </div>
                        <div class="balance">
                            <span class="label"><?= $web_title ?></span>
                            <h1 class="title"><?= $fullName ?></h1>
                        </div>
                        <div class="in">
                            <div class="card-number">
                                <span class="label">Card Number</span>
                                <?= $cardCheck['card_number'] ?>
                            </div>
                            <div class="bottom">
                                <div class="card-expiry">
                                    <span class="label">Expiry</span>
                                    <?= $cardCheck['card_expiration'] ?>
                                </div>
                                <div class="card-ccv">
                                    <span class="label">CCV</span>
                                    <?= $cardCheck['card_security'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <?php
                if ($cardCheck['card_status'] === '1') {
                ?>

                    <div class="section mt-2">
                        <center>
                            <form method="POST">
                                <div class="card-body pb-1">

                                    <button type="submit" name="hold_card" class="btn btn-outline-danger me-1 mb-1">Deactivate</button>
                                    <a href="<?= $web_url ?>/user/support.php" type="button" class="btn btn-outline-dark me-1 mb-1">Need Help?</a>
                                </div>
                            </form>
                        </center>
                    </div>
                    <!-- Wallet Card -->

                <?php
                }
                ?>


                <?php
                if ($cardCheck['card_status'] === '2') {
                ?>


                    <div class="section mt-2">
                        <center>

                            <div class="card-body pb-1">

                                <a href="<?= $web_url ?>/user/support.php" type="submit" class="btn btn-outline-danger me-1 mb-1">Pending</a>

                                <a href="<?= $web_url ?>/user/support.php" type="button" class="btn btn-outline-dark me-1 mb-1">Need Help?</a>
                            </div>
                            </form>
                        </center>
                    </div><br>
                    <!-- Wallet Card -->




                <?php
                }
                ?>




                <?php
                if ($cardCheck['card_status'] === '3') {
                ?>

                    <div class="section mt-2">
                        <center>
                            <form method="POST">
                                <div class="card-body pb-1">

                                    <button type="submit" name="active_card" class="btn btn-outline-primary me-1 mb-1">Activate</button>
                                    <a href="<?= $web_url ?>/user/support.php" type="button" class="btn btn-outline-dark me-1 mb-1">Need Help?</a>
                                </div>
                            </form>
                        </center>
                    </div>
                    <!-- Wallet Card -->

                <?php
                }
                ?>




                <?php if (isset($msg1)) echo $msg1; ?>
                <br>



                <div class="card">
                    <ul class="listview flush transparent image-listview text">
                        <li>
                            <a href="#" class="item">
                                <div class="in">
                                    <div>Card Balance
                                        <div class="text-muted">
                                            <?= $currency ?><?php echo number_format($acct_balance, 2, '.', ','); ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="item">
                                <div class="in">
                                    <div>Card Number
                                        <div class="text-muted">
                                            <?= $cardCheck['card_number'] ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="item">
                                <div class="in">
                                    <div>Expiry Date
                                        <div class="text-muted">
                                            <?= $cardCheck['card_expiration'] ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>


                        <li>
                            <a href="#" class="item">
                                <div class="in">
                                    <div>CVC
                                        <div class="text-muted">
                                            <?= $cardCheck['card_security'] ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="item">
                                <div class="in">
                                    <div>Billing Address
                                        <div class="text-muted">
                                            <?= $row['acct_address'] ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="item">
                                <div class="in">
                                    <div>State
                                        <div class="text-muted">
                                            <?= $row['state'] ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="item">
                                <div class="in">
                                    <div>Zipcode8
                                        <div class="text-muted">
                                            <?= $row['zipcode'] ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>





                <!-- * carousel single -->
            </div>


            <div class="tab-pane fade" id="usd" role="tabpanel">

                <div class="card-block mb-2">
                    <div class="card-main">
                        <div class="card-button dropdown">
                            <img src="logo.png" alt="img" class="image-block imaged w48 lazy animate">

                        </div>
                        <div class="balance">
                            <span class="label"><?= $web_title ?></span>
                            <h1 class="title"><?= $fullName ?></h1>
                        </div>
                        <div class="in">
                            <div class="card-number">
                                <span class="label">Card Number</span>
                                XXXX-XXXX-XXXX-XXXX
                            </div>
                            <div class="bottom">
                                <div class="card-ccv">
                                    <img src="mastercard.png" alt="img" class="image-block imaged w48 lazy animate">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="section mt-2">
                    <center>
                        <div class="card-body pb-1">
                            <a href="<?= $web_url ?>/user/deposit.php" type="button" class="btn btn-outline-warning me-1 mb-1">Top-up</a>
                            <a href="<?= $web_url ?>/user/pay.php" type="button" class="btn btn-outline-info me-1 mb-1">Withdraw</a>
                            <button type="submit" class="btn btn-outline-dark me-1 mb-1" name="lock">Lock</button>
                        </div>
                    </center>
                </div><br>
                <!-- Wallet Card -->


                <div class="card">
                    <ul class="listview flush transparent image-listview text">
                        <li>
                            <a href="#" class="item">
                                <div class="in">
                                    <div>Card Balance
                                        <div class="text-muted">
                                            <?= $currency ?><?php echo number_format($acct_balance, 2, '.', ','); ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="item">
                                <div class="in">
                                    <div>Card Number
                                        <div class="text-muted">
                                            <?= $cardCheck['card_number'] ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="item">
                                <div class="in">
                                    <div>Expiry Date
                                        <div class="text-muted">
                                            <?= $cardCheck['card_expiration'] ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>


                        <li>
                            <a href="#" class="item">
                                <div class="in">
                                    <div>CVC
                                        <div class="text-muted">
                                            <?= $cardCheck['card_security'] ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="item">
                                <div class="in">
                                    <div>Billing Address
                                        <div class="text-muted">
                                            <?= $row['acct_address'] ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="item">
                                <div class="in">
                                    <div>State
                                        <div class="text-muted">
                                            <?= $row['state'] ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="item">
                                <div class="in">
                                    <div>Zipcode8
                                        <div class="text-muted">
                                            <?= $row['zipcode'] ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>


                <br>

                <!-- * carousel single -->
            </div>

        </div>






    <?php
    }
    ?>




    <!-- Bonus Action Sheet -->
    <div class="modal fade action-sheet" id="CardActionSheet" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">

                    <div class="card-body mb-3">



                        <form autocomplete="off" method="post">




                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label for="">Transaction Pin <small class="text-danger">(required)</small></label>
                                    <input type="text" class="form-control" inputmode="numeric" required pattern="[0-9]+" maxlength="4" autocomplete="off" style="margin-bottom: 5px" placeholder="Your 4 Digit Transaction Pin" name="pin">
                                    <small><a href="<?= $web_url ?>/user/ticket.php" class="text-color">Forget account
                                            pin? click to reset</a></small>
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>



                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block mt-10 btn-lg" name="card_generate" id="">Request Card - <?= $currency ?><?= $page['cardfee'] ?>
                                    Fee</button>
                            </div>


                        </form>




                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * Card Action Sheet -->

    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/bottom.php");

    include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/footer.php");

    ?>