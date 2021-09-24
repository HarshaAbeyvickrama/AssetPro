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
        
    } catch (\Throwable $th) {
        
    }

    // mysqli_begin_transaction($mysql);
    // try {
    //     //SQL for inserting into user table
    //     $user = "INSERT INTO user VALUES (NULL,'4')";
    //     $userID = mysqli_insert_id($mysql);
    //     //SQL for inserting into userdetails table
    //     $userdetails = "INSERT INTO userdetails
    //     VALUES ($userID,'$firstName','$lastName','$address','$gender',
    //     '$contactNo','$email','$dob','$maritalStatus')";

    //     //SQL for inserting into employeeuser table
    //     $employeeuser = "INSERT INTO employeeuser
    //     VALUES ('NULL','$userID','$departmentID')";

    //     //SQL for inserting into useremergency table
    //     $useremergency = "INSERT INTO useremergency
    //     VALUES ('$userID','$eName','$eRelationship','$econtact')";

    //     $query1 = mysqli_query($mysql,$user);
    //     $query2 = mysqli_query($mysql,$userdetails);
    //     $query3 = mysqli_query($mysql,$employeeuser);
    //     $query4 = mysqli_query($mysql,$useremergency);

    //     mysqli_commit($mysql);
    //     // echo "Data Submitted";

    // } catch (mysqli_sql_exception $exception) {
    //     mysqli_rollback($mysql);
    //     throw $exception;
    //     echo "Error !";
    // }

    //SQL for user table
    // $user = "INSERT INTO user VALUES (NULL,'$RoleID')";

    // if (mysqli_query($mysql, $user)) {
    //     $userID = mysqli_insert_id($mysql);

    //     //SQL query for user details
    //     $userQuery = "INSERT INTO userdetails
    //     VALUES ($userID,'$firstName','$lastName','$address','$gender',
    //     '$contactNo','$email','$dob','$maritalStatus')";

    //     //query to insert into employee user table
    //     $employeeuser = "INSERT INTO employeeuser
    //     VALUES (NULL,$userID,'$departmentID')";

    //     //query to insert into user emergency table
    //     $useremergency = "INSERT INTO useremergency VALUES ('$userID','$eName','$eRelationship','$econtact')";
    // }
}
