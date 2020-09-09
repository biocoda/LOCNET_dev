<?php 
    include_once("sessionCheck.php");
    include_once("header.php"); 
    $currentAsset = $_SESSION['currentAssetID'];
    $currentUser = $_SESSION['id'];

    if ($_SESSION['currentAssetID']) {

        include("db_connection.php");
        // get the assets from asset ID passed from previous page
        $getDeviceQry = "SELECT `asset_name`, `description`, `steam_isolator`, `water_isolator`, `cda_isolator`, `elec_isolator` FROM `assets` WHERE `asset_id` = $currentAsset";
    
        if ($getDevicesQRES = mysqli_query($link, $getDeviceQry)) {
            $deviceRow = mysqli_fetch_assoc($getDevicesQRES);
        }
    } else {
        echo "error with getting session id from previous page";
    }
?>  
<div class="mainContent">
    <div class="jumbotron isocd-jtron">
        <p class="page-title">Available devices for <?php echo $_SESSION['currentAssetDesc']; ?></p>
        <hr class="isolTitleHR">

        <div class="card addIso-card">
        <p class="card-header">Select devices to isolate</p>
            <div class="card-body">
                <h6><b>Steam:</b></h6>
                <p>Close <span id="steamVN"><?php echo $deviceRow['steam_isolator']; ?></span></p>
                <form>
                    <div class="form-group">
                        <button type="submitAssetQRCode" name="submitAssetQRCode" class="btn btn-secondary addIso-btn"><i class="fas fa-qrcode"></i>&#160;&#160;Scan Device QR Code</button>
                    </div>
                </form>
                <form name='addSteamFrmName' id='addSteamFrm'>
                    <div class="form-inline asset-inline-form">
                        <input type="text" id="addSteamTE" name="addSteamTE" class="form-control manual-entryForm" placeholder="Enter Device ID" maxlength="8" required>
                        <button type='button' name="submitSteam" class="btn manual-entryButton"><i id="steamBtnAdd" onclick='addIsoFunc("#addSteamTE", "<?php echo $deviceRow['steam_isolator']; ?>", "#steamIsolatedHD", "<?php echo $deviceRow['asset_name'];?>", "<?php echo $deviceRow['description'];?>")' class="fas lock-dark fa-lock-open"></i></button>
                    </div>
                </form>
                <form name='remSteamFrmName' id='remSteamFrm'>
                    <div class="form-inline asset-inline-form">
                        <input type="text" id="remSteamTE" name="remSteamTE" class="form-control manual-entryForm" placeholder="Enter Device ID" maxlength="8" required>
                        <button type='button' name="submitSteamBtn" class="btn manual-entryButton"><i id="steamBtnRem" onclick='remIsoFunc("#remSteamTE", "<?php echo $deviceRow['steam_isolator']; ?>", "#steamIsolatedHD", "<?php echo $deviceRow['asset_name'];?>", "<?php echo $deviceRow['description'];?>")' class="fas lock-red fa-lock"></i></button>
                    </div>
                </form>
            </div>
            <hr class="devcd-divider"> 
            <div class="card-body">
                <h6><b>Water:</b></h6>
                <p>Close <span id="waterVN"><?php echo $deviceRow['water_isolator']; ?></span></p>
                <form>
                    <div class="form-group">
                        <button type="submitAssetQRCode" name="submitAssetQRCode" class="btn btn-secondary addIso-btn"><i class="fas fa-qrcode"></i>&#160;&#160;Scan Device QR Code</button>
                    </div>
                </form>
                <form name='addWaterFrmName' id='addWaterFrm'>
                    <div class="form-inline asset-inline-form">
                        <input type="text" id="addWaterTE" name="addWaterTE" class="form-control manual-entryForm" placeholder="Enter Device ID" maxlength="8" required>
                        <button type='button' name="submitWater" class="btn manual-entryButton"><i id="waterBtnAdd" onclick='addIsoFunc("#addWaterTE", "<?php echo $deviceRow['water_isolator'];?>", "#waterIsolatedHD", "<?php echo $deviceRow['asset_name'];?>", "<?php echo $deviceRow['description'];?>")' class="fas lock-dark fa-lock-open"></i></button>
                    </div>
                </form>
                <form name='remWaterFrmName' id='remWaterFrm'>
                    <div class="form-inline asset-inline-form">
                        <input type="text" id="remWaterTE" name="remWaterTE" class="form-control manual-entryForm" placeholder="Enter Device ID" maxlength="8" required>
                        <button type='button' name="submitWaterBtn" class="btn manual-entryButton"><i id="waterBtnRem" onclick='remIsoFunc("#remWaterTE", "<?php echo $deviceRow['water_isolator']; ?>", "#waterIsolatedHD", "<?php echo $deviceRow['asset_name'];?>", "<?php echo $deviceRow['description'];?>")' class="fas lock-red fa-lock"></i></button>
                    </div>
                </form>
            </div>
            <hr class="devcd-divider"> 
            <div class="card-body">
                <h6><b>Compressed Air:</b></h6>
                <p>Close <span id="cdaVN"><?php echo $deviceRow['cda_isolator']; ?></span></p>
                <form>
                    <div class="form-group">
                        <button type="submitAssetQRCode" name="submitAssetQRCode" class="btn btn-secondary addIso-btn"><i class="fas fa-qrcode"></i>&#160;&#160;Scan Device QR Code</button>
                    </div>
                </form>
                <form name='addCdaFrmName' id='addCdaFrm'>
                    <div class="form-inline asset-inline-form">
                        <input type="text" id="addCdaTE" name="addCdaTE" class="form-control manual-entryForm" placeholder="Enter Device ID" maxlength="8" required>
                        <button type='button' name="submitCda" class="btn manual-entryButton"><i id="cdaBtnAdd" onclick='addIsoFunc("#addCdaTE", "<?php echo $deviceRow['cda_isolator'];?>", "#cdaIsolatedHD", "<?php echo $deviceRow['asset_name'];?>", "<?php echo $deviceRow['description'];?>")' class="fas lock-dark fa-lock-open"></i></button>
                    </div>
                </form>
                <form name='remCdaFrmName' id='remCdaFrm'>
                    <div class="form-inline asset-inline-form">
                        <input type="text" id="remCdaTE" name="remCdaTE" class="form-control manual-entryForm" placeholder="Enter Device ID" maxlength="8" required>
                        <button type='button' name="submitCdaBtn" class="btn manual-entryButton"><i id="cdaBtnRem" onclick='remIsoFunc("#remCdaTE", "<?php echo $deviceRow['cda_isolator']; ?>", "#cdaIsolatedHD", "<?php echo $deviceRow['asset_name'];?>", "<?php echo $deviceRow['description'];?>")' class="fas lock-red fa-lock"></i></button>
                    </div>
                </form>
            </div>
            <hr class="devcd-divider"> 
            <div class="card-body">
                <h6><b>Electricity:</b></h6>
                <p>Close <span id="cdaVN"><?php echo $deviceRow['elec_isolator']; ?></span></p>
                <form>
                    <div class="form-group">
                        <button type="submitAssetQRCode" name="submitAssetQRCode" class="btn btn-secondary addIso-btn"><i class="fas fa-qrcode"></i>&#160;&#160;Scan Device QR Code</button>
                    </div>
                </form>
                <form name='addElecFrmName' id='addElecFrm'>
                    <div class="form-inline asset-inline-form">
                        <input type="text" id="addElecTE" name="addElecTE" class="form-control manual-entryForm" placeholder="Enter Device ID" maxlength="8" required>
                        <button type='button' name="submitElec" class="btn manual-entryButton"><i id="elecBtnAdd" onclick='addIsoFunc("#addElecTE", "<?php echo $deviceRow['elec_isolator'];?>", "#elecIsolatedHD", "<?php echo $deviceRow['asset_name'];?>", "<?php echo $deviceRow['description'];?>")' class="fas lock-dark fa-lock-open"></i></button>
                    </div>
                </form>
                <form name='remElecFrmName' id='remElecFrm'>
                    <div class="form-inline asset-inline-form">
                        <input type="text" id="remElecTE" name="remElecTE" class="form-control manual-entryForm" placeholder="Enter Device ID" maxlength="8" required>
                        <button type='button' name="submitElecBtn" class="btn manual-entryButton"><i id="elecBtnRem" onclick='remIsoFunc("#remElecTE", "<?php echo $deviceRow['elec_isolator']; ?>", "#elecIsolatedHD", "<?php echo $deviceRow['asset_name'];?>", "<?php echo $deviceRow['description'];?>")' class="fas lock-red fa-lock"></i></button>
                    </div>
                </form>
            </div>
            <hr class="devcd-divider"> 
            <form method="post">
                <div class="card-body">
                    <input type='hidden' name='steamIsolatedHD' id='steamIsolatedHD' value=0>
                    <input type='hidden' name='waterIsolatedHD' id='waterIsolatedHD' value=0>
                    <input type='hidden' name='cdaIsolatedHD' id='cdaIsolatedHD' value=0>
                    <input type='hidden' name='elecIsolatedHD' id='elecIsolatedHD' value=0>
                    <button type="submit" name="saveButton" class="btn btn-secondary addIso-btn"><i class="far fa-save"></i>&#160;&#160;Save</button>
                </div>
            </form>
        </div>
        <div class="modal fade" id="deviceModal" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <i class="fa fa-exclamation-circle modalTitleFA" aria-hidden="true"></i>
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;&nbsp;Close</button>
                    </div>
                </div>
            </div>    
        </div> 
        <div class="modal fade" id="saveModal" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <i class="fa fa-exclamation-circle modalTitleFA" aria-hidden="true"></i>
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location.href = 'isolations.php';"><i class="fa fa-times"></i>&nbsp;&nbsp;&nbsp;Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php include_once("footer.php");?>
<script type="text/javascript">
    function launchDeviceModal(title, content) {$('#deviceModal .modal-title').text(title); $('#deviceModal .modal-body').text(content);$('#deviceModal').modal('show');}
    function showAddSteamFrm() {$('#remSteamFrm').hide();$('#addSteamFrm').show();}
    function showRemSteamFrm() {$('#addSteamFrm').hide();$('#remSteamFrm').show();}
    function showAddWaterFrm() {$('#remWaterFrm').hide();$('#addWaterFrm').show();}
    function showRemWaterFrm() {$('#addWaterFrm').hide();$('#remWaterFrm').show();}
    function showAddCdaFrm() {$('#remCdaFrm').hide();$('#addCdaFrm').show();}
    function showRemCdaFrm() {$('#addCdaFrm').hide();$('#remCdaFrm').show();}
    function showAddElecFrm() {$('#remElecFrm').hide();$('#addElecFrm').show();}
    function showRemElecFrm() {$('#addElecFrm').hide();$('#remElecFrm').show();}
    function launchSM(title, content) {console.log('SM modal called');$('#saveModal .modal-title').text(title);$('#saveModal .modal-body').text(content);$('#saveModal').modal('show');}

    showAddSteamFrm();showAddWaterFrm();showAddCdaFrm();showAddElecFrm();

    function addIsoFunc(callingTBid, deviceTBI, hiddenTIP, assName, assDesc) {
        var deviceTB = $(callingTBid).val();
        var devType = "";
        if (deviceTB == deviceTBI) {
            $(hiddenTIP).val(1);
            var addOkOpStr = "You have isolated device: "+deviceTBI;
            launchDeviceModal('Info', addOkOpStr);
            switch (hiddenTIP) {
                case '#steamIsolatedHD':
                    showRemSteamFrm();
                    break;
                case '#waterIsolatedHD':
                    showRemWaterFrm();
                    break;
                case '#cdaIsolatedHD':
                    showRemCdaFrm();
                    break;
                case '#elecIsolatedHD':
                    showRemElecFrm();
                    break;
            }
        } else {
            switch (hiddenTIP) {
                case '#steamIsolatedHD':
                    devType = "a steam";
                    break;
                case '#waterIsolatedHD':
                    devType = "a water";
                    break;
                case '#cdaIsolatedHD':
                    devType = "a CDA";
                    break;
                case '#elecIsolatedHD':
                    devType = "an electrical";
                    break;
                }
            var addNotOkOpStr = ""+deviceTB+" is not "+devType+" isolation device for "+String(assName)+" "+String(assDesc);
            launchDeviceModal('Info', addNotOkOpStr);
        }
    }

    function remIsoFunc(callingTBid, deviceTBI, hiddenTIP, assName, assDesc) {
        var deviceTB = $(callingTBid).val();
        var devType = "";
        if (deviceTB == deviceTBI) {
            $(hiddenTIP).val(0);
            var addOkOpStr = "You have de-isolated device: "+deviceTBI;
            launchDeviceModal('Info', addOkOpStr);
            switch (hiddenTIP) {
                case '#steamIsolatedHD':
                    showAddSteamFrm();
                    break;
                case '#waterIsolatedHD':
                    showAddWaterFrm();
                    break;
                case '#cdaIsolatedHD':
                    showAddCdaFrm();
                    break;
                case '#elecIsolatedHD':
                    showAddElecFrm();
                    break;
                }
        } else {
            switch (hiddenTIP) {
                case '#steamIsolatedHD':
                    devType = "a steam";
                    break;
                case '#waterIsolatedHD':
                    devType = "a water";
                    break;
                case '#cdaIsolatedHD':
                    devType = "a CDA";
                    break;
                case '#elecIsolatedHD':
                    devType = "an electrical";
                    break;
                }
            var addNotOkOpStr = ""+deviceTB+" is not a "+devType+" isolation device for "+String(assName)+" "+String(assDesc);
            launchDeviceModal('Info', addNotOkOpStr);
        }
    }
</script>
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_POST) {

    // print_r($_POST);

    if ($_POST['steamIsolatedHD'] == 1 || $_POST['waterIsolatedHD'] == 1 || $_POST['cdaIsolatedHD'] == 1 || $_POST['elecIsolatedHD'] == 1) {

        include("db_connection.php");

        $stmIso = $_POST['steamIsolatedHD'];
        $watIso = $_POST['waterIsolatedHD'];
        $cdaIso = $_POST['cdaIsolatedHD'];
        $elecIso = $_POST['elecIsolatedHD'];

        $insertIsoSQL = "INSERT INTO `isolations`(`isolation_id`, `assets_asset_id`, `users_user_id`, `date_removed`, `steam_isolated`, `water_isolated`, `cda_isolated`, `elec_isolated`, `last_updated`) 
                            VALUES (null, $currentAsset, $currentUser, null, $stmIso, $watIso, $cdaIso, $elecIso, NOW())"; 

        if (mysqli_query($link, $insertIsoSQL)) {

            $sMOutputStr = "You have isolated ".$deviceRow['asset_name']."-".$deviceRow["description"];
            ?>
            <script type='text/javascript'> $(document).ready(function(){ 
                launchSM('Info', '<?php echo $sMOutputStr ?>');
                });
            </script>
            <?php
        } else {
            ?>
            <script type='text/javascript'> $(document).ready(function(){ 
                launchSM('Error', 'Isolation not written to database');
                });
            </script>
            <?php
        }        

    } else {
        ?>
        <script type='text/javascript'> $(document).ready(function(){ 
            launchDeviceModal('Error', 'You have selected no devices to isolate!');
            });
        </script>
        <?php
    }

} 
?>  


        

