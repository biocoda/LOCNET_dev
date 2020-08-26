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

                echo $currentUser;
                echo "<br>";
                echo $currentAsset;

                if ($_SESSION['currentAssetID']) {

                    include("db_connection.php");

                    $getDeviceQry = "SELECT `source`, `device_name` FROM `devices` WHERE `ASSETS_asset_id` = $currentAsset";
                 
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
            <p class="card-header">Select devices to isolate</p>
                <div class="card-body">
                    <h6><b>Steam:</b></h6>
                    <p>Close <?php echo $steamDevice; ?></p>
                    <form method="post">
                        <div class="form-group">
                            <button type="submitAssetQRCode" name="submitAssetQRCode" class="btn btn-primary addIso-btn"><i class="fas fa-qrcode"></i>&#160;&#160;Scan Device QR Code</button>
                        </div>
                    </form>
                    <form method="post">
                        <div class="form-inline asset-inline-form">
                            <input type="text" id="steam_textEntry" name="steam_textEntry" class="form-control manual-entryForm" required placeholder="Enter Device ID">
                            <button type="submit" name="submit" class="btn manual-entryButton"><i class="fas fa-lock-open"></i></button>
                        </div>
                    </form>
                </div>
                <hr class="devcd-divider"> 
                <div class="card-body">
                    <h6><b>Water:</b></h6>
                    <p>Close <?php echo $waterDevice; ?></p>
                    <form method="post">
                        <div class="form-group">
                            <button type="" name="submitAssetQRCode" class="btn btn-primary addIso-btn"><i class="fas fa-qrcode"></i>&#160;&#160;Scan Device QR Code</button>
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
                    <p>Close <?php echo $cdaDevice; ?></p>
                    <form method="post">
                        <div class="form-group">
                            <button type="submitAssetQRCode" name="submitAssetQRCode" class="btn btn-primary addIso-btn"><i class="fas fa-qrcode"></i>&#160;&#160;Scan Device QR Code</button>
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
                    <p>Close <?php echo $elecDevice; ?></p>
                    <form method="post">
                        <div class="form-group">
                            <button type="submitAssetQRCode" name="submitAssetQRCode" class="btn btn-primary addIso-btn"><i class="fas fa-qrcode"></i>&#160;&#160;Scan Device QR Code</button>
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
                    <button type="submitAssetQRCode" name="submitAssetQRCode" class="btn btn-primary addIso-btn"><i class="far fa-save"></i>&#160;&#160;Save</button>
                </div>
            </div>
            </div>
        <?php include_once("footer.php"); ?>  
