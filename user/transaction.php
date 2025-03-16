<?php
$pageName  = "History";
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/header.php");

// Ofofonobs Developer WhatsAPP +2348114313795


// Bank Script Developer - Use For Educational Purpose Only

// Other scripts Available

?>

<!-- App Header -->
<div class="appHeader">
    <div class="left">
        <a href="javascript:history.go(-1)" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">
        Transaction History
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

<div class="col-12" id="appCapsul">
    <ul class="listview flush transparent simple-listview no-space mt-3 print-only">
        <li>
            <img style="max-width:300px;" src="<?= $web_url ?>/admin/assets/images/logo/<?= $page['image'] ?>">
            <span>Account No: <?= $row['acct_no']?><br>Account Name: <?= $fullName ?></span>
        </li><br>
        <small><i>This Statement was generated on <?php echo date('l, F j, Y \a\t g:i A');?></i></small></hr>
    </ul>
    <div class="row mt-2">
        <div class="col-6">
            <div class="stat-box">
                <div class="title">Inflow</div>
                <?php
                $sql = "SELECT SUM(amount) FROM transactions WHERE user_id =:id AND transaction_type='credit' ORDER BY trans_id";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    'id' => $user_id
                ]);

                $total = $stmt->fetch(PDO::FETCH_NUM);
                $inflow = $total[0];
                ?>
                <div class="value text-success">+<?= $currency ?><?php echo number_format($inflow, 2, '.', ','); ?>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="stat-box">
                <div class="title">Outflow</div>
                <?php
                $sql = "SELECT SUM(amount) FROM transactions WHERE user_id =:id AND transaction_type='debit' ORDER BY trans_id";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    'id' => $user_id
                ]);

                $total = $stmt->fetch(PDO::FETCH_NUM);
                $Outflow = $total[0];
                ?>
                <div class="value text-danger">-<?= $currency ?><?php echo number_format($Outflow, 2, '.', ','); ?>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="section-full" id="customers">
        <div class="transactions">

            <?php

            $sql2 = "SELECT * FROM transactions WHERE user_id =:user_id ORDER BY trans_id DESC";
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
                <div class="mid">
                    <h5><?= $result['description'] ?></h5>
                    <h5><?= $result['account_name'] ?></h5>
                    <p> Ref #: <?= $result['refrence_id'] ?></p>


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

            <?php
            $sql2 = "SELECT * FROM transactions WHERE user_id =:user_id";
            $stmt = $conn->prepare($sql2);
            $stmt->execute([
                'user_id' => $user_id
            ]);

            $cardCheck = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() == 0) {
            ?>
            <div class="transactions">
                <a href="#" class="item">

                    <h2>No transaction Yet</h2>

                </a>
            </div>

            <?php
            } else {

            ?>



            <?php
            }
            ?>


        </div>
    </div>
</div>
<script>
document.getElementById('button').addEventListener('click', function() {
    // Select the div you want to print
    var divToPrint = document.getElementById('appCapsul').innerHTML;

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
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/footer.php");

?>