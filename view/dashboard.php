<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        .container{
            display: grid;
            grid-template-columns: 1fr 9fr;
            overflow: hidden;
            z-index: 0;
            
        }
        .container > dv{
            width: 100%;
            height: 100%;
        }
        #leftSection{
            grid-row: 1/3;
           
        }
    </style>
</head>
<body>
    <div class="container">
        <div id="leftSection">
        <?php
            include_once("includes/leftNav.php");
        ?>
        </div>
        <div>
        <?php
            include_once("includes/header.php")
        ?>
        </div>
        <div id="centerSection">
        <?php
            //Adding the relevant overview section related to the user and role
           switch ($_SESSION['userType']) {
            case 'admin':
                include_once("includes/Admin/employees.php");
                break;
            case 'employee':

                break;
            case 'technician':

                break;
            case 'assetManager':
                // include_once("includes/assetManager/overview.php");
                include_once("includes/profile.php");
                break;
            }
        ?>
        </div>
        
    </div>
    <?php

    ?>
</body>
</html>