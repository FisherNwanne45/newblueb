<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/include/config.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/include/Function/sql.php");

$conn = dbConnect();
$message = new USER();

$viesConn = "SELECT * FROM users WHERE acct_no=:acct_no";
$stmt = $conn->prepare($viesConn);
$stmt->execute([
    ':acct_no' => $_SESSION['acct_no']
]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$user_id = $row['id'];


$sql = "SELECT * FROM settings WHERE id ='1'";
$stmt = $conn->prepare($sql);
$stmt->execute();

$page = $stmt->fetch(PDO::FETCH_ASSOC);


$DomesticLimit = $page['domesticlimit'];
$TransferLimit = 50;

if (isset($_POST['domestic-transfer'])) {

    $amount = $_POST['amount'];
    $DomesticFee = $_POST['fee'];
    $account_name = $_POST['account_name'];
    $bank_name = $_POST['bank_name'];
    $account_number = $_POST['account_number'];
    $account_type = $_POST['account_type'];
    $bank_country = $_POST['bank_country'];


    $checkFee = ($amount + $DomesticFee);

    if ($checkFee > $row['acct_balance']) {
        toast_alert('error', 'Insufficient Balance');
    } elseif ($row['acct_status'] == 'hold') {
        toast_alert('error', 'Account on Hold Contact Support');
    } elseif ($amount > $DomesticLimit) {
        toast_alert("error", "Transfer Limit Extended!");
    } elseif ($amount < $TransferLimit) {
        toast_alert("error", "Amount too low!");
    } else {



        $refrence_id = uniqid();
        $trans_type = "Domestic transfer";
        $transaction_type = "debit";
        $trans_status = "pending";
        $sql = "INSERT INTO temp_trans (amount,refrence_id,user_id,bank_name,account_name,account_number,account_type,bank_country,trans_type,transaction_type,trans_status) VALUES(:amount,:refrence_id,:user_id,:bank_name,:account_name,:account_number,:account_type,:bank_country,:trans_type,:transaction_type,:trans_status)";
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
        
        
        
        if ($row['billing_code'] == '0') {

            $acct_otp = substr(number_format(time() * rand(), 0, '', ''), 0, 4);

    $sql =  "UPDATE users SET acct_otp=:acct_otp WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'acct_otp' => $acct_otp,
        'id' => $user_id
    ]);

    $sql = "SELECT * FROM users WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'id' => $user_id
    ]);
    $resultCode = $stmt->fetch(PDO::FETCH_ASSOC);
    $acct_otp = $resultCode['acct_otp'];

    $number = $resultCode['acct_phone'];
    
    if ($page['twillio_status'] == '1') {
        $messageText = "Dear " . $resultCode['firstname'] . " You just made a Transaction of $" . $amount . " in Your " . $APP_NAME . " Account  Kindly make use of this " . $acct_otp . "  to complete your Transaction Thanks ";

        $sendSms->sendSmsCode($number, $messageText);
    }

    $full_name = $row['firstname'] . " " . $row['lastname'];
    $APP_NAME = WEB_TITLE;
    $APP_URL = WEB_URL;
    $SITE_ADDRESS = $page['url_address'];
    $email = $row['acct_email'];

    $message = $sendMail->pinRequest($full_name, $acct_otp, $APP_NAME, $APP_URL, $SITE_ADDRESS);
    // User Email
    $subject = "One-Time Code - $APP_NAME";
    $email_message->send_mail($email, $message, $subject);
     if (true) {

    $_SESSION['is_dom_code'] = "None";
    $_SESSION['is_dom_transfer'] = "Dom";
    $_SESSION['is_transfer'] = "None";

    header("Location:./dom-otp.php");
     }
   
        } elseif ($row['billing_code'] == '2') {

           $_SESSION['is_dom_code'] = "None";
    $_SESSION['is_dom_transfer'] = "Dom";
    $_SESSION['is_transfer'] = "None";
            header("Location:./domestic-preview.php");
        } elseif ($row['billing_code'] == '3') {

           $_SESSION['is_dom_code'] = "None";
    $_SESSION['is_dom_transfer'] = "Dom";
    $_SESSION['is_transfer'] = "None";
            header("Location:./dom-pin.php");
        } else {

           $_SESSION['is_dom_code'] = "None";
    $_SESSION['is_dom_transfer'] = "Dom";
    $_SESSION['is_transfer'] = "None";
            header("Location:./domestic-preview.php");
        }
        
      
    }
}



if (isset($_POST['domestic-preview'])) {
    
    if ($page['cot_code'] == '0') {


        $_SESSION['dom_transfer'] = $refrence_id;
        $_SESSION['is_cot_code'] = "Cot";
        $_SESSION['is_transfer']  = "transfer";


        header("Location:./code_dom2.php");
    } else {

         $_SESSION['is_dom_code'] = "None";
        $_SESSION['is_dom_transfer'] = "Dom";
        $_SESSION['is_transfer'] = "None";

        header("Location:./code_dom1.php");
    }
    
    
    
    
     /*  $acct_otp = substr(number_format(time() * rand(), 0, '', ''), 0, 4);

    $sql =  "UPDATE users SET acct_otp=:acct_otp WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'acct_otp' => $acct_otp,
        'id' => $user_id
    ]);

    $sql = "SELECT * FROM users WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'id' => $user_id
    ]);
    $resultCode = $stmt->fetch(PDO::FETCH_ASSOC);
    $acct_otp = $resultCode['acct_otp'];

    $number = $resultCode['acct_phone'];


if ($page['twillio_status'] == '1') {
        $messageText = "Dear " . $resultCode['firstname'] . " You just made a Transaction of $" . $amount . " in Your " . $APP_NAME . " Account  Kindly make use of this " . $acct_otp . "  to complete your Transaction Thanks ";

        $sendSms->sendSmsCode($number, $messageText);
    }

    $full_name = $row['firstname'] . " " . $row['lastname'];
    $APP_NAME = WEB_TITLE;
    $APP_URL = WEB_URL;
    $SITE_ADDRESS = $page['url_address'];
    $email = $row['acct_email'];

    $message = $sendMail->pinRequest($full_name, $acct_otp, $APP_NAME, $APP_URL, $SITE_ADDRESS);
    // User Email
    $subject = "One-Time Code - $APP_NAME";
    $email_message->send_mail($email, $message, $subject);

    $_SESSION['is_dom_code'] = "None";
    $_SESSION['is_dom_transfer'] = "Dom";
    $_SESSION['is_transfer'] = "None";

    header("Location:./dom-pin.php"); */
}