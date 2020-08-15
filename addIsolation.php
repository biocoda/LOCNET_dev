<!-- ADD ISOLATION -->	
<div class="mainContent hidden" id="addIsolation">
	<div class="jumbotron isocd-jtron">   
    
        <div class="card addIso-card showing">
            <h5 class="card-header text-white addIso-card-header">Select Plant to Isolate</h5>
                <div class="card-body">
                    <!--    <h5 class="card-title">Select equipment to isolate</h5>-->
                    <p class="card-text">Scan QR code on plant</p>
                    <a href="#" class="btn btn-primary addIso-btn" onClick="showButtons()"><i class="fas fa-qrcode"></i>&#160;&#160;Scan Plant Barcode</a>
                </div>
        </div>
        
        <div class="card addIso-card hidden" id="sourceButtons">
            <h5 class="card-header text-white addIso-card-header">Select Energy Sources to Isolate</h5>
                <div class="card-body">
                    <!--    <h5 class="card-title">Select equipment to isolate</h5>-->
                    <!--   <p class="card-text">Scan QR code on plant</p>-->
                    <button type="button" id="btnAir" class="btn btn-secondary btn-lg btn-block addIso-sources-btn" onClick="changeColor(this.id)" data-toggle="button"><i class="fas fa-fan"></i>&#160;&#160;Compressed Air</button>
                    <button type="button" id="btnSteam" class="btn btn-secondary btn-lg btn-block addIso-sources-btn" onClick="changeColor(this.id)" data-toggle="button"><i class="fas fa-wind"></i>&#160;&#160;Steam</button>
                    <button type="button" id="btnWater" class="btn btn-secondary btn-lg btn-block addIso-sources-btn" onClick="changeColor(this.id)" data-toggle="button"><i class="fas fa-water"></i>&#160;&#160;Water</button>
                    <button type="button" id="btnElec" class="btn btn-secondary btn-lg btn-block addIso-sources-btn" onClick="changeColor(this.id)" data-toggle="button"><i class="fas fa-bolt"></i>&#160;&#160;Electricity</button>
                    <button type="button" id="btnGlycol" class="btn btn-secondary btn-lg btn-block addIso-sources-btn" onClick="changeColor(this.id)" data-toggle="button"><i class="fas fa-snowflake"></i>&#160;&#160;Ethylene Glycol (CH<sub>2</sub>H<sub>6</sub>O<sub>2</sub>)</button>
                    <button type="button" id="btnAmmo" class="btn btn-secondary btn-lg btn-block addIso-sources-btn" onClick="changeColor(this.id)" data-toggle="button"><i class="fas fa-flask"></i>&#160;&#160;Ammonia (NH<sub>3</sub>)</button>
                    <button type="button" id="btnPero" class="btn btn-secondary btn-lg btn-block addIso-sources-btn" onClick="changeColor(this.id)" data-toggle="button"><i class="fas fa-flask"></i>&#160;&#160;Peroxide (H<sub>2</sub>O<sub>2</sub>)</button>
                </div>
        </div>
        
        <div class="card sourceCard hidden" id="btnAir-card">
            <h5 class="card-header text-white addIso-card-header"><i class="fas fa-fan"></i>&#160;&#160;Compressed Air</h5>
                <div class="card-body">
                    <!--    <h5 class="card-title">Select equipment to isolate</h5>-->
                    <p class="card-text">Close CAV-01 on ASU</p>
                    <a href="#" class="btn btn-primary addIso-btn"><i class="fas fa-qrcode"></i>&#160;&#160;Verify</a>
                </div>
        </div>
        
        <div class="card sourceCard hidden" id="btnSteam-card">
            <h5 class="card-header text-white addIso-card-header"><i class="fas fa-wind"></i>&#160;&#160;Steam</h5>
                <div class="card-body">
                    <!--    <h5 class="card-title">Select equipment to isolate</h5>-->
                    <p class="card-text">Close both SIV-01 and SIV-02</p>
                    <a href="#" class="btn btn-primary addIso-btn"><i class="fas fa-qrcode"></i>&#160;&#160;Verify</a>
                </div>
        </div>
        
        <div class="card sourceCard hidden" id="btnWater-card">
            <h5 class="card-header text-white addIso-card-header"><i class="fas fa-water"></i>&#160;&#160;Water</h5>
                <div class="card-body">
                    <!--    <h5 class="card-title">Select equipment to isolate</h5>-->
                    <p class="card-text">Close WV-01</p>
                    <a href="#" class="btn btn-primary addIso-btn"><i class="fas fa-qrcode"></i>&#160;&#160;Verify</a>
                </div>
        </div>
        
        <div class="card sourceCard hidden" id="btnElec-card">
            <h5 class="card-header text-white addIso-card-header"><i class="fas fa-bolt"></i>&#160;&#160;Electricity</h5>
                <div class="card-body">
                    <!--    <h5 class="card-title">Select equipment to isolate</h5>-->
                    <p class="card-text">Set Isolator to 0 position</p>
                    <a href="#" class="btn btn-primary addIso-btn"><i class="fas fa-qrcode"></i>&#160;&#160;Verify</a>
                </div>
        </div>
        
        <div class="card sourceCard hidden" id="btnGlycol-card">
            <h5 class="card-header text-white addIso-card-header"><i class="fas fa-snowflake"></i>&#160;&#160;Ethylene Glycol (CH<sub>2</sub>H<sub>6</sub>O<sub>2</sub>)</h5>
                <div class="card-body">
                    <!--    <h5 class="card-title">Select equipment to isolate</h5>-->
                    <p class="card-text">Close GIV-01</p>
                    <a href="#" class="btn btn-primary addIso-btn"><i class="fas fa-qrcode"></i>&#160;&#160;Verify</a>
                </div>
        </div>
        
         <div class="card sourceCard hidden" id="btnAmmo-card">
            <h5 class="card-header text-white addIso-card-header"><i class="fas fa-flask"></i>&#160;&#160;Ammonia (NH<sub>3</sub>)</h5>
                <div class="card-body">
                    <!--    <h5 class="card-title">Select equipment to isolate</h5>-->
                    <p class="card-text">Close AIV-01</p>
                    <a href="#" class="btn btn-primary addIso-btn"><i class="fas fa-qrcode"></i>&#160;&#160;Verify</a>
                </div>
        </div>
        
        <div class="card sourceCard hidden" id="btnPero-card">
            <h5 class="card-header text-white addIso-card-header"><i class="fas fa-flask"></i>&#160;&#160;Peroxide (H<sub>2</sub>O<sub>2</sub>)</h5>
                <div class="card-body">
                    <!--    <h5 class="card-title">Select equipment to isolate</h5>-->
                    <p class="card-text">Close PIV-01</p>
                    <a href="#" class="btn btn-primary addIso-btn"><i class="fas fa-qrcode"></i>&#160;&#160;Verify</a>
                </div>
        </div>
        
        
    </div><!-- ADD ISO JUMBOTRON -->	
</div><!-- ADD ISO MAIN CONTENT -->    