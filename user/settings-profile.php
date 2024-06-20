<?php
$pageName  = "Edit Profile";
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

            <form action="#" method="post">



                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">Full Name</label>
                        <input type="text" class="form-control" value="<?= $fullName ?>" name="name" placeholder="Enter your full name" disabled>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>

                </div>


                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">Email Address</label>
                        <input type="email" class="form-control" value="<?= $row['acct_email'] ?>" placeholder="Enter email address" disabled>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>

                </div>


                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">Phone Number</label>
                        <input type="text" class="form-control" value="<?= $row['acct_phone'] ?>" id="phone_number" name="phone_number" placeholder="Enter your phone number" disabled>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>

                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">Date of Birth</label>
                        <input type="date" class="form-control" value="<?= $row['acct_dob'] ?>" name="name" placeholder="Date of Birth" disabled>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>

                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">Gender</label>
                        <input type="text" class="form-control" value="<?= $row['acct_gender'] ?>" name="name" placeholder="Gender" disabled>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>

                </div>


                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">Home Address</label>
                        <input type="text" class="form-control" value="<?= $row['acct_address'] ?>" id="phone_number" name="phone_number" placeholder="Home Address" disabled>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>

                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">State</label>
                        <input type="text" class="form-control" value="<?= $row['state'] ?>" id="phone_number" name="phone_number" placeholder="State" disabled>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>

                </div>


                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">Zipcode</label>
                        <input type="text" class="form-control" value="<?= $row['zipcode'] ?>" id="phone_number" name="zipcode" placeholder="Zipcode" disabled>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>

                </div>


                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">Joined Date</label>
                        <input type="text" class="form-control" value="<?= $row['createdAt'] ?>" name="createdAt" placeholder="State" disabled>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
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