<?php 
    include_once("sessionCheck.php");
    include_once("header.php"); 

?>
    <div class="mainContent">
        <div class="jumbotron isocd-jtron">
            <p class="page-title">Available devices for <?php echo $_SESSION['currentAssetDesc']; ?></p>
            <hr class="isolTitleHR">
            <?php 

                $assetIDForQry = $_SESSION['currentAssetID'];

                if ($_SESSION['currentAssetID']) {

                    include("db_connection.php");

                    $getDeviceQry = "SELECT `source`, `device_name` FROM `devices` WHERE `ASSETS_asset_id` = $assetIDForQry";
                 
                    if ($getDevicesQRES = mysqli_query($link, $getDeviceQry)) {

                        while ($deviceRow = mysqli_fetch_assoc($getDevicesQRES)) {

                            switch ($deviceRow["source"]) {

                                case ($deviceRow["source"] == 'Steam') :
                                    $steamDevice = $deviceRow["device_name"];
                                    break;

                                case ($deviceRow["source"] == 'Water') :
                                    $waterDevice = $deviceRow["device_name"];
                                    break;

                                case ($deviceRow["source"] == 'CDA') :
                                    $cdaDevice = $deviceRow["device_name"];
                                    break;

                                case ($deviceRow["source"] == 'Electricity') :
                                    $elecDevice = $deviceRow["device_name"];
                                    break;
                            }
                            
                        }

                    }

                } else {

                    echo "error with getting session id from previous page";

                }
            ?>   

            <div class="card addIso-card">
            <h5 class="card-header text-white addIso-card-header">Select devices to isolate</h5>
                <div class="card-body">
                    <h5>Steam:</h5>
                    <p>Close <?php echo $steamDevice; ?></p>
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
                    <p>Close <?php echo $waterDevice; ?></p>
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
                    <p>Close <?php echo $cdaDevice; ?></p>
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
                    <p>Close <?php echo $elecDevice; ?></p>
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
