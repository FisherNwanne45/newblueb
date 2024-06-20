
<!-- Deposit Action Sheet -->
<div class="modal fade action-sheet" id="depositActionSheet" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"><br>
                <h5 class="modal-title">ACTIVE ACCOUNT</h5>
                <!-- <center>
                    <p>Send money to the account details below, your wallet will be credited instantly. <br>Charge is 0%
                        of any amount less than ₦ 10,000.00, Stamp duty charge on amount ₦10,000.00 and above.</p>
                </center> -->
            </div>



            <div class="section mt-3">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs capsuled" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#wema" role="tab">
                                    USD BANK
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#access" role="tab">
                                    EURO BANK
                                </a>
                            </li>

                        </ul>
                        <div class="tab-content mt-1">
                            <div class="tab-pane fade show active" id="wema" role="tabpanel">

                                <!-- card block -->
                                <div class="card-block bg-dark mb-10 ml-10">
                                    <div class="card-main">
                                        <div class="balance">
                                            <span class="label"
                                                style="margin-bottom: 10px; margin-top: 10px; text-align: left">Account
                                                No:</span>
                                            <h1 class="title text-color2">
                                                <?= $row['acct_no']?><a href="#" data-account="<?= $row['acct_no']?>"
                                                    class="account" data-toggle="tooltip" title="Tap to copy"
                                                    style="color: #fff">
                                                    <ion-icon ios="ios-copy" md="md-copy"></ion-icon>
                                                </a></h1>
                                        </div>
                                        <div class="in">
                                            <div class="bottom">
                                                <div class="card-expiry">
                                                    <span class="label" style="text-align: left">Account Name</span>
                                                    <?= $fullName ?>
                                                </div>
                                            </div>
                                            <div class="bottom">
                                                <div class="card-expiry">
                                                    <span class="label">Bank Name</span>
                                                    <?= $web_title ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- * card block -->

                            </div>
                            <div class="tab-pane fade" id="access" role="tabpanel">
                                <!-- card block -->
                                <div class="card-block bg-dark mb-10 ml-10">
                                    <div class="card-main">
                                        <div class="balance">
                                            <span class="label"
                                                style="margin-bottom: 10px; margin-top: 10px; text-align: left">Account
                                                No:</span>
                                            <h1 class="title text-color2">
                                                XXXX-XXX-XXXX<a href="#" data-account="<?= $row['acct_no']?>"
                                                    class="account" data-toggle="tooltip" title="Tap to copy"
                                                    style="color: #fff">
                                                    <ion-icon ios="ios-copy" md="md-copy"></ion-icon>
                                                </a></h1>
                                        </div>
                                        <div class="in">
                                            <div class="bottom">
                                                <div class="card-expiry">
                                                    <span class="label" style="text-align: left">Account Name</span>
                                                    <?= $fullName ?>
                                                </div>
                                            </div>
                                            <div class="bottom">
                                                <div class="card-expiry">
                                                    <span class="label">Bank Name</span>
                                                    <?= $web_title ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- * card block -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal-body">

                <div class="action-sheet-content">
                    <div class="form-group basic">
                        <button type="button" class="btn btn-primary btn-block btn-lg" data-bs-dismiss="modal">Close
                            Tab</button>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- * Deposit Action Sheet -->


<!-- * Transfer Limit Action Sheet -->
<div class="modal fade action-sheet" id="LimitActionSheet" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"><br>
                <h5 class="modal-title">Account Limit</h5>
            </div>



            <div class="section mt-3">
                <div class="card-body">
                    <ul class="nav nav-tabs capsuled" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#user" role="tab">
                                Starter
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#agent" role="tab">
                                Starter Plus
                            </a>
                        </li>

                    </ul>
                    <div class="tab-content mt-1">
                        <div class="tab-pane fade show active" id="user" role="tabpanel">

                            <div class="card">
                                <ul class="listview flush transparent image-listview text">
                                    <li>
                                        <a href="#" class="item">
                                            <div class="in">
                                                <div>Maximum Balance</div>
                                                <div>$300,000</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="item">
                                            <div class="in">
                                                <div>Sending (per transaction)</div>
                                                <div>$20,000</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="item">
                                            <div class="in">
                                                <div>Receiving (per transaction)</div>
                                                <div>Unlimited</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="item">
                                            <div class="in">
                                                <div>Single Withdrawal</div>
                                                <div>$20,000</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="item">
                                            <div class="in">
                                                <div>Withdrawal Per Day</div>
                                                <div>10</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="agent" role="tabpanel">

                            <div class="card">
                                <ul class="listview flush transparent image-listview text">
                                    <li>
                                        <a href="#" class="item">
                                            <div class="in">
                                                <div>Maximum Balance</div>
                                                <div>Unlimited</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="item">
                                            <div class="in">
                                                <div>Sending (per transaction)</div>
                                                <div>$50,000</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="item">
                                            <div class="in">
                                                <div>Receiving (per transaction)</div>
                                                <div>Unlimited</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="item">
                                            <div class="in">
                                                <div>Single Withdrawal</div>
                                                <div>$50,000</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="item">
                                            <div class="in">
                                                <div>Withdrawal Per Day</div>
                                                <div>50</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="modal-body">

                <div class="action-sheet-content">
                    <div class="form-group basic">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-lg btn-danger cancel btn-block"
                                    data-bs-dismiss="modal">Close</button>
                            </div>
                            <div class="col-6">
                                <a href="<?= $web_url ?>/user/support.php"
                                    class="btn btn-lg btn-primary btn-block">Upgrade</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- * Transfer Limit Action Sheet -->


<script>
var data = <?= @json_encode($data); ?>;
console.log(data);

function crypto_type(id) {
    for (var i = 0; i < data.length; i++) {
        if (id == data[i].id) {
            $("#wallet_address").val(data[i].wallet_address);
        }
    }
}
</script>


<script>
//  Preloader
jQuery(window).on("load", function() {
    $("#preloader").fadeOut(2000);
    $("#main-wrapper").addClass("show");
});
</script>

<script src="<?= $web_url ?>/assets/panel/js/main.js"></script>
<!-- ========= JS Files =========  -->
<!-- Bootstrap -->
<script src="<?= $web_url ?>/assets/panel/js/lib/bootstrap.bundle.min.js"></script>
<!-- Ionicons -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<!-- Splide -->
<script src="<?= $web_url ?>/assets/panel/js/plugins/splide/splide.min.js"></script>
<!-- Base Js File -->
<script src="<?= $web_url ?>/assets/panel/js/base.js"></script>

<!-- Add this script after the </body> tag -->
<script>
    // Function to handle the click event on the "Transfer" menu
    function toggleSubmenu() {
        const submenu = document.querySelector(".submenu"); // Get the submenu element
        submenu.classList.toggle("show"); // Toggle the "show" class
    }
</script>

<?= $tawk ?>
<script>
var style_url, url, token;
style_url = "<?=$web_url.'/assets/panel/css/'?>";
url = "{{url('/')}}";
token = "{{Session::token()}}";
</script>

</body>

</html>