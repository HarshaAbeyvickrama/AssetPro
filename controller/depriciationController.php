<?php
require_once '../model/dbConnection.class.php';
require_once '../model/depriciation.class.php';
class DepriciationController extends Depriciation{


    function __construct(){

    }
    function calculateNetValue(){

    }

    function calculateDepriciation(){

    }

    function getAssetCost($assetID){
        $res = $this->getCost($assetID);   
        echo($res);
    }
}

$dc = new DepriciationController();
$dc->getAssetCost(5);