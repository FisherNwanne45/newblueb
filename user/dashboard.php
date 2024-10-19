<?php

$pageName  = "Dashboard";
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/header.php");

// Ofofonobs Developer WhatsAPP +2348114313795


// Bank Script Developer - Use For Educational Purpose Only

// Other scripts Available

if (!$_SESSION['acct_no']) {
    header("location:../login.php");
    die;
}
if (@!$_COOKIE['firstVisit']) {
    setcookie("firstVisit", "no", time() + 3600);
    toast_alert('success', 'Welcome Back ' . $fullName . " !", 'Close');
}

unset($_SESSION['wire_transfer'], $_SESSION['dom_transfer']);

?>

<!-- App Header -->
<div class="appHeader text-light btn-primary">
    <div class="left">
        <!--<a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#sidebarPanel">-->
        <!--    <ion-icon name="menu-outline"></ion-icon>-->
        <!--</a>-->
        <a href="<?= $web_url ?>/user/settings.php" class="headerButton">
            <img src="<?= $web_url ?>/assets/user/profile/<?= $row['acct_image'] ?>" alt="image" class="imaged w32">
        </a>
    </div>
    <div class="pageTitle">
        <?= $pageName ?>
    </div>


    <div class="right">
        <a onclick="location.reload();" class="headerButton">
            <ion-icon name="refresh"></ion-icon>
        </a>
        <!-- <a href="<?= $web_url ?>/user/dashboard.php" class="headerButton">
                <ion-icon class="icon" name="notifications-outline"></ion-icon>
                <span class="badge badge-danger">New</span>
            </a> -->
    </div>
</div>
<!-- * App Header -->
<?php 
							if(isset($_GET['dormant']))
								{
									?><br>
<div class='alert alert-warning'>

    <strong>Sorry, your account has been frozen due to the need for an account upgrade, please contact customer care at,
        <a href="mailto:<?= $page['url_email'] ?>"><?= $page['url_email'] ?></a>&nbsp; for further information.</strong>
</div>
<?php
								}
						?>

<!-- Wallet Card -->
<div class="section wallet-card-section pt-1">
    <div class="wallet-card">
        <!-- Balance -->
        <div class="balance">
            <div class="left">
                <span class="title">Total Balance</span>
                <h1 class="total"><?= $currency ?><?php echo number_format($acct_balance, 2, '.', ','); ?></h1>
            </div>
            <div class="right">
                <a href="#" class="button" data-bs-toggle="modal" data-bs-target="#depositActionSheet">
                    <ion-icon name="copy"></ion-icon>
                </a>
            </div>
        </div>
        <!-- * Balance -->

        <!-- Wallet Footer -->
        <div class="wallet-footer">


            <div class="item">
                <a href="<?= $web_url ?>/user/pay.php">
                    <div class="icon-wrapper">
                        <ion-icon name="arrow-forward-outline"></ion-icon>
                    </div>
                    <strong>Send Money</strong>
                </a>
            </div>

            <div class="item">
                <a href="<?= $web_url ?>/user/deposit.php">
                    <div class="icon-wrapper bg-danger">
                        <ion-icon name="add-outline"></ion-icon>
                    </div>
                    <strong>Add Money</strong>
                </a>
            </div>

            <div class="item">
                <a href="<?= $web_url ?>/user/loan.php">
                    <div class="icon-wrapper bg-warning">
                        <ion-icon name="swap-vertical"></ion-icon>
                    </div>
                    <strong>Loan</strong>
                </a>
            </div>



            <div class="item">
                <a href="<?= $web_url ?>/user/support.php">
                    <div class="icon-wrapper bg-success">
                        <ion-icon name="chatbubble-outline"></ion-icon>
                    </div>
                    <strong>Need Help?</strong>
                </a>
                </a>
            </div>


        </div>


        <!-- * Wallet Footer -->
    </div> <!-- TradingView Widget BEGIN -->
    <style>
    .blue-text {
        display: none;
    }
    </style><br>
    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container">
        <div class="tradingview-widget-container__widget"></div>
        <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/" rel="noopener nofollow"
                target="_blank"><span class="blue-text">Track all markets on TradingView</span></a></div>
        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js"
            async>
        {
            "symbols": [{
                    "description": "",
                    "proName": "ECONOMICS:USINTR"
                },
                {
                    "description": "",
                    "proName": "FX:EURUSD"
                },
                {
                    "description": "",
                    "proName": "OANDA:EURUSD"
                },
                {
                    "description": "",
                    "proName": "FX:GBPUSD"
                },
                {
                    "description": "",
                    "proName": "FX:AUDUSD"
                },
                {
                    "description": "",
                    "proName": "CAPITALCOM:USDJPY"
                }
            ],
            "showSymbolLogo": true,
            "isTransparent": false,
            "displayMode": "regular",
            "colorTheme": "light",
            "locale": "en"
        }
        </script>
    </div>
    <!-- TradingView Widget END -->
</div>
<!-- Wallet Card -->


<!-- Stats -->
<div class="section">

    <div class="row mt-2">
        <div class="col-6">
            <div class="stat-box">
                <div class="title">Deposit Limit</div>
                <div class="value"><?= $currency ?><?php echo number_format($transferLimit, 2, '.', ','); ?></div>
            </div>
        </div>
        <div class="col-6">
            <div class="stat-box">
                <div class="title">Account Type</div>
                <div class="value"><?= $row['acct_type'] ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- * Stats -->


<div class="col-12">

    <br>
    <div class="section-heading">
        <h2 class="title">Recent Transaction</h2>
        <!--<a href="{{route('transaction.index')}}" class="link rippler rippler-bs-primary">View All</a>-->
    </div>

    <div class="section-full">
        <div class="transactions">
            <?php

            $sql2 = "SELECT * FROM transactions WHERE user_id =:user_id ORDER BY trans_id DESC LIMIT 3";
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

        <div class="section mt-3 mb-3">
            <a href="<?= $web_url ?>/user/transaction.php" class="btn btn-lg btn-block btn-primary">Load More</a>
        </div>

        <?php
        }
        ?>





    </div>
</div>


<br>

<?php

include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/bottom.php");

include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/footer.php");

?>