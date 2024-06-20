<?php
$pageName  = "Transaction Preview";
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/header.php");

// Ofofonobs Developer WhatsAPP +2348114313795

// Other scripts Available

// Bank Script Developer - Use For Educational Purpose Only


require_once($_SERVER['DOCUMENT_ROOT'] . "/include/Transfer/Function.php");

if (!$_SESSION['is_dom_transfer']) {
    header("Location:./dashboard.php");
}

// //TEMP TRANSACTION FETCH
$sql = "SELECT * FROM temp_trans WHERE user_id =:user_id AND trans_type='Stocks' ORDER BY trans_id DESC LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->execute([
    'user_id' => $user_id
]);
$temp_trans = $stmt->fetch(PDO::FETCH_ASSOC);

$amount = $temp_trans['amount'];

if (isset($_POST['stock-submit'])) {
    $amount = $_POST['amount'];
    $account_name = $_POST['stock_name'];


    $checkUser = $conn->query("SELECT * FROM users WHERE id='$user_id'");
    $result = $checkUser->fetch(PDO::FETCH_ASSOC);


    $pin = inputValidation($_POST['pin']);
    $oldPin = inputValidation($result['acct_pin']);


    if ($pin !== $oldPin) {
        toast_alert('error', 'Incorrect OTP CODE');
    } elseif ($amount > $result['acct_balance']) {
        toast_alert('error', 'Insufficient Balance', 'Error');
    } else {

        $available_balance = ($result['acct_balance'] - $amount);

        $sql = "UPDATE users SET acct_balance=:available_balance WHERE id=:user_id";
        $addUp = $conn->prepare($sql);
        $addUp->execute([
            'available_balance' => $available_balance,
            'user_id' => $user_id
        ]);

        $refrence_id = uniqid();
        $trans_type = "Stocks";
        $transaction_type = "debit";
        $trans_status = "processing";


        $sql = "INSERT INTO transactions (amount,account_name,refrence_id,user_id,trans_type,transaction_type,trans_status) VALUES(:amount,:account_name,:refrence_id,:user_id,:trans_type,:transaction_type,:trans_status)";
        $tranfered = $conn->prepare($sql);
        $tranfered->execute([
            'amount' => $amount,
            'account_name' => $account_name,
            'refrence_id' => $refrence_id,
            'user_id' => $user_id,
            'trans_type' => $trans_type,
            'transaction_type' => $transaction_type,
            'trans_status' => $trans_status
        ]);


        if (true) {
            $full_name = $row['firstname'] . " " . $row['lastname'];
            $APP_NAME = WEB_TITLE;
            $APP_URL = WEB_URL;
            $SITE_ADDRESS = $page['url_address'];
            $user_email = $row['acct_email'];
            $message = $sendMail->StockMsg($full_name, $amount, $account_name, $APP_NAME, $trans_type, $trans_status, $refrence_id, $APP_URL, $SITE_ADDRESS);
            // User Email
            $subject = "Stock Purchase" . "-" . $APP_NAME;
            $email_message->send_mail($user_email, $message, $subject);


            $_SESSION['dom_transfer'] = $refrence_id;
            $_SESSION['is_transfer']  = "transfer";
            header("Location:./success.php");
        } else {
            toast_alert("error", "Sorry Error Occured Contact Support");
        }
    }
}



// //TEMP TRANSACTION FETCH
$sql = "SELECT * FROM temp_trans WHERE user_id =:user_id ORDER BY trans_id DESC LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->execute([
    'user_id' => $user_id
]);
$temp_trans = $stmt->fetch(PDO::FETCH_ASSOC);

$amount = $temp_trans['amount'];
?>

<body class="bg-white">

    <!-- App Header -->
    <div class="appHeader">
        <div class="left">
            <a href="<?= $web_url ?>/user/stocks.php" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            Stock Preview
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
                    <strong>Type</strong>
                    <span>Stock Purchase</span>
                </li>
                <li>
                    <strong>Amount</strong>
                    <h3 class="m-0"><?= $currency ?><?php echo number_format($amount, 2, '.', ','); ?></h3>
                </li>
                <li>
                    <strong>Stock Name</strong>
                    <span><?= $temp_trans['account_name'] ?></span>
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



                        <button class="btn btn-lg btn-primary btn-block" type="submit" data-bs-toggle="modal" data-bs-target="#StocksActionSheet">Proceed</button>


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
                        <a href="<?= $web_url ?>/user/stocks.php" class="btn btn-text-primary">YES</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * Dialog Basic -->


    <!-- Bonus Action Sheet -->
    <div class="modal fade action-sheet" id="StocksActionSheet" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">

                    <div class="card-body mb-3">



                        <form autocomplete="off" method="post">




                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label for="">Transaction Pin <small class="text-danger">(required)</small></label>
                                    <input type="number" value="<?= $temp_trans['amount'] ?>" name="amount" hidden id="amount">
                                    <input type="text" value="<?= $temp_trans['account_name'] ?>" name="stock_name" hidden id="stock_name">
                                    <input type="number" value="<?= $temp_trans['user_id'] ?>" name="user_id" id="user_id" hidden>

                                    <input type="text" class="form-control" inputmode="numeric" required pattern="[0-9]+" maxlength="4" autocomplete="off" style="margin-bottom: 5px" placeholder="Your 4 Digit Transaction Pin" name="pin">
                                    <small><a href="<?= $web_url ?>/user/ticket.php" class="text-color">Forget account
                                            pin? click to reset</a></small>
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>



                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block mt-10 btn-lg" name="stock-submit" id="">Make Purchase</button>
                            </div>


                        </form>




                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * Card Action Sheet -->

    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/footer.php");

    ?>