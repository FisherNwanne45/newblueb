<?php

$pageName  = "Referral";
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/header.php");

// Ofofonobs Developer WhatsAPP +2348114313795


// Bank Script Developer - Use For Educational Purpose Only

// Other scripts Available
$user_id = userDetails('id');

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

<!-- App Capsule -->
<div id="appCapsule">


    <div class="col-12">

        <div class="card">
            <div class="card-body">

                <br>
                <center><img src="<?= $web_url ?>/assets/images/ref.png" width="280px" height="260px" alt="Referral Image">
                    <br><br>
                    <h1>Earn extra $ buck<br>with every referral</h1>
                    <p class="text-color">Share your referral code with your friends.</p>
                </center>

                <div class="form-group">
                    <div class="input-group">
                        <input id="myInput" type="text" class="form-control" style="border-bottom-right-radius: 0; border-top-right-radius: 0;" readonly="readonly" placeholder="<?= $web_url ?>/online-account-opening.php?id=<?= $row['acct_no'] ?>" value="<?= $web_url ?>/online-account-opening.php?id=<?= $row['acct_no'] ?>">
                        <span class="input-group-btn">
                            <button style="color: #fff; border-bottom-left-radius: 0; height: 43px; border-top-left-radius: 0;" onclick="this.innerHTML='Copied'; this.classList.remove('btn-primary');this.classList.add('btn-primary');  var copyText = document.getElementById('myInput');  copyText.select();document.execCommand('copy');" class="btn btn-primary" type="button" id="copy-button">Copy </button>
                        </span>
                    </div>
                </div>
                <br>
                <br>




            </div>
        </div>

    </div>
    <!-- * App Capsule -->

    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/bottom.php");
    include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/footer.php");

    ?>