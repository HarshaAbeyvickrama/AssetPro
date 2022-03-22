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

    //Getting the department head list
    public function getDepartmentHeadList() {
        $result = $this->getHeadList();
        return json_encode($result->fetchAll());
    }
    
    //Adding a department
    public function addDepartment($department) {
        $DateCreated = date("Y-m-d H:i:s");
        $LastModified = date("Y-m-d H:i:s");
        $HeadID = null;

        $newDepartment = new Department(
            DepartmentCode:$department['dCode'],
            HeadID:$HeadID,
            Name:$department['dName'],
            description:$department['dDes'],
            ContactNum:$department['dCon'],
            DateCreated:$DateCreated,
            LastModified:$LastModified);

        $result = $newDepartment->add();
        unset($newDepartment);

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