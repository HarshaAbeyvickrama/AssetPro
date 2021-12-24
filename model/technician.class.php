<?php

require_once './controller/autoloadController.php';

class Technician extends DBConnection {
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
    private $eRelarionship;
    private $eContact;

    public function __construct($departmentID, $firstName, $lastName, $NIC, $gender, $dob, $maritalStatus, $address, $contactNo, $email, $eName, $eRelarionship, $eContact)
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
        $this->eRelarionship = $eRelarionship;
        $this->eContact = $eContact;
    }

    //Getting all the technicians
    protected function getAll() {
        $sql = "SELECT
                    USER.UserID,
                    CONCAT(userdetails.fName,' ',userdetails.lName) AS Name,
                    userdetails.Gender,
                    CONCAT('TEC/',tec.TechnicianID) AS TechnicianID
                FROM
                    technicianuser tec
                INNER JOIN userdetails ON userdetails.UserID = tec.UserID
                JOIN USER ON USER.UserID = userdetails.UserID
                WHERE
                    USER.RoleID = 4";

        $pstm = $this->dbConnection->prepare($sql);
        $pstm->execute();
        return $pstm;
    }

    //Getting a technician detail using TechnicianID
    protected function get($TechnicianID) {
        $sql = "SELECT
                    tu.TechnicianID,
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
                INNER JOIN technicianuser tu ON
                    ud.UserID = tu.UserID
                INNER JOIN useremergency ue ON
                    tu.UserID = ue.UserID
                WHERE TechnicianID = $TechnicianID";
        
        $stmt = $this->DBConnection->prepare($sql);
        $stmt->execute([$TechnicianID]);
        return $stmt;
    }

    //Adding a technician
    protected function add() {
        try {
            $this->DBConnection->beginTransaction();

            //Inserting into the user table
            $addTechnician = "INSERT INTO user VALUES (NULL, '4')";
            $stmt = $this->DBConnection->prepare($addTechnician);
            $stmt->execute();

            $UserID = $this->dbConnection->lastInsertId();

            //Saving the image
            $fileUrl = '/uploads/technicians/'.$UserID.'.'.$this->extention;
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

            //Inserting into technicianuser table
            $technicianuser = "INSERT INTO technicianuser VALUES (NULL, userID, departmentID)";
            $stmt = $this->DBConnection->prepare($technicianuser);

            $stmt->bindParam('userID', $UserID);
            $stmt->bindParam('departmentID', $departmentID);

            $stmt->execute();

            //Inserting into useremergency table
            $userEmergency = "INSERT INTO useremergency VALUES (userID, eRelationship, eName, eContact)";
            $stmt = $this->DBConnection->prepare($userEmergency);
            
            $stmt->bindParam('userID', $UserID);
            $stmt->bindParam('eRelationship', $eRelarionship);
            $stmt->bindParam('eName', $eName);
            $stmt->bindParam('eContact', $eContact);

            $stmt->execute();



        } catch (PDOException | Exception $e) {
            
        }
    }

}