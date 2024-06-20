<?php
$pageName  = "Transaction Info";
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/header.php");

// Ofofonobs Developer WhatsAPP +2348114313795


// Bank Script Developer - Use For Educational Purpose Only

// Other scripts Available


$trans_id = $_GET['id'];
//$id1 = $_SESSION['wire_id'];
//$sql = "SELECT * FROM users WHERE id =:id";
//$data = $conn->prepare($sql);
//$data->execute(['id'=>$id1]);
//
//$result = $data->fetch(PDO::FETCH_ASSOC);


/// "SELECT * FROM transactions WHERE user_id =:user_id ORDER BY trans_id DESC";
$sql = "SELECT * FROM transactions LEFT JOIN users ON transactions.user_id = users.id WHERE transactions.trans_id=:trans_id";
$stmt = $conn->prepare($sql);
$stmt->execute(['trans_id' => $trans_id]);

 

$result = $stmt->fetch(PDO::FETCH_ASSOC);


$transStatus = TranStatus($result);
$transIcon = TransIcon($result);


$amount = $result['amount'];
$transactiontype = $result['trans_type'];
$WireFee = $page['wirefee'];
$DomesticFee = $page['domesticfee'];

?>


<!-- App Header -->
<div class="appHeader">
    <div class="left">
        <a href="<?= $web_url ?>/user/dashboard.php" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">
        Transaction Info
    </div>
    <div class="right">
        <a href="#" id="button" class="headerButton">
            <ion-icon name="cloud-download"></ion-icon>
        </a>
    </div>
</div>
<!-- * App Header -->

<body class="bg-white" id="pageprint">





    <!-- App Capsule -->
    <div id="appCapsule" class="full-height" id="body">

        <div class="section mt-2 mb-2">


            <div class="listed-detail mt-3">
                <div class="icon-wrapper">
                    <div class="iconbox">
                        <?= $transIcon ?>
                     </div>
                </div><br>
                <center>
                    <h2><?= $transStatus ?></h3>
                </center>
            </div>

            <ul class="listview flush transparent simple-listview no-space mt-3">

                <?php
                if ($transactiontype == 'Domestic transfer') {
                ?>
                    <li>
                        <strong>Transaction Type</strong>
                        <span><?= $result['trans_type'] ?></span>
                    </li>
                    <li>
                        <strong>To</strong>
                        <span><?= $result['account_name'] ?></span>
                    </li>
                    <li>
                        <strong>Bank Name</strong>
                        <span><?= $result['bank_name'] ?></span>
                    </li>
                    <li>
                        <strong>Account Number</strong>
                        <span><?= $result['account_number'] ?></span>
                    </li>
                    <li>
                        <strong>Amount</strong>
                        <h3 class="m-0"><?= $currency ?><?php echo number_format($amount, 2, '.', ','); ?></h3>
                    </li>
                    <li>
                        <strong>Fee</strong>
                        <h3 class="m-0"><?= $currency ?><?php echo number_format($DomesticFee, 2, '.', ','); ?></h3>
                    </li>
                    <li>
                        <strong>Account Type</strong>
                        <span><?= $result['account_type'] ?></span>
                    </li>
                    <li>
                        <strong>Bank Country</strong>
                        <span><?= $result['bank_country'] ?></span>
                    </li>
                    <li>
                        <strong>Refrence ID</strong>
                        <span>#<?= $result['refrence_id'] ?></span>
                    </li>
                    <li>
                        <strong>Flows</strong>
                        <span><?= $result['transaction_type'] ?></span>
                    </li>
                    <li>
                        <strong>Date</strong>
                        <span><?= $result['created_at'] ?></span>
                    </li>

                <?php
                } elseif ($transactiontype == 'Wire transfer') {
                ?>


                    <li>
                        <strong>Transaction Type</strong>
                        <span><?= $result['trans_type'] ?></span>
                    </li>
                    <li>
                        <strong>To</strong>
                        <span><?= $result['account_name'] ?></span>
                    </li>
                    <li>
                        <strong>Bank Name</strong>
                        <span><?= $result['bank_name'] ?></span>
                    </li>
                    <li>
                        <strong>Account Number</strong>
                        <span><?= $result['account_number'] ?></span>
                    </li>
                    <li>
                        <strong>Amount</strong>
                        <h3 class="m-0"><?= $currency ?><?php echo number_format($amount, 2, '.', ','); ?></h3>
                    </li>
                    <li>
                        <strong>Fee</strong>
                        <h3 class="m-0"><?= $currency ?><?php echo number_format($WireFee, 2, '.', ','); ?></h3>
                    </li>
                    <li>
                        <strong>Routine Number</strong>
                        <span><?= $result['routine_number'] ?></span>
                    </li>
                    <li>
                        <strong>Account Type</strong>
                        <span><?= $result['account_type'] ?></span>
                    </li>
                    <li>
                        <strong>Swift Code</strong>
                        <span><?= $result['swift_code'] ?></span>
                    </li>
                    <li>
                        <strong>Bank Country</strong>
                        <span><?= $result['bank_country'] ?></span>
                    </li>
                    <li>
                        <strong>Refrence ID</strong>
                        <span>#<?= $result['refrence_id'] ?></span>
                    </li>
                    <li>
                        <strong>Flows</strong>
                        <span><?= $result['transaction_type'] ?></span>
                    </li>
                    <li>
                        <strong>Date</strong>
                        <span><?= $result['created_at'] ?></span>
                    </li>


                <?php
                } elseif ($transactiontype == 'Interbank transfer') {
                ?>


                    <li>
                        <strong>Transaction Type</strong>
                        <span><?= $result['trans_type'] ?></span>
                    </li>
                    <li>
                        <strong>To</strong>
                        <span><?= $result['account_name'] ?></span>
                    </li>
                    <li>
                        <strong>Account Number</strong>
                        <span><?= $result['account_number'] ?></span>
                    </li>
                    <li>
                        <strong>Amount</strong>
                        <h3 class="m-0"><?= $currency ?><?php echo number_format($amount, 2, '.', ','); ?></h3>
                    </li>
                    <li>
                        <strong>Refrence ID</strong>
                        <span>#<?= $result['refrence_id'] ?></span>
                    </li>
                    <li>
                        <strong>Flows</strong>
                        <span><?= $result['transaction_type'] ?></span>
                    </li>
                    <li>
                        <strong>Date</strong>
                        <span><?= $result['created_at'] ?></span>
                    </li>

                <?php
                } else {
                ?>


                    <li>
                        <strong>Transaction Type</strong>
                        <span><?= $result['trans_type'] ?></span>
                    </li>

                    <li>
                        <strong>Amount</strong>
                        <h3 class="m-0"><?= $currency ?><?php echo number_format($amount, 2, '.', ','); ?></h3>
                    </li>
                    <li>
                        <strong>Refrence ID</strong>
                        <span>#<?= $result['refrence_id'] ?></span>
                    </li>
                    <li>
                        <strong>Status</strong>
                        <span><?= $result['trans_status'] ?></span>
                    </li>
                    <li>
                        <strong>Flows</strong>
                        <span><?= $result['transaction_type'] ?></span>
                    </li>
                    <li>
                        <strong>Date</strong>
                        <span><?= $result['created_at'] ?></span>
                    </li>



                <?php
                }
                ?>

            </ul>


        </div>

    </div>
    <!-- * App Capsule -->


    <script>
        const btn = document.getElementById("button");

        btn.addEventListener("click", function() {
            var element = document.getElementById('body');
            html2pdf().from(element).save('filename.pdf');
        });
    </script>


    <?php

    include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/bottom.php");
    include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/footer.php");

    ?>