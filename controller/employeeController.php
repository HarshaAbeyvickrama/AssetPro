<?php

// include_once 'autoloadController.php';

class EmployeeController extends Employee {
    public function __construct()
    {
        
    }
    
    //Getting all the employees
    public function getAllEmployees() {
        $result = $this->getAll();
        return json_encode($result->fetchAll());
    }

    //Getting an employee
    public function getEmployee($id) {
        $result = $this->get($id);
        return json_encode($result->fetchAll());
    }

    //Adding an employee
    public function addTechnician($firstName, $lastName, $NIC, $address, $gender, $contactNo, $email, $dob, $departmentID, $maritalStatus, $eName, $eRelationship, $eContact) {
        $newEmployee = new Employee (
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
        
        $result = $newEmployee->add();
        return json_encode($result);
    }

    //Updating employee details
    public function updateEmployee($id) {
        
    }

    //Deleting an employee
    public function deleteEmployee($id) {
        $result = $this->delete($id);
    }

}

?>