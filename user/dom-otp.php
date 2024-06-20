<?php
$pageName  = "OTP";
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/header.php");

// Ofofonobs Developer WhatsAPP +2348114313795


// Bank Script Developer - Use For Educational Purpose Only

// Other scripts Available
require_once($_SERVER['DOCUMENT_ROOT'] . "/include/Transfer/DomesticFunction.php");

if (!$_SESSION['is_dom_transfer']) {
    header("Location:./dashboard.php");
}


// //TEMP TRANSACTION FETCH
$sql = "SELECT * FROM temp_trans WHERE user_id =:user_id ORDER BY trans_id DESC LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->execute([
    'user_id' => $user_id
]);
$temp_trans = $stmt->fetch(PDO::FETCH_ASSOC);




if (isset($_POST['dom_submit'])) {


    $pin = inputValidation($_POST['pin']);
    $oldPin = inputValidation($row['acct_otp']);


    $acct_amount = inputValidation($row['acct_balance']);
    $user_id = inputValidation($_POST['user_id']);
    $amount = inputValidation($_POST['amount']);
    $bank_name = inputValidation($_POST['bank_name']);
    $account_name = inputValidation($_POST['account_name']);
    $account_number = inputValidation($_POST['account_number']);
    $account_type = inputValidation($_POST['account_type']);
    $bank_country = inputValidation($_POST['bank_country']);



    $transferLimit = $row['limit_remain'];
    $amountfee = $page['domesticfee'];

    if ($pin !== $oldPin) {
        toast_alert('error', 'Incorrect OTP CODE');
    } else if ($acct_amount < 0) {
        toast_alert('error', 'Insufficient Balance');
    } else {

        $tBalance = ($transferLimit - $amount);
        $aBalance = ($acct_amount - $amount);
        $feeBalance = ($aBalance - $amountfee);

        $sql = "UPDATE users SET limit_remain=:limit_remain,acct_balance=:acct_balance WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'limit_remain' => $tBalance,
            'acct_balance' => $feeBalance,
            'id' => $user_id
        ]);

        if (true) {
            $refrence_id = uniqid();
            $trans_type = "Domestic transfer";
            $transaction_type = "debit";
            $trans_status = "processing";
            $sql = "INSERT INTO transactions (amount,refrence_id,user_id,bank_name,account_name,account_number,account_type,bank_country,trans_type,transaction_type,trans_status) VALUES(:amount,:refrence_id,:user_id,:bank_name,:account_name,:account_number,:account_type,:bank_country,:trans_type,:transaction_type,:trans_status)";
            $tranfered = $conn->prepare($sql);
            $tranfered->execute([
                'amount' => $amount,
                'refrence_id' => $refrence_id,
                'user_id' => $user_id,
                'bank_name' => $bank_name,
                'account_name' => $account_name,
                'account_number' => $account_number,
                'account_type' => $account_type,
                'bank_country' => $bank_country,
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
                $message = $sendMail->DomMsg($full_name, $amount, $account_number, $account_name, $account_type, $bank_country, $trans_type, $refrence_id, $trans_status, $APP_NAME, $APP_URL, $SITE_ADDRESS);
                // User Email
                $subject = "Domestic Transfer" . "-" . $APP_NAME;
                $email_message->send_mail($user_email, $message, $subject);

                $_SESSION['dom_transfer'] = $refrence_id;
                $_SESSION['is_transfer']  = "transfer";
                header("Location:./success.php");
            } else {
                toast_alert("error", "Sorry Error Occured Contact Support");
            }
        }
    }
}


?>


<!-- App Header -->
<div class="appHeader transparent">
    <div class="left">
        <a href="<?= $web_url ?>/user/dashboard.php" class="headerButton">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle"></div>
    <div class="right">
        <a onclick="location.reload();" class="headerButton">
            <ion-icon name="refresh"></ion-icon>
        </a>
    </div>
</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">

    <div class="section mt-2 text-center">
        <h1>Enter One-Time Code</h1>
        <h4>Enter 4 digit One-Time Code</h4>
    </div>
    <div class="section mb-5 p-2">
        <form method="POST">
            <div class="form-group basic">
                <input type="text" name="pin" class="form-control verification-input" minlength="3" autocomplete="off"
                    id="smscode" placeholder="••••" maxlength="4">





                <input type="number" value="<?= $temp_trans['amount'] ?>" name="amount" hidden id="amount">
                <input type="text" value="<?= $temp_trans['bank_name'] ?>" name="bank_name" hidden id="bank_name">
                <input type="text" value="<?= $temp_trans['account_name'] ?>" name="account_name" hidden
                    id="account_name">
                <input type="number" value="<?= $temp_trans['account_number'] ?>" name="account_number" hidden
                    id="account_number">
                <input type="text" value="<?= $temp_trans['account_type'] ?>" name="account_type" hidden
                    id="account_type">
                <input type="text" value="<?= $temp_trans['trans_type'] ?>" name="trans_type" hidden id="trans_type">
                <input type="text" value="<?= $temp_trans['bank_country'] ?>" name="bank_country" hidden
                    id="bank_country">
                <input type="number" value="<?= $temp_trans['user_id'] ?>" name="user_id" id="user_id" hidden>



            </div>

            <div class="form-button-group transparent">
                <button type="submit" class="btn btn-primary btn-block btn-lg" name="dom_submit">Comfirm
                    Transaction</button>
            </div>

        </form>
    </div>

</div>
<!-- * App Capsule -->

<?php



include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/footer.php");

?>