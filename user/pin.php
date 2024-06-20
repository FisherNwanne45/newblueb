<?php
$pageName  = "Pincode";
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/header.php");

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
                <input type="text" name="pin" class="form-control verification-input" autocomplete="off" id="smscode" placeholder="••••" minlength="3" maxlength="4">

                <input type="number" value="<?= $temp_trans['amount'] ?>" name="amount" hidden id="amount">
                <input type="text" value="<?= $temp_trans['account_name'] ?>" name="account_name" hidden id="account_name">
                <input type="number" value="<?= $temp_trans['user_id'] ?>" name="user_id" id="user_id" hidden>


            </div>

            <div class="form-button-group transparent">
                <button type="submit" name="pin_submit" class="btn btn-primary btn-block btn-lg">Comfirm Transaction</button>
            </div>

        </form>
    </div>

</div>
<!-- * App Capsule -->

<?php



include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/footer.php");

?>