<?php

include_once 'autoloadController.php';

class TechnicianController extends Technician {
    public function __construct()
    {
        
    }
    //Getting all the technicians
    public function getAllTechnicians() {
        $result = $this->getAll();
        return json_encode($result->fetchAll());
    }

    //Getting a technician
    public function getTechnician($id) {
        $result = $this->get($id);
        return json_encode($result->fetch());
    }

    //Adding a technician
    public function addTechnician($firstName, $lastName, $NIC, $address, $gender, $contactNo, $email, $dob, $departmentID, $maritalStatus, $eName, $eRelationship, $eContact) {
        $newTechnician = new Technician (
            firstName:$firstName,
            lastName:$lastName,
            NIC:$NIC,
            address:$address,
            gender:$gender,
            contactNo:$contactNo,
            email:$email,
            dob:$dob,
            departmentID:$departmentID,
            maritalStatus:$maritalStatus,
            eName:$eName,
            eRelationship:$eRelationship,
            eContact:$eContact);
        
        $result = $newTechnician->add();
        return json_encode($result);
    }

    //Updating technician details
    public function updateTechnician() {

    }

    //Deleting a technician
    public function deleteTechnician($id) {
        $result = $this->delete($id);
    }

    

}

?>