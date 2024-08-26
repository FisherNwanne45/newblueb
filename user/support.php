<?php
$pageName  = "24/7 Customer Support";
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

    // Define the path to the images directory
    $image_folder = $web_url . "/assets/user/profile/";

    // Set the default image
    $default_image = "default.png";

    // Check if the image exists and is not empty
    if (!empty($user_image) && file_exists($_SERVER['DOCUMENT_ROOT'] . "/assets/user/profile/" . $user_image)) {
        $image_to_display = $image_folder . $user_image;
    } else {
        $image_to_display = $image_folder . $default_image;
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


    <div class="listview-title mt-2">24/7 Customer Support</div>
    <ul class="listview image-listview inset">

        <li>
            <a href="<?= $web_url ?>/user/ticket.php" class="item">
                <div class="icon-box bg-primary">
                    <ion-icon name="barcode"></ion-icon>
                </div>
                <div class="in">
                    <div>Open a Ticket
                        <div class="text-muted">Create a direct request.</div>
                    </div>

                </div>
            </a>
        </li>

        <li>
            <a href="mailto:<?= $web_email ?>" target="_blank" class="item">
                <div class="icon-box bg-primary">
                    <ion-icon name="mail"></ion-icon>
                </div>
                <div class="in">
                    <div>Send E-mail
                        <div class="text-muted">Get a solution beamed to your inbox.</div>
                    </div>

                </div>
            </a>
        </li>



        <li>
            <a href="https://api.whatsapp.com/send?phone=<?= $web_phone ?>" target="_blank" class="item">
                <div class="icon-box bg-primary">
                    <ion-icon name="logo-whatsapp"></ion-icon>
                </div>
                <div class="in">
                    <div>Whatsapp Support
                        <div class="text-muted">chat with us on whatsapp.</div>
                    </div>

                </div>
            </a>
        </li>





    </ul>


</div>
<!-- * App Capsule -->



<!-- Ofofonobs Developer WhatsAPP +2348114313795 -->

<?php
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/bottom.php");
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/footer.php");

?>