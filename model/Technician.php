<?php

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    require_once("../db/dbConnection.php");
    global $mysql;

    if (isset($_REQUEST['action'])) {
        switch ($_REQUEST['action']) {
            case 'addTechnician';
            saveTechnician();
            break;
        
        default:
            # code...
            break;
        }
    }

    function saveTechnician() {
        $firstName = $_POST['fName'];
        $lastName = $_POST['lName'];
        $role = $_POST['role'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $maritalStatus = $_POST['maritalStatus'];
        $address = $_POST['address'];
        $contactNo = $_POST['contactNo'];
        $email = $_POST['email'];
        $eName = $_POST['eName'];
        $eRelationship = $_POST['eRelationship'];
        $econtact = $_POST['econtact'];

    }

?>