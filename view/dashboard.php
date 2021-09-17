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
            grid-template-columns: 12.5vw 87.5vw;
            overflow: hidden;
            z-index: 0;
            
        }
        .container > div{
            width: 100%;
            height: 100%;
            margin: 0px;
            padding: 0px;
        }
        
        #headerDiv {
            border: none;
            border-left: 4px solid #F1F4FF;
            margin: 0;
            padding: 0;
        }
        .dashboardRight{
            display: grid;
            grid-template-rows: 12vh 88vh;
        }
        #centerSection > div:first-of-type{
            height: 82vh;
            overflow:hidden;
            padding: 20px;
            background-color: #F1F4FF;
        }
    </style>
</head>
<body>
    <div class="container">
        <div id="dashboardLeft">
            <?php
                include_once("includes/leftNav.php");
            ?>
        </div>
        <div class="dashboardRight">
            <div id="headerDiv">
                <?php
                include_once("includes/header.php")
                ?>
            </div>
            <div id="centerSection">
                <?php
                // Adding the relevant overview section related to the user and role
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
        
        
    </div>
    <script>
       

    </script>
</body>
</html>