<?php

class Stats extends DBConnection
{

    function getAll()
    {
        $sql = "select (select count(*)from asset)  as allAssets ,
                (select count(*) from asset where assignedUser IS NOT NULL) as assignedAssets ,
                (select count(*) from asset where assignedUser IS NULL AND DepartmentID IS NULL) as unassignedAssets,
                (SELECT COUNT(*) FROM asset WHERE CategoryID = 1 OR CategoryID = 2) as tangibleAssets,
                (SELECT COUNT(*) FROM asset WHERE CategoryID = 2) as consumableAssets,
                (SELECT COUNT(*) FROM employeeuser) as allEmployees,
                (SELECT COUNT(*) FROM technicianuser) as allTechnicians
                from DUAL";
        $stmt = $this->connect()->prepare($sql);

        $stmt->execute();
        return $stmt;
    }

    function get($type)
    {
        switch ($type) {
            case 'all':
                $sql = "select count(*) as allAssets from asset";
                break;
            case 'assigned':
                $sql = "select count(*) as assignedAssets from asset where assignedUser IS NOT NULL";
                break;
            case 'unassigned':
                $sql = "select count(*) as unassignedAsset from asset where assignedUser IS NULL AND DepartmentID IS NULL";
                break;
            case 'tangible':
                $sql = "SELECT COUNT(*) as tangibleAssets FROM asset WHERE CategoryID = 1 OR CategoryID = 2";
                break;
            case 'consumable':
                $sql = "SELECT COUNT(*) as consumableAssets FROM asset as count WHERE CategoryID = 2";
                break;
            default:
        }
        $pstm = $this->connect()->prepare($sql);
        $pstm->execute();
        return $pstm;
    }

    function getAllValues()
    {
        $sql = "select (select count(*)from asset)  as allAssets ,
                (select count(*) from asset where assignedUser IS NOT NULL) as assignedAssets ,
                (select count(*) from asset where assignedUser IS NULL AND DepartmentID IS NULL) as unassignedAssets,
                (SELECT COUNT(*) FROM asset WHERE CategoryID = 1 OR CategoryID = 2) as tangibleAssets,
                (SELECT COUNT(*) FROM asset WHERE CategoryID = 2) as consumableAssets,
                (SELECT COUNT(*) FROM employeeuser) as allEmployees,
                (SELECT COUNT(*) FROM technicianuser) as allTechnicians
                from DUAL";
        $stmt = $this->connect()->prepare($sql);

        $stmt->execute();
        return $stmt;
    }

    // Dashboard stats function

    function getTotalValues()
    {
        $sql = "select (SELECT SUM(Cost) FROM `assetdetails`)  as total ,
        (SELECT sum(Cost) from assetdetails INNER join asset on asset.AssetID = assetdetails.AssetID INNER join category on asset.CategoryID = category.CategoryID where asset.CategoryID = 1) as fixed ,
        (SELECT sum(Cost) from assetdetails INNER join asset on asset.AssetID = assetdetails.AssetID INNER join category on asset.CategoryID = category.CategoryID where asset.CategoryID = 2) as intangible , 
        (SELECT sum(Cost) from assetdetails INNER join asset on asset.AssetID = assetdetails.AssetID INNER join category on asset.CategoryID = category.CategoryID where asset.CategoryID = 3) as consumable from DUAl";
        $dbConnection = $this->connect();
        $stmt = $dbConnection->prepare($sql);
        $stmt->execute();
        return $stmt;

    }

    function getBreakdowns($departmentID = null)
    {
        $dbConnection = $this->connect();
        if ($departmentID != null) {
            //Add the methods to get breakdowns of the particular department
        } else {
            $sql = 'SELECT Date , GROUP_CONCAT(BreakdownID)  as IDs from breakdown GROUP by Date ORDER by Date';
            $stmt = $dbConnection->prepare($sql);
            $stmt->execute();
        }
        return $stmt;
    }

    //====Getting counts of assets to the dashboard=====
    function getCount($id)
    {
        $dbConnection = $this->connect();
        $sql = "select (SELECT COUNT(CategoryID) FROM asset WHERE CategoryID=1 AND assignedUser= :userid)  as totalfixed,
                     (SELECT COUNT(CategoryID) FROM asset WHERE CategoryID=2 AND assignedUser= :userid)  as totalconsumables,
                     (SELECT COUNT(CategoryID) FROM asset WHERE CategoryID=3 AND assignedUser= :userid)  as totalintangibles
              from DUAL";
        $stmt = $dbConnection->prepare($sql);
        $stmt->bindParam(':userid', $id);
        $stmt->execute();
        return $stmt;
    }

}
