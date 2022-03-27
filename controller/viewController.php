<?php

class ViewController
{

    function renderView($view)
    {
        if ($view == "profile") {
            return include("./view/includes/profile.php");
        }

        switch ($_SESSION['RoleID']) {
            case '1':
                $location = "./view/includes/admin/";
                break;

            case '2':
                $location = "./view/includes/assetManager/";
                break;

            case '3':
                $location = "./view/includes/employee/";
                break;

            case '4':
                $location = "./view/includes/technician/";
                break;
            case '5':
                $location = "./view/includes/departmentHead/";
                break;

            default:
                # code...
                break;
        }
        $file = $location . $view . ".php";
        if (!file_exists($file) || !is_readable($file)) {
            return include("./view/includes/404.php");
        } else {
            return include($file);
        }
    }
}
