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
        
            case 'loadDepartment';
            loadDepartment($_REQUEST['DepartmentID']);
            break;

            case 'loadEmployeeDepartment';
            loadEmployeeDepartment($_REQUEST['DepartmentID']);
            break;

            case 'getDepartments';
            getDepartments();
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
                echo "('$message')";
            }
            alert_success("Successfully Added!");

        } else {
            echo "Fail";
        }
    }

    function loadDepartment($DepartmentID) {
        global $mysql;

        $viewDepartment = "SELECT 
                                DepartmentID,
                                DepartmentCode,
                                Name,
                                description, 
                                ContactNum, 
                            DATE(DateCreated) AS datecreated, 
                            DATE(LastModified) AS lastmodified 
                            FROM department
                            WHERE DepartmentID = $DepartmentID";

        $result = mysqli_query($mysql, $viewDepartment);
        $rows = array();
        while($r = mysqli_fetch_array($result)) {
            $rows[] = $r;
        }
        echo json_encode($rows);

    }

    function loadEmployeeDepartment($DepartmentID) {
        global $mysql;

        $viewDepartmentEmployees = "";

        $result = mysqli_query($mysql, $viewDepartmentEmployees);
        $rows = array();
    }

    function getDepartments() {
        global $mysql;
        $getDpartments = "SELECT DepartmentID, Name, DepartmentCode FROM department";
        $result = mysqli_query($mysql,$getDpartments);
        if($result) {
            $d= array();
            while($r = mysqli_fetch_assoc($result)) {
                $d[] = $r;
            }
            echo json_encode($d);
        }
    }

?>