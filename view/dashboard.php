<?php
    session_start();
    $_SESSION['userType']='assetManager';
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
        <div>
        <?php
            // include_once("includes/center.php")
        ?>
        </div>
        
    </div>
    <?php

    ?>
</body>
</html>