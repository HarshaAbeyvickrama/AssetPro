<?php
class DepartmentController extends Department {

    public function __construct()
    {
        
    }
    
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
    
    //Adding a department
    public function addDepartment($departmentCode, $Name, $ContactNum, $description, $DateCreated, $LastModified) {
        $newDepartment = new Department(
            departmentCode:$departmentCode,
            Name:$Name,
            description:$description,
            ContactNum:$ContactNum,
            DateCreated:$DateCreated,
            LastModified:$LastModified);

        $result = $newDepartment->add();
        return json_encode($result);
    }

    //Updating department details
    public function updateDepartment($id) {

    }

    //Deleting a department
    public function deleteDepartment($id) {
        $result = $this->delete($id);
    }

    //Getting a breakdownAssets
    // public function getAllBreakdownAssets($did) {
    //     $result = $this->getBreakdownAssets($did);
    //     return json_encode($result->fetchAll());
    // }
}

?>