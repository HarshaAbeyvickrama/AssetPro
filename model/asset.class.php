<?php
require_once './controller/autoloadController.php';
// enum Types: string{
//     case ALL ="all";
//     case ASSIGNED ="assigned";
//     case UNASSIGNED ="unassigned";
//     case TANGIBLE ="tangible";
//     case CONSUMABLE ="consumable";
// }
class Asset extends DBConnection{

    private $dbConnection;

    // properties related to an asset

    private $status = "unassigned";
    // Getting the values
    private $assetName;
    private $assetDescription;
    private $assetType;
    private $category;
    private $condition;
    private $purchaseDate;
    private $purchaseCost;
    
    // Warrenty
    private $hasWarrenty;
    private $warrentyStart;
    private $warrentyEnd;
    private $otherInfo;

    // Depriciation
    private $hasDepriciation;

    private $depriciationMethod;
    private $depriciaionRate;
    private $residualValue;
    private $usefulYears;

    // Image
    
    private $extension = null;

    public function __construct($assetName , $assetType , $category , $condition , $purchaseCost , $purchaseDate,$otherInfo = null , $extension , $hasWarrenty = false , $warrentyStart = null, $warrentyEnd = null , $hasDepriciation = false , $depriciationMethod = 'straightLine' , $usefulYears = null , $depriciaionRate = null , $residualValue = null){
        
        $this->dbConnection = $this->connect();
        $this->assetName = $assetName;
        $this->assetType = $assetType;
        $this->category = $category;
        $this->condition = $condition;
        $this->purchaseCost = $purchaseCost;
        $this->purchaseDate = $purchaseDate;
        $this->extension = $extension;
        
        $this->hasWarrenty = $hasWarrenty;
        $this->warrentyStart = $warrentyStart;
        $this->warrentyEnd = $warrentyEnd;
        $this->otherInfo = $otherInfo;

        $this->hasDepriciation = $hasDepriciation;
        $this->depriciationMethod = $depriciationMethod;
        $this->depriciaionRate = $depriciaionRate;
        $this->usefulYears = $usefulYears;
        $this->residualValue = $residualValue;


    }
    // Get all assets in the db (for asset manager)
    // $type = the typeof assets to retrieve (all , assigned , shared , unassigned)
    protected function getAll($type){
        // $dbConnection = $this->connect();
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
        $result = $this->dbConnection->query($sql);
        return $result;
    }

    // Get all the assets assigned to a particular user by the userID
    protected function getAssigned($userID){
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
                    asset.assignedUser = ?
                ORDER BY
                    asset.AssetID";
        $pstm = $dbConnection->prepare($sql);
        $pstm->execute(array($userID));
        return $pstm;
    }

    // Get all the details of a particular asset by assetID
    protected function get($assetId){
        // $dbConnection = $this->connect();
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
        $stmt = $this->dbConnection->prepare($sql);
        $stmt->execute([$assetId]);
        return $stmt;
    }

    // Delete an asset by the ID
    protected function delete($assetId){
        // $dbConnection = $this->connect();
        $sql = "delete from asset where assetId=assetID";
        $stmt = $this->dbConnection->prepare($sql);
        $stmt->bindParam("assetID" , $assetId);
        $stmt->execute();
        return $stmt;
    }

    protected function update(){

    }
    protected function save(){
        
        try {
            $this->dbConnection->beginTransaction();

            $dateCreated = date("Y-m-d H:i:s");
            $dateModified = date("Y-m-d H:i:s");
            //Get the Id after adding the asset
            // $assetId = null;

            // Asset table query
            $assetQuery = "insert into asset (AssetID,CategoryID,TypeID,DateCreated,LastModified,Status) values(NULL,category,assetType,dateCreated,dateModified,'Unassigned')";
            $stmt = $this->dbConnection->prepare($assetQuery);

            $stmt->bindParam('category' , $this->category);
            $stmt->bindParam('assetType' , $this->assetType);
            $stmt->bindParam('dateCreated' , $dateCreated);
            $stmt->bindParam('dateModified' , $dateModified);

            $stmt->execute();

            $assetID = $this->dbConnection->lastInsertId();

            // Saving the image
            $fileUrl = '/uploads/assets/'.$assetID.'.'.$this->extension;
            $imageSaved = move_uploaded_file($_FILES['image']['tmp_name'] , '../'.$fileUrl);

            if(!$imageSaved){
                // throw exception
            }

            $assetDetails = "insert into assetdetails values (assetId,assetName , purchaseCost,condition,fileUrl,assetDescription,purchaseDate)";
            $stmt = $this->dbConnection->prepare($assetDetails);
            
            $stmt->bindParam('assetId' , $assetID);
            $stmt->bindParam('assetName' , $this->assetName);
            $stmt->bindParam('purchaseCost' , $this->purchaseCost);
            $stmt->bindParam('condition' , $this->condition);
            $stmt->bindParam('fileUrl' , $fileUrl);
            $stmt->bindParam('assetDescription' , $this->assetDescription);
            $stmt->bindParam('purchaseDate' , $this->purchaseDate);

            $stmt->execute();
            
            // Warrenty
            if($this->hasWarrenty){
                $warrentyQuery = "insert into assetwarranty values(assetId,warrentyStart,warrentyEnd,otherInfo)";
                $stmt = $this->dbConnection->prepare($warrentyQuery);
    
                $stmt->bindParam('assetId' , $assetID);
                $stmt->bindParam('warrentyStart' , $this->warrentyStart);
                $stmt->bindParam('warrentyEnd' , $this->warrentyEnd);
                $stmt->bindParam('otherInfo' , $this->otherInfo);
    
                $stmt->execute();
            }

            if($this->hasDepriciation){
                $depriciaionQuery = "insert into depreciation values (NULL,assetId,usefulYears,depriciaionRate,residualValue)";
                $stmt = $this->dbConnection->prepare($depriciaionQuery);

                $stmt->bindParam('assetId' , $assetID);
                $stmt->bindParam('usefulYears' , $this->usefulYears);
                $stmt->bindParam('depriciaionRate' , $this->depriciaionRate);
                $stmt->bindParam('residualValue' , $this->residualValue);
                
                $stmt->execute();
            }

            $this->dbConnection->commit();

            $notification = new Notification();
            $notification->createNotification(
                type:"addAsset",
                message:"Added New Asset",
                userId:$_SESSION['userID'],
                assetId:$assetID,
                targetUsers:$_SESSION['userID']
            );

            $result = array(
                "status"=>"Ok",
                "assetID" => $assetID,
                "message" => "Asset Added Successfully"
            );
            return $result;

        } catch (PDOException | Exception $e) {
           $this->dbConnection->rollBack();

           $result = array(
                "status"=>"Failed",
                "error" => $e->getMessage(),
                "message" => "Asset addition failed"
            );
            
            return $result;
        }
        
    }

    protected function getAllCounts(){
        $sql = "select (select count(*)from asset)  as allAssets ,
                (select count(*) from asset where assignedUser IS NOT NULL) as assignedAssets ,
                (select count(*) from asset where assignedUser IS NULL AND DepartmentID IS NULL) as unassignedAssets,
                (SELECT COUNT(*) FROM asset WHERE CategoryID = 1 OR CategoryID = 2) as tangibleAssets,
                (SELECT COUNT(*) FROM asset as count WHERE CategoryID = 2) as consumableAssets
                from DUAL";
        $stmt = $this->connect()->prepare($sql);
        
        $stmt->execute();
        return $stmt;
    }

    // get the counts of each types seperately
    protected function getCount($type){
        switch($type){
            case 'all':
                $sql ="select count(*) as allAssets from asset";
                break;
            case 'assigned':
                $sql ="select count(*) as assignedAssets from asset where assignedUser IS NOT NULL";
                break;
            case 'unassigned':
                $sql ="select count(*) as unassignedAsset from asset where assignedUser IS NULL AND DepartmentID IS NULL";
                break;
            case 'tangible':
                $sql ="SELECT COUNT(*) as tangibleAssets FROM asset WHERE CategoryID = 1 OR CategoryID = 2";
                break;
            case 'consumable':
                $sql ="SELECT COUNT(*) as consumableAssets FROM asset as count WHERE CategoryID = 2";
                break;
            default:
                
        }
        $pstm = $this->dbConnection->prepare($sql);
        $pstm->execute();
        return $pstm;
    }
}
