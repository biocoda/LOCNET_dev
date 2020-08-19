<div class="card isoCard-card">
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
        <ul class="isocd-ul">
            <li class="isocd-li">
                <div class="container">
                    <div class="row ">
                        <div class="col-1 isocd-fa-col1"><i class="isocd-fa fas fa-wind"></i></div>
                        <div class="col-10 isocd-value"><p class="isocd-value-p">Steam</p></div>
                        <div class="col-1 isocd-fa-col1"><i id="steam<?php echo $row['date_isolated'];?>" class="isocd-grey fas fa-lock-open"></i></div>
                    </div>
                </div>
            </li>
            <li class="isocd-li">
                <div class="container">
                    <div class="row ">
                        <div class="col-1 isocd-fa-col1"><i class="isocd-fa fas fa-water"></i></div>
                        <div class="col-10 isocd-value"><p class="isocd-value-p">Water</p></div>
                        <div class="col-1 isocd-fa-col1"><i id="water<?php echo $row['date_isolated'];?>" class="isocd-grey fas fa-lock-open"></i></div>
                    </div>
                </div>
            </li>
            <li class="isocd-li">
                <div class="container">
                    <div class="row ">
                        <div class="col-1 isocd-fa-col1"><i class="isocd-fa fas fa-fan"></i></div>
                        <div class="col-10 isocd-value"><p class="isocd-value-p">Compressed Air</p></div>
                        <div class="col-1 isocd-fa-col1"><i id="air<?php echo $row['date_isolated'];?>" class="isocd-grey fas fa-lock-open"></i></div>
                    </div>
                </div>
            </li>			
            <li class="isocd-li">
                <div class="container">
                    <div class="row ">
                        <div class="col-1 isocd-fa-col1"><i class="isocd-fa fas fa-bolt"></i></div>
                        <div class="col-10 isocd-value"><p class="isocd-value-p">Electricity</p></div>
                        <div class="col-1 isocd-fa-col1"><i id="elec<?php echo $row['date_isolated'];?>" class="isocd-grey fas fa-lock-open"></i></div>
                    </div>
                </div>
            </li>
        </ul>
    <hr class="isocd-divider"> 
        <a href="#" class="btn btn-primary isocd-btn"><i class="fa fa-unlock-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;Remove Isolation</a> 
    </div>
</div>        
<script type="text/javascript">
    if (<?php echo $row['comp_air_isolated'];?> == 1) {
        var caIcon = document.getElementById("air<?php echo $row['date_isolated'];?>");
        caIcon.className = caIcon.className.replace("fa-lock-open", " fa-lock");
        caIcon.className = caIcon.className.replace("isocd-grey", " isocd-red");
    }
    if (<?php echo $row['water_isolated'];?> == 1) {
        var caIcon = document.getElementById("water<?php echo $row['date_isolated'];?>");
        caIcon.className = caIcon.className.replace("fa-lock-open", " fa-lock");
        caIcon.className = caIcon.className.replace("isocd-grey", " isocd-red");
    }
    if (<?php echo $row['steam_isolated'];?> == 1) {
        var caIcon = document.getElementById("steam<?php echo $row['date_isolated'];?>");
        caIcon.className = caIcon.className.replace("fa-lock-open", " fa-lock");
        caIcon.className = caIcon.className.replace("isocd-grey", " isocd-red");
    }
    if (<?php echo $row['electricity_isolated'];?> == 1) {
        var caIcon = document.getElementById("elec<?php echo $row['date_isolated'];?>");
        caIcon.className = caIcon.className.replace("fa-lock-open", " fa-lock");
        caIcon.className = caIcon.className.replace("isocd-grey", " isocd-red");
    }
</script>