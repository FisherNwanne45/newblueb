<?php
$pageName  = "Password Settings";
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
        <?= $web_title ?> Statements
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

            <form action="#" method="post">

                <p>Choose a timeframe for your statement.</p>



                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">Start Date</label>
                        <input type="date" class="form-control" name="name" placeholder="Old Password" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>


                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">End Date</label>
                        <input type="date" class="form-control" placeholder="New Password" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>


                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">Format</label>
                        <input type="text" class="form-control" placeholder="Pdf" readonly>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>




                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary btn-block mt-10 btn-md" name="">Generate Statement</button>
                </div>
            </form>

        </div>
    </div>
</div>


<?php

include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/bottom.php");
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/footer.php");

?>