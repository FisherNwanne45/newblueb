<?php

$pageName  = "Stocks Investments";
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/header.php");

// Ofofonobs Developer WhatsAPP +2348114313795


// Bank Script Developer - Use For Educational Purpose Only

// Other scripts Available
$user_id = userDetails('id');



if (isset($_POST['stock-preview'])) {
    $amount = $_POST['amount'];
    $account_name = $_POST['stock_name'];


    $checkUser = $conn->query("SELECT * FROM users WHERE id='$user_id'");
    $result = $checkUser->fetch(PDO::FETCH_ASSOC);

    if ($amount > $result['acct_balance']) {
        toast_alert('error', 'Insufficient Balance', 'Error');
    } else {


        $refrence_id = uniqid();
        $trans_type = "Stocks";
        $transaction_type = "debit";
        $trans_status = "processing";


        $sql = "INSERT INTO temp_trans (amount,account_name,refrence_id,user_id,trans_type,transaction_type,trans_status) VALUES(:amount,:account_name,:refrence_id,:user_id,:trans_type,:transaction_type,:trans_status)";
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


            $_SESSION['is_dom_code'] = "None";
            $_SESSION['is_dom_transfer'] = "Dom";
            $_SESSION['is_transfer'] = "None";

            header("Location:./stocks-preview.php");
        } else {
            toast_alert('error', 'Sorry An Error occurred, Try Again !');
        }
    }
}

?>

<!-- App Header -->
<div class="appHeader text-light btn-primary">
    <div class="left">
        <a href="<?= $web_url ?>/user/dashboard.php" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">
        Invest in Stocks
    </div>
    <div class="right">
        <a onclick="location.reload();" class="headerButton">
            <ion-icon name="refresh"></ion-icon>
        </a>
    </div>
</div>
<!-- * App Header -->

<!-- Wallet -->
<div class="section full gradientSection text-light btn-primary">
    <div class="in">
        <h5 class="title mb-2">Available Balance</h5>
        <h1 class="total"><?= $currency ?><?php echo number_format($acct_balance, 2, '.', ','); ?></h1>

    </div>
</div>
<!-- * Wallet -->

<!-- Extra Header -->
<div class="row">
    <ul class="nav nav-tabs lined" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#waiting" role="tab">
                Recent Stocks
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#paid" role="tab">
                Find a Stock
            </a>
        </li>
    </ul>
</div>
<!-- * Extra Header -->




<!-- App Capsule -->
<div class="extra-header-active full-height">

    <div class="section tab-content mt-2 mb-1">

        <!-- waiting tab -->
        <div class="tab-pane fade show active" id="waiting" role="tabpanel">


            <div class="section-full">
                <div class="transactions">
                    <?php

                    $sql2 = "SELECT * FROM transactions WHERE user_id =:user_id AND trans_type='Stocks' ORDER BY trans_id DESC LIMIT 10";
                    $wire = $conn->prepare($sql2);
                    $wire->execute([
                        'user_id' => $user_id
                    ]);



                    $sn = 1;

                    while ($result = $wire->fetch(PDO::FETCH_ASSOC)) {

                        $amount = $result['amount'];


                    ?>

                        <a href="./transaction-info.php?id=<?php echo $result['trans_id']; ?>" class="item">
                            <div class="detail">
                                <div>
                                    <h2><?= $result['trans_type'] ?></h2>

                                    <p><?= $result['created_at'] ?></p>
                                </div>
                            </div>
                            <div class="right">
                                <?php
                                if ($result['transaction_type'] === 'credit') {
                                ?>

                                    <h2 class="text-success">
                                        +<?php echo number_format($amount, 2, '.', ','); ?>
                                    </h2>

                                <?php
                                } else {
                                ?>

                                    <h2 class="text-danger">
                                        -<?php echo number_format($amount, 2, '.', ','); ?>
                                    </h2>

                                <?php
                                }
                                ?>


                            </div>
                        </a>
                    <?php

                    }



                    ?>


                    <!-- <h5 class="text-center">No result found yet</h5> -->


                </div>

                <?php
                $sql2 = "SELECT * FROM transactions WHERE user_id =:user_id AND trans_type='Stocks'";
                $stmt = $conn->prepare($sql2);
                $stmt->execute([
                    'user_id' => $user_id
                ]);

                $cardCheck = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($stmt->rowCount() == 0) {
                ?>
                    <div class="transactions">
                        <a href="#" class="item">

                            <h2>No Order Yet</h2>

                        </a>
                    </div>

                <?php
                } else {

                ?>

                    <div class="section mt-3 mb-3">
                        <a href="<?= $web_url ?>/user/transaction.php" class="btn btn-lg btn-block btn-primary">Load More</a>
                    </div>

                <?php
                }
                ?>
            </div>
            <!-- History -->


        </div>
        <!-- * waiting tab -->



        <!-- paid tab -->
        <div class="tab-pane fade" id="paid" role="tabpanel">
            <div class="row">

                <?php

                $sql2 = "SELECT * FROM stocks ORDER BY id DESC";
                $stocks = $conn->prepare($sql2);
                $stocks->execute();

                while ($resultstocks = $stocks->fetch(PDO::FETCH_ASSOC)) {

                    $amountstocks = $resultstocks['stock_price'];


                ?>
                    <div class="col-6 mb-2">
                        <div class="bill-box">
                            <div class="img-wrapper">
                                <h2><?= $resultstocks['stock_name'] ?></h2>
                            </div>
                            <div class="price"><?= $currency ?><?php echo number_format($amountstocks, 2, '.', ','); ?></div>
                            <form method="POST">
                                <input type="text" hidden value="<?php echo number_format($amountstocks, 2, '.', ','); ?>" name="amount" hidden>
                                <input type="text" hidden value="<?= $resultstocks['stock_name'] ?>" name="stock_name" hidden>
                                <p>+<?= $resultstocks['stock_percentage'] ?>% Percentage</p>
                                <button type="submit" name="stock-preview" class="btn btn-primary btn-block btn-sm">BUY NOW</button>
                            </form>
                        </div>
                    </div>
                <?php
                }
                ?>


            </div>
        </div>
        <!-- * paid tab -->

    </div>

</div>
<!-- * App Capsule -->

<?php

include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/bottom.php");

include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/footer.php");

?>