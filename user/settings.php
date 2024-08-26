<?php




$pageName  = "Account Settings";
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/header.php");

// Ofofonobs Developer WhatsAPP +2348114313795


// Bank Script Developer - Use For Educational Purpose Only

// Other scripts Available

?>

<!-- App Header -->
<div class="appHeader text-light btn-primary">
    <div class="left">
        <!--<a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#sidebarPanel">-->
        <!--    <ion-icon name="menu-outline"></ion-icon>-->
        <!--</a>-->
        <a href="<?= $web_url ?>/user/settings.php" class="headerButton">
           <?php
    // Fetch the image name from the database
    $user_image = $row['acct_image']; // Assuming $row contains the user data from the database
    $user_image2 = $row['acct_image2'];

    // Define the path to the images directory
    $image_folder = $web_url . "/assets/user/profile/";

    // Set the default image
    $default_image = "default.png";
    $default_image2 = "id.jpg";

    // Check if the image exists and is not empty
    if (!empty($user_image) && file_exists($_SERVER['DOCUMENT_ROOT'] . "/assets/user/profile/" . $user_image)) {
        $image_to_display = $image_folder . $user_image;
    } else {
        $image_to_display = $image_folder . $default_image;
    }
    
    
    if (!empty($user_image2) && file_exists($_SERVER['DOCUMENT_ROOT'] . "/assets/user/profile/" . $user_image2)) {
        $image_to_display2 = $image_folder . $user_image2;
    } else {
        $image_to_display2 = $image_folder . $default_image2;
    }
?>

<!-- Display the image in HTML -->
<img src="<?= $image_to_display ?>" alt="image" class="imaged w32">
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


<!-- App Capsule -->
<div id="appCapsule">

    <div class="section mt-3 text-center">
        <div class="avatar-section">
            <a href="#">
                <img src="<?= $image_to_display ?>" alt="avatar" class="imaged w100 rounded">
                 
                <a href="<?= $web_url ?>/user/upload-pics.php" class="button">
                    <ion-icon name="camera-outline"></ion-icon>
                </a>
        </div>
    </div>

   
    <div class="listview-title mt-1">Profile Settings</div>
    <ul class="listview image-listview text inset">
        <li>
            <a href="<?= $web_url ?>/user/settings-profile.php" class="item">
                <div class="icon-box bg-primary">
                    <ion-icon name="person"></ion-icon>
                </div>
                <div class="in">
                    <div><?= $fullName ?>
                        <div class="text-muted">
                            Profile Settings
                        </div>
                    </div>
                    <span class="text-primary">Edit</span>
                </div>
            </a>
        </li>

        <!-- <li>
            <div class="item">
                <div class="icon-box bg-primary">
                    <ion-icon name="eye-off"></ion-icon>
                </div>
                <div class="in">
                    <div>
                        Hide Balance
                    </div>
                    <div class="form-check form-switch ms-2">
                        <input class="form-check-input" type="checkbox" id="SwitchCheckDefault3">
                        <label class="form-check-label" for="SwitchCheckDefault3"></label>
                    </div>
                </div>
            </div>

        </li> 

        <li>
            <a href="#" data-bs-toggle="modal" data-bs-target="#LimitActionSheet" class="item">
                <div class="icon-box bg-primary">
                    <ion-icon name="paw"></ion-icon>
                </div>
                <div class="in">
                    <div>Account Limits</div>
                    <span class="text-primary">View</span>
                </div>
            </a>
        </li>

-->


        <li>
            <a href="#" class="item">
                <div class="icon-box bg-primary">
                     
                    <ion-icon name="id-card-outline"></ion-icon>
                </div>
                <div class="in">
                    <div>Identity Document
                        <div class="text-muted">
                            <img src="<?= $image_to_display2 ?>" alt="ID Card" id="id-card-preview" style="height: 150px;">
                          
                        </div>
                    </div>
                </div>
            </a>
        </li>
        
        <li>
            <a href="<?= $web_url ?>/user/statements.php" class="item">
                <div class="icon-box bg-primary">
                    <ion-icon name="briefcase"></ion-icon>
                </div>
                <div class="in">
                    <div>Statements & reports
                        <div class="text-muted">
                            Download monthly statements.
                        </div>
                    </div>
                </div>
            </a>
        </li>



        <li>
            <a href="<?= $web_url ?>/user/ref.php" class="item">
                <div class="icon-box bg-primary">
                    <ion-icon name="pricetags"></ion-icon>
                </div>
                <div class="in">
                    <div>Referrals
                        <div class="text-muted">
                            Earn money when your friends join <?= $web_title ?>.
                        </div>
                    </div>
                </div>
            </a>
        </li>

        <li>
            <a href="<?= $web_url ?>/user/support.php" class="item">
                <div class="icon-box bg-primary">
                    <ion-icon name="chatbubbles"></ion-icon>
                </div>
                <div class="in">
                    <div>24/7 Help Center
                        <div class="text-muted">
                            Have an issue? Speak to our team.
                        </div>
                    </div>
                </div>
            </a>
        </li>
    </ul>




    <div class="listview-title mt-1">Password & Security</div>
    <ul class="listview image-listview text mb-2 inset">
        <li>
            <a href="<?= $web_url ?>/user/settings-password.php" class="item">
                <div class="in">
                    <div>Update Password</div>
                </div>
            </a>
        </li>

        <li>
            <a href="<?= $web_url ?>/user/settings-pin.php" class="item">
                <div class="in">
                    <div>Update Transaction Pin</div>
                </div>
            </a>
        </li>


        <li>
            <a href="<?= $web_url ?>/user/logout.php" class="item">
                <div class="in">
                    <div>Log out</div>
                </div>
            </a>
        </li>
    </ul>
    
     <div class="listview-title mt-1">Theme</div>
    <ul class="listview image-listview text inset no-line">
        <li>
            <div class="item">
                <div class="in">
                    <div>
                        Dark Mode
                    </div>
                    <div class="form-check form-switch  ms-2">
                        <input class="form-check-input dark-mode-switch" type="checkbox" id="darkmodeSwitch">
                        <label class="form-check-label" for="darkmodeSwitch"></label>
                    </div>
                </div>
            </div>
        </li>
    </ul>


    <center>
        <p>Version 9.8.0</p>
    </center>

</div>

<br><br>

<!-- * App Capsule -->

<?php

include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/bottom.php");

include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/footer.php");

?>