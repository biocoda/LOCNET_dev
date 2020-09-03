<?php 
    include_once("sessionCheck.php");
    include_once("header.php"); 
?>
<?php 

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
                            <input type="text" id="addSteamTE" name="addSteamTE" class="form-control manual-entryForm" placeholder="Enter Device ID" required>
                            <button type='button' name="submitSteam" class="btn manual-entryButton"><i id="steamBtnAdd" onclick='addIsoFunc("#addSteamTE", "<?php echo $deviceRow['steam_isolator']; ?>", "#steamIsolatedHD")' class="fas lock-dark fa-lock-open"></i></button>
                        </div>
                    </form>
                    <form name='remSteamFrmName' id='remSteamFrm'>
                        <div class="form-inline asset-inline-form">
                            <input type="text" id="remSteamTE" name="remSteamTE" class="form-control manual-entryForm" placeholder="Enter Device ID" required>
                            <button type='button' name="submitSteamBtn" class="btn manual-entryButton"><i id="steamBtnRem" onclick='remIsoFunc("#remSteamTE", "<?php echo $deviceRow['steam_isolator']; ?>", "#steamIsolatedHD")' class="fas lock-red fa-lock"></i></button>
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
                            <input type="text" id="addWaterTE" name="addWaterTE" class="form-control manual-entryForm" placeholder="Enter Device ID" required>
                            <button type='button' name="submitWater" class="btn manual-entryButton"><i id="waterBtnAdd" onclick='addIsoFunc("#addWaterTE", "<?php echo $deviceRow['water_isolator'];?>", "#waterIsolatedHD")' class="fas lock-dark fa-lock-open"></i></button>
                        </div>
                    </form>
                    <form name='remWaterFrmName' id='remWaterFrm'>
                        <div class="form-inline asset-inline-form">
                            <input type="text" id="remWaterTE" name="remWaterTE" class="form-control manual-entryForm" placeholder="Enter Device ID" required>
                            <button type='button' name="submitWaterBtn" class="btn manual-entryButton"><i id="waterBtnRem" onclick='remIsoFunc("#remWaterTE", "<?php echo $deviceRow['water_isolator']; ?>", "#waterIsolatedHD")' class="fas lock-red fa-lock"></i></button>
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
                            <input type="text" id="addCdaTE" name="addCdaTE" class="form-control manual-entryForm" placeholder="Enter Device ID" required>
                            <button type='button' name="submitCda" class="btn manual-entryButton"><i id="cdaBtnAdd" onclick='addIsoFunc("#addCdaTE", "<?php echo $deviceRow['cda_isolator'];?>", "#cdaIsolatedHD")' class="fas lock-dark fa-lock-open"></i></button>
                        </div>
                    </form>
                    <form name='remCdaFrmName' id='remCdaFrm'>
                        <div class="form-inline asset-inline-form">
                            <input type="text" id="remCdaTE" name="remCdaTE" class="form-control manual-entryForm" placeholder="Enter Device ID" required>
                            <button type='button' name="submitCdaBtn" class="btn manual-entryButton"><i id="cdaBtnRem" onclick='remIsoFunc("#remCdaTE", "<?php echo $deviceRow['cda_isolator']; ?>", "#cdaIsolatedHD")' class="fas lock-red fa-lock"></i></button>
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
                            <input type="text" id="addElecTE" name="addElecTE" class="form-control manual-entryForm" placeholder="Enter Device ID" required>
                            <button type='button' name="submitElec" class="btn manual-entryButton"><i id="elecBtnAdd" onclick='addIsoFunc("#addElecTE", "<?php echo $deviceRow['elec_isolator'];?>", "#elecIsolatedHD")' class="fas lock-dark fa-lock-open"></i></button>
                        </div>
                    </form>
                    <form name='remElecFrmName' id='remElecFrm'>
                        <div class="form-inline asset-inline-form">
                            <input type="text" id="remElecTE" name="remElecTE" class="form-control manual-entryForm" placeholder="Enter Device ID" required>
                            <button type='button' name="submitElecBtn" class="btn manual-entryButton"><i id="elecBtnRem" onclick='remIsoFunc("#remElecTE", "<?php echo $deviceRow['elec_isolator']; ?>", "#elecIsolatedHD")' class="fas lock-red fa-lock"></i></button>
                        </div>
                    </form>
                </div>
                <hr class="devcd-divider"> 
                <form method="post">
                    <div class="card-body">
                        <input type='hidden' name='steamIsolatedHD' id='steamIsolatedHD'>
                        <input type='hidden' name='waterIsolatedHD' id='waterIsolatedHD'>
                        <input type='hidden' name='cdaIsolatedHD' id='cdaIsolatedHD'>
                        <input type='hidden' name='elecIsolatedHD' id='elecIsolatedHD'>
                        <button type="submit" name="saveButton" class="btn btn-secondary addIso-btn"><i class="far fa-save"></i>&#160;&#160;Save</button>
                    </div>
                </form>
            </div>

            <div class="modal fade" id="deviceModal" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>    
            </div> 

            <div class="modal fade" id="saveModal" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location.href = 'isolations.php';">Close</button>
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                        </div>
                    </div>
                </div>
            </div>

        <?php include_once("footer.php");?>

        <script type="text/javascript">
            
            function launchDeviceModal(title, content) {
                $('#deviceModal .modal-title').text(title);
                $('#deviceModal .modal-body').text(content);
                $('#deviceModal').modal('show');
                }
            function showAddSteamFrm() {
                $('#remSteamFrm').hide();
                $('#addSteamFrm').show();
                }
            function showRemSteamFrm() {
                $('#addSteamFrm').hide();
                $('#remSteamFrm').show();
                }
            function showAddWaterFrm() {
                $('#remWaterFrm').hide();
                $('#addWaterFrm').show();
                }
            function showRemWaterFrm() {
                $('#addWaterFrm').hide();
                $('#remWaterFrm').show();
                }
            function showAddCdaFrm() {
                $('#remCdaFrm').hide();
                $('#addCdaFrm').show();
                }
            function showRemCdaFrm() {
                $('#addCdaFrm').hide();
                $('#remCdaFrm').show();
                }
            function showAddElecFrm() {
                $('#remElecFrm').hide();
                $('#addElecFrm').show();
                }
            function showRemElecFrm() {
                $('#addElecFrm').hide();
                $('#remElecFrm').show();
                }
            showAddSteamFrm();showAddWaterFrm();showAddCdaFrm();showAddElecFrm();

            function launchSM(title, content) {
                console.log('SM modal called');
                $('#saveModal .modal-title').text(title);
                $('#saveModal .modal-body').text(content);
                $('#saveModal').modal('show');
                }
            
            function addIsoFunc(callingTBid, deviceTBI, hiddenTIP) {

                var deviceTB = $(callingTBid).val();

                // console.log('deviceTBI - passed in from call = '+ deviceTBI);
                // console.log('value of text box - passed in from call = '+ deviceTB);
                // console.log('name of target hidden input - for output = '+ hiddenTIP);

                if (deviceTB == deviceTBI) {
                    $(hiddenTIP).val(1);

                    // console.log('Devices match');
                    // console.log('output value = '+ $(hiddenTIP).val());
                    // alert('Device isolated');

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
                    // console.log('devices do not match');
                    var addNotOkOpStr = "Device does not match asset";
                    launchDeviceModal('Info', addNotOkOpStr);
                    
                }
         
            }

            function remIsoFunc(callingTBid, deviceTBI, hiddenTIP) {

                var deviceTB = $(callingTBid).val();

                // console.log('deviceTBI - passed in from call = '+ deviceTBI);
                // console.log('value of text box - passed in from call = '+ deviceTB);
                // console.log('name of target hidden input - for output = '+ hiddenTIP);

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
                    // console.log('Devices do not match');
                    var addNotOkOpStr = "Device does not match asset";
                    launchDeviceModal('Info', addNotOkOpStr);
                }
            }

            // $(document).ready(function() { 
            //     showAddSteamFrm();
            //     showAddWaterFrm();
            //     showAddCdaFrm();
            //     showAddElecFrm();
            //     });

        </script>

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_POST) {

    // print_r($_POST);

    if ($_POST['steamIsolatedHD'] == 1 || $_POST['waterIsolatedHD'] == 1 || $_POST['cdaIsolatedHD'] == 1 || $_POST['elecIsolatedHD'] == 1) {
        $sMOutputStr = "You have isolated ".$deviceRow['asset_name']."-".$deviceRow["description"];


        ?>
        <script type='text/javascript'> $(document).ready(function(){ 
            launchSM('Finished', '<?php echo $sMOutputStr ?>');
            });
        </script>
        <?php
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


        

