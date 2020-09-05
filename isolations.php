<?php 
    include_once("sessionCheck.php");
    include_once("header.php"); 
?>
<div class="mainContent">
    <div class="jumbotron isocd-jtron">
        <p class="page-title text-nowrap">All Current Site Isolations</p>
        <hr class="isolTitleHR">
        <div class="card-deck">
<?php

    include("db_connection.php");

    $allIsolationsQuery = "SELECT isolations.*, `user_firstName`, `user_lastName`, `user_telephone`, `asset_name`, `location`, `description` FROM `isolations` JOIN `users` ON `users_user_id` = `user_id` JOIN `assets` ON `assets_asset_id` = `asset_id` WHERE `date_removed` IS NULL ORDER BY `date_isolated` DESC";

    if ($result = mysqli_query($link, $allIsolationsQuery)) {

        while ($row = mysqli_fetch_assoc($result)) {

            $displayTimestamp = new DateTime($row['date_isolated']);

            include("isolationCard.php");
   
        }
    } else {

        echo "There are no registered isolations";

    }
?>
        </div>
    </div>
</div>
<?php include_once("footer.php"); ?>











