<?php
$pageName  = "Transaction Preview";
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/header.php");

// Ofofonobs Developer WhatsAPP +2348114313795


// Bank Script Developer - Use For Educational Purpose Only

// Other scripts Available

?>


<body class="bg-white">

    <!-- App Header -->
    <div class="appHeader no-border">
        <div class="left">
            <a href="<?= $web_url ?>/user/dashboard.php" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            QR Code
        </div>
        <div class="right">
            <a onclick="location.reload();" class="headerButton">
                <ion-icon name="refresh"></ion-icon>
            </a>
        </div>
    </div>
    <!-- * App Header -->



    <!-- Dialog Basic -->
    <div class="modal fade dialogbox" id="DialogBasic" data-bs-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">QR Code Verification</h5>
                </div>
                <div class="modal-body">
                    You can use QR code verification for two-factor authentication or protect actions.
                </div>
                <div class="modal-footer">
                    <div class="btn-inline">
                        <a href="#" class="btn btn-text-primary" data-bs-dismiss="modal">OK</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * Dialog Basic -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section">
            <div class="splash-page mt-5 mb-5">
                <div class="mb-3">
                    <img src="assets/img/sample/qr.png" alt="QR Code" class="imaged square w140">
                </div>
                <h2 class="mb-2">Scan the QR Code</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam aliquam.
                </p>
            </div>
        </div>

        <div class="fixed-bar">
            <div class="row">
                <div class="col-12">
                    <a href="app-pages.html" class="btn btn-lg btn-outline-secondary btn-block">Go Back</a>
                </div>
            </div>
        </div>

    </div>
    <!-- * App Capsule -->


    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/footer.php");

    ?>