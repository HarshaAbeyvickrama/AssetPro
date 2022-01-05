<?php

// require_once './controller/autoloadController.php';

class Employee extends DBConnection {
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

    //Getting all the employees
    protected function getAll() {
        $sql = "SELECT
                    ud.UserID,
                    CONCAT(ud.fName, ' ', ud.lName) AS Name,
                    ud.Gender,
                    d.DepartmentCode,
                    d.Name as DepartmentName,
                    eu.EmployeeID
                FROM
                    userdetails ud
                INNER JOIN employeeuser eu ON
                    ud.UserID = eu.UserID
                INNER JOIN department d ON
                    eu.DepartmentID = d.DepartmentID
                ORDER BY eu.EmployeeID";

        $pstm = $this->connect()->prepare($sql);
        $pstm->execute();
        return $pstm;
    }

    //Getting the employee details using EmployeeID
    protected function get($EmployeeID) {
        $DBConnection = $this->connect();
        $sql = "SELECT
                    eu.EmployeeID,
                    ud.fName,
                    ud.lName,
                    ud.NIC,
                    ud.Gender,
                    ud.DOB,
                    ud.ProfilePicURL
                FROM
                    userdetails ud
                INNER JOIN employeeuser eu ON
                    ud.UserID = eu.UserID
                INNER JOIN useremergency ue ON
                    eu.UserID = ue.UserID
                WHERE EmployeeID = ?";
        
        $stmt = $DBConnection->prepare($sql);
        $stmt->execute([$EmployeeID]);
        return $stmt;
    }

    //Getting employees using department ID
    protected function getDepartmentEmployees() {
        $DBConnection = $this->connect();
        $sql = "SELECT
                    eu.EmployeeID,
                    d.DepartmentID,
                    d.DepartmentCode,
                    CONCAT(ud.fName, ' ', ud.lName) AS Name,
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
                INNER JOIN employeeuser eu ON
                    ud.UserID = eu.UserID
                INNER JOIN useremergency ue ON
                    eu.UserID = ue.UserID
                INNER JOIN department d ON
                    d.DepartmentID = eu.DepartmentID
                WHERE
                    d.DepartmentID = 1";

        $stmt = $DBConnection->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    //Adding an employee
    protected function add() {
        try {
            $this->DBConnection->beginTransaction();

            //INserting into the user table
            $addEmployee = "INSERT INTO user VALUES (NULL, '3')";
            $stmt = $this->DBConnection->prepare($addEmployee);
            $stmt->execute();

            $UserID = $this->dbConnection->lastInsertId();

            //Saving the image
            $fileUrl = '/uploads/employees/'.$UserID.'.'.$this->extention;
            $imageSaved = move_uploaded_file($_FILES['image']['tmp_name'] , '../'.$fileUrl);

            if(!$imageSaved) {
                
            }
            //Inserting into the userdetails table
            $userdetails = "INSERT INTO userdetails VALUES (userID, firstname, lastName, NIC, address, gender, contactNo, email, dob, fileUrl, maritalStatus)";
            $stmt = $this->DBConnection->prepare($userdetails);

            $stmt->bindParam('userID', $UserID);
            $stmt->bindParam('firstName', $this->firstName);
            $stmt->bindParam('lastName', $this->lastName);
            $stmt->bindParam('NIC', $this->NIC);
            $stmt->bindParam('address', $this->address);
            $stmt->bindParam('gender', $this->gender);
            $stmt->bindParam('contactNo', $this->contactNo);
            $stmt->bindParam('email', $this->email);
            $stmt->bindParam('dob', $this->dob);
            $stmt->bindParam('fileUrl', $fileUrl);
            $stmt->bindParam('maritalStatus', $this->maritalStatus);

            $stmt->execute();

            //Inserting into employeeuser table
            $employeeuser = "INSERT INTO employeeuser VALUES (NULL, userID, departmentID)";
            $stmt = $this->DBConnection->prepare($employeeuser);

            $stmt->bindParam('userID', $UserID);
            $stmt->bindParam('departmentID', $this->departmentID);

            $stmt->execute();

            //Inserting into useremergency table
            $userEmergency = "INSERT INTO useremergency VALUES (userID, eRelationship, eName, eContact)";
            $stmt = $this->DBConnection->prepare($userEmergency);
            
            $stmt->bindParam('userID', $UserID);
            $stmt->bindParam('eRelationship', $this->eRelationship);
            $stmt->bindParam('eName', $this->eName);
            $stmt->bindParam('eContact', $this->eContact);

            $stmt->execute();

        } catch (PDOException | Exception $e) {
            $this->DBConnection->rollBack();

            $result = array(
                "status"=>"Failed",
                "Error"=>$e->getMessage(),
                "Message"=>"Cannot add an Employee"
            );

            return $result;
        }
    }

    //Updating employee details
    protected function update($EmployeeID) {

    }

    //Deleting an employee
    protected function delete($EmployeeID) {
        $sql = "DELETE FROM user INNER JOIN employeeuser ON user.UserID = employeeuser.UserID WHERE employeeuser.EmployeeID = :EmployeeID";
        $stmt = $this->DBConnection->prepare($sql);
        $stmt->bindParam(":EmployeeID", $EmployeeID);
        $stmt->execute();
        return $stmt;
    }

}
