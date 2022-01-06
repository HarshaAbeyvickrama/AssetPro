<?php

// require_once './controller/autoloadController.php';

class DepartmentHead extends DBConnection {
    //Database connection
    private $DBConnection;

    private $departmentID;
    private $firstName;
    private $lastName;
    private $NIC;
    private $gender;
    private $dob;
    private $maritalStatus;
    private $address;
    private $contactNo;
    private $email;
    private $eName;
    private $eRelationship;
    private $eContact;

    public function __construct($departmentID, $firstName, $lastName, $NIC, $gender, $dob, $maritalStatus, $address, $contactNo, $email, $eName, $eRelationship, $eContact)
    {
        $this->DBConnection = $this->connect();
        $this->departmentID = $departmentID;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->NIC = $NIC;
        $this->gender = $gender;
        $this->dob = $dob;
        $this->maritalStatus = $maritalStatus;
        $this->address = $address;
        $this->contactNo = $contactNo;
        $this->email = $email;
        $this->eName = $eName;
        $this->eRelationship = $eRelationship;
        $this->eContact = $eContact;
    }

    //Getting all the department heads
    protected function getAll() {
        $sql = "SELECT
                    USER.UserID,
                    CONCAT(userdetails.fName,' ',userdetails.lName) AS Name,
                    userdetails.Gender,
                    dhu.HeadID AS HeadID
                FROM
                    departmentheaduser dhu
                INNER JOIN userdetails ON userdetails.UserID = dhu.UserID
                JOIN USER ON USER.UserID = userdetails.UserID
                WHERE
                    USER.RoleID = 5";

        $pstm = $this->connect()->prepare($sql);
        $pstm->execute();
        return $pstm;
    }

    //Getting a department head detail using HeadID
    protected function get($HeadID) {
        $sql = "SELECT
                    dhu.HeadID,
                    ud.fName,
                    ud.lName,
                    ud.NIC,
                    ud.Gender,
                    ud.DOB,
                    ud.ProfilePicURL,
                    ud.CivilStatus,
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
                WHERE HeadID = $HeadID";
        
        $stmt = $this->DBConnection->prepare($sql);
        $stmt->execute([$HeadID]);
        return $stmt;
    }

    //Adding a department head
    protected function add() {
        try {
            $this->DBConnection->beginTransaction();

            //Inserting into the user table
            $addTechnician = "INSERT INTO user VALUES (NULL, '4')";
            $stmt = $this->DBConnection->prepare($addTechnician);
            $stmt->execute();

            $UserID = $this->dbConnection->lastInsertId();

            //Saving the image
            $fileUrl = '/uploads/dheads/'.$UserID.'.'.$this->extention;
            $imageSaved = move_uploaded_file($_FILES['image']['tmp_name'] , '../'.$fileUrl);

            if(!$imageSaved) {
                
            }
            //Inserting into the userdetails table
            $userdetails = "INSERT INTO userdetails VALUES (userID, firstname, lastName, NIC, address, gender, contactNo, email, dob, fileUrl, maritalStatus)";
            $stmt = $this->DBConnection->prepare($userdetails);

            $stmt->bindParam('userID', $UserID);
            $stmt->bindParam('firstName', $firstName);
            $stmt->bindParam('lastName', $lastName);
            $stmt->bindParam('NIC', $NIC);
            $stmt->bindParam('address', $address);
            $stmt->bindParam('gender', $gender);
            $stmt->bindParam('contactNo', $contactNo);
            $stmt->bindParam('email', $email);
            $stmt->bindParam('dob', $dob);
            $stmt->bindParam('fileUrl', $fileUrl);
            $stmt->bindParam('maritalStatus', $maritalStatus);

            $stmt->execute();

            //Inserting into departmentheaduser table
            $technicianuser = "INSERT INTO departmentheaduser VALUES (NULL, userID, departmentID)";
            $stmt = $this->DBConnection->prepare($technicianuser);

            $stmt->bindParam('userID', $UserID);
            $stmt->bindParam('departmentID', $departmentID);

            $stmt->execute();

            //Inserting into useremergency table
            $userEmergency = "INSERT INTO useremergency VALUES (userID, eRelationship, eName, eContact)";
            $stmt = $this->DBConnection->prepare($userEmergency);
            
            $stmt->bindParam('userID', $UserID);
            $stmt->bindParam('eRelationship', $eRelationship);
            $stmt->bindParam('eName', $eName);
            $stmt->bindParam('eContact', $eContact);

            $stmt->execute();

        } catch (PDOException | Exception $e) {
            $this->DBConnection->rollBack();

            $result = array(
                "status"=>"Failed",
                "Error"=>$e->getMessage(),
                "Message"=>"Cannot add a Department Head"
            );

            return $result;
        }
    }

    //Updating department head details
    protected function update($HeadID) {

    }

    //Deleting a department head
    protected function delete($HeadID) {
        $sql = "DELETE FROM ";
        $stmt = $this->DBConnection->prepare($sql);
        $stmt->bindParam("HeadID", $HeadID);
        $stmt->execute();
        return $stmt;
    }

    //Getting breakdownAssets of particular Department
    protected function getBreakdownAssets($userId){
        $DBConnection = $this->connect();
        // $sql = "SELECT
        //             breakdown.AssetID,
        //             assetdetails.Name AS assetName,
        //             TYPE.Name AS assetType,
        //             asset.assignedUser,
        //             departmentheaduser.DepartmentID,
        //             department.Name AS departmentName,
        //             breakdown.DefectedParts,
        //             category.CategoryCode,
        //             type.TypeCode
        //         FROM
        //             breakdown
        //         INNER JOIN assetdetails ON assetdetails.AssetID = breakdown.AssetID
        //         INNER JOIN asset ON asset.AssetID = breakdown.AssetID
        //         INNER JOIN TYPE ON TYPE.TypeID = asset.TypeID
        //         INNER JOIN category ON category.CategoryID = type.CategoryID
        //         INNER JOIN departmentheaduser ON departmentheaduser.DepartmentID = asset.DepartmentID
        //         INNER JOIN department ON department.DepartmentID = departmentheaduser.DepartmentID
        //         WHERE
        //             departmentheaduser.UserID = ?";

        $sql = "SELECT
                    breakdown.AssetID,
                    assetdetails.Name AS assetName,
                    TYPE.Name AS assetType,
                    asset.assignedUser,
                    departmentheaduser.DepartmentID,
                    breakdown.Date AS reportedDate,
                    category.CategoryCode,
                    TYPE.TypeCode
                FROM
                    breakdown
                INNER JOIN assetdetails ON assetdetails.AssetID = breakdown.AssetID
                INNER JOIN asset ON asset.AssetID = breakdown.AssetID
                INNER JOIN TYPE ON TYPE
                    .TypeID = asset.TypeID
                INNER JOIN category ON category.CategoryID = TYPE.CategoryID
                INNER JOIN departmentheaduser ON departmentheaduser.DepartmentID = asset.DepartmentID
                INNER JOIN department ON department.DepartmentID = departmentheaduser.DepartmentID
                WHERE
                    departmentheaduser.UserID = ?";

        $pstm = $DBConnection->prepare($sql);
        $pstm->execute(array($userId));
        return $pstm;
    }

        //Getting employees using department ID
        protected function getDepartmentEmployees($userId) {
            $DBConnection = $this->connect();
            $sql = "SELECT
                        employeeuser.EmployeeID AS EmployeeID,
                        employeeuser.DepartmentID,
                        department.DepartmentCode AS DepartmentCode,
                        CONCAT(userdetails.fName,' ',userdetails.lName) AS Name,
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

}

