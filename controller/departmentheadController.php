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

    //Getting all the employees in a particular department
    public function getHeadDepartmentEmployeesList($id) {
        $result = $this->getDepartmentEmployees($id);
        return json_encode($result->fetchAll());
    }

    //Getting a department head
    public function getDepartmentHead($id) {
        $result = $this->get($id);
        return json_encode($result->fetch());
    }

    //Getting the image
    public function addImage($image) {
        $extension = pathinfo($image['image']['name'], PATHINFO_EXTENSION);
        $fileUrl = '/uploads/departmentheads/' . uniqid() . '.' . $extension;
        $url = $_SERVER['DOCUMENT_ROOT'] . '/assetpro' . $fileUrl;
        $imageSaved = move_uploaded_file($image['image']['tmp_name'], $url);

        if($imageSaved) {
            $result = array(
                'status' => 'success',
                'message' => 'Image uploaded successfully',
                'imageUrl' => $fileUrl
            );
        } else {
            $result = array(
                'status' => 'error',
                'message' => 'Image upload failed'
            );
        }
        return json_encode($result);
    }

    //Adding a department head
    public function addDepartmentHead($departmentHead) {
        $newDepartmentHead = new DepartmentHead (
            fileUrl:$departmentHead['image'],
            firstName:$departmentHead['fName'],
            lastName:$departmentHead['lName'],
            NIC:$departmentHead['NIC'],
            address:$departmentHead['address'],
            gender:$departmentHead['gender'],
            contactNo:$departmentHead['contactNo'],
            email:$departmentHead['email'],
            dob:$departmentHead['dob'],
            departmentID:$departmentHead['depID'],
            jobTitle:$departmentHead['jobTitle'],
            eName:$departmentHead['eName'],
            eRelationship:$departmentHead['eRelationship'],
            eContact:$departmentHead['econtact']);
        
        $result = $newDepartmentHead->add();
        unset($newDepartmentHead);

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

    //Getting all the assigned assets
    public function getDHAllAssignedAssets($uid) {
        $result = $this-> getAssigned($uid);
        return json_encode($result->fetchAll());
    }
}

?>