<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    require_once("../db/dbConnection.php");
    global $host,$user,$password,$db;

    if(isset($_REQUEST['action'])){
        switch ($_REQUEST['action']) {
            case 'addAsset':
                saveAsset();
                break;
            
            default:
                # code...
                break;
        }
    }

    function saveAsset(){

        // Getting the values
        $assetId = $_POST['assetId'];
        $assetName = $_POST['assetName'];
        $assetType = $_POST['assetType'];
        $category = $_POST['category'];
        $condition = $_POST['condition'];
        $purchaseDate = $_POST['purchaseDate'];
        $purchaseCost = $_POST['purchaseCost'];
        $warrentyStart = $_POST['fromDate'];
        $warrentyEnd = $_POST['toDate'];
        $otherInfo = $_POST['otherInfo'];
        if(isset($_POST['depriciation'])){
            $depriciationMethod = $_POST['depriciationMethod'];
            $depriciaionRate = $_POST['depriciaionRate'];
            $residualValue = $_POST['residualValue'];
            $usefulYears = $_POST['usefulYears'];
        }
        print_r($_POST);
        
    }

?>