<?php

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    require_once("../db/dbConnection.php");
    global $mysql;

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
        $departmentID = $_POST['depID'];
        $Name = $_POST['dName'];
        $ContactNum = $_POST['dCon'];
        $Description = $_POST['dDes'];
        $DateCreated = date('y-n-j h:i:s a');
        $LastModified = date('y-n-j h:i:s a');
    }

?>