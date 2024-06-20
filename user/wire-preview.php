<?php
$pageName  = "Transaction Preview";
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/header.php");

// Ofofonobs Developer WhatsAPP +2348114313795


// Bank Script Developer - Use For Educational Purpose Only

// Other scripts Available
require_once($_SERVER['DOCUMENT_ROOT'] . "/include/Transfer/WireFunction.php");

if (!$_SESSION['is_wire_transfer']) {
    header("Location:./dashboard.php");
}

// //TEMP TRANSACTION FETCH
$sql = "SELECT * FROM temp_trans WHERE user_id =:user_id AND trans_type='Wire transfer' ORDER BY trans_id DESC LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->execute([
    'user_id' => $user_id
]);
$temp_trans = $stmt->fetch(PDO::FETCH_ASSOC);

$WireFee = $page['wirefee'];
$DomesticFee = $page['domesticfee'];

$amount = $temp_trans['amount'];
?>

<body class="bg-white">

    <!-- App Header -->
    <div class="appHeader">
        <div class="left">
            <a href="<?= $web_url ?>/user/wire-transfer.php" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            Transaction Preview
        </div>
        <div class="right">
            <a onclick="location.reload();" class="headerButton">
                <ion-icon name="refresh"></ion-icon>
            </a>
        </div>
    </div>
    <!-- * App Header -->



    <!-- App Capsule -->
    <div id="appCapsule" class="full-height">

        <div class="section mt-2 mb-2">


            <div class="listed-detail mt-3">
                <div class="icon-wrapper">
                    <div class="iconbox">
                        <ion-icon name="eye"></ion-icon>
                    </div>
                </div>
                <h3 class="text-center mt-2">Preview Transaction</h3>
            </div>

            <ul class="listview flush transparent simple-listview no-space mt-3">
                <li>
                    <strong>To</strong>
                    <span><?= $temp_trans['account_name'] ?></span>
                </li>
                <li>
                    <strong>Bank Name</strong>
                    <span><?= $temp_trans['bank_name'] ?></span>
                </li>
                <li>
                    <strong>Account Number</strong>
                    <span><?= $temp_trans['account_number'] ?></span>
                </li>
                <li>
                    <strong>Amount</strong>
                    <h3 class="m-0"><?= $currency ?><?php echo number_format($amount, 2, '.', ','); ?></h3>
                </li>
                <li>
                    <strong>Fee</strong>
                    <h3 class="m-0"> <?= $page['wirefee'] ?></h3>
                </li>
                <li>
                    <strong>Routine Number</strong>
                    <span><?= $temp_trans['routine_number'] ?></span>
                </li>
                <li>
                    <strong>Swift Code</strong>
                    <span><?= $temp_trans['swift_code'] ?></span>
                </li>
                <li>
                    <strong>Account Type</strong>
                    <span><?= $temp_trans['account_type'] ?></span>
                </li>

                <li>
                    <strong>Bank Country</strong>
                    <span><?= $temp_trans['bank_country'] ?></span>
                </li>
                <li>
                    <strong>Refrence ID</strong>
                    <span>#<?= $temp_trans['refrence_id'] ?></span>
                </li>
            </ul>


            <br>
            <div class="form-group basic">
                <div class="row">
                    <div class="col-6">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#DialogBasic" class="btn btn-lg btn-danger cancel btn-block">Cancel</a>
                    </div>
                    <div class="col-6">
                        <form method="POST">
                            <input type="number" value="<?= $temp_trans['amount'] ?>" name="amount" hidden id="amount">
                            <input type="text" value="<?= $temp_trans['bank_name'] ?>" name="bank_name" hidden id="bank_name">
                            <input type="text" value="<?= $temp_trans['account_name'] ?>" name="account_name" hidden id="account_name">
                            <input type="number" value="<?= $temp_trans['account_number'] ?>" name="account_number" hidden id="account_number">
                            <input type="text" value="<?= $temp_trans['account_type'] ?>" name="account_type" hidden id="account_type">
                            <input type="text" value="<?= $temp_trans['trans_type'] ?>" name="trans_type" hidden id="trans_type">
                            <input type="text" value="<?= $temp_trans['bank_country'] ?>" name="bank_country" hidden id="bank_country">
                            <input type="number" value="<?= $temp_trans['user_id'] ?>" name="user_id" id="user_id" hidden>
                            <input type="text" value="<?= $temp_trans['routine_number'] ?>" name="routine_number" id="routine_number" hidden>
                            <input type="text" value="<?= $temp_trans['swift_code'] ?>" name="swift_code" id="swift_code" hidden>



                            <button class="btn btn-lg btn-primary btn-block" type="submit" name="wire-preview">Proceed</button>

                        </form>

                    </div>
                </div>
            </div>



        </div>

    </div>
    <!-- * App Capsule -->


    <!-- Dialog Basic -->
    <div class="modal fade dialogbox" id="DialogBasic" data-bs-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cancel Transaction</h5>
                </div>
                <div class="modal-body">
                    Are you sure?
                </div>
                <div class="modal-footer">
                    <div class="btn-inline">
                        <a href="#" class="btn btn-text-secondary" data-bs-dismiss="modal">CLOSE</a>
                        <a href="<?= $web_url ?>/user/wire-transfer.php" class="btn btn-text-primary">YES</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * Dialog Basic -->

    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/footer.php");

    ?>