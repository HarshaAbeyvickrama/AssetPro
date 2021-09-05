<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if(isset($_GET['action'])){
        require_once("loginController.php");
        switch ($_GET['action']) {
            case 'renderView':
               echo renderView($_GET['view']);
                break;

            case 'logout':
                logOut();
                break;

            case 'login':
                login($_POST["Username"],$_POST["Password"]);
                break;
            
            default:
                # code...
                break;
        }
    }

    function renderView($view){

        if($view == "profile"){
            return include("../view/includes/profile.php");
        }

        switch ($_SESSION['userType']) {
            case 'admin':
                $location = "../view/includes/admin/";
                break;

            case 'assetManager':
                $location = "../view/includes/assetManager/";
                break;

            case 'employee':
                $location = "../view/includes/employee/";
                break;

            case 'technician':
                $location = "../view/includes/technician/";
                break;
            
            default:
                # code...
                break;
        }

        return include($location.$view.".php");
    }
?>