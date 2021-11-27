<?php

class AssignedAsset extends DBConnection{
    
   //============================EMPLOYEE MODULE========================================
  //viewing AssignedAsset data from DB, connect with the page of assignedAssets.php 
  //set session ID for employee
    protected function getAssets($empUserId){
        $dbConnection = $this->connect();
     
                    //$empUserId = $_SESSION['userID'];
                    //when calling the getAsset function only, we set the session there

                    $sql = "SELECT
                    asset.AssetID,
                    assetdetails.Name AS assetName,
                    t.Name AS assetType,
                    t.TypeCode,
                    c.CategoryCode
                FROM
                    asset
                INNER JOIN assetdetails ON asset.AssetID = assetdetails.AssetID
                INNER JOIN category c ON
                    asset.CategoryID = c.CategoryID
                INNER JOIN TYPE t ON
                    t.TypeID = asset.TypeID
                WHERE
                    EmployeeID =(
                    SELECT
                        EmployeeID
                    FROM
                        employeeuser
                    WHERE
                        userId = ?
                )
                ORDER BY
                    asset.AssetID";

        $pstm = $dbConnection->prepare($sql);
        $pstm->execute(array($empUserId));
        return $pstm;
    }


    //Getting data to report.php form after connecting the data which come to assignedAsset.php page
    protected function getAssignedAssetById($asset_id){
        $dbConnection = $this->connect();

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
                asset.AssetID = ?
            ORDER BY
                asset.AssetID";


        $pstm = $dbConnection->prepare($sql);
        $pstm->execute(array($asset_id));
        return $pstm;  
    }

   
    //viewing the breakdown assets in the table
    protected function viewAsset($empUserId){
        global $mysql;
      
            //$empUserId = $_SESSION['userID'];


                $sql = "SELECT
                asset.AssetID,
                breakdown.BreakdownID,
                assetdetails.Name AS assetName,
                t.Name AS assetType,
                DATE(breakdown.Date) AS reportedDate,
                t.TypeCode,
                c.CategoryCode
            FROM
                asset
            INNER JOIN assetdetails ON asset.AssetID = assetdetails.AssetID
            INNER JOIN category c ON
                asset.CategoryID = c.CategoryID
            INNER JOIN TYPE t ON
                t.TypeID = asset.TypeID
            INNER JOIN breakdown ON asset.AssetID = breakdown.AssetID
            WHERE
                breakdown.EmployeeID =(
                SELECT
                    EmployeeID
                FROM
                    employeeuser
                WHERE
                    UserID = ?
            )
            ORDER BY
                breakdown.BreakdownID ASC";
                
        $pstm = $dbConnection->prepare($sql);
        $pstm->execute(array($empUserId));
        return $pstm;
    }


  //viewing the details in the form including reason and defected parts
    protected function viewBreakAssetDetails($assetid,$view_id){
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
                asset.AssetID = ? AND breakdown.BreakdownID = ?
            ORDER BY 
                breakdown.BreakdownID ASC";
                
        $pstm = $dbConnection->prepare($sql);
        $pstm->execute(array($assetid,$view_id));
        return $pstm;
        
    }
}
