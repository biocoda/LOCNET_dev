<?php 
    include_once("sessionCheck.php");
    include_once("header.php"); 
?>
    <div class="mainContent">
        <div class="jumbotron isocd-jtron">
            <p class="page-title">Available devices for <?php echo $_SESSION['currentAssetDesc']; ?></p>
            <hr class="isolTitleHR">
            <?php 

                $currentAsset = $_SESSION['currentAssetID'];
                $currentUser = $_SESSION['id'];

                // echo $currentUser;
                // echo "<br>";
                // echo $currentAsset;
                // echo "<br>";

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
                // Create array to hold iso record values
                $currentIso = array('uid' => $_SESSION['id'], 'aid' => $_SESSION['currentAssetID'], 'di' => '', 'dr' => '', 'sIso' => 0, 'wIso' => 0, 'cIso' => 0, 'eIso' => 0);

                print_r($currentIso);

            ?>   
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
                    <form method="post">
                        <div class="form-inline asset-inline-form">
                            <input type="text" id="steam_textEntry" name="steam_textEntry" class="form-control manual-entryForm" required placeholder="Enter Device ID">
                            <button type="submit" name="submitSteam" class="btn manual-entryButton"><i id="steamButton" class="fas lock-dark fa-lock-open"></i></button>
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
            function setLockIcons() {
                lkIcon.className = lkIcon.className.replace("fa-lock-open", " fa-lock");
                lkIcon.className = lkIcon.className.replace("lock-dark", " isocd-red");
                console.log('set lock working');
            }
            function resetLockIcons() {
                lkIcon.className = lkIcon.className.replace("fa-lock", " fa-lock-open");
                lkIcon.className = lkIcon.className.replace("isocd-red", " lock-dark");
                console.log('reset working');
            }
        </script>

        <?php 
        include_once("footer.php"); 
        



            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                if ($deviceRow['steam_isolator'] == $_POST['steam_textEntry']) {



                    if ($currentIso['sIso'] == 0) {
                        // set array value to 1
                        $currentIso['sIso'] = 1;
    
                        ?> 
                        <script type='text/javascript'>
                            var lkIcon = document.getElementById("steamButton");
                            setLockIcons();
                        </script>
                        <?php
    
                    } else {
    
                        $currentIso['sIso'] = 0;
    
                        ?>
                        <script type='text/javascript'>
                            var lkIcon = document.getElementById("steamButton");
                            resetLockIcons();
                        </script>
                        <?php
    
                    }

                } else {

                    ?>
                    <script type='text/javascript'> $(document).ready(function(){ 
                        notFoundModal('Device validation failed', 'Device ID does not match asset');
                        });
                    </script> 
                    <?php
    
                }


            switch ($currentIso['sIso']) {

                case 0:
                    echo "-------------------------------------------------- stIso is set to 0";
                    break;
                case 1:
                    echo "---------------------------------------------------- stIso is set to 1";
                    break;

            }


            }


                
        ?>  
