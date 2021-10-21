<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    require_once("../db/dbConnection.php");
    $rootDir = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);
    global $mysql;

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);



    //get the details of reported Breakdowns in the view//
    //to viewReportBreakdown file//

    function viewReportBreakdownById($asset_id){
        global $mysql;
      
                $sql = "SELECT
                            asset.AssetID,
                            assetdetails.Name as assetName,
                            category.Name,
                            type.Name as assetYpe
                            assetdetails.AssetCondition,
                        FROM asset,assetdetails,category,type
                        WHERE asset.AssetID = $asset_id
                        ORDER BY asset.AssetID" ;
                
           
        $result = mysqli_query($mysql,$sql);
        $rows = array();
        while($r = mysqli_fetch_assoc($result)){
            $rows[] = $r;
        }
        echo json_encode($rows);

        
    }
?>

        //inserting data to sendfeedback file//

    function addReportBreakdownById($asset_id){
        global $mysql;
    $reportbreakdown = 