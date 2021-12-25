<?php

include_once 'autoloadController.php';

class TechnicianController extends Technician {
    public function __construct()
    {
        
    }
    //Getting all the employees
    public function getAllTechnicians() {
        $result = $this->getAll();
        return json_encode($result->fetchAll());
    }

    //Getting an employee
    public function getTechnician($id) {
        $result = $this->get($id);
        return json_encode($result->fetchAll());
    }

    

}

?>