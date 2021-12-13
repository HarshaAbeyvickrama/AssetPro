<?php
class Asset extends DBConnection{

    protected function getAll($type){
        $dbConnection = $this->connect();
        switch ($type) {
            case 'all':
                $sql = "SELECT
                                asset.AssetID,
                                asset.Status,
                                assetdetails.Name AS assetName,
                                assetdetails.AssetCondition,
                                t.Name AS assetType,
                                t.TypeCode,
                                c.CategoryCode
                            FROM
                                asset
                            INNER JOIN assetdetails ON asset.AssetID = assetdetails.AssetID
                            Inner join category c on asset.CategoryID = c.CategoryID
                            INNER join type t on t.TypeID = asset.TypeID
                            ORDER BY
                                asset.AssetID";

                break;
            case 'assigned':
                $sql = "SELECT
                                asset.AssetID,
                                asset.Status,
                                assetdetails.Name AS assetName,
                                assetdetails.AssetCondition,
                                t.Name AS assetType,
                                c.CategoryCode,
                                t.TypeCode,
                                t.TypeID,
                                CONCAT(
                                    userdetails.fName,
                                    ' ',
                                    userdetails.lName
                                ) AS employee
                            FROM
                                asset
                            INNER JOIN assetdetails ON asset.AssetID = assetdetails.AssetID
                            INNER JOIN category c ON
                                asset.CategoryID = c.CategoryID
                            INNER JOIN TYPE t ON
                                asset.TypeID = t.TypeID
                            INNER JOIN userdetails ON asset.EmployeeID = userdetails.UserID
                            WHERE
                                asset.Status = 'assigned' AND asset.EmployeeID IS NOT NULL AND asset.DepartmentID IS NULL
                            ORDER BY
                                asset.AssetID";

                break;
            case 'shared':
                $sql = "SELECT
                                asset.AssetID,
                                asset.Status,
                                assetdetails.Name AS assetName,
                                assetdetails.AssetCondition,
                                t.Name AS assetType,
                                c.CategoryCode,
                                t.TypeCode,
                                t.TypeID,
                                department.Name AS department
                            FROM
                                asset
                            INNER JOIN assetdetails ON asset.AssetID = assetdetails.AssetID
                            INNER JOIN category c ON
                                asset.CategoryID = c.CategoryID
                            INNER JOIN TYPE t ON
                                asset.TypeID = t.TypeID
                            INNER JOIN department ON department.DepartmentID = asset.DepartmentID
                            WHERE
                                asset.Status = 'shared' AND asset.EmployeeID IS NULL AND asset.DepartmentID IS NOT NULL
                            ORDER BY
                                asset.AssetID";
                break;

            case 'unassigned':
                $sql = "SELECT
                                asset.AssetID,
                                asset.Status,
                                assetdetails.Name AS assetName,
                                assetdetails.AssetCondition,
                                t.Name AS assetType,
                                c.CategoryCode,
                                t.TypeCode
                            FROM
                                asset
                            INNER JOIN assetdetails ON asset.AssetID = assetdetails.AssetID
                            INNER JOIN category c ON
                                asset.CategoryID = c.CategoryID
                            INNER JOIN TYPE t ON
                                asset.TypeID = t.TypeID
                            WHERE
                                asset.Status = 'unassigned'
                            ORDER BY
                                asset.AssetID";

                break;
            default:
                # code...
                break;
        }
        $result = $dbConnection->query($sql);
        return $result;
    }

    protected function getAssigned($id){
        $dbConnection = $this->connect();
        $sql = "SELECT
                    asset.AssetID,
                    asset.Status,
                    assetdetails.Name AS assetName,
                    assetdetails.AssetCondition,
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
                    asset.EmployeeID = ?
                ORDER BY
                    asset.AssetID";
        $pstm = $dbConnection->prepare($sql);
        $pstm->execute(array($id));
        return $pstm;

    }

    protected function get($id){
        $dbConnection = $this->connect();
        $sql = "SELECT
                    a.*,
                    ad.*,
                    aw.*,
                    d.*,
                    t.TypeCode,
                    c.CategoryCode
                FROM
                    asset a
                LEFT JOIN assetdetails ad ON
                    a.AssetID = ad.AssetID
                LEFT JOIN assetwarranty aw ON
                    aw.AssetID = a.AssetID
                LEFT JOIN depreciation d ON
                    a.AssetID = d.AssetID
                LEFT JOIN type t ON
                    t.TypeID = a.TypeID
                LEFT JOIN category c ON
                    c.CategoryID = a.CategoryID
                WHERE
                    a.AssetID = ?";
        $stmt = $dbConnection->prepare($sql);
        $stmt->execute([$id]);
        return $stmt;
    }

    protected function delete($id){
        $dbConnection = $this->connect();
        $sql = "delete * from asset where assetId=:assetID";
        $stmt = $dbConnection->prepare($sql);
        $stmt->bindParam(":assetID" , $assetId);
        $stmt->execute();
        return $stmt;

    }

    protected function update(){

    }
    protected function add(){
        
        //Get the Id after adding the asset
        $assetId = null;
        $notification = new Notification();
        $notification->createNotification(
            type:"addAsset",
            message:"Added New Asset",
            userId:$_SESSION['userID'],
            assetId:$assetId,
            targetUsers:$_SESSION['userID']
        );

        return true;
    }

    protected function getAllCounts(){
        
    }
}
