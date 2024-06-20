<?php
$pageName  = "Loan Request";
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/header.php");

// Ofofonobs Developer WhatsAPP +2348114313795


// Bank Script Developer - Use For Educational Purpose Only

// Other scripts Available
require_once($_SERVER['DOCUMENT_ROOT'] . "/include/Transfer/Function.php");



if (isset($_POST['loan-submit'])) {
    $amount = $_POST['amount'];
    $account_name = $_POST['loan_remarks'];

    $loanlimit = $page['loanlimit'];

    if (empty($amount)) {
        toast_alert("error", "Amount Required!");
    } elseif ($amount <= 0) {
        toast_alert("error", "Invalid Amount!");
    } elseif (empty($account_name)) {
        toast_alert("error", "Loan Description Required!");
    } elseif ($amount > $loanlimit) {
        toast_alert("error", "Loan Limit Extended!");
    } else {

        $refrence_id = uniqid();
        $trans_type = "Loan";
        $transaction_type = "credit";
        $trans_status = "processing";

        $account_number = "N/A";

        $sql = "INSERT INTO temp_trans (amount,refrence_id,user_id,account_name,trans_type,transaction_type,trans_status) VALUES(:amount,:refrence_id,:user_id,:account_name,:trans_type,:transaction_type,:trans_status)";
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


            $_SESSION['is_dom_code'] = "None";
            $_SESSION['is_dom_transfer'] = "Dom";
            $_SESSION['is_transfer'] = "None";

            header("Location:./loan-preview.php");
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

<div class="col-12">
    <div class="card mb-5">
        <div class="card-body">
            <p>Loan/Mortages Application.</p>

            <form method="POST">
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
                        <label class="label">Naration/Purpose</label>
                        <textarea type="text" class="form-control" rows="5" name="loan_remarks" id="loan_remarks" placeholder="Naration/Purpose"></textarea>
                    </div>
                </div>
                <br>



                <div class="form-group basic">
                    <div class="row">
                        <div class="col-6">
                            <a href="<?= $web_url ?>/user/loan.php" class="btn btn-lg btn-danger cancel btn-block">Go Back</a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-lg btn-primary btn-block" name="loan-submit">Proceed</button>
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