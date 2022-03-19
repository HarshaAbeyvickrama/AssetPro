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
    public function addDepartment($department) {
        $newDepartment = new Department(
            departmentCode:$department['departmentCode'],
            Name:$department['Name'],
            description:$department['description'],
            ContactNum:$department['ContactNum'],
            DateCreated:$department['DateCreated'],
            LastModified:$department['LastModified']);

        $result = $newDepartment->add();
        unset($newDepartment);

        return json_encode($result);

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