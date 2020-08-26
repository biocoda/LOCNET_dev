<?php                
class Isolation {

    public $clUserID;
    public $clAssetID;
    public $clDateIsolated;
    public $clDateRemoved;
    public $clSteamIsolated = 0;
    public $clWaterIsolated = 0;
    public $clCdaIsolated = 0;
    public $clElecIsolated = 0;

    function set_uid($clUserID) {
        $this->clUserID = $clUserID;
    }
    function set_aid($clAssetID) {
        $this->clAssetID = $clAssetID;
    }
    function set_di($clDateIsolated) {
        $this->clDateIsolated = $clDateIsolated;
    }
    function set_dr($clDateRemoved) {
        $this->clDateRemoved = $clDateRemoved;
    }
    function set_si($clSteamIsolated) {
        $this->clSteamIsolated = $clSteamIsolated;
    }
    function set_wi($clWaterIsolated) {
        $this->clWaterIsolated = $clWaterIsolated;
    }
    function set_ci($clCdaIsolated) {
        $this->clCdaIsolated = $clCdaIsolated;
    }
    function set_ei($clElecIsolated) {
        $this->clElecIsolated = $clElecIsolated;
    }

}

?>