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
    $getDeviceQry = "SELECT `steam_isolator`, `water_isolator`, `cda_isolator`, `elec_isolator` FROM `assets` WHERE `asset_id` = $currentAsset";
 
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
                    <p>Close <?php echo $deviceRow['steam_isolator']; ?></p>
                    <form method="post">
                        <div class="form-group">
                            <button type="submitAssetQRCode" name="submitAssetQRCode" class="btn btn-secondary addIso-btn"><i class="fas fa-qrcode"></i>&#160;&#160;Scan Device QR Code</button>
                        </div>
                    </form>
                    <form method="post" name='addSteamFrm' id='addSteamFrm'>
                        <div class="form-inline asset-inline-form">
                            <input type="text" id="addSteamTE" name="addSteamTE" class="form-control manual-entryForm" required placeholder="Enter Device ID">
                            <button type="submit" name="submitSteam" class="btn manual-entryButton"><i id="steamBtnAdd" onclick='showRemSteamFrm()' class="fas lock-dark fa-lock-open"></i></button>
                        </div>
                    </form>
                    <form method="post" name='remSteamFrm' id='remSteamFrm'>
                        <div class="form-inline asset-inline-form">
                            <input type="text" id="remSteamTE" name="remSteamTE" class="form-control manual-entryForm" required placeholder="Enter Device ID">
                            <button type="submit" name="submitSteam" class="btn manual-entryButton"><i id="steamBtnRem" onclick='showAddSteamFrm()' class="fas lock-red fa-lock"></i></button>
                        </div>
                    </form>
                </div>

                <hr class="devcd-divider"> 
                <div class="card-body">
                    <h6><b>Water:</b></h6>
                    <p>Close <?php echo $deviceRow['water_isolator']; ?></p>
                    <form method="post">
                        <div class="form-group">
                            <button type="" name="submitAssetQRCode" class="btn btn-secondary addIso-btn"><i class="fas fa-qrcode"></i>&#160;&#160;Scan Device QR Code</button>
                        </div>
                    </form>
                    <form method="post">
                        <div class="form-inline asset-inline-form">
                            <input type="text" id="water_textEntry" name="water_textEntry" class="form-control manual-entryForm" required placeholder="Enter Device ID">
                            <button type="submit" name="submit" class="btn manual-entryButton"><i class="fas fa-lock-open"></i></button>
                        </div>
                    </form>
                </div>
                <hr class="devcd-divider"> 
                <div class="card-body">
                    <h6><b>Compressed air:</b></h6>
                    <p>Close <?php echo $deviceRow['cda_isolator']; ?></p>
                    <form method="post">
                        <div class="form-group">
                            <button type="submitAssetQRCode" name="submitAssetQRCode" class="btn btn-secondary addIso-btn"><i class="fas fa-qrcode"></i>&#160;&#160;Scan Device QR Code</button>
                        </div>
                    </form>
                    <form method="post">
                        <div class="form-inline asset-inline-form">
                            <input type="text" id="c_airTextEntry" name="c_airTextEntry" class="form-control manual-entryForm" required placeholder="Enter Device ID">
                            <button type="submit" name="submit" class="btn manual-entryButton"><i class="fas fa-lock-open"></i></button>
                        </div>
                    </form>
                    </div>
                <hr class="devcd-divider"> 
                <div class="card-body"> 
                    <h6><b>Electrical:</b></h6>
                    <p>Close <?php echo $deviceRow['elec_isolator']; ?></p>
                    <form method="post">
                        <div class="form-group">
                            <button type="submitAssetQRCode" name="submitAssetQRCode" class="btn btn-secondary addIso-btn"><i class="fas fa-qrcode"></i>&#160;&#160;Scan Device QR Code</button>
                        </div>
                    </form>
                    <form method="post">
                        <div class="form-inline asset-inline-form">
                            <input type="text" id="elec_textEntry" name="elec_textEntry" class="form-control manual-entryForm" required placeholder="Enter Device ID">
                            <button type="submit" name="submit" class="btn manual-entryButton"><i class="fas fa-lock-open"></i></button>
                        </div>
                    </form>
                    </div>
                <hr class="devcd-divider"> 
                <div class="card-body">
                    <button type="submitAssetQRCode" name="submitAssetQRCode" class="btn btn-secondary addIso-btn"><i class="far fa-save"></i>&#160;&#160;Save</button>
                </div>
            </div>
            </div>

            <div class="modal fade" id="notFound" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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

        <script type="text/javascript">
            
            function notFoundModal(title, content) {
                $('#notFound .modal-title').text(title);
                $('#notFound .modal-body').text(content);
                $('#notFound').modal('show');
            }
            function showRemSteamFrm() {
                $('#addSteamFrm').hide();
                $('#remSteamFrm').show();
            }
            function showAddSteamFrm() {
                $('#addSteamFrm').show();
                $('#remSteamFrm').hide();
            }
            // $(document).ready(function() { 
            //     showAddSteamFrm();
            //     });
            
        </script>

    <?php include_once("footer.php"); 
        ?>
        <script type='text/javascript'>$(document).ready(function() { 
        showAddSteamFrm();
        });
        </script>
        <?php

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);


            // Create array to hold iso record values
            $currentIso = array('uid' => $_SESSION['id'], 'aid' => $_SESSION['currentAssetID'], 'di' => '', 'dr' => '', 'sIso' => 0, 'wIso' => 0, 'cIso' => 0, 'eIso' => 0);

            print_r($currentIso);
        
            if ($_POST) {

                if (array_key_exists('addSteamTE', $_POST)) {

                    if ($deviceRow['steam_isolator'] == $_POST['addSteamTE']) { // check valve from db matches text box

                        $currentIso['sIso'] = 1; 

                    } else {

                        ?>
                        <script type='text/javascript'> $(document).ready(function(){ 
                            notFoundModal('Device validation failed', 'Device ID does not match asset');
                            });
                        </script> 
                        <?php
    
                    }
                }


                if (array_key_exists('remSteamTE', $_POST)) {

                    if ($deviceRow['steam_isolator'] == $_POST['remSteamTE']) { // check valve from db matches text box

                        $currentIso['sIso'] = 0; 

                    } else {

                        ?>
                        <script type='text/javascript'> $(document).ready(function(){ 
                            notFoundModal('Device validation failed', 'Device ID does not match asset');
                            });
                        </script> 
                        <?php
    
                    }
                }
            }

                
        ?>  

// <!-- ?>
// <script type='text/javascript'>
//     var lkIcon = document.getElementById("steamButton");
//     resetLockIcons();
// </script>
                
// <script type='text/javascript'>

//     var lkIcon = document.getElementById("steamButton");
//     setLockIcons();
// </script>

            // switch ($currentIso['sIso']) {

            //     case 0:
            //         echo "-- sIso is set to 0";
            //         break;
            //     case 1:
            //         echo "-- sIso is set to 1";
            //         break;

            // }


                        // switch ($switchValue) { 

                        //     case 0:
                        //         $currentIso['sIso'] = 1;
                        //         print_r('-- case 0 fired -- current array value for sIso is set to: ');
                        //         print_r($currentIso['sIso']);
                        //         $_POST = array();
                        //         print_r($_POST);
                        //         unset($_POST);
                                
                        //         break;
                        //     case 1:
                        //         $currentIso['sIso'] = 0;
                        //         print_r('-- case 1 fired -- current array value for sIso: ');
                        //         print_r($currentIso['sIso']);
                        //         $_POST = array();
                        //         print_r($_POST);
                        //         unset($_POST);
                        //     break;
                        //     }

                        // if ($currentIso['sIso'] == 0) {
                           
                        //     $currentIso['sIso'] = 1;

                        //     print_r($currentIso['sIso']);
                        
                        // } else {
        
                        //     $currentIso['sIso'] = 0;
                        //     print_r($currentIso['sIso']);
                            
                        // }