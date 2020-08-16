<?php 
    include("header.php"); 
    include("sessionCheck.php");
?>


    <!-- CARD DECK HTML-->	
    <div class="mainContent">
        <div class="jumbotron isocd-jtron">
            <p class="page-title">Factory 4 Isolations</p>
            <hr class="isolTitleHR">
            <!-- CARD ROW (3) -->
            <div class="card-deck">


<?php


    include("db_connection.php");

    $f4IsolationsQuery = "SELECT ISOLATIONS.*, `user_firstName`, `user_lastName`, `user_telephone`, `asset_name`, `location`, `description`\n". "FROM `ISOLATIONS` \n". "JOIN USERS ON `USERS_user_id` = `user_id` \n". "JOIN ASSETS ON `ASSETS_asset_id` = `asset_id`\n". "WHERE `date_removed` IS NULL AND `location` = \"F4\"\n". "ORDER BY `date_isolated` DESC";


    if ($result = mysqli_query($link, $f4IsolationsQuery)) {

        while ($row = mysqli_fetch_assoc($result)) {

            ?>

                <div class="card isoCard">
                <div class="card-header">
                    <h5 class="card-title"><?php echo $row['asset_name'];?></h5>
                    <p class="card-text"><?php echo $row['description'];?></p>
                </div>
                <div class="card-body">
 
                    <ul class="isocd-ul">
                    <li class="isocd-li">
                        <div class="container">
                            <div class="row ">
                                <div class="col-1 isocd-fa-col1"><i class="isocd-fa far fa-calendar-check"></i></div>
                                <div class="col-8 isocd-value"><p class="isocd-value-p"><?php echo $row['date_isolated'];?></p></div>
                            </div>
                        </div>
                    </li>
                    <li class="isocd-li">
                        <div class="container">
                            <div class="row ">
                                <div class="col-1 isocd-fa-col1"><i class="isocd-fa far fa-user"></i></div>
                                <div class="col-8 isocd-value"><p class="isocd-value-p"><?php echo $row['user_firstName']."&nbsp".$row['user_lastName'];?></p></div>
                            </div>
                        </div>
                    </li>
                    <li class="isocd-li">
                        <div class="container">
                            <div class="row">
                                <div class="col-1 isocd-fa-col1"><i class="isocd-fa fa fa-phone-alt"></i></div>
                                <div class="col-8 isocd-value"><p class="isocd-value-p"><?php echo $row['user_telephone'];?></p></div>
                            </div>
                        </div>
                    </li>
                    </ul>
                    <hr class="isocd-divider"> 
                    <a href="#" class="btn btn-primary isocd-btn"><i class="fas fa-unlock-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;Remove Isolation</a> 
                </div>
                </div>



                        <!-- CARD HTML -->
                        <div class="card isocd-card">
                            <div class="card-header isocd-card-header">
                                <h5 class="card-title"><?php echo $row['asset_name'];?></h5>
                                <p class="card-text"><?php echo $row['description'];?></p>
                            </div>
                            <div class="tab-content">	
                                <div class="tab-pane active" id="isocd1-iso">
                                    <div class="card-body isocd-card-body">
                                        
                                        <hr class="isocd-divider"> 
                                        <ul class="isocd-ul">
                                        <li class="isocd-li">
                                            <div class="container">
                                                <div class="row ">
                                                    <div class="col-1 isocd-fa-col1"><i class="isocd-fa far fa-calendar-check"></i></div>
                                                    <div class="col-8 isocd-value"><p class="isocd-value-p"><?php echo $row['date_isolated'];?></p></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="isocd-li">
                                            <div class="container">
                                                <div class="row ">
                                                    <div class="col-1 isocd-fa-col1"><i class="isocd-fa far fa-user"></i></div>
                                                    <div class="col-8 isocd-value"><p class="isocd-value-p"><?php echo $row['user_firstName']."&nbsp".$row['user_lastName'];?></p></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="isocd-li">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-1 isocd-fa-col1"><i class="isocd-fa fa fa-phone-alt"></i></div>
                                                    <div class="col-8 isocd-value"><p class="isocd-value-p"><?php echo $row['user_telephone'];?></p></div>
                                                </div>
                                            </div>
                                        </li>
                                        </ul>
                                        <hr class="isocd-divider"> 
                                        <a href="#" class="btn btn-primary isocd-btn"><i class="fas fa-unlock-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;Remove Isolation</a>
                                    </div>
                                </div>
                                <!-- SOURCES TAB -->
                                <div class="tab-pane" id="isocd1-scs">
                                    <div class="card-body isocd-card-body">
                                        <ul class="isocd-ul">
                                        <li class="isocd-li">
                                            <div class="container">
                                                <div class="row ">
                                                    <div class="col-1 isocd-fa-col1"><i class="isocd-fa fas fa-fan"></i></div>
                                                    <div class="col-10 isocd-value"><p class="isocd-value-p">Compressed Air</p></div>
                                                    <div class="col-1 isocd-fa-col1"><i class="isocd-fa isocd-tickMark fas fa-lock"></i></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="isocd-li">
                                            <div class="container">
                                                <div class="row ">
                                                    <div class="col-1 isocd-fa-col1"><i class="isocd-fa fas fa-water"></i></div>
                                                    <div class="col-10 isocd-value"><p class="isocd-value-p">Water</p></div>
                                                    <div class="col-1 isocd-fa-col1"><i class="isocd-fa isocd-tickMark fas fa-lock"></i></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="isocd-li">
                                            <div class="container">
                                                <div class="row ">
                                                    <div class="col-1 isocd-fa-col1"><i class="isocd-fa fas fa-wind"></i></div>
                                                    <div class="col-10 isocd-value"><p class="isocd-value-p">Steam</p></div>
                                                    <div class="col-1 isocd-fa-col1"><i class="isocd-fa isocd-tickMark fas fa-lock"></i></div>
                                                </div>
                                            </div>
                                        </li>			
                                        <li class="isocd-li">
                                            <div class="container">
                                                <div class="row ">
                                                    <div class="col-1 isocd-fa-col1"><i class="isocd-fa fas fa-bolt"></i></div>
                                                    <div class="col-10 isocd-value"><p class="isocd-value-p">Electricity</p></div>
                                                    <div class="col-1 isocd-fa-col1"><i class="isocd-fa-ltgrey fas fa-lock-open"></i></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="isocd-li">
                                            <div class="container">
                                                <div class="row ">
                                                    <div class="col-1 isocd-fa-col1"><i class="isocd-fa fas fa-snowflake"></i></div>
                                                    <div class="col-10 isocd-value"><p class="isocd-value-p">Ethylene Glycol (CH<sub>2</sub>H<sub>6</sub>O<sub>2</sub>)</p></div>
                                                    <div class="col-1 isocd-fa-col1"><i class="isocd-fa isocd-tickMark fas fa-lock"></i></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="isocd-li">
                                            <div class="container">
                                                <div class="row ">
                                                    <div class="col-1 isocd-fa-col1"><i class="isocd-fa fas fa-flask"></i></div>
                                                    <div class="col-10 isocd-value"><p class="isocd-value-p">Ammonia (NH<sub>3</sub>)</p></div>
                                                    <div class="col-1 isocd-fa-col1"><i class="isocd-fa isocd-tickMark fas fa-lock"></i></div>
                                                </div>
                                            </div>
                                        </li>			
                                        <li class="isocd-li">
                                            <div class="container">
                                                <div class="row ">
                                                    <div class="col-1 isocd-fa-col1"><i class="isocd-fa fas fa-flask"></i></div>
                                                    <div class="col-10 isocd-value"><p class="isocd-value-p">Peroxide (H<sub>2</sub>O<sub>2</sub>)</p></div>
                                                    <div class="col-1 isocd-fa-col1"><i class="isocd-fa isocd-tickMark fas fa-lock"></i></div>
                                                </div>
                                            </div>
                                        </li>
                                        </ul>
                                    </div><!-- CARD BODY -->

                        </div><!-- CARD 1 -->
                        
         <?php    
        }
    }
?>

                    </div><!-- CARD DECK --> 	
                </div><!-- F1 JUMBOTRON -->	
            </div><!-- F1 MAIN CONTENT -->

<?php include("footer.php"); ?>

