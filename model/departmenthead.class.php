<?php

// require_once './controller/autoloadController.php';

class DepartmentHead extends DBConnection
{
    //Database connection
    private $DBConnection;

    private $departmentID;
    private $fileUrl;
    private $firstName;
    private $lastName;
    private $NIC;
    private $gender;
    private $dob;
    // private $maritalStatus;
    private $jobTitle;
    private $address;
    private $contactNo;
    private $email;
    private $eName;
    private $eRelationship;
    private $eContact;

    public function __construct($departmentID, $fileUrl, $firstName, $lastName, $NIC, $gender, $dob, $jobTitle, $address, $contactNo, $email, $eName, $eRelationship, $eContact)
    {
        $this->DBConnection = $this->connect();
        $this->departmentID = $departmentID;
        $this->fileUrl = $fileUrl;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->NIC = $NIC;
        $this->gender = $gender;
        $this->dob = $dob;
        $this->jobTitle = $jobTitle;
        $this->address = $address;
        $this->contactNo = $contactNo;
        $this->email = $email;
        $this->eName = $eName;
        $this->eRelationship = $eRelationship;
        $this->eContact = $eContact;
    }

    //Getting all the department heads
    protected function getAll()
    {
        $sql = "SELECT
                    ud.UserID,
                    CONCAT(ud.fName, ' ', ud.lName) AS Name,
                    ud.Gender,
                    ud.ProfilePicURL,
                    ud.jobTitle,
                    d.DepartmentCode,
                    d.Name AS DepartmentName,
                    dhu.HeadID
                FROM
                    userdetails ud
                INNER JOIN departmentheaduser dhu ON
                    ud.UserID = dhu.UserID
                INNER JOIN department d ON
                    dhu.HeadID = d.HeadID
                ORDER BY
                    dhu.HeadID";

        $pstm = $this->connect()->prepare($sql);
        $pstm->execute();
        return $pstm;
    }

    //Getting a department head detail using HeadID
    protected function get($HeadID)
    {
        $DBConnection = $this->connect();
        $sql = "SELECT
                    dhu.HeadID,
                    ud.fName,
                    ud.lName,
                    ud.NIC,
                    ud.Gender,
                    ud.DOB,
                    ud.ProfilePicURL,
                    ud.joBTitle,
                    ud.Address,
                    ud.PhoneNumber,
                    ud.Email,
                    ue.fName AS eName,
                    ue.Relationship,
                    ue.TelephoneNumber
                FROM
                    userdetails ud
                INNER JOIN departmentheaduser dhu ON
                    ud.UserID = dhu.UserID
                INNER JOIN useremergency ue ON
                    dhu.UserID = ue.UserID
                WHERE HeadID = ?";

        $stmt = $DBConnection->prepare($sql);
        $stmt->execute([$HeadID]);
        return $stmt;
    }

    //Adding a Department Head
    protected function add() {
        $DBConnection = $this->connect();
        try {
            $DBConnection->beginTransaction();

            //Inserting into the user table
            $null = null;
            $addDepartmentHead = "INSERT INTO user VALUES (:userID, '5')";
            $stmt = $DBConnection->prepare($addDepartmentHead);
            $stmt->bindParam(':userID', $null);
            $stmt->execute();
            print_r('Hello1');

            $UserID = $DBConnection->lastInsertId();

            //Inserting into the userdetails table
            $userdetails = "INSERT INTO userdetails VALUES (:userID, :firstName, :lastName, :NIC, :addr, :gender, :contactNo, :email, :dob, :fileUrl, :jobTitle)";
            $stmt = $DBConnection->prepare($userdetails);

            $stmt->bindParam(':userID', $UserID);
            $stmt->bindParam(':firstName', $this->firstName);
            $stmt->bindParam(':lastName', $this->lastName);
            $stmt->bindParam(':NIC', $this->NIC);
            $stmt->bindParam(':addr', $this->address);
            $stmt->bindParam(':gender', $this->gender);
            $stmt->bindParam(':contactNo', $this->contactNo);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':dob', $this->dob);
            $stmt->bindParam(':fileUrl', $this->fileUrl);
            $stmt->bindParam(':jobTitle', $this->jobTitle);

            $stmt->execute();
            print_r('Hello2');

            //Inserting into departmentheaduser table
            $dheaduser = "INSERT INTO departmentheaduser VALUES (:HeadID, :userID)";
            $stmt = $DBConnection->prepare($dheaduser);

            $stmt->bindParam(':HeadID', $null);
            $stmt->bindParam(':userID', $UserID);

            $stmt->execute();

            //Inserting into useremergency table
            $userEmergency = "INSERT INTO useremergency VALUES (:userID, :eRelationship, :eName, :eContact)";
            $stmt = $DBConnection->prepare($userEmergency);
            
            $stmt->bindParam(':userID', $UserID);
            $stmt->bindParam(':eRelationship', $this->eRelationship);
            $stmt->bindParam(':eName', $this->eName);
            $stmt->bindParam(':eContact', $this->eContact);

            $stmt->execute();

            $DBConnection->commit();

            $result = array(
                "status" => "Ok",
                "userID" => $UserID,
                "message" => "Department Head Added Successfully"
            );
            return $result;

        } catch (PDOException | Exception $e) {
            $DBConnection->rollBack();

            $result = array(
                "status"=>"Failed",
                "Error"=>$e->getMessage(),
                "Message"=>"Cannot add a Departmet Head"
            );

            return $result;
        }
    }


    //Updating department head details
    protected function update($HeadID) {}

    //Deleting a department head
    protected function delete($HeadID)
    {
        $sql = "DELETE FROM ";
        $stmt = $this->DBConnection->prepare($sql);
        $stmt->bindParam("HeadID", $HeadID);
        $stmt->execute();
        return $stmt;
    }

    //Getting breakdownAssets of particular Department
    protected function getBreakdownAssets($userId)
    {
        $DBConnection = $this->connect();


        $sql = "SELECT
                        breakdown.AssetID,
                        breakdown.Date AS reportedDate,
                        asset.AssetID,
                        assetdetails.Name AS assetName,
                        department.DepartmentID,
                        departmentheaduser.HeadID,
                        category.CategoryCode,
                        TYPE.TypeCode
                    FROM
                        breakdown
                    INNER JOIN assetdetails ON assetdetails.AssetID = breakdown.AssetID
                    INNER JOIN asset ON asset.AssetID = assetdetails.AssetID
                    INNER JOIN TYPE ON TYPE
                        .TypeID = asset.TypeID
                    INNER JOIN category ON category.CategoryID = TYPE.CategoryID
                    INNER JOIN department ON department.DepartmentID = asset.DepartmentID
                    INNER JOIN departmentheaduser ON departmentheaduser.HeadID = department.HeadID
                    WHERE
                        departmentheaduser.UserID = ?";

        $pstm = $DBConnection->prepare($sql);
        $pstm->execute(array($userId));
        return $pstm;
    }

    //Getting employees using department ID
    protected function getDepartmentEmployees($userId)
    {
        $DBConnection = $this->connect();
        $sql = "SELECT
                    employeeuser.EmployeeID AS EmployeeID,
                    employeeuser.DepartmentID AS DepartmentID,
                    department.DepartmentCode AS DepartmentCode,
                    CONCAT(userdetails.fName,' ',userdetails.lName) AS Name,
                    userdetails.ProfilePicURL as ProfilePicURL,
                    userdetails.Gender AS Gender,
                    userdetails.jobTitle AS jobTitle
                FROM
                    userdetails
                INNER JOIN employeeuser ON userdetails.UserID = employeeuser.UserID
                INNER JOIN department ON department.DepartmentID = employeeuser.DepartmentID
                INNER JOIN departmentheaduser ON departmentheaduser.DepartmentID = department.DepartmentID
                WHERE
                    departmentheaduser.UserID = ?";

        $stmt = $DBConnection->prepare($sql);
        $stmt->execute(array($userId));
        return $stmt;
    }

    //Getting all assigned assets of particular department
    // protected function getDHAssignedAssets($userId) {
    //     $DBConnection = $this->connect();
    //     $sql = "SELECT

    //             FROM

    //             INNER JOIN
    //             INNER JOIN

    //             WHERE

    //     $stmt = $DBConnection->prepare($sql);
    //     $stmt->execute(array($userId));
    //     return $stmt;"
    // }
}
