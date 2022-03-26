<?php
require_once './controller/autoloadController.php';

class Breakdown extends DBConnection
{
    // Get all the breakdown assets assigned to a particular user by the userID
    protected function getAssigned($userID)
    {
        $dbConnection = $this->connect();
        $sql = "SELECT
                    asset.AssetID,
                    breakdown.BreakdownID,
                    assetdetails.Name AS assetName,
                    breakdown.Status,
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

    protected function get($assetId, $breakdownId)
    {
        $dbConnection = $this->connect();
        $sql = "SELECT
                    asset.AssetID,
                    assetdetails.Name AS assetName,
                    assetdetails.AssetCondition,
                    TYPE.Name AS assetType,
                    category.Name AS categoryName,
                    breakdown.Reason,
                    breakdown.DefectedParts,
                    category.CategoryCode,
                    type.TypeCode
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
        $stmt->execute([$assetId, $breakdownId]);
        return $stmt;
    }

    protected function reportAsset($data)
    {
        $dbConnection = $this->connect();
        $assetId = $data['assetID'];
        $defectedPart = $data['defP'];
        $reason = $data['exDef'];
         $EmpID = $_SESSION['UserID'];
        // $EmpID = $_SESSION['EmployeeID'];
       //$EmpID = 3;
        $sql = "INSERT INTO breakdown(
                AssetID,
                EmployeeID,
                Date,
                Reason,
                DefectedParts
            )
            VALUES(:assetId, :empId, NOW(), :reason, :defectedPart)";

        $stmt = $dbConnection->prepare($sql);

        $stmt->bindParam(':assetId', $assetId);
        $stmt->bindParam(':empId', $EmpID);
        $stmt->bindParam(':reason', $reason);
        $stmt->bindParam(':defectedPart', $defectedPart);

        $stmt->execute();

        $lastInsertedBreakdownID=$dbConnection->lastInsertId(); //PK is the lastInsertID=(BreakdownID)

        $specialization = $this->techSpecialization();  //array inside the techSpecialization will be assigned to a var

        $sql = "SELECT TYPE
                .TypeID,
                TYPE.TypeCode
            FROM
               type
            INNER JOIN asset ON type.TypeID = asset.TypeID
            WHERE
                asset.AssetID =$assetId";                //getting the typeCode related to sepcific assetID
        $stmt1 = $dbConnection->prepare($sql);
        $stmt1->execute();

        $typeData =$stmt1->fetch();
        $typeCode = $typeData['TypeCode'];
//        print_r($type);
        $techSpecial = $specialization[$typeCode]; //if we pass the $typeCode it'll return the key value (specialized person)
//        print_r( $techSpecial);

        $sql = "SELECT
                TechnicianID
            FROM
                technicianuserspec
            WHERE
                Specialization ='$techSpecial'";   //getting all the technicianId related to specific specialization
        $stmt2 = $dbConnection->prepare($sql);
        $stmt2->execute();

        $technicians =$stmt2->fetchAll(); //returns an associative array
        $tecCount=count($technicians);
        $randomIndex=rand(0,$tecCount-1);
        $technicianID = $technicians[$randomIndex]['TechnicianID']; //associative array [index][AssoArra->techiD]


        $sql = "INSERT INTO techrepairbreak(BreakdownID, TechnicianID)
                VALUES(:breakdownId, :technicianId)";
        $stmt3 = $dbConnection->prepare($sql);

        $stmt3->bindParam(':breakdownId', $lastInsertedBreakdownID);
        $stmt3->bindParam(':technicianId',  $technicianID);

        $stmt3->execute();

        return $stmt;


        // if(mysqli_query($mysql,$reportassetquery )) {
        //     echo("Successfully Reported!!");
        // }else{
        //     echo("Error in Submitting!!");
        // }
    }

//===================techinicians========================
    protected function getAssignedBreakdowns($userID)
    {
        $dbConnection = $this->connect();
        $sql = "SELECT
                    assetdetails.AssetID,
                    assetdetails.Name,
                    TYPE.Name AS typeName,
                    breakdown.EmployeeID AS reportedEmployee,
                    department.DepartmentCode,
                    category.CategoryCode,
                    TYPE.TypeCode
                FROM
                    breakdown
                INNER JOIN assetdetails ON assetdetails.AssetID = breakdown.AssetID
                INNER JOIN asset ON asset.AssetID = breakdown.AssetID
                INNER JOIN TYPE ON TYPE.TypeID = asset.TypeID
                INNER JOIN category ON category.CategoryID = asset.CategoryID
                INNER JOIN employeeuser ON employeeuser.EmployeeID = breakdown.EmployeeID
                INNER JOIN department ON department.DepartmentID = employeeuser.DepartmentID
                INNER JOIN techrepairbreak ON techrepairbreak.BreakdownID = breakdown.BreakdownID
                WHERE
                    techrepairbreak.TechnicianID =(
                    SELECT
                        technicianuser.TechnicianID
                    FROM
                        technicianuser
                    WHERE
                        technicianuser.UserID = ?
                )";
        $pstm = $dbConnection->prepare($sql);
        $pstm->execute(array($userID));
        return $pstm;
    }

    private function techSpecialization()
    {
        return [
            "EA" => "Electrician",
            "FU" => "Carpenter",
            "PE" => "Electrician",
            "MA" => "Mechanic",
            "SW" => "IT_Technician"
        ];
    }


}