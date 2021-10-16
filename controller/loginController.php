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


    //If user clicks on forgot password

    //sending the mail function
    function send_password_reset($get_name, $get_email, $token) {
        
    }

    //Sending a token
    if(isset($_POST['password_reset_link'])) {
        $email = mysqli_real_escape_string($mysql, $_POST['email']);
        $token = md5(rand());

        $check_email = "SELECT
                            email
                        FROM
                            userdetails
                        WHERE
                            email = '$email'
                        LIMIT 1";

        $check_email_run = mysqli_query($mysql, $check_email);

        //If any record is available or not
        if(mysqli_num_rows($check_email_run) > 0) {
            $row = mysqli_fetch_array($check_email_run);
            $get_name = $row['fName'];
            $get_email = $row['email'];

            $update_token = "UPDATE
                                login
                            INNER JOIN userdetails ON login.UserID = userdetails.UserID
                            SET
                                verify_token = '$token'
                            WHERE
                                login.UserID = userdetails.UserID AND userdetails.email = '$get_email'
                            LIMIT 1;";
                            

            $update_token_run = mysqli_query($mysql, $update_token);

            if($update_token_run) {
                send_password_reset($get_name, $get_email, $token);
                $_SESSION['status'] = "We emailed you a password reset link";
                header("location: login.php");
            exit(0);
            } else {
                $_SESSION['status'] = "Something went wrong. #1 :(";
                header("location: login.php");
                exit(0);
            }

        } else {
            $_SESSION['status'] = "No Email found :(";
            header("location: login.php");
            exit(0);
        }
    }
?>

<!-- UPDATE
    login
INNER JOIN userdetails ON login.UserID = userdetails.UserID
SET
    verify_token = 2
WHERE
	login.UserID = 1 AND  userdetails.email = 'indunijd@gmail.com'-->


    <!-- UPDATE
    login
INNER JOIN userdetails ON login.UserID = userdetails.UserID
SET
    verify_token = 'abcd'
WHERE
    login.UserID = userdetails.UserID AND userdetails.email = 'indunijd@gmail.com' -->