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
               getAssets();
                break;


            case 'getAssignedAssetById':
                getAssignedAssetById($_REQUEST['asset_id']);
                break;

            case 'viewAssetBreak':
                viewAsset();
                break;

            case 'viewBreakAssetById':
                viewBreakAssetDetails($_REQUEST['view_id'],$_REQUEST['assetid']);
                break;
                  
            


            default:
                # code...
                break;
        }
    }

    



 
  //viewing AssignedAsset data from DB, connect with the page of assignedAssets.php 
    function getAssets(){
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
                        ORDER BY asset.AssetID";

                        // $sql ="SELECT
                        // asset.AssetID,
                        // assetdetails.Name AS assetName,
                        // TYPE.Name AS assetType
                        // FROM
                        // asset
                        // INNER JOIN assetdetails ON asset.AssetID = assetdetails.AssetID
                        // INNER JOIN TYPE ON asset.TypeID = TYPE.TypeID
                        // INNER JOIN employeeuser ON asset.EmployeeID = employeeuser.EmployeeID
                        // WHERE employeeuser.UserID = 3
                        // ORDER BY
                        // asset.AssetID";
                         
                        //create a session variable 
                        // like  $empUserId = $_SESSION['userID'];
                       // include where function EmployeeID=(SELECT employeeId from employeeUser where userId=$userId)
                   
                
           
        $result = mysqli_query($mysql,$sql);
        $rows = array();
        while($r = mysqli_fetch_assoc($result)){
            $rows[] = $r;
        }
        echo json_encode($rows);
    }



    //Getting data to report.php form after connecting the data which come to assignedAsset.php page
    function getAssignedAssetById($asset_id){
        global $mysql;

                $sql = "SELECT
                asset.AssetID,
                assetdetails.Name AS assetName,
                assetdetails.AssetCondition,
                TYPE.Name AS assetType,
                category.Name AS categoryName
            FROM
                asset
            INNER JOIN assetdetails ON asset.AssetID = assetdetails.AssetID
            INNER JOIN TYPE ON asset.TypeID = TYPE.TypeID
            INNER JOIN category ON asset.CategoryID = category.CategoryID
            WHERE
                asset.AssetID = $asset_id
            ORDER BY
                asset.AssetID";

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

    //viewing the breakdown assets in the table
    function viewAsset(){
        global $mysql;
      
                $sql = "SELECT
                asset.AssetID,
                assetdetails.Name AS assetName,
                TYPE.Name AS assetType,
                DATE(breakdown.Date) AS reportedDate,
                breakdown.BreakdownID
            FROM
                asset
            INNER JOIN assetdetails ON asset.AssetID = assetdetails.AssetID
            INNER JOIN TYPE ON asset.TypeID = TYPE.TypeID
            INNER JOIN breakdown ON asset.AssetID = breakdown.AssetID
            ORDER BY
                asset.AssetID";
                
           
        $result = mysqli_query($mysql,$sql);
        $rows = array();
        while($r = mysqli_fetch_assoc($result)){
            $rows[] = $r;
        }
        echo json_encode($rows);

    }
  //viewing the details in the form including reason and defected parts
    function  viewBreakAssetDetails($view_id,$assetid){
        global $mysql;
      
                $sql = "SELECT
                asset.AssetID,
                assetdetails.Name AS assetName,
                assetdetails.AssetCondition,
                TYPE.Name AS assetType,
                category.Name AS categoryName,
                breakdown.Reason,
                breakdown.DefectedParts
            FROM
                asset
            INNER JOIN assetdetails ON asset.AssetID = assetdetails.AssetID
            INNER JOIN TYPE ON asset.TypeID = TYPE.TypeID
            INNER JOIN category ON asset.CategoryID = category.CategoryID
            INNER JOIN breakdown ON breakdown.AssetID = asset.AssetID
            WHERE
                asset.AssetID = $assetid AND breakdown.BreakdownID = $view_id 
            ORDER BY 
                breakdown.BreakdownID";
                
           
        $result = mysqli_query($mysql,$sql);
        $rows = array();
        while($r = mysqli_fetch_assoc($result)){
            $rows[] = $r;
        }
        echo json_encode($rows);


    }
?>