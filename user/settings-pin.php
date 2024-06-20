<?php
$pageName  = "Pin Settings";
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/header.php");

// Ofofonobs Developer WhatsAPP +2348114313795


// Bank Script Developer - Use For Educational Purpose Only

// Other scripts Available


if (isset($_POST['change_pin'])) {
    $current_pin = inputValidation($_POST['current_pin']);
    $new_pin = inputValidation($_POST['new_pin']);
    $confirm_pin = inputValidation($_POST['confirm_pin']);
    $verify_pin = $row['acct_pin'];

    if ($current_pin !== $verify_pin) {
        toast_alert('error', 'Invalid Old Pin');
    } else if ($new_pin !== $confirm_pin) {
        toast_alert('error', 'Confirm Pin not Matched');
    } else if ($new_pin === $verify_pin) {
        toast_alert('error', 'New Pin Matched with Old Pin');
    } else {
        $sql2 = "UPDATE users SET acct_pin=:acct_pin WHERE id =:id";
        $passwordUpdate = $conn->prepare($sql2);
        $passwordUpdate->execute([
            'acct_pin' => $new_pin,
            'id' => $user_id
        ]);


        $full_name = $row['firstname'] . " " . $row['lastname'];
        $APP_NAME = WEB_TITLE;
        $APP_URL = WEB_URL;
        $SITE_ADDRESS = $page['url_address'];
        $user_email = $row['acct_email'];
        $user_acctno = $row['acct_no'];
        $message = $sendMail->PinMsg($full_name, $user_acctno, $APP_NAME, $APP_URL, $SITE_ADDRESS);
        // User Email
        $subject = "Pin Change" . "-" . $APP_NAME;
        $email_message->send_mail($user_email, $message, $subject);

        if (true) {
            toast_alert('success', 'Account Pin Change Successfully', 'Approved');
        } else {
            toast_alert('error', 'Sorry Something Went Wrong');
        }
    }
}
?>

<!-- App Header -->
<div class="appHeader">
    <div class="left">
        <a href="<?= $web_url ?>/user/dashboard.php" class="headerButton goBack">
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

            <form method="post">



                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">Old Pin</label>
                        <input type="text" inputmode="numeric" pattern="[0-9]+" minlength="3" maxlength="4" autocomplete="off" class="form-control" name="current_pin" autocomplete="off" placeholder="Old Pin" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>


                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">New Pin</label>
                        <input type="text" inputmode="numeric" pattern="[0-9]+" minlength="3" maxlength="4" autocomplete="off" class="form-control" name="new_pin" autocomplete="off" placeholder="New Pin" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>


                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">Confirm New Pin</label>
                        <input type="text" inputmode="numeric" pattern="[0-9]+" minlength="3" maxlength="4" autocomplete="off" class="form-control" name="confirm_pin" autocomplete="off" placeholder="Confirm New Pin" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>




                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary btn-block mt-10 btn-md" name="change_pin">Update
                        Password</button>
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