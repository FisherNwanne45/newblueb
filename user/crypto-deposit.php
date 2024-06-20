<?php
$pageName  = "Digital Deposit";
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/header.php");

// Ofofonobs Developer WhatsAPP +2348114313795


// Bank Script Developer - Use For Educational Purpose Only

// Other scripts Available


if (isset($_POST['deposit'])) {
    $amount = $_POST['amount'];
    $crypto_name = $_POST['crypto_name'];
    $wallet_address = $_POST['wallet_address'];
    $user_id = userDetails('id');

    $pin = inputValidation($_POST['pin']);
    $oldPin = inputValidation($row['acct_pin']);





    if (empty($amount) || empty($crypto_name) || empty($wallet_address)) {
        toast_alert('danger', 'Fill Required Form');
    } else if (empty($_FILES['image'])) {
        toast_alert('danger', 'Upload Payment Screenshot');
    } elseif ($pin !== $oldPin) {
        toast_alert('error', 'Incorrect OTP CODE');
    } else {



        if (isset($_FILES['image'])) {
            $file = $_FILES['image'];
            $name = $file['name'];

            $path = pathinfo($name, PATHINFO_EXTENSION);

            $allowed = array('jpg', 'png', 'jpeg');


            $folder = "../assets/deposit/";
            $n = time() . $name;

            $destination = $folder . $n;
        }
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            if ($acct_stat === 'hold') {
                toast_alert('error', 'Account on Hold Contact Support for more info');
            } elseif ($amount < 0) {
                toast_alert('error', 'Invalid amount entered');
            } else {

                $refrence_id = uniqid();
                $trans_type = "Crypto Deposit";
                $transaction_type = "credit";
                $trans_status = "processing";
                $account_name = "N/A";
                $account_number = "N/A";

                $sql = "INSERT INTO transactions (amount,refrence_id,user_id,crypto_id,account_name,account_number,trans_type,transaction_type,trans_status,image) VALUES(:amount,:refrence_id,:user_id,:crypto_id,:account_name,:account_number,:trans_type,:transaction_type,:trans_status,:image)";
                $tranfered = $conn->prepare($sql);
                $tranfered->execute([
                    'amount' => $amount,
                    'refrence_id' => $refrence_id,
                    'user_id' => $user_id,
                    'crypto_id' => $crypto_name,
                    'account_name' => $account_name,
                    'account_number' => $account_number,
                    'trans_type' => $trans_type,
                    'transaction_type' => $transaction_type,
                    'trans_status' => $trans_status,
                    'image' => $n
                ]);



                if (true) {
                    $full_name = $row['firstname'] . " " . $row['lastname'];
                    $APP_NAME = WEB_TITLE;
                    $APP_URL = WEB_URL;
                    $SITE_ADDRESS = $page['url_address'];
                    $user_email = $row['acct_email'];
                    $message = $sendMail->DepositMsg($full_name, $amount, $trans_type, $trans_status, $refrence_id, $APP_NAME, $APP_URL, $SITE_ADDRESS);
                    // User Email
                    $subject = "Deposit" . "-" . $APP_NAME;
                    $email_message->send_mail($user_email, $message, $subject);

                    toast_alert("success", "Your Deposit request is pending", "Thanks!");
                } else {
                    toast_alert("error", "Sorry Something Went Wrong !");
                }
            }
        }
    }
}



?>

<!-- App Header -->
<div class="appHeader">
    <div class="left">
        <a href="javascript:history.go(-1)" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">
        <?= $pageName ?>
    </div>
    <div class=" right">
        <a onclick="location.reload();" class="headerButton">
            <ion-icon name="refresh"></ion-icon>
        </a>
    </div>
</div>
<!-- * App Header -->
<br>

<div class="col-12">
    <div class="card mb-5">
        <div class="card-body">
            <p>Crypto deposits processing might be longer than 30 mins.</p>

            <form method="POST" enctype="multipart/form-data">
                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">Amount</label>
                        <input type="amount" class="form-control" name="amount" placeholder="0.00">
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">Crypto Type</label>
                        <select name="crypto_name" onchange="crypto_type(this.value)" required class="form-control" data-width='100%'>
                            <option value="">Select Crypto Type</option>
                            <?php
                            $sql = $conn->query("SELECT * FROM crypto_currency ORDER BY crypto_name");
                            while ($rs = $sql->fetch(PDO::FETCH_ASSOC)) {
                                $data[] = array(
                                    'id' => $rs['id'],
                                    'wallet_address' => $rs['wallet_address']
                                );
                            ?>
                                <option value="<?= $rs['id'] ?>"><?= ucwords($rs['crypto_name']) ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>



                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">Crypto Wallet Address</label>
                        <input type="text" class="form-control" name="wallet_address" id="wallet_address" placeholder="Wallet Address" readonly>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>
                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">Payment Screenshot</label>
                        <input type="file" class="form-control" required name="image" accept="image/*">
                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">Trasaction Pin</label>
                        <input type="text" class="form-control" inputmode="numeric" required pattern="[0-9]+" maxlength="4" autocomplete="off" style="margin-bottom: 5px" placeholder="Your 4 Digit Transaction Pin" name="pin">
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>
                <br>



                <div class="form-group basic">
                    <div class="row">
                        <div class="col-6">
                            <a href="<?= $web_url ?>/user/deposit.php" class="btn btn-lg btn-danger cancel btn-block">Go
                                Back</a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-lg btn-primary btn-block" name="deposit">Proceed</button>
                        </div>
                    </div>
                </div>




            </form>

        </div>
    </div>
</div>


<!-- Ofofonobs Developer WhatsAPP +2348114313795 -->

<?php
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/bottom.php");
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/footer.php");

?>