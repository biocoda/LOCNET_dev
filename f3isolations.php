<?php 
    include_once("sessionCheck.php");
    include_once("header.php"); 
?>
<div class="mainContent">
    <div class="jumbotron isocd-jtron">
        <p class="page-title text-nowrap">Factory 3 Isolations</p>
        <hr class="isolTitleHR">
        <div class="card-deck">
<?php

    include("db_connection.php");

    $f3IsolationsQuery = "SELECT isolations.*, `user_firstName`, `user_lastName`, `user_telephone`, `asset_name`, `location`, `description` FROM `isolations` JOIN users ON `USERS_user_id` = `user_id` JOIN assets ON `ASSETS_asset_id` = `asset_id` WHERE `date_removed` IS NULL AND `location` = \"F3\" ORDER BY `date_isolated` DESC";

    if ($result = mysqli_query($link, $f3IsolationsQuery)) {

        while ($row = mysqli_fetch_assoc($result)) {

            include("isolationCard.php");
        }
    } else {

        echo "There are no registered isolations";
    }
?>
        </div>
    </div>
</div>
<?php require_once("footer.php"); ?>

