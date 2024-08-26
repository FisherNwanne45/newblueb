<?php
$pageName  = "My Loan";
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/header.php");

// Ofofonobs Developer WhatsAPP +2348114313795


// Bank Script Developer - Use For Educational Purpose Only

// Other scripts Available

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

<!-- App Capsule -->

<!-- Wallet -->
<div class="section full gradientSection">
    <div class="in">
        <h5 class="title mb-2">Available Balance</h5>
        <h1 class="total"><?= $currency ?><?php echo number_format($loan_balance, 2, '.', ','); ?></h1>
        <div class="wallet-inline-button mt-5">


            <a href="<?= $web_url ?>/user/loan-request.php" class="item">
                <div class="iconbox">
                    <ion-icon name="arrow-down-outline"></ion-icon>
                </div>
                <strong>New Loan</strong>
            </a>

            <a href="<?= $web_url ?>/user/deposit.php" class="item">
                <div class="iconbox">
                    <ion-icon name="wallet"></ion-icon>
                </div>
                <strong>Pay Loan</strong>
            </a>



            <a href="<?= $web_url ?>/user/support.php" class="item">
                <div class="iconbox">
                    <ion-icon name="chatbubble-outline"></ion-icon>
                </div>
                <strong>Support</strong>
            </a>
        </div>
    </div>
</div>
<!-- * Wallet -->




<div class="col-12 mt-4">
    <div class="section-heading">
        <h2 class="title">Recent Loan</h2>
        <!--<a href="{{route('transaction.index')}}" class="link rippler rippler-bs-primary">View All</a>-->
    </div>

    <div class="section-full">
        <div class="transactions">
            <?php

            $sql2 = "SELECT * FROM transactions WHERE user_id =:user_id AND trans_type='Loan' ORDER BY trans_id DESC LIMIT 10";
            $wire = $conn->prepare($sql2);
            $wire->execute([
                'user_id' => $user_id
            ]);



            $sn = 1;

            while ($result = $wire->fetch(PDO::FETCH_ASSOC)) {

                $amount = $result['amount'];


            ?>

                <a href="./transaction-info.php?id=<?php echo $result['trans_id']; ?>" class="item">
                    <div class="detail">
                        <div>
                            <h2><?= $result['trans_type'] ?></h2>

                            <p><?= $result['created_at'] ?></p>
                        </div>
                    </div>
                    <div class="right">
                        <?php
                        if ($result['transaction_type'] === 'credit') {
                        ?>

                            <h2 class="text-success">
                                +<?php echo number_format($amount, 2, '.', ','); ?>
                            </h2>

                        <?php
                        } else {
                        ?>

                            <h2 class="text-danger">
                                -<?php echo number_format($amount, 2, '.', ','); ?>
                            </h2>

                        <?php
                        }
                        ?>


                    </div>
                </a>
            <?php

            }



            ?>


            <!-- <h5 class="text-center">No result found yet</h5> -->


        </div>

        <?php
        $sql2 = "SELECT * FROM transactions WHERE user_id =:user_id AND trans_type='Loan'";
        $stmt = $conn->prepare($sql2);
        $stmt->execute([
            'user_id' => $user_id
        ]);

        $cardCheck = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() == 0) {
        ?>
            <div class="transactions">
                <a href="#" class="item">

                    <h2>No transaction Yet</h2>

                </a>
            </div>

        <?php
        } else {

        ?>

            <div class="section mt-3 mb-3">
                <a href="<?= $web_url ?>/user/transaction.php" class="btn btn-lg btn-block btn-primary">Load More</a>
            </div>

        <?php
        }
        ?>
    </div>
</div>






<!-- Ofofonobs Developer WhatsAPP +2348114313795 -->

<?php
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/bottom.php");
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/footer.php");

?>