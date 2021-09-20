<?php

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    require_once("../db/dbConnection.php");

    if (isset($_REQUEST['action'])) {
        switch ($_REQUEST['action']) {
            case 'addDepartment';
            saveDepartment();
            break;
        
        default:
            # code...
            break;
        }
    }

    function saveDepartment() {
        global $mysql;
        $DepartmentCode = $_POST['dCode'];
        $Name = $_POST['dName'];
        $ContactNum = $_POST['dCon'];
        $description = $_POST['dDes'];
        // $DateCreated = date('y-m-d H:i:s');
        // $LastModified = date('y-m-d H:i:s');

        $departmentQuery = "INSERT INTO department
        (DepartmentID,DepartmentCode,Name,description,ContactNum,DateCreated,LastModified)
        VALUES (NULL,'$DepartmentCode','$Name','$description','$ContactNum',now(),now())";

        if(mysqli_query($mysql,$departmentQuery)) {
            function alert_success($message) {
                echo "<script type='text/javasctipt'>alert('$message');</script>";
            }
            alert_success("Successfully added!");
            // echo "success";
        } else {
            echo "Fail";
        }
    }

?>