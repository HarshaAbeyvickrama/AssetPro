<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    require_once("../db/dbConnection.php");
    global $mysql;

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

        $status = "unassigned";
        // Getting the values
        $assetId = $_POST['assetId'];
        $assetName = $_POST['assetName'];
        $assetDescription = $_POST['assetDescription'];
        $assetType = $_POST['assetType'];
        $category = $_POST['category'];
        $condition = $_POST['condition'];
        $purchaseDate = $_POST['purchaseDate'];
        $purchaseCost = $_POST['purchaseCost'];
        $otherInfo = $_POST['otherInfo'];

        if(isset($_POST['warrenty'])){
            $warrentyStart = $_POST['fromDate'];
            $warrentyEnd = $_POST['toDate'];
            echo($warrentyEnd);
        }

        if(isset($_POST['depriciation'])){
            $depriciationMethod = $_POST['depriciationMethod'];
            $depriciaionRate = $_POST['depriciaionRate'];
            $residualValue = $_POST['residualValue'];
            $usefulYears = $_POST['usefulYears'];
        }
        
        $assetQuery = "insert into asset values($status)";
    }

?>