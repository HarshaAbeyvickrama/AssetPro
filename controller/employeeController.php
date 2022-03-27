<?php

// include_once 'autoloadController.php';

class EmployeeController extends Employee
{
    public function __construct()
    {

    }

    //Getting all the employees
    public function getAllEmployees()
    {
        $result = $this->getAll();
        return json_encode($result->fetchAll());
    }

    //Getting an employee
    public function getEmployee($id)
    {
        $result = $this->get($id);
        return json_encode($result->fetch());
    }

    //Getting the image
    public function addImage($image)
    {
        $extension = pathinfo($image['image']['name'], PATHINFO_EXTENSION);
        $fileUrl = '/uploads/employees/' . uniqid() . '.' . $extension;
        $url = $_SERVER['DOCUMENT_ROOT'] . '/assetpro' . $fileUrl;
        $imageSaved = move_uploaded_file($image['image']['tmp_name'], $url);

        if ($imageSaved) {
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

    //Adding an employee
    public function addEmployee($employee)
    {
        $newEmployee = new Employee (
            fileUrl: $employee['image'],
            firstName: $employee['fName'],
            lastName: $employee['lName'],
            NIC: $employee['NIC'],
            address: $employee['address'],
            gender: $employee['gender'],
            contactNo: $employee['contactNo'],
            email: $employee['email'],
            dob: $employee['dob'],
            departmentID: $employee['depID'],
            jobTitle: $employee['jobTitle'],
            eName: $employee['eName'],
            eRelationship: $employee['eRelationship'],
            eContact: $employee['econtact']);

        $result = $newEmployee->add();
        unset($newEmployee);

        return json_encode($result);
    }

    //Updating employee details
    public function updateEmployee($data, $FILES)
    {

        $existingEmployee = $this->newEmployee(json_decode($this->getEmployee($data['EmployeeID']), true));
        $updateEmployee = $this->newEmployee($data);

        //Filtered employeedetails that should be updated
        $filtered = $this->filterDetails($existingEmployee->toString(), $updateEmployee->toString());
        $filtered['EmployeeID'] = $data['EmployeeID'];

        return $this->update($filtered);

    }

    //Creating a new Employee Object
    private function newEmployee($POST): Employee
    {
        return new Employee(
            departmentID: $POST['depID'] ?? $POST['DepartmentID'],
            fileUrl: $POST['profileImage'] ?? $POST['ProfilePicURL'],
            firstName: $POST['fName'],
            lastName: $POST['lName'] ?? $POST['lName'],
            NIC: $POST['NIC'] ?? $POST['NIC'],
            gender: $POST['gender'] ?? $POST['Gender'],
            dob: $POST['dob'] ?? $POST['DOB'],
            jobTitle: $POST['jobTitle'] ?? $POST['jobTitle'],
            address: $POST['address'] ?? $POST['Address'],
            contactNo: $POST['contactNo'] ?? $POST['PhoneNumber'],
            email: $POST['email'] ?? $POST['Email'],
            eName: $POST['eName'] ?? $POST['fName'],
            eRelationship: $POST['eRelationship'] ?? $POST['Relationship'],
            eContact: $POST['econtact'] ?? $POST['TelephoneNumber'],
        );
    }

    //Filter the updated details
    private function filterDetails($old, $updated): array
    {
        $resultArray = array();
        $userdetails = array();
        $useremergency = array();
        $employeeuser = array();

        //=========userdetails Table===========//
        //Filter data for the userdetails table

        //Employee first name
        if ($old['firstName'] != $updated['firstName']) {
            $userdetails['fName'] = $updated['firstName'];
        }
        //Employee last name
        if ($old['lastName'] != $updated['lastName']) {
            $userdetails['lName'] = $updated['lastName'];
        }
        //NIC
        if ($old['NIC'] != $updated['NIC']) {
            $userdetails['NIC'] = $updated['NIC'];
        }
        //Address
        if ($old['address'] != $updated['address']) {
            $userdetails['Address'] = $updated['address'];
        }
        //Gender
        if ($old['gender'] != $updated['gender']) {
            $userdetails['Gender'] = $updated['gender'];
        }
        //Contact Number
        if ($old['contactNo'] != $updated['contactNo']) {
            $userdetails['PhoneNumber'] = $updated['contactNo'];
        }

        //Email
        if ($old['email'] != $updated['email']) {
            $userdetails['Email'] = $updated['email'];
        }
        //Date of Birth
        if ($old['dob'] != $updated['dob']) {
            $userdetails['DOB'] = $updated['dob'];
        }
        //jobTitle
        if ($old['jobTitle'] != $updated['jobTitle']) {
            $userdetails['jobTitle'] = $updated['jobTitle'];
        }

        if (count($userdetails) > 0) {
            $resultArray['userdetails'] = $userdetails;
        }

        //==========employeeuser table=========//
        //Employee user table
        if ($old['departmentID'] != $updated['departmentID']) {
            $employeeuser['DepartmentID'] = $updated['departmentID'];
        }

        if (count($employeeuser) > 0) {
            $resultArray['employeeuser'] = $employeeuser;
        }

        //=========useremergency table=============//
        //eName
        if ($old['eName'] != $updated['eName']) {
            $useremergency['fName'] = $updated['eName'];
        }

        //eRelationship
        if ($old['eRelationship'] != $updated['eRelationship']) {
            $useremergency['Relationship'] = $updated['eRelationship'];
        }

        //Contact Number
        if ($old['TelephoneNumber'] != $updated['TelephoneNumber']) {
            $useremergency['TelephoneNumber'] = $updated['TelephoneNumber'];
        }

        if (count($useremergency) > 0) {
            $resultArray['emergencyuser'] = $useremergency;
        }

        return $resultArray;
    }


    //Deleting an employee
    public function deleteEmployee($id)
    {
        $result = $this->delete($id);
    }

}

?>