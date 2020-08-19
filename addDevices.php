<?php 
    include_once("sessionCheck.php");
    include_once("header.php"); 

?>
    <div class="mainContent">
        <div class="jumbotron isocd-jtron">
            <p class="page-title">Isolate devices</p>
            <hr class="isolTitleHR">
            <?php 

                $assetIDForQry = $_SESSION['currentAssetID'];
                print_r($idFromPrevPage);

                if ($_SESSION['currentAssetID']) {

                    include("db_connection.php");

                    $getDeviceQry = "SELECT `device_name`, `source` FROM `devices` WHERE `ASSETS_asset_id` = $assetIDForQry";
                    
                    if ($getDevicesQRES = mysqli_query($link, $getDeviceQry)) {

                        while ($deviceRow = mysqli_fetch_assoc($getDevicesQRES)) {
                            
                            print_r($deviceRow);
                            $steamValve1 = $deviceRow['0'];
                            $waterValve = $deviceRow['1'];
                            $airValve = $deviceRow['2'];
                            $elecSwitch = $deviceRow['3'];
                            echo '<br>';
                            echo $steamValves;
                            echo $waterValve;
                            echo $airValves;
                            echo $elecSwitch;

                        }

                    }
                } else {

                    echo "error with getting session id from previous page";

                }

                // $steamValves = 'SIV-108-1 & SIV-108-2';       
                // $waterValve = 'WIV-108-1';
                // $airValve = 'CAV-108-1';
                // $elecSwitch = 'EIS-108-1';

            ?>   

            <div class="card addIso-card">
            <h5 class="card-header text-white addIso-card-header">Select Devices to Isolate</h5>
                <div class="card-body">
                    <h5>Steam:</h5>
                    <p>Close <?php echo $steamValves; ?></p>
                    <form method="post">
                        <div class="form-group">
                            <button type="submitAssetQRCode" name="submitAssetQRCode" class="btn btn-primary addIso-btn"><i class="fas fa-qrcode"></i>&#160;&#160;Scan Device QR Code</button>
                        </div>
                        <div class="form-inline asset-inline-form">
                            <input type="text" id="steam_textEntry" name="steam_textEntry" class="form-control manual-entryForm" required placeholder="Enter Device Name">
                            <button type="submit" name="submit" class="btn manual-entryButton"><i class="fas fa-lock"></i></button>
                        </div>
                    </form>
                    <hr class="isocd-divider"> 
                    <br>
                    <h5>Water:</h5>
                    <p>Close <?php echo $waterValve; ?></p>
                    <form method="post">
                        <div class="form-group">
                            <button type="" name="submitAssetQRCode" class="btn btn-primary addIso-btn"><i class="fas fa-qrcode"></i>&#160;&#160;Scan Device QR Code</button>
                        </div>
                        <div class="form-inline asset-inline-form">
                            <input type="text" id="water_textEntry" name="water_textEntry" class="form-control manual-entryForm" required placeholder="Enter Device Name">
                            <button type="submit" name="submit" class="btn manual-entryButton"><i class="fas fa-lock"></i></button>
                        </div>
                    </form>
                    <hr class="isocd-divider"> 
                    <br>
                    <h5>Compressed air:</h5>
                    <p>Close <?php echo $airValve; ?></p>
                    <form method="post">
                        <div class="form-group">
                            <button type="submitAssetQRCode" name="submitAssetQRCode" class="btn btn-primary addIso-btn"><i class="fas fa-qrcode"></i>&#160;&#160;Scan Device QR Code</button>
                        </div>
                        <div class="form-inline asset-inline-form">
                            <input type="text" id="c_airTextEntry" name="c_airTextEntry" class="form-control manual-entryForm" required placeholder="Enter Device Name">
                            <button type="submit" name="submit" class="btn manual-entryButton"><i class="fas fa-lock"></i></button>
                        </div>
                    </form>
                    <hr class="isocd-divider"> 
                    <br>
                    <h5>Electrical:</h5>
                    <p>Close <?php echo $elecSwitch; ?></p>
                    <form method="post">
                        <div class="form-group">
                            <button type="submitAssetQRCode" name="submitAssetQRCode" class="btn btn-primary addIso-btn"><i class="fas fa-qrcode"></i>&#160;&#160;Scan Device QR Code</button>
                        </div>
                        <div class="form-inline asset-inline-form">
                            <input type="text" id="elec_textEntry" name="elec_textEntry" class="form-control manual-entryForm" required placeholder="Enter Device Name">
                            <button type="submit" name="submit" class="btn manual-entryButton"><i class="fas fa-lock"></i></button>
                        </div>
                    </form>
                    <hr class="isocd-divider"> 
                    <br>
                    <button type="submitAssetQRCode" name="submitAssetQRCode" class="btn btn-primary addIso-btn"><i class="far fa-save"></i>&#160;&#160;Save</button>
                </div>
            </div>

        <?php include_once("footer.php"); ?>  
