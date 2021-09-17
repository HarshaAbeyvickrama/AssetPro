<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
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
            margin: 0px;
            padding: 0px;
        }
        #leftSection{
            grid-row: 1/3;
           
        }
        #centerSection{
            border: 1px solid black;
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
        <div style="margin: 0px; padding: 0px;">
        <?php
            include_once("includes/header.php")
        ?>
        </div>
        <div id="centerSection">
        <?php
            //Adding the relevant overview section related to the user and role
           switch ($_SESSION['userType']) {
            case 'admin':
                include_once("includes/Admin/overview.php");
                break;
            case 'employee':
                include_once("includes/employee/overview.php");
                break;
            
            case 'technician':
                include_once("includes/technician/overview.php");
                break;
            case 'assetManager':
                include_once("includes/assetManager/overview.php");
                break;
            }
        ?>
        </div>
        
    </div>
    <script>
       

    </script>
</body>
</html>