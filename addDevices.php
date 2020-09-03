<?php 
    include_once("sessionCheck.php");
    include_once("header.php"); 
?>
<?php 

$currentAsset = $_SESSION['currentAssetID'];
$currentUser = $_SESSION['id'];

if ($_SESSION['currentAssetID']) {

    include("db_connection.php");
    // get the assets from asset ID passed from previous page
    $getDeviceQry = "SELECT `steam_isolator`, `water_isolator`, `cda_isolator`, `elec_isolator` FROM `assets` WHERE `asset_id` = $currentAsset";
 
    if ($getDevicesQRES = mysqli_query($link, $getDeviceQry)) {
        $deviceRow = mysqli_fetch_assoc($getDevicesQRES);
    }
} else {
    echo "error with getting session id from previous page";
}
?>  
    <div class="mainContent">
        <div class="jumbotron isocd-jtron">
            <p class="page-title">Available devices for <?php echo $_SESSION['currentAssetDesc']; ?></p>
            <hr class="isolTitleHR">
 
            <div class="card addIso-card">
            <p class="card-header">Select devices to isolate</p>
                <div class="card-body">
                    <h6><b>Steam:</b></h6>
                    <p>Close <span id='steamVN'><?php echo $deviceRow['steam_isolator']; ?></span></p>
                    <form>
                        <div class="form-group">
                            <button type="submitAssetQRCode" name="submitAssetQRCode" class="btn btn-secondary addIso-btn"><i class="fas fa-qrcode"></i>&#160;&#160;Scan Device QR Code</button>
                        </div>
                    </form>
                    <form name='addSteamFrmName' id='addSteamFrm'>
                        <div class="form-inline asset-inline-form">
                            <input type="text" id="addSteamTE" name="addSteamTE" class="form-control manual-entryForm" required placeholder="Enter Device ID">
                            <button type="submit" name="submitSteam" class="btn manual-entryButton"><i id="steamBtnAdd" onclick='showRemSteamFrm()' class="fas lock-dark fa-lock-open"></i></button>
                        </div>
                    </form>
                    <form name='remSteamFrmName' id='remSteamFrm'>
                        <div class="form-inline asset-inline-form">
                            <input type="text" id="remSteamTE" name="remSteamTE" class="form-control manual-entryForm" required placeholder="Enter Device ID">
                            <button type="submit" name="submitSteam" class="btn manual-entryButton"><i id="steamBtnRem" onclick='showAddSteamFrm()' class="fas lock-red fa-lock"></i></button>
                        </div>
                    </form>

                </div>
                <hr class="devcd-divider"> 
                <form method="post">
                    <div class="card-body">
                        <input type='hidden' name='remSteamIsoNM' id='remSteamIso'>
                        <input type='hidden' name='addSteamIsoNM' id='addSteamIso'>
                        <button type="submit" name="submitSteam" class="btn btn-secondary addIso-btn"><i class="far fa-save"></i>&#160;&#160;Save</button>
                    </div>
                </form>
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

        <?php include_once("footer.php");?>

        <script type="text/javascript">
            
            function notFoundModal(title, content) {
                $('#notFound .modal-title').text(title);
                $('#notFound .modal-body').text(content);
                $('#notFound').modal('show');
                }
            function showRemSteamFrm() {
                $('#addSteamFrm').hide();
                $('#remSteamFrm').show();
                
                }
            function showAddSteamFrm() {
                $('#addSteamFrm').show();
                $('#remSteamFrm').hide();
                }
            
            $(document).ready(function() { 
                
                showAddSteamFrm();



         
            let steamValNm = document.getElementById('steamVN');

            console.log(steamValNm.innerHTML);

            var steamIsod = 931;

            // this changes the values of the hidden inputs
            $('input[name="addSteamIsoNM"]').attr('value', 1);
            $('input[name="remSteamIsoNM"]').val(steamIsod);


            var y = document.getElementById('remSteamIso').value;
            var z = document.getElementById('addSteamIso').value;
            console.log(y);
            console.log(z);

        });
            
        </script>

<?php include_once("footer.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_POST) {

    print_r($_POST);

    // $xy = $_POST['addSteamIsoNM'];

    // echo $xy;

} 



?>  


        

