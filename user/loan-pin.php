<?php
$pageName  = "Pincode";
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/header.php");

// Ofofonobs Developer WhatsAPP +2348114313795


// Bank Script Developer - Use For Educational Purpose Only

// Other scripts Available
require_once($_SERVER['DOCUMENT_ROOT'] . "/include/Transfer/Function.php");
if (!$_SESSION['is_dom_transfer']) {
    header("Location:./dashboard.php");
}
if (isset($_POST['loan_submit'])) {
    $pin = inputValidation($_POST['pin']);
    $oldPin = inputValidation($row['acct_pin']);
    $user_id = inputValidation($_POST['user_id']);
    $amount = inputValidation($_POST['amount']);
    $account_name = inputValidation($_POST['account_name']);

    if ($pin !== $oldPin) {
        toast_alert('error', 'Incorrect OTP CODE');
    } else if ($acct_amount < 0) {
        toast_alert('error', 'Insufficient Balance');
    } else {


        if (true) {
            $refrence_id = uniqid();
            $trans_type = "Loan";
            $transaction_type = "credit";
            $trans_status = "processing";
            $sql = "INSERT INTO transactions (amount,refrence_id,user_id,account_name,trans_type,transaction_type,trans_status) VALUES(:amount,:refrence_id,:user_id,:account_name,:trans_type,:transaction_type,:trans_status)";
            $tranfered = $conn->prepare($sql);
            $tranfered->execute([
                'amount' => $amount,
                'refrence_id' => $refrence_id,
                'user_id' => $user_id,
                'account_name' => $account_name,
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
                $user_acctno = $row['acct_no'];
                $message = $sendMail->LoanMsg($full_name, $amount, $user_acctno, $trans_type, $trans_status, $APP_NAME, $APP_URL, $SITE_ADDRESS);
                // User Email
                $subject = "Loan Notification" . "-" . $APP_NAME;
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




// //TEMP TRANSACTION FETCH
$sql = "SELECT * FROM temp_trans WHERE user_id =:user_id ORDER BY trans_id DESC LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->execute([
    'user_id' => $user_id
]);
$temp_trans = $stmt->fetch(PDO::FETCH_ASSOC);



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
        <h1>Enter Pincode</h1>
        <h4>Enter 4 digit verification code</h4>
    </div>
    <div class="section mb-5 p-2">
        <form method="POST">
            <div class="form-group basic">
                <input type="text" name="pin" minlength="3" class="form-control verification-input" autocomplete="off" id="smscode" placeholder="••••" maxlength="4">



                <input type="number" value="<?= $temp_trans['amount'] ?>" name="amount" hidden id="amount">
                <input type="text" value="<?= $temp_trans['account_name'] ?>" name="account_name" hidden id="account_name">
                <input type="number" value="<?= $temp_trans['user_id'] ?>" name="user_id" id="user_id" hidden>


            </div>

            <div class="form-button-group transparent">
                <button type="submit" class="btn btn-primary btn-block btn-lg" name="loan_submit">Comfirm
                    Transaction</button>
            </div>

        </form>
    </div>

</div>
<!-- * App Capsule -->

<?php



include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/footer.php");

?>