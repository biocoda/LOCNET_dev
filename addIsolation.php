<?php 
    include("header.php"); 
    include("sessionCheck.php");
?>
    <!-- CARD DECK HTML-->	
    <div class="mainContent">
        <div class="jumbotron isocd-jtron">
            <p class="page-title">Add Isolation</p>
            <hr class="isolTitleHR">

            <div class="card addIso-card">
                <h5 class="card-header text-white addIso-card-header">Select Plant to Isolate</h5>
                <div class="card-body">
                    <p class="card-text">Scan QR code on plant</p>
                    <a href="#" class="btn btn-primary addIso-btn" onClick="showButtons()"><i class="fas fa-qrcode"></i>&#160;&#160;Scan Plant Barcode</a>
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
	
    </div><!-- JUMBOTRON -->	
</div><!-- MAIN CONTENT -->

<?php include("footer.php"); ?>

