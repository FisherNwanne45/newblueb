<?php
$pageName  = "New Ticket";
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/header.php");

// Ofofonobs Developer WhatsAPP +2348114313795


// Bank Script Developer - Use For Educational Purpose Only

// Other scripts Available



if (isset($_POST['ticket-submit'])) {
    $ticket_message = $_POST['ticket_message'];

    if (empty($ticket_message)) {
        toast_alert("error", "Ticket Message Required!");
    } else {

        $sql = "INSERT INTO ticket (user_id,ticket_message) VALUES(:user_id,:ticket_message)";
        $tranfered = $conn->prepare($sql);
        $tranfered->execute([
            'user_id' => $user_id,
            'ticket_message' => $ticket_message
        ]);

        $full_name = $row['firstname'] . " " . $row['lastname'];
        $APP_NAME = WEB_TITLE;
        $APP_URL = WEB_URL;
        $SITE_ADDRESS = $page['url_address'];
        $user_email = $row['acct_email'];
        $user_acctno = $row['acct_no'];
        $ticket_status = "Opened";
        $message = $sendMail->TicketMsg($full_name, $user_acctno, $ticket_message, $ticket_status, $APP_NAME, $APP_URL, $SITE_ADDRESS);
        // User Email
        $subject = "Ticket" . "-" . $APP_NAME;
        $email_message->send_mail($user_email, $message, $subject);

        if (true) {
            toast_alert('success', 'Your Ticket have been submitted', 'Success');
        } else {
            toast_alert('error', 'Sorry An Error occurred, Try Again !');
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
<!-- App Capsule -->
<div id="appCapsule">

    <div class="section mt-2">
        <div class="card">
            <div class="card-body">
                <div class="p-1">
                    <div class="text-center">
                        <h2 class="text-primary">Create a New Ticket</h2>
                        <p>Fill the form to contact us</p>
                    </div>
                    <form method="post">



                        <div class="form-group basic animated">
                            <div class="input-wrapper">
                                <label class="label" for="email2">E-mail</label>
                                <input type="email" class="form-control" name="email" placeholder="Your Email Address" disabled value="<?= $row['acct_email'] ?>">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic animated">
                            <div class="input-wrapper">
                                <label class="label" for="textarea2">Message</label>
                                <textarea rows="5" name="ticket_message" class="form-control" required placeholder="Ticket Message"></textarea>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" name="ticket-submit">Create
                                New Ticket</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>




</div>
<!-- * App Capsule -->


<!-- Ofofonobs Developer WhatsAPP +2348114313795 -->

<?php
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/bottom.php");

include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/footer.php");

?>