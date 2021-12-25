<?php
require_once './controller/autoloadController.php';

class Breakdown extends DBConnection{
     // Get all the breakdown assets assigned to a particular user by the userID
    protected function getAssigned($userID){
        $dbConnection = $this->connect();
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
        $pstm->execute(array($userID));
        return $pstm;
    }

    protected function get($assetId,$breakdownId){
        $dbConnection = $this->connect();
        $sql = "SELECT
        asset.AssetID,
        assetdetails.Name AS assetName,
        assetdetails.AssetCondition,
        type.Name AS assetType,
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

        $stmt = $dbConnection->prepare($sql);
        $stmt->execute([$assetId,$breakdownId]);
        return $stmt;
    }

}