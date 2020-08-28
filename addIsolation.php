<?php 
    include_once("sessionCheck.php");
    include_once("header.php"); 
?>
    <div class="mainContent">
        <div class="jumbotron isocd-jtron">
            <p class="page-title">Add Isolation</p>
            <hr class="isolTitleHR">
            <div class="card addIso-card">
                <p class="card-header addIso-card-header">Select Asset to Isolate</p>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <button class="btn btn-secondary addIso-btn"><i class="fas fa-qrcode"></i>&#160;&#160;Scan Asset QR Code</button>
                        </div>
                    </form>
                    <form method="post">
                        <div class="form-group form-inline">
                            <input type="text" id="assetID" name="assetIDfromForm" class="form-control manual-entryForm" required placeholder="Enter Asset ID">
                            <button type="submit" name="submit" class="btn manual-entryButton"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
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
            <div class="modal fade" id="assetFound" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                            <button type="button" class="btn btn-secondary" id="yesButton" data-dismiss="modal" onclick="window.location.href = 'addDevices.php';">Yes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        </div>
                    </div>
                </div>
            </div>
<?php include_once("footer.php"); ?>
<?php

    if (array_key_exists("submit", $_POST)) {

        $post_assetID = $_POST['assetIDfromForm'];

        include("db_connection.php");

        $getAsset = "SELECT * FROM `assets` WHERE `asset_id` = $post_assetID";

        if ($assetQRES = mysqli_query($link, $getAsset)) {

            $row = mysqli_fetch_assoc($assetQRES);

            if (isset($row)) {

                $modalOPstring = "You have selected ".$row['asset_name']."-".$row["description"]." is this correct?";
                $_SESSION['currentAssetID'] = $row['asset_id'];
                $_SESSION['currentAssetDesc'] = $row['asset_name']."-".$row["description"];

                ?>
                <script type='text/javascript'> $(document).ready(function(){ 
                    launchAF('Are you sure?', '<?php echo $modalOPstring ?>');
                    $('#assetFound').on('shown.bs.modal', function(event) {
                        $('#yesButton').focus();
                    })
                    });
                </script>
                <?php

                } else {

                ?>
                <script type='text/javascript'> $(document).ready(function(){ 
                    launchNF('Unknown Asset', 'Asset not found');
                    });
                </script>
                <?php

                }
        } // asset query result
    } // array key exists
?>
    </div>	
</div>


