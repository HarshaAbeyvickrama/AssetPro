<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    require_once("../db/dbConnection.php");
    
    global $mysql;

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    if(isset($_REQUEST['action'])){
        switch ($_REQUEST['action']) {
            case 'addAsset':
                saveAsset();
                break;

            case 'getCount':
                getCount($_REQUEST['type']);
                break;

            case 'getAssets':
                getAssets($_REQUEST['type']);
                break;
            
            default:
                # code...
                break;
        }
    }

    function saveAsset(){
        global $mysql;
        mysqli_begin_transaction($mysql);

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

        try {
            // Asset table query
            $assetQuery = "insert into asset (AssetID,CategoryID,TypeID,DateCreated,LastModified,Status) values(NULL,$category,$assetType,'$dateCreated','$dateModified','Unassigned')";
            mysqli_query($mysql,$assetQuery);

            //getting the asset ID
            $assetId = mysqli_insert_id($mysql);

            // Asset detail query
            $assetDetails = "insert into assetdetails values($assetId,'$assetName',$purchaseCost,'$condition','google','$assetDescription','$purchaseDate')";
            mysqli_query($mysql,$assetDetails);

            
            // Check if warrenty is available
            if($hasWarrenty){
                $warrentyQuery = "insert into assetwarranty values($assetId,'$warrentyStart','$warrentyEnd','$otherInfo')";
                mysqli_query($mysql,$warrentyQuery);
            }
            // Check if depriciation is available
            if($hasDepriciation){
                $depriciaionQuery = "insert into depreciation values (NULL,$assetId,$usefulYears,$depriciaionRate,$residualValue)";
                mysqli_query($mysql,$depriciaionQuery);
            }

            //Commit if everything is ok
            mysqli_commit($mysql);
            echo('OK');

        } catch (mysqli_sql_exception $exception) {
            mysqli_rollback($mysql);
            echo('Not OK\n Exception'.$exception);
        }
        
        // if(mysqli_query($mysql,$assetQuery)){
        //     $assetId = mysqli_insert_id($mysql);

        //     // Asset detail query
        //     $assetDetails = "insert into assetdetails values($assetId,'$assetName',$purchaseCost,'$condition','google','$assetDescription',now())";

        //     if(mysqli_query($mysql,$assetDetails)){
                // if($hasWarrenty){
                //     $warrentyQuery = "insert into assetwarranty values($assetId,'$warrentyStart','$warrentyEnd','$otherInfo')";
                //     $warrentyStatus = mysqli_query($mysql,$warrentyQuery);
                //     // if(!$Ass)
                // }
                // if($hasDepriciation){
                //     $depriciaionQuery = "insert into depreciation values (NULL,$assetId,$usefulYears,'0')";
                //     $depriciationStatus =  mysqli_query($mysql,$depriciaionQuery);
                // }

        //         if($hasDepriciation && $hasWarrenty && $depriciationStatus && $warrentyStatus){
        //             // Autocommit
        //             $isSuccess = true;
        //         }elseif($hasDepriciation && $depriciationStatus){
        //             // Autocommit
        //             $isSuccess = true;
        //         }elseif($hasWarrenty && $warrentyStatus){
        //             // Autocommit
        //             $isSuccess = true;
        //         }else{
        //             // rollback
        //             $isSuccess = false;
        //             echo mysqli_error($mysql);
        //         }
        //     }else{
        //         $isSuccess = false;
        //         echo mysqli_error($mysql);
        //     }

        // }else{
        //     $isSuccess = false;
        //     echo mysqli_error($mysql);
        // }
        // if($isSuccess){
        //     echo "Success";
        // }else{
        //     echo "failed";
        // }
    }
    function getCount($type){
        global $mysql;

        switch ($type) {
            case 'all':
                $query = "SELECT COUNT(*) FROM asset as count";
                break;
            
            default:
                # code...
                break;
        }

        if($result = mysqli_query($mysql,$query)){
            $row = mysqli_fetch_array($result);
            echo($row[0]);
        }else{
            echo "Failed";
        }
    }

    function getAssets($type){
        global $mysql;
        switch ($type) {
            case 'all':
                $sql = "SELECT
                            asset.AssetID,
                            asset.Status,
                            assetdetails.Name as assetName,
                            assetdetails.AssetCondition,
                            TYPE.Name as assetType
                        FROM asset
                        INNER JOIN assetdetails ON asset.AssetID = assetdetails.AssetID
                        INNER JOIN type ON asset.TypeID = type.TypeID
                        ORDER BY asset.AssetID";
                
                break;
            
            default:
                # code...
                break;
        }
        $result = mysqli_query($mysql,$sql);
        $rows = array();
        while($r = mysqli_fetch_assoc($result)){
            $rows[] = $r;
        }
        echo json_encode($rows);
    }
?>