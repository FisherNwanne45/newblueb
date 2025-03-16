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


<body class="bg-white">
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



    <style>
    /* Hide the logo on screen */
    .print-only {
        display: none;
    }

    /* Show the logo only in print */
    @media print {
        .print-only {
            display: block;
        }

        .pageTitle {
            display: none;
        }
    }
    </style>

    <!-- App Capsule -->
    <div id="appCapsule" class="full-height">
        <ul class="listview flush transparent simple-listview no-space mt-3 print-only">
            <li>
                <img style="max-width:300px;" src="<?= $web_url ?>/admin/assets/images/logo/<?= $page['image'] ?>">
                <span>Account No: <?= $row['acct_no']?><br>Account Name: <?= $fullName ?></span>
            </li><br>
            <small><i>This Statement was generated on <?php echo date('l, F j, Y \a\t g:i A');?></i></small></hr>
        </ul>
        <div class="section mt-2 mb-2">


            <div class="listed-detail mt-3">
                <div class="icon-wrapper">
                    <div class="iconbox">
                        <?= $transIcon ?>
                    </div>
                </div><br>
                <center>
                    <h2><?= $transStatus ?></h2>
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
                    <strong>Reference ID</strong>
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
                    <strong>Reference ID</strong>
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
                    <strong>Reference ID</strong>
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
                    <strong>Reference ID</strong>
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
    document.getElementById('button').addEventListener('click', function() {
        // Select the div you want to print
        var divToPrint = document.getElementById('appCapsule').innerHTML;

        // Open a new window
        var newWindow = window.open('', '', 'width=800, height=600');

        newWindow.document.write(
        '<link rel="stylesheet" href="../assets/panel/css/style.css">'); // Optional: Link CSS if needed

        newWindow.document.write(divToPrint);


        // Close the document for writing to enable printing
        newWindow.document.close();

        // Print the content
        newWindow.print();

        // Close the print window
        newWindow.close();
    });
    </script>


    <?php

  //  include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/bottom.php");
    include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/footer.php");

    ?>