<?php

// include_once 'autoloadController.php';

class TechnicianController extends Technician {
    public function __construct()
    {
        
    }
    //Getting all the technicians
    public function getAllTechnicians() {
        $result = $this->getAll();
        return json_encode($result->fetchAll());
    }

    //Getting a technician
    public function getTechnician($id) {
        $result = $this->get($id);
        return json_encode($result->fetch());
    }

    //Getting the image
    public function addImage($image){
        $extension = pathinfo($image['image']['name'], PATHINFO_EXTENSION);
        $fileUrl = '/uploads/technicians/' . uniqid() . '.' . $extension;
        $url = $_SERVER['DOCUMENT_ROOT'] . '/assetpro' . $fileUrl;
        $imageSaved = move_uploaded_file($image['image']['tmp_name'], $url);

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

    //Adding a technician
    public function addTechnician($technician) {
        print_r($technician['jobTitle']);
        $newTechnician = new Technician (
            departmentID: $technician['depID'],
            fileUrl: $technician['image'],
            firstName: $technician['fName'],
            lastName: $technician['lName'],
            NIC: $technician['NIC'],
            gender: $technician['gender'],
            dob: $technician['dob'],
            jobTitle: $technician['jobTitle'],
            address: $technician['address'],
            contactNo: $technician['contactNo'],
            email: $technician['email'],
            eName: $technician['eName'],
            eRelationship: $technician['eRelationship'],
            eContact: $technician['econtact']);
        
        $result = $newTechnician->add();
        unset($newTechnician);

        return json_encode($result);
    }

    //Updating technician details
    public function updateTechnician() {

    }

    //Deleting a technician
    public function deleteTechnician($id) {
        $result = $this->delete($id);
    }

    

}

?>