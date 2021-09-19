<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    require_once("../db/dbConnection.php");
    

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
        global $mysql;
        $isSuccess = false;
        $dateCreated = date("Y-m-d H:i:s");
        $dateModified = date("Y-m-d H:i:s");


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

        $hasWarrenty = isset($_POST['warrenty']);
        if($hasWarrenty){
            $warrentyStart = $_POST['fromDate'];
            $warrentyEnd = $_POST['toDate'];
        }

        $hasDepriciation = isset($_POST['depriciation']);
        if($hasDepriciation){
            $depriciationMethod = $_POST['depriciationMethod'];
            $depriciaionRate = $_POST['depriciaionRate'];
            $residualValue = $_POST['residualValue'];
            $usefulYears = $_POST['usefulYears'];
        }
        
        // Asset table query
        $assetQuery = "insert into asset (AssetID,CategoryID,TypeID,DateCreated,LastModified,Status) values(NULL,$category,$assetType,now(),now(),'Unassigned')";

        if(mysqli_query($mysql,$assetQuery)){
            $assetId = mysqli_insert_id($mysql);

            // Asset detail query
            $assetDetails = "insert into assetdetails values($assetId,'$assetName',$purchaseCost,'$condition','google','$assetDescription',now())";

            // $assetDetails = "INSERT INTO assetdetails(`AssetID`, `Name`, `Cost`, `AssetCondition`, `ImageURL`, `Description`, `PurchasedDate`) VALUES ($assetId, $assetName, $purchaseCost, $condition,'ImageURL',$assetDescription,now())";
            echo($assetDetails);
            if(mysqli_query($mysql,$assetDetails)){
                if($hasWarrenty){

                    $warrentyQuery = "insert into assetwarranty values($assetId,$warrentyStart,$warrentyEnd,$otherInfo)";
                    $warrentyStatus = mysqli_query($mysql,$warrentyQuery);
                }
                if($hasDepriciation){
                    $depriciaionQuery = "insert into depreciation values (NULL,$assetId,$usefulYears,'0')";
                    $depriciationStatus =  mysqli_query($mysql,$depriciaionQuery);
                }

                if($hasDepriciation && $hasWarrenty && $depriciationStatus && $warrentyStatus){
                    // Autocommit
                    $isSuccess = true;
                }elseif($hasDepriciation && $depriciationStatus){
                    // Autocommit
                    $isSuccess = true;
                }elseif($hasWarrenty && $warrentyStatus){
                    // Autocommit
                    $isSuccess = true;
                }else{
                    // rollback
                    $isSuccess = false;
                    echo mysqli_error($mysql);
                }
            }else{
                $isSuccess = false;
                echo mysqli_error($mysql);
            }

        }else{
            $isSuccess = false;
            echo mysqli_error($mysql);
        }
        if($isSuccess){
            echo "Success";
        }else{
            echo "failed";
        }
    }

?>