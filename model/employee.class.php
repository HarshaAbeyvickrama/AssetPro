<?php

// require_once './controller/autoloadController.php';

class Employee extends DBConnection {
    //Database connection
    private $DBConnection;

    private $departmentID;
    private $fileUrl;
    private $firstName;
    private $lastName;
    private $NIC;
    private $gender;
    private $dob;
    private $maritalStatus;
    private $jobTitle;
    private $address;
    private $contactNo;
    private $email;
    private $eName;
    private $eRelationship;
    private $eContact;

    public function __construct($departmentID, $fileUrl, $firstName, $lastName, $NIC, $gender, $dob, $maritalStatus, $jobTitle, $address, $contactNo, $email, $eName, $eRelationship, $eContact)
    {
        $this->DBConnection = $this->connect();
        $this->departmentID = $departmentID;
        $this->fileUrl = $fileUrl;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->NIC = $NIC;
        $this->gender = $gender;
        $this->dob = $dob;
        $this->maritalStatus = $maritalStatus;
        $this->jobTitle = $jobTitle;
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
                    ud.jobTitle,
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

    //Getting the details of an employee using the employee ID
    protected function get($EmployeeID) {
        $DBConnection = $this->connect();
        $sql = "SELECT
                    eu.EmployeeID,
                    ud.fName,
                    ud.lName,
                    ud.NIC,
                    ud.Gender,
                    ud.DOB,
                    ud.ProfilePicURL,
                    ud.jobTitle,
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
                WHERE
                    eu.EmployeeID = ?";
        
        $stmt = $DBConnection->prepare($sql);
        $stmt->execute([$EmployeeID]);
        return $stmt;
    }

    //Adding an employee
    protected function add() {
        $DBConnection = $this->connect();
        try {
            $DBConnection->beginTransaction();

            //INserting into the user table
            $null = null;
            $addEmployee = "INSERT INTO user VALUES (:userID, '3')";
            $stmt = $DBConnection->prepare($addEmployee);
            $stmt->bindParam(':userID', $null);
            $stmt->execute();

            $UserID = $DBConnection->lastInsertId();

            //Inserting into the userdetails table
            $userdetails = "INSERT INTO userdetails VALUES (:userID, :firstName, :lastName, :NIC, :addr, :gender, :contactNo, :email, :dob, :fileUrl, :maritalStatus, :jobTitle)";
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
            $stmt->bindParam(':maritalStatus', $this->maritalStatus);
            $stmt->bindParam(':jobTitle', $this->jobTitle);

            $stmt->execute();

            //Inserting into employeeuser table
            $employeeuser = "INSERT INTO employeeuser VALUES (:EmployeeID, :userID, :departmentID)";
            $stmt = $DBConnection->prepare($employeeuser);

            $stmt->bindParam(':EmployeeID', $null);
            $stmt->bindParam(':userID', $UserID);
            $stmt->bindParam(':departmentID', $this->departmentID);

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
                "message" => "Employee Added Successfully"
            );
            return $result;

        } catch (PDOException | Exception $e) {
            $DBConnection->rollBack();

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
