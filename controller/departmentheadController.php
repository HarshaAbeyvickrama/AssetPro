<?php

// include_once 'autoloadController.php';

class DepartmentHeadController extends DepartmentHead {
    public function __construct()
    {
        
    }
    
    //Getting all the department heads
    public function getAllDepartmentHeads() {
        $result = $this->getAll();
        return json_encode($result->fetchAll());
    }

    //Getting a department head
    public function getDepartmentHead($id) {
        $result = $this->get($id);
        return json_encode($result->fetchAll());
    }

    //Adding a department head
    public function addDepartmentHead($firstName, $lastName, $NIC, $address, $gender, $contactNo, $email, $dob, $departmentID, $maritalStatus, $eName, $eRelationship, $eContact) {
        $newDepartmentHead = new DepartmentHead (
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
        
        $result = $newDepartmentHead->add();
        return json_encode($result);
    }

    //Updating department head details
    public function updateDepartmentHead($id) {
        
    }

    //Deleting a department head
    public function deleteDepartmentHead($id) {
        $result = $this->delete($id);
    }

    //Getting a breakdownAssets
    public function getAllBreakdownAssets($uid) {
        $result = $this->getBreakdownAssets($uid);
        return json_encode($result->fetchAll());
    }

}

?>