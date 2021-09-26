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

function saveEmployee() {
    global $mysql;
    mysqli_begin_transaction($mysql);
    
    $departmentID = $_POST['depID'];
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $maritalStatus = $_POST['maritalStatus'];
    $address = $_POST['address'];
    $contactNo = $_POST['contactNo'];
    $email = $_POST['email'];
    $eName = $_POST['eName'];
    $eRelationship = $_POST['eRelationship'];
    $econtact = $_POST['econtact'];

    try {
        //Inserting into the user table
        $user = "INSERT INTO user VALUES (NULL,'4')";
        mysqli_query($mysql,$user);

        $userID = mysqli_insert_id($mysql);

        //Inserting into the userdetails table
        $userdetails = "INSERT INTO userdetails VALUES 
                       ('$userID','$firstName','$lastName','$address','$gender','23',
                       '$contactNo','$email','$dob','url','$maritalStatus')";
        mysqli_query($mysql,$userdetails);

        //Inserting into employeeuser table
        $employeeuser = "INSERT INTO employeeuser VALUES
                        (NULL,'$userID','$departmentID')";
        mysqli_query($mysql,$employeeuser);

        //Inserting into useremergency table
        $useremergency = "INSERT INTO useremergency VALUES
                         ('$userID','$eRelationship','$eName','blah','$econtact')";
        mysqli_query($mysql,$useremergency);
        
        //auto commit true
        mysqli_commit($mysql);
        
    } catch (mysqli_sql_exception $exception) {
        mysqli_rollback($mysql);
        echo('Not OK\n Exception'.$exception);
    }
}
