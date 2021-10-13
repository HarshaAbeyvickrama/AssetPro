<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    require_once("../db/dbConnection.php");

    function login($Username,$Password){
        // Accessing the global variables from dbConnection.php
        global $mysql;

        if($mysql===false) {
            die("Connection Error");
        }

        if($_SERVER["REQUEST_METHOD"]=="POST") {
            // $Username = $_POST["Username"];
            // $Password = $_POST["Password"];

            $sql =
            "select * from user
            inner join login on login.UserID = user.UserID
            inner join role on role.RoleID=user.roleID
            where login.UserID in ( 
                select login.UserID
                from login
                where login.Username='".$Username."' and login.Password='".$Password."'
            )";
            
            $result = mysqli_query($mysql, $sql);
            $rowcount = mysqli_num_rows($result);

            $response = new stdClass();
            if($rowcount == 0){
                $response->status = "no";
            }else if($rowcount == 1){
                


                $row = mysqli_fetch_array($result);            
    
                if($row["RoleID"]=="1") {
                    $_SESSION['userType']='admin';
                }   
                elseif ($row["RoleID"]=="2") {
                    $_SESSION['userType']='assetManager';
                }
                elseif($row["RoleID"]=="3") {
                    $_SESSION['userType']='employee';
                }
                elseif ($row["RoleID"]=="4") {
                    $_SESSION['userType']='technician';
                }
                
                $response->status = "ok";
                $response->location= "view/dashboard.php";
                
                // header("location:./view/dashboard.php");
            }
            echo json_encode($response);
        }
    }
    function logOut(){
        session_unset();
        header("location: ../index.php");
    }
?>