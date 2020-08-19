<?php 
    include_once("header.php"); 
    include_once("sessionCheck.php");
?>
<div class="mainContent">
    <div class="jumbotron isocd-jtron">
        <p class="page-title">All Current Site Isolations</p>
        <hr class="isolTitleHR">
        <div class="card-deck">
<?php

    include("db_connection.php");

    $f1IsolationsQuery = "SELECT ISOLATIONS.*, `user_firstName`, `user_lastName`, `user_telephone`, `asset_name`, `location`, `description`\n". "FROM `ISOLATIONS` \n". "JOIN USERS ON `USERS_user_id` = `user_id` \n". "JOIN ASSETS ON `ASSETS_asset_id` = `asset_id`\n". "WHERE `date_removed` IS NULL". " ORDER BY `date_isolated` DESC";

    if ($result = mysqli_query($link, $f1IsolationsQuery)) {

        while ($row = mysqli_fetch_assoc($result)) {

            ?>

            <?php include("isolationCard.php"); ?>

         <?php    
        }
    } else {
        echo "There are no registered isolations";
    }
?>
        </div>
    </div>
</div>
<?php include_once("footer.php"); ?>











