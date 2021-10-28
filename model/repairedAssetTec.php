<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    require_once("../db/dbConnection.php");
    $rootDir = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);
    global $mysql;

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    if(isset($_REQUEST['action'])){
        switch ($_REQUEST['action']) {
            

            case 'getAssets':
               // getAssets($_REQUEST['type']);
               getAssets();
                break;


            case 'getrepairedAssetById':
                getrepairedAssetById($_REQUEST['asset_id']);
                break;


            default:
                # code...
                break;
        }
    }

    



 

    function getAssets(){
        global $mysql;
      
                $sql = "SELECT
                            asset.AssetID,
                            assetdetails.Name as assetName,
                            assetdetails.AssetCondition,
                            TYPE.Name as assetType
                        FROM asset
                        INNER JOIN assetdetails ON asset.AssetID = assetdetails.AssetID
                        INNER JOIN type ON asset.TypeID = type.TypeID
                        ORDER BY asset.AssetID";
                
           
        $result = mysqli_query($mysql,$sql);
        $rows = array();
        while($r = mysqli_fetch_assoc($result)){
            $rows[] = $r;
        }
        echo json_encode($rows);
    }

    function getrepairedAssetById($asset_id){
        global $mysql;
      
                $sql = "SELECT
                            asset.AssetID,
                            asset.Status,
                            assetdetails.Name as assetName,
                            assetdetails.AssetCondition,
                            TYPE.Name as assetType
                        FROM asset
                        INNER JOIN assetdetails ON asset.AssetID = assetdetails.AssetID
                        INNER JOIN type ON asset.TypeID = type.TypeID
                        WHERE asset.AssetID = $asset_id
                        ORDER BY asset.AssetID" ;

        //SELECT * FROM 'asset' INNER JOIN employeeuser ON asset.EmployeeID = employeeuser.EmployeeID 
        //WHERE employeeuser.UserID = 3; 
        //ny uing this code the assets for partcular employee will be shown and one UI is enough
                
           
        $result = mysqli_query($mysql,$sql);
        $rows = array();
        while($r = mysqli_fetch_assoc($result)){
            $rows[] = $r;
        }
        echo json_encode($rows);

        
    }
?>