<?php

include_once 'autoloadController.php';

class departmentController extends Department {
    
    //Getting all the departments
    public function getAllDepartments() {
        $result = $this->getAll();
        return json_encode($result->fetchAll());
    }

    //Getting a department details
    public function getDepartment($id) {
        $result = $this->get($id);
        return json_encode($result->fetchAll());
    }
}

?>