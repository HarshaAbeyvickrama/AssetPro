<?php

// require_once './controller/autoloadController.php';

class Technician extends DBConnection {
    //Database connection
    private $DBConnection;

    private $departmentID;
    private $fileUrl;
    private $firstName;
    private $lastName;
    private $NIC;
    private $gender;
    private $dob;
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
        $this->jobTItle = $jobTitle;
        $this->address = $address;
        $this->contactNo = $contactNo;
        $this->email = $email;
        $this->eName = $eName;
        $this->eRelationship = $eRelationship;
        $this->eContact = $eContact;
    }

    //Getting all the technicians
    protected function getAll() {
        $sql = "SELECT
                    ud.UserID,
                    CONCAT(ud.fName, ' ', ud.lName) AS Name,
                    ud.Gender,
                    ud.jobTitle,
                    d.DepartmentCode,
                    d.Name as DepartmentName,
                    tu.TechnicianID
                FROM
                    userdetails ud
                INNER JOIN technicianuser tu ON
                    ud.UserID = tu.UserID
                INNER JOIN department d ON
                    tu.DepartmentID = d.DepartmentID
                ORDER BY
                    tu.TechnicianID";

        $pstm = $this->connect()->prepare($sql);
        $pstm->execute();
        return $pstm;
    }

    //Getting a technician detail using TechnicianID 
    protected function get($TechnicianID) {
        $DBConnection = $this->connect();
        $sql = "SELECT
                    tu.TechnicianID,
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
                INNER JOIN technicianuser tu ON
                    ud.UserID = tu.UserID
                INNER JOIN useremergency ue ON
                    tu.UserID = ue.UserID
                WHERE tu.TechnicianID = ?";
        
        $stmt = $DBConnection->prepare($sql);
        $stmt->execute([$TechnicianID]);
        return $stmt;
    }

    //Adding a technician
    protected function add() {
        $DBConnection = $this->connect();
        try {
            $DBConnection->beginTransaction();

            //Inserting into the user table
            $null = null;
            $addTechnician = "INSERT INTO user VALUES (:userID, '4')";
            $stmt = $DBConnection->prepare($addTechnician);
            $stmt->bindParam(':userID', $null);
            $stmt->execute();

            $UserID = $DBConnection->lastInsertId();

            $userdetails = "INSERT INTO userdetails VALUES (:userID, :firstName, :lastName, :NIC, :address, :gender, :contactNo, :email, :dob, :fileUrl, :jobTitle)";
            $stmt = $DBConnection->prepare($userdetails);

            $stmt->bindParam(':userID', $UserID);
            $stmt->bindParam(':firstName', $this->firstName);
            $stmt->bindParam(':lastName', $this->lastName);
            $stmt->bindParam(':NIC', $this->NIC);
            $stmt->bindParam(':address', $this->address);
            $stmt->bindParam(':gender', $this->gender);
            $stmt->bindParam(':contactNo', $this->contactNo);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':dob', $this->dob);
            $stmt->bindParam(':fileUrl', $this->fileUrl);
            $stmt->bindParam(':jobTitle', $this->jobTitle);
           
            $stmt->execute();
           
            //Inserting into technicianuser table
            $technicianuser = "INSERT INTO technicianuser VALUES (:TechnicianID, :userID, :departmentID)";
            $stmt = $DBConnection->prepare($technicianuser);

            $stmt->bindParam(':TechnicianID', $null);
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
                "message" => "Technician Added Successfully"
            );

        } catch (PDOException | Exception $e) {
            $DBConnection->rollBack();

            $result = array(
                "status" => "Failed",
                "Error" => $e->getMessage(),
                "Message" => "Cannot add a Technician"
            );

            return $result;
        }
    }

    //Updating technician details
    protected function update($TechnicianID) {

    }

    //Deleting a technician
    protected function delete($TechnicianID) {
        $sql = "DELETE FROM ";
        $stmt = $this->DBConnection->prepare($sql);
        $stmt->bindParam(":TechnicianID", $TechnicianID);
        $stmt->execute();
        return $stmt;
    }

}
