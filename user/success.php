<?php
$pageName  = "Transaction Status";
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/header.php");


if (!isset($_SESSION['is_transfer'])) {
    header("Location:./dashboard.php");
}

if (!isset($_SESSION['dom_transfer'])) {
    header("Location:./dashboard.php");
}


unset($_SESSION['is_dom_transfer']);

unset($_SESSION['is_wire_transfer']);



//TEMP TRANSACTION FETCH
$sql = "SELECT * FROM transactions WHERE user_id =:user_id ORDER BY trans_id DESC LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->execute([
    'user_id' => $user_id
]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$transStatus = TranStatus($result);


$amount = $result['amount'];
$transactiontype = $result['trans_type'];
$WireFee = $page['wirefee'];
$DomesticFee = $page['domesticfee'];

?>

<body class="bg-white">

    <!-- App Header -->
    <div class="appHeader">
        <div class="left">
            <a href="<?= $web_url ?>/user/dashboard.php" class="headerButton goBack">
                <ion-icon name="home"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            Transaction Status
        </div>
        <div class="right">
            <a onclick="location.reload();" class="headerButton">
                <ion-icon name="refresh"></ion-icon>
            </a>
        </div>
    </div>
    <!-- * App Header -->



    <!-- App Capsule -->

    <div class="section mt-2 mb-2">


        <div class="listed-detail mt-3">
            <div class="icon-wrapper">
                <div class="iconbox">
                    <ion-icon name="hourglass"></ion-icon>
                </div>
            </div>
            <h3 class="text-center mt-2"><?= $transStatus ?></h3>
            <center>
                <p>You will be redirected in 15 seconds</p>
            </center>
            <script>
                var timer = setTimeout(function() {
                    window.location = '<?= $web_url ?>/user/dashboard.php'
                }, 15000);
            </script>
        </div>

        <ul class="listview flush transparent simple-listview no-space mt-3">
            <?php
            if ($transactiontype == 'Domestic transfer') {
            ?>
                <li>
                    <strong>Transaction Type</strong>
                    <span><?= $result['trans_type'] ?></span>
                </li>
                <li>
                    <strong>To</strong>
                    <span><?= $result['account_name'] ?></span>
                </li>
                <li>
                    <strong>Bank Name</strong>
                    <span><?= $result['bank_name'] ?></span>
                </li>
                <li>
                    <strong>Account Number</strong>
                    <span><?= $result['account_number'] ?></span>
                </li>
                <li>
                    <strong>Amount</strong>
                    <h3 class="m-0"><?= $currency ?><?php echo number_format($amount, 2, '.', ','); ?></h3>
                </li>
                <li>
                    <strong>Fee</strong>
                    <h3 class="m-0"><?= $currency ?><?php echo number_format($DomesticFee, 2, '.', ','); ?></h3>
                </li>
                <li>
                    <strong>Account Type</strong>
                    <span><?= $result['account_type'] ?></span>
                </li>
                <li>
                    <strong>Bank Country</strong>
                    <span><?= $result['bank_country'] ?></span>
                </li>
                <li>
                    <strong>Refrence ID</strong>
                    <span>#<?= $result['refrence_id'] ?></span>
                </li>
                <li>
                    <strong>Date</strong>
                    <span><?= $result['created_at'] ?></span>
                </li>

            <?php
            } elseif ($transactiontype == 'Wire transfer') {
            ?>


                <li>
                    <strong>Transaction Type</strong>
                    <span><?= $result['trans_type'] ?></span>
                </li>
                <li>
                    <strong>To</strong>
                    <span><?= $result['account_name'] ?></span>
                </li>
                <li>
                    <strong>Bank Name</strong>
                    <span><?= $result['bank_name'] ?></span>
                </li>
                <li>
                    <strong>Account Number</strong>
                    <span><?= $result['account_number'] ?></span>
                </li>
                <li>
                    <strong>Amount</strong>
                    <h3 class="m-0"><?= $currency ?><?php echo number_format($amount, 2, '.', ','); ?></h3>
                </li>
                <li>
                    <strong>Fee</strong>
                    <h3 class="m-0"><?= $currency ?><?php echo number_format($WireFee, 2, '.', ','); ?></h3>
                </li>
                <li>
                    <strong>Routine Number</strong>
                    <span><?= $result['routine_number'] ?></span>
                </li>
                <li>
                    <strong>Account Type</strong>
                    <span><?= $result['account_type'] ?></span>
                </li>
                <li>
                    <strong>Swift Code</strong>
                    <span><?= $result['swift_code'] ?></span>
                </li>
                <li>
                    <strong>Bank Country</strong>
                    <span><?= $result['bank_country'] ?></span>
                </li>
                <li>
                    <strong>Refrence ID</strong>
                    <span>#<?= $result['refrence_id'] ?></span>
                </li>
                <li>
                    <strong>Date</strong>
                    <span><?= $result['created_at'] ?></span>
                </li>


            <?php
            } elseif ($transactiontype == 'Interbank transfer') {
            ?>


                <li>
                    <strong>Transaction Type</strong>
                    <span><?= $result['trans_type'] ?></span>
                </li>
                <li>
                    <strong>To</strong>
                    <span><?= $result['account_name'] ?></span>
                </li>
                <li>
                    <strong>Account Number</strong>
                    <span><?= $result['account_number'] ?></span>
                </li>
                <li>
                    <strong>Amount</strong>
                    <h3 class="m-0"><?= $currency ?><?php echo number_format($amount, 2, '.', ','); ?></h3>
                </li>
                <li>
                    <strong>Refrence ID</strong>
                    <span>#<?= $result['refrence_id'] ?></span>
                </li>
                <li>
                    <strong>Date</strong>
                    <span><?= $result['created_at'] ?></span>
                </li>

            <?php
            } else {
            ?>


                <li>
                    <strong>Transaction Type</strong>
                    <span><?= $result['trans_type'] ?></span>
                </li>

                <li>
                    <strong>Amount</strong>
                    <h3 class="m-0"><?= $currency ?><?php echo number_format($amount, 2, '.', ','); ?></h3>
                </li>
                <li>
                    <strong>Refrence ID</strong>
                    <span>#<?= $result['refrence_id'] ?></span>
                </li>
                <li>
                    <strong>Status</strong>
                    <span><?= $result['trans_status'] ?></span>
                </li>
                <li>
                    <strong>Date</strong>
                    <span><?= $result['created_at'] ?></span>
                </li>



            <?php
            }
            ?>
        </ul><br>


        <div class="form-group basic">
            <div class="row">
                <div class="col-6">
                    <a href="<?= $web_url ?>/user/pay.php" class="btn btn-lg btn-danger cancel btn-block">Send Again</a>
                </div>
                <div class="col-6">
                    <a href="<?= $web_url ?>/user/dashboard.php" class="btn btn-lg btn-primary btn-block">Go Home</a>
                </div>
            </div>
        </div>


    </div>



    <!-- * App Capsule -->



    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/bottom.php");

    include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/footer.php");

    ?>