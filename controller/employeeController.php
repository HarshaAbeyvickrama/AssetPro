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
        return json_encode($result->fetch());
    }

    //Getting the image
    public function addImage($image){
        $extension = pathinfo($image['image']['name'], PATHINFO_EXTENSION);
        $fileUrl = '/uploads/employees/' . uniqid() . '.' . $extension;
        $url = $_SERVER['DOCUMENT_ROOT'] . '/assetpro' . $fileUrl;
        $imageSaved = move_uploaded_file($image['image']['tmp_name'],  $url);

        if ($imageSaved) {
            $result = array(
                'status' => 'success',
                'message' => 'Image uploaded successfully',
                'imageUrl' => $fileUrl
            );
        }else{
            $result = array(
                'status' => 'error',
                'message' => 'Image upload failed'
            );
        }
        return json_encode($result);
    }

    //Adding an employee
    public function addEmployee($employee) { 
        $newEmployee = new Employee (
            fileUrl:$employee['image'],
            firstName:$employee['fName'],
            lastName:$employee['lName'],
            NIC:$employee['NIC'],
            address:$employee['address'],
            gender:$employee['gender'],
            contactNo:$employee['contactNo'],
            email:$employee['email'],
            dob:$employee['dob'],
            departmentID:$employee['depID'],
            jobTitle:$employee['jobTitle'],
            eName:$employee['eName'],
            eRelationship:$employee['eRelationship'],
            eContact:$employee['econtact']);
        
        $result = $newEmployee->add();
        unset($newEmployee);

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