<?php
    if(isset($_GET['action']) || isset($_GET['view'])){
        require_once("loginController.php");
        switch ($_GET['action']) {
            case 'renderView':
               echo renderView();
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

    function renderView(){
        return include("../view/includes/profile.php");
    }
?>