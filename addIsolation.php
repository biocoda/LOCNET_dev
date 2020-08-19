<?php 
    include_once("header.php"); 
    include_once("sessionCheck.php");
?>
    <div class="mainContent">
        <div class="jumbotron isocd-jtron">
            <p class="page-title">Add Isolation</p>
            <hr class="isolTitleHR">
            <div class="card addIso-card">
                <h5 class="card-header text-white addIso-card-header">Select Asset to Isolate</h5>
                <div class="card-body">
                    <form method="post">
                    <div class="form-group">
                        <button type="submitAssetQRCode" name="submitAssetQRCode" class="btn btn-primary addIso-btn"><i class="fas fa-qrcode"></i>&#160;&#160;Scan Asset QR Code</button>
                    </div>
					<div class="form-inline asset-inline-form">
						<input type="text" id="assetID" name="assetIDfromForm" class="form-control manual-entryForm" required placeholder="Enter Asset ID">
                        <button type="submit-asset" name="submit" onclick="saveEmailLS()" class="btn manual-entryButton"><i class="fas fa-search"></i></button>
                    </div>
                    </form>
                </div>
            </div>
<?php

    include("db_connection.php");

    $f4IsolationsQuery = "SELECT ISOLATIONS.*, `user_firstName`, `user_lastName`, `user_telephone`, `asset_name`, `location`, `description`\n". "FROM `ISOLATIONS` \n". "JOIN USERS ON `USERS_user_id` = `user_id` \n". "JOIN ASSETS ON `ASSETS_asset_id` = `asset_id`\n". "WHERE `date_removed` IS NULL AND `location` = \"F4\"\n". "ORDER BY `date_isolated` DESC";

    if ($result = mysqli_query($link, $f4IsolationsQuery)) {

        while ($row = mysqli_fetch_assoc($result)) {
             
        }
    }   
?>
    </div>	
</div>
<?php require_once("footer.php"); ?>

