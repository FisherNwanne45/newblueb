<?php

$pageName  = "Settings";
include($_SERVER['DOCUMENT_ROOT'] . "/admin/layout/header.php");

// Ofofonobs Developer WhatsAPP +2348114313795


// Bank Script Developer - Use For Educational Purpose Only

// Other scripts Available
// include($_SERVER['DOCUMENT_ROOT']."/admin/include/adminFunction.php");
//require_once("./include/adminloginFunction.php");


if (isset($_POST['upload_picture'])) {
    if (isset($_FILES['image'])) {
        $file = $_FILES['image'];
        $name = $file['name'];

        $path = pathinfo($name, PATHINFO_EXTENSION);

        $allowed = array('jpg', 'png', 'jpeg', 'svg');

        $folder = "assets/images/logo/";
        $n = $name;

        $destination = $folder . $n;
    }
    if (move_uploaded_file($file['tmp_name'], $destination)) {
        $sql = "UPDATE settings SET image=:image WHERE id ='1'";
        $stmt = $conn->prepare($sql);

        $stmt->execute([
            'image' => $n,
        ]);

        if (true) {
            toast_alert("success", "Your Image Uploaded Successfully", "Thanks!");
        } else {
            echo "invalid";
        }
    }
}

if (isset($_POST['save_settings'])) {
    $url_name = $_POST['url_name'];
    $url_tel = $_POST['url_tel'];
    $url_email = $_POST['url_email'];
    $cardfee = $_POST['cardfee'];
    $code1 = $_POST['code1'];
    $code2 = $_POST['code2'];
    $code3 = $_POST['code3'];
    $url_address = $_POST['url_address'];
    $wirefee = $_POST['wirefee'];
    $domesticfee = $_POST['domesticfee'];
    $loanlimit = $_POST['loanlimit'];
    $domesticlimit = $_POST['domesticlimit'];
    $wirelimit = $_POST['wirelimit'];
    $billing_code = $_POST['billing_code'];
    $cot_code = $_POST['cot_code'];
    $tax_code = $_POST['tax_code'];
    $imf_code = $_POST['imf_code'];
    $twillio_status = $_POST['twillio_status'];
    $currency = $_POST['currency'];
    $stocks = $_POST['stocks'];
    $id = "1";
    $sql = "UPDATE settings SET url_name=:url_name,url_tel=:url_tel,url_email=:url_email,cardfee=:cardfee,code1=:code1,code2=:code2,code3=:code3,url_address=:url_address,domesticfee=:domesticfee,wirefee=:wirefee, loanlimit=:loanlimit, domesticlimit=:domesticlimit,wirelimit=:wirelimit,billing_code=:billing_code,cot_code=:cot_code,tax_code=:tax_code,imf_code=:imf_code,twillio_status=:twillio_status,currency=:currency,stocks=:stocks WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'url_name' => $url_name,
        'url_tel' => $url_tel,
        'url_email' => $url_email,
        'cardfee' => $cardfee,
        'code1' => $code1,
        'code2' => $code2,
        'code3' => $code3,
        'url_address' => $url_address,
        'domesticfee' => $domesticfee,
        'wirefee' => $wirefee,
        'loanlimit' => $loanlimit,
        'domesticlimit' => $domesticlimit,
        'wirelimit' => $wirelimit,
        'billing_code' => $billing_code,
        'cot_code' => $cot_code,
        'tax_code' => $tax_code,
        'imf_code' => $imf_code,
        'twillio_status' => $twillio_status,
        'currency' => $currency,
        'stocks' => $stocks,
        'id' => $id
    ]);

    if (true) {

        $msg1 = "
       <div class='alert alert-warning'>
       
       <script type='text/javascript'>
            
               function Redirect() {
               window.location='./setting.php';
               }
               document.write ('');
               setTimeout('Redirect()', 4000);
            
               </script>
               
       <center><img src='../assets/images/loading.gif' width='180px'  /></center>
       
       
       <center>	<strong style='color:black;'>Updated successfully, Please Wait while we redirect you...
              </strong></center>
         </div>
       ";


        //  toast_alert('success','Settings updated successfully','Approved');
    } else {
        toast_alert('error', 'Sorry something went wrong');
    }
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            System Settings
        </h1>
        <ol class="breadcrumb">
            <li><a href="./dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        </ol>
    </section>



    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <form method="POST">
                <div class="box-header with-border">
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">

                        <?php if (isset($msg1)) echo $msg1; ?>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>System Name</label>
                                <input type="text" class="form-control" name="url_name" value="<?= $page['url_name'] ?>" placeholder="<?= $page['url_name'] ?> ">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Request Card fee</label>
                                <input type="text" class="form-control" name="cardfee" value="<?= $page['cardfee'] ?>" placeholder="Card Fee">
                            </div>
                            <div class="form-group">
                                <label>Wire Transfer fee</label>
                                <input type="text" class="form-control" name="wirefee" value="<?= $page['wirefee'] ?>" placeholder="Wire Transfer Fee">
                            </div>
                            <div class="form-group">
                                <label>Domestic Transfer fee</label>
                                <input type="text" class="form-control" name="domesticfee" value="<?= $page['domesticfee'] ?>" placeholder="Domestic Transfer Fee">
                            </div>

                            <div class="form-group">
                                <label>Domestic Transfer Limit</label>
                                <input type="text" class="form-control" name="domesticlimit" value="<?= $page['domesticlimit'] ?>" placeholder="Domestic Transfer Limit">
                            </div>
                            <div class="form-group">
                                <label>Wire Transfer Limit</label>
                                <input type="text" class="form-control" name="wirelimit" value="<?= $page['wirelimit'] ?>" placeholder="Wire Transfer Limit">
                            </div>

                            <!-- Billing Code Option -->
<div class="form-group">
    <label>Billing Code Option</label>
    <select class="form-control select2" name="billing_code" style="width: 100%;">
        <option value="">Select Option</option>
        <option value="1" <?php echo ($page['billing_code'] === '1') ? 'selected' : ''; ?>>On</option>
        <option value="0" <?php echo ($page['billing_code'] === '0') ? 'selected' : ''; ?>>Off</option>
    </select>
</div>

<!-- COT Code Option -->
<div class="form-group">
                                <label>First Code Name</label>
                                <input type="text" class="form-control" name="code1" value="<?= $page['code1'] ?>" placeholder="<?= $page['code1'] ?>">
                            </div>
                            
                            
                            <div class="form-group">
                                <label>2nd Code Name</label>
                                <input type="text" class="form-control" name="code2" value="<?= $page['code2'] ?>" placeholder="<?= $page['code2'] ?>">
                            </div>
                            
                            
                            <div class="form-group">
                                <label>3rd Code Name</label>
                                <input type="text" class="form-control" name="code3" value="<?= $page['code3'] ?>" placeholder="<?= $page['code3'] ?>">
                            </div>


                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>System Email</label>
                                <input type="email" class="form-control" name="url_email" value="<?= $page['url_email'] ?>" placeholder="<?= $page['url_email'] ?> ">
                            </div>
                            <div class="form-group">
                                <label>System Phone</label>
                                <input type="text" class="form-control" name="url_tel" value="<?= $page['url_tel'] ?>" placeholder="<?= $page['url_tel'] ?>">
                            </div>
                            
                            <div class="form-group">
                                <label>System Address</label>
                                <input type="text" class="form-control" name="url_address" value="<?= $page['url_address'] ?>" placeholder="<?= $page['url_address'] ?>">
                            </div>

                            <div class="form-group">
                                <label>System Currency</label>
                                <input type="text" class="form-control" name="currency" value="<?= $page['currency'] ?>" placeholder="System Currency">
                            </div>

                            <div class="form-group">
                                <label>Loan Limit</label>
                                <input type="text" class="form-control" name="loanlimit" value="<?= $page['loanlimit'] ?>" placeholder="Loan Limit">
                            </div>

                            <div class="form-group">
                                <label>Stock Interest (USD)</label>
                                <input type="text" class="form-control" name="stocks" value="<?= $page['stocks'] ?>" placeholder="0.00">
                            </div>

                            <div class="form-group">
    <label>Twillio Config Option</label>
    <select class="form-control select2" disabled name="twillio_status" style="width: 100%;">
        <option value="">Select Option</option>
        <option value="1" <?php echo ($page['twillio_status'] === '1') ? 'selected' : ''; ?>>On</option>
        <option value="0" <?php echo ($page['twillio_status'] === '0') ? 'selected' : ''; ?>>Off</option>
    </select>
</div>


                            <!-- <div class="form-group">
                                <label>User Transfer Option (disabled)</label>
                                <select class="form-control select2" disabled style="width: 100%;">
                                    <option value="">Select Option</option>
                                    <option value="1">On</option>
                                    <option value="0">Off</option>
                                </select>
                            </div> -->
                            
                            
                            <div class="form-group">
    <label><?= $page['code1'] ?> Code Option</label>
    <select class="form-control select2" name="cot_code" style="width: 100%;">
        <option value="">Select Option</option>
        <option value="1" <?php echo ($page['cot_code'] === '1') ? 'selected' : ''; ?>>On</option>
        <option value="0" <?php echo ($page['cot_code'] === '0') ? 'selected' : ''; ?>>Off</option>
    </select>
</div>

                            <!-- TAX Code Option -->
<div class="form-group">
    <label><?= $page['code2'] ?> Code Option</label>
    <select class="form-control select2" name="tax_code" style="width: 100%;">
        <option value="">Select Option</option>
        <option value="1" <?php echo ($page['tax_code'] === '1') ? 'selected' : ''; ?>>On</option>
        <option value="0" <?php echo ($page['tax_code'] === '0') ? 'selected' : ''; ?>>Off</option>
    </select>
</div>

<!-- IMF Code Option -->
<div class="form-group">
    <label><?= $page['code3'] ?> Code Option</label>
    <select class="form-control select2" name="imf_code" style="width: 100%;">
        <option value="">Select Option</option>
        <option value="1" <?php echo ($page['imf_code'] === '1') ? 'selected' : ''; ?>>On</option>
        <option value="0" <?php echo ($page['imf_code'] === '0') ? 'selected' : ''; ?>>Off</option>
    </select>
</div>



                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" name="save_settings" class="btn btn-primary">Save Settings</button>
                </div>
            </form>
        </div>


        <!-- /.box -->

        <div>
            Logo Image
        </div>
        <form method="POST" id="general-info" enctype="multipart/form-data">
            <div class="form-group">
                <input type="file" id="input-file-max-fs" class="form-control" name="image" data-max-file-size="2M" />
            </div>
            <div class="box-footer">
                <button type="submit" name="upload_picture" class="btn btn-primary">Change Image</button>
            </div>
        </form>
        <br><br>
        <!-- /.box -->



    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<?php
include($_SERVER['DOCUMENT_ROOT'] . "/admin/layout/footer.php");

?>