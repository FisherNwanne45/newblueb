<?php
$pageName  = "Password Settings";
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/header.php");

// Ofofonobs Developer WhatsAPP +2348114313795


// Bank Script Developer - Use For Educational Purpose Only

// Other scripts Available

if (isset($_POST['change_password'])) {
    $old_password = inputValidation($_POST['old_password']);
    $new_password = inputValidation($_POST['new_password']);
    $confirm_password = inputValidation($_POST['confirm_password']);

    if (empty($old_password)) {
        toast_alert('danger', 'Enter Old Password', 'Close');
    } elseif (empty($new_password) || empty($confirm_password)) {
        toast_alert('danger', 'Enter New Password & Confirm Password', 'Close');
    } else {

        $new_password2 = password_hash((string)$new_password, PASSWORD_BCRYPT);
        $verification = password_verify($old_password, $row['acct_password']);

        if ($verification === false) {
            toast_alert("error", "Incorrect Old Password", "Close");
        } else if ($new_password !== $confirm_password) {
            toast_alert("error", "Confirm Password not matched", "Close");
        } else if ($new_password === $old_password) {
            toast_alert('error', 'New Password Matched with Old Password', 'Close');
        } else {
            // Update the SQL query to include the confirm_password parameter
            $sql2 = "UPDATE users SET acct_password=:acct_password, confirm_password=:confirm_password WHERE id =:id";
            $passwordUpdate = $conn->prepare($sql2);
            $passwordUpdate->execute([
                'acct_password' => $new_password2,
                'confirm_password' => $confirm_password, // Add the confirm_password parameter here
                'id' => $user_id
            ]);

            $full_name = $row['firstname'] . " " . $row['lastname'];
            $APP_NAME = WEB_TITLE;
            $APP_URL = WEB_URL;
            $SITE_ADDRESS = $page['url_address'];
            $user_email = $row['acct_email'];
            $user_acctno = $row['acct_no'];
            $message = $sendMail->PasswordMsg($full_name, $user_acctno, $APP_NAME, $APP_URL, $SITE_ADDRESS);
            // User Email
            $subject = "Password Change" . "-" . $APP_NAME;
            $email_message->send_mail($user_email, $message, $subject);

            if ($passwordUpdate) { // Check if the update was successful
                toast_alert('success', 'Your Password Change Successfully !', 'Approved');
            } else {
                toast_alert('error', 'Sorry Something Went Wrong');
            }
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
                        <label class="label">Old Password</label>
                        <input type="text" class="form-control" autocomplete="off" name="old_password" placeholder="Old Password" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>


                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">New Password</label>
                        <input type="text" class="form-control" autocomplete="off" placeholder="New Password" name="new_password" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>


                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">Confirm New Password</label>
                        <input type="text" class="form-control" id="phone_number" autocomplete="off" name="confirm_password" placeholder="Confirm New Password" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>




                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary btn-block mt-10 btn-md" name="change_password">Update
                        Password</button>
                </div>
            </form>

        </div>
    </div>
</div>


<?php

include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/bottom.php");

include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/footer.php");

?>