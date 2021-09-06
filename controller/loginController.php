<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    require_once("../db/dbConnection.php");

    function login($Username,$Password){
        // Accessing the global variables from dbConnection.php
        global $host,$user,$password,$db;

        $data = mysqli_connect($host, $user, $password, $db);
    
        if($data===false) {
            die("Connection Error");
        }

        if($_SERVER["REQUEST_METHOD"]=="POST") {
            // $Username = $_POST["Username"];
            // $Password = $_POST["Password"];

            $sql =
            "select * from user
            inner join login on login.UserID = user.UserID
            inner join role on role.RoleID=user.UserID
            where login.UserID in ( 
                select login.UserID
                from login
                where login.Username='".$Username."' and login.Password='".$Password."'
            )";

            $result = mysqli_query($data, $sql);
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
            else {
                echo "Username or Password Incorrect";
            }
            header("location:../view/dashboard.php");
        }
}
    function logOut(){
        session_unset();
        header("location: ../index.php");
    }
?>

