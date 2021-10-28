<?php
session_start();
//Importing the database
require_once("../db/dbConnection.php");

//If user clicks on forgot password

//sending the mail function

function send_password_reset($get_email, $token){

    $to_email = "$get_email";
    $subject = "Reset Password";
    $body = "Hello,
             We received a request to reset the password for your account.
             To reset your password, click on the link below!
             
             https://localhost/AssetPro/password-change.php?token=$token&email=$get_email


             AssetPro
            ";
    $headers = "From: 18assetpro@gmail.com";

    if (mail($to_email, $subject, $body, $headers)) { //PHP function send mail
        echo '<script>alert("Email successfully sent to $to_email...")</script>';
    } else {

        echo '<script>console.log("Email sending Failed")</script>';
    }
}

//Sending a token
if (isset($_POST['password_reset_link'])) {

    $email = mysqli_real_escape_string($mysql, $_POST['email']);
    //Generating a random token and hashing it
    $token = md5(rand());

    //Check if the entered email is in the database
    $check_email = "SELECT
                        email
                    FROM
                        userdetails
                    WHERE
                        email = '$email'
                    LIMIT 1";

    $check_email_run = mysqli_query($mysql, $check_email);

    //If any record is available or not
    if (mysqli_num_rows($check_email_run) > 0) {

        $row = mysqli_fetch_array($check_email_run);
        $get_email = $row['email'];

        //Updating the token
        $update_token = "UPDATE
                            login
                        INNER JOIN userdetails 
                        ON 
                            login.UserID = userdetails.UserID
                        SET
                            verify_token = '$token'
                        WHERE
                            login.UserID = userdetails.UserID 
                        AND 
                            userdetails.email = '$get_email'
                        LIMIT 1;";

        $update_token_run = mysqli_query($mysql, $update_token);

        if ($update_token_run) {

            send_password_reset($get_email, $token);
            echo 'Hello';
            $_SESSION['status'] = "We have sent an Email with the password reset link";
            header("location: ../password-reset.php");
        } else {

            $_SESSION['status'] = "Something went wrong";
            header("location: ../password-reset.php");
        }
    } else {

        $_SESSION['status'] = "No Email found :(";
        header("location: ../password-reset.php");
    }
}


//Updating a new password
if (isset($_POST['password_update'])) {

    $email = mysqli_real_escape_string($mysql, $_POST['email']);
    $new_password = mysqli_real_escape_string($mysql, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($mysql, $_POST['confirm_password']);

    $token = mysqli_real_escape_string($mysql, $_POST['password_token']);

    if (!empty($token)) {

        if (!empty($email) && !empty($new_password) && $confirm_password) {
            //Checkng token is valid or not
            $check_token = "SELECT
                                verify_token 
                            FROM 
                                login 
                            WHERE 
                                verify_token='$token' 
                            LIMIT 1";

            $check_token_run = mysqli_query($mysql, $check_token);

            if(mysqli_num_rows($check_token_run) > 0) {
                if($new_password == $confirm_password) {

                    $update_password = "UPDATE 
                                            login 
                                        SET 
                                            Password = '$new_password'
                                        WHERE
                                            verify_token='$token'
                                        LIMIT 1";
                    
                    $update_password_run = mysqli_query($mysql, $update_password);

                    if($update_password_run) {

                        //Hashing the new token
                        $new_token = md5(rand());
                        //updatting to a new token after changing the password
                        $update_to_new_token = "UPDATE 
                                                    login 
                                                SET 
                                                    verify_token = '$new_token'
                                                WHERE
                                                    verify_token='$token'
                                                LIMIT 1";
                    
                        $update_to_new_token_run = mysqli_query($mysql, $update_to_new_token);



                        $_SESSION['status'] = "Password successfully updated!";
                        header("location: ../login.php");
                    } else {

                        $_SESSION['status'] = "Did not update password. Something went wrong :(";
                        header("location: ../password-change.php?token=$token&email=$email");
                    }

                } else {

                    $_SESSION['status'] = "Password and Confirm Password does not match!";
                    header("location: ../password-change.php?token=$token&email=$email");
                }
            } else {

                $_SESSION['status'] = "Invalid Token!";
                header("location: ../password-change.php?token=$token&email=$email");
            }
        } else {

            $_SESSION['status'] = "All fields are required!";
            header("location: ../password-change.php?token=$token&email=$email");
        }
    } else {

        $_SESSION['status'] = "No Token Available :(";
        header("location: ../password-change.php");
    }
}
