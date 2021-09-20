<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once("../db/dbConnection.php");

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'addEmployee';
            saveEmployee();
            break;

        default:
            # code...
            break;
    }
}

function saveEmployee()
{
    global $mysql;
    $departmentID = $_POST['depID'];
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


    //SQL query for user details
    $userQuery = "INSERT INTO userdetails
    VALUES (NULL,'$firstName','$lastName','$address','$gender',
    '$contactNo','$dob','$maritalStatus')";

    if(mysqli_query($mysql,$userQuery)) {
        $userID = mysqli_insert_id($mysql);
        
        //query to insert into employee user table
        $employeeuser = "INSERT INTO employeeuser
        VALUES (NULL,$userID,'$departmentID')";

        //query to insert into user emergency table
        $useremergency = "INSERT INTO useremergency VALUES ('$userID','$eName','$eRelationship','$econtact')";
        echo($userQuery);
        echo($employeeuser);
        echo($useremergency);
    }

}
