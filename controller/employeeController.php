<?php

include_once 'autoloadController.php';

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

    

}

?>