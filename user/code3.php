<?php
$pageName  = "  Verification";
include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/header.php");

// Ofofonobs Developer WhatsAPP +2348114313795


// Bank Script Developer - Use For Educational Purpose Only

// Other scripts Available
require_once($_SERVER['DOCUMENT_ROOT'] . "/include/Transfer/WireFunction.php");

if (!isset($_SESSION['is_transfer'])) {
    header("Location:./dashboard.php");
}

if (!isset($_SESSION['is_tax_code'])) {
    header("Location:./wire-transfer.php");
    exit();
}

unset($_SESSION['is_cot_code']);




if (isset($_POST['imf_submit'])) {
    $imf_code = $_POST['imf_code'];
    $imf = $row['acct_imf'];
    $amount = $temp_trans['amount'];

  //  $acct_otp = substr(number_format(time() * rand(), 0, '', ''), 0, 4);

  //  $sql =  "UPDATE users SET acct_otp=:acct_otp WHERE id=:id";
  //  $stmt = $conn->prepare($sql);
  //  $stmt->execute([
   //     'acct_otp' => $acct_otp,
    //    'id' => $user_id
   // ]);


   // $full_name = $row['firstname'] . " " . $row['lastname'];
  // $APP_NAME = WEB_TITLE;
   // $APP_URL = WEB_URL;
  //  $SITE_ADDRESS = $page['url_address'];
   // $user_email = $row['acct_email'];

  //  $message = $sendMail->pinRequest($full_name, $acct_otp, $APP_NAME, $APP_URL, $SITE_ADDRESS);
    // User Email
   // $subject = "One-Time Code - $APP_NAME";
  //  $email_message->send_mail($email, $message, $subject);

    if ($imf_code === $imf) {
        $_SESSION['wire-transfer'] = $user_id;
        $_SESSION['is_wire_transfer'] = "wire";
        $_SESSION['is__transfer'] = "None";
        $_SESSION['is_transfer']  = "transfer";
        $_SESSION['is_tax_code'] = "None";

        header("Location:./pincode.php");
    } else {
        //notify_alert('Invalid IMF Code','danger','3000','Close');
        toast_alert('error', 'Invalid  Code');
    }
}

?>


<!-- App Header -->
<div class="appHeader transparent">
    <div class="left">
        <a href="<?= $web_url ?>/user/dashboard.php" class="headerButton">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle"></div>
    <div class="right">
        <a onclick="location.reload();" class="headerButton">
            <ion-icon name="refresh"></ion-icon>
        </a>
    </div>
</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">

    <style>
        .loading-progress-container {
  position: relative; /* Add position relative */
  width: 100%;
  height: 30px;
  border: 1px solid #ccc;
  border-radius: 5px;
  overflow: hidden;
}

.loading-progress-bar {
  width: 73%;
  height: 100%;
  background-color: #007bff;
  transition: width 1s ease-in-out;
  position: absolute; /* Add position absolute */
  top: 0; /* Align to the top of the container */
  left: 0; /* Align to the left of the container */
}

.loading-progress-text {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-weight: bold;
  z-index: 1; /* Add z-index to place it above the progress bar */
}

.form-container {
  margin-top: 10px;
}


    </style>
    <div class="section mt-2 text-center" id="myDiv">
        <h1><?= $page['code2'] ?> Confirmed.</h1>
        <h4>Transfer in progress...</h4>
    </div>
  <div class="loading-progress-container" id="myDiv2">
      
    <div class="loading-progress-bar" id="loading-progress-bar"></div>
    <div class="loading-progress-text" id="loading-progress-text">0%</div>
  </div>
  
  <div class="form-container" id="form-container" style="display: none;">
   <div class="section mt-2 text-center">
        <h1>Enter <?= $page['code3'] ?> Code</h1>
        <h4>Enter 4 digit verification code</h4>
    </div>
    <div class="section mb-5 p-2">
        <form method="POST">
            <div class="form-group basic">
                <input type="text" name="imf_code" minlength="3" class="form-control verification-input" autocomplete="off" id="smscode" placeholder="••••" maxlength="4">

                <input type="number" value="<?= $temp_trans['amount'] ?>" name="amount" hidden id="amount">
                <input type="text" value="<?= $temp_trans['bank_name'] ?>" name="bank_name" hidden id="bank_name">
                <input type="text" value="<?= $temp_trans['account_name'] ?>" name="account_name" hidden id="account_name">
                <input type="number" value="<?= $temp_trans['account_number'] ?>" name="account_number" hidden id="account_number">
                <input type="text" value="<?= $temp_trans['account_type'] ?>" name="account_type" hidden id="account_type">
                <input type="text" value="<?= $temp_trans['trans_type'] ?>" name="trans_type" hidden id="trans_type">
                <input type="text" value="<?= $temp_trans['bank_country'] ?>" name="bank_country" hidden id="bank_country">
                <input type="number" value="<?= $temp_trans['user_id'] ?>" name="user_id" id="user_id" hidden>
                <input type="text" value="<?= $temp_trans['routine_number'] ?>" name="routine_number" id="routine_number" hidden>
                <input type="text" value="<?= $temp_trans['swift_code'] ?>" name="swift_code" id="swift_code" hidden>


            </div>

            <div class="form-button-group transparent">
                <button type="submit" name="imf_submit" class="btn btn-primary btn-block btn-lg">Verify</button>
            </div>

        </form>
       </form>
    <!-- Your form goes here -->
    <!-- ... -->
  </div>
</div>
<script>
    // Wait for the page to load before executing the script
document.addEventListener("DOMContentLoaded", function () {
  // Get the loading progress bar and text elements
  const progressBar = document.getElementById("loading-progress-bar");
  const progressText = document.getElementById("loading-progress-text");
  // Set the initial value to 0%
  let progressValue = 73;
  
  // Function to update the loading progress bar value and text
  function updateProgressBar() {
    progressBar.style.width = `${progressValue}%`;
    progressText.textContent = `${progressValue}%`;
    if (progressValue === 95) {
      // Show the form container when the loading progress reaches 35%
      document.getElementById("form-container").style.display = "block";
    } else {
      // Increment the progress value until 35%
      progressValue++;
      // Call the function again after a specified time interval (100ms in this case)
      setTimeout(updateProgressBar, 285);
    }
  }
  
  // Start updating the loading progress bar
  updateProgressBar();
});
function hideLoadingProgress() {
        const loadingDiv = document.getElementById('myDiv');
        loadingDiv.style.display = 'none';
    }

    // Set a timeout to call the hideLoadingProgress function after a specific duration (in milliseconds)
    const loadingDelay = 6300; // 3500 milliseconds = 3.5 seconds (adjust this as needed)
    setTimeout(hideLoadingProgress, loadingDelay);
    
    function hideLoadingProgress2() {
        const loadingDiv2 = document.getElementById('myDiv2');
        loadingDiv2.style.display = 'none';
    }

    // Set a timeout to call the hideLoadingProgress function after a specific duration (in milliseconds)
    const loadingDelay2 = 6300; // 3500 milliseconds = 3.5 seconds (adjust this as needed)
    setTimeout(hideLoadingProgress2, loadingDelay2);
</script>

</div>
<!-- * App Capsule -->

<?php



include($_SERVER['DOCUMENT_ROOT'] . "/user/layout/footer.php");

?>