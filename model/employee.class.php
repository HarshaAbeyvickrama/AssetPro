<?php

require_once './controller/autoloadController.php';

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
                    eu.EmployeeID
                FROM
                    userdetails ud
                INNER JOIN employeeuser eu ON
                    ud.UserID = eu.UserID
                INNER JOIN department d ON
                    eu.DepartmentID = d.DepartmentID";

        $pstm = $this->dbConnection->prepare($sql);
        $pstm->execute();
        return $pstm;
    }

    //Getting the employee details using EmployeeID
    protected function get($EmployeeID) {
        $sql = "SELECT
                    eu.EmployeeID,
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
                INNER JOIN employeeuser eu ON
                    ud.UserID = eu.UserID
                INNER JOIN useremergency ue ON
                    eu.UserID = ue.UserID
                WHERE EmployeeID = $EmployeeID";
        
        $stmt = $this->DBConnection->prepare($sql);
        $stmt->execute([$EmployeeID]);
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

            //Inserting into employeeuser table
            $employeeuser = "INSERT INTO employeeuser VALUES (NULL, userID, departmentID)";
            $stmt = $this->DBConnection->prepare($employeeuser);

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
            
        }
    }

}
