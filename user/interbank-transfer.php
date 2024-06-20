<?php 
$pageName  = "Interbank Transfer";
include($_SERVER['DOCUMENT_ROOT']."/user/layout/header.php");
require_once($_SERVER['DOCUMENT_ROOT']."/include/Transfer/InterFunction.php");
if ($row['acct_status'] === 'suspend') {
    header('Location: dashboard.php?dormant#dormant');
	exit();
  }
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
<?php
                                 if($page['transfer'] == '1'){
                                    ?>
                                    
                                    
                                <?php
                                 if($row['transfer'] == '1'){
                                    ?>
                                    
                                   

<div class="col-12">
    <div class="card mb-5">
        <div class="card-body">
        <p>Please enter valid information below.</p>

            <form method="POST">


            <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">Account Number</label>
                        <input type="text" inputmode="numeric" required pattern="[0-9]+" minlength="10" maxlength="12" autocomplete="off" class="form-control" name="account_number"
                            placeholder="0123456789" >
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
            </div>

            <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">Account Name</label>
                        <input type="text" class="form-control" name="account_name"
                            placeholder="Account Name" >
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
            </div>

           

            <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">Amount</label>
                        <input type="amount" class="form-control" name="amount"
                            placeholder="0.00" >
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
            </div><br>



                <div class="form-group basic">
                        <div class="row">
                            <div class="col-6">
                                <a onclick="location.reload();" class="btn btn-lg btn-danger cancel btn-block"
                                    >Reset</a>
                            </div>
                            <div class="col-6">
                                    <button type="submit" class="btn btn-lg btn-primary btn-block" name="inter-transfer"
                                    >Proceed</button>
                            </div>
                        </div>
                 </div>




            </form>

        </div>
    </div>
</div>



<?php
                                }else{
                                ?>
                                
                                
                                <div class="section">
            <div class="splash-page mt-5 mb-5">
                <h1>Error!</h1>
                <h2 class="mb-2">You can not transfer!</h2>
                <p>
                    Kindly contact support!
                </p>
            </div>
        </div>

        <div class="fixed-bar">
            <div class="row">
                <div class="col-6">
                    <a href="javascript:history.go(-1)" class="btn btn-lg btn-outline-secondary btn-block goBack">Go Back</a>
                </div>
                <div class="col-6">
                    <a href="./support.php" class="btn btn-lg btn-primary btn-block">Contact Us</a>
                </div>
            </div>
        </div>
                                
                                
                               
                                
                                <?php
                                }
                                ?>

<?php
                                }else{
                                ?>
                                
                                
                                <div class="section">
            <div class="splash-page mt-5 mb-5">
                <h1>Error!</h1>
                <h2 class="mb-2">You can not transfer!</h2>
                <p>
                    Kindly contact support!
                </p>
            </div>
        </div>

        <div class="fixed-bar">
            <div class="row">
                <div class="col-6">
                    <a href="javascript:history.go(-1)" class="btn btn-lg btn-outline-secondary btn-block goBack">Go Back</a>
                </div>
                <div class="col-6">
                    <a href="./support.php" class="btn btn-lg btn-primary btn-block">Contact Us</a>
                </div>
            </div>
        </div>
                                
                                
                               
                                
                                <?php
                                }
                                ?>

<?php 
include($_SERVER['DOCUMENT_ROOT']."/user/layout/footer.php");

?>