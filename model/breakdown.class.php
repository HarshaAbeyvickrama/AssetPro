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

}