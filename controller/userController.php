<?php
    include_once 'autoloadController.php';
    require_once '../model/user.class.php';
    require_once '../helpers/sessionHelper.php';
    
    class userController {
        public function login() {
            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Init data
            $data = [
                'Username' => trim($_POST['Username']),
                'Password' => trim($_POST['Password'])
            ];

            if(empty($data['Username']) || empty($data['Password'])) {
                flash("Login", "Please fill out all required fields!");
                header("location: ../view/login.php");
                exit();
            }

            //Check for user
            if($this->userModel->findUserByUsername($data['Username'])) {
                //User found
                $loggedInUser = $this->userModel->login($data['Username']);
                if($loggedInUser) {
                    //Create session
                    // if($loggedInUser->RoleID==3){
                    // $empid = $this->userModel->getEmployeeIdByUser($loggedInUser->UserID);
                    // $this->createEmployeeSession($empid);
                    // }
                    $this->createUserSession($loggedInUser);
                } else {
                    flash("Login", "Password Incorrect");
                    redirect("../view/login.php");
                }
            } else {
                flash("Login", "No user found!");
                redirect("../view/login.php");
            }
        }

        public function createUserSession($user) {
            $_SESSION['Username'] = $user->userName;
            $_SESSION['firstName'] = $user->userName;
            $_SESSION['Email'] = $user->userEmail;
            redirect("../view/dashboard.php");
        }

        public function logout() {
            unset($_SESSION['Username']);
            unset($_SESSION['firstName']);
            unset($_SESSION['Email']);
            session_destroy();
            redirect("../view/login.php");
        }

        //=================Getting session for Employee-ID======================
        // public function createEmployeeSession($empUserId){
        //     $_SESSION['employeeID'] = $empUserId;
        // }
    }

    //Ensure that user is sending a POST request
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        switch($_POST['type']) {
            case 'login':
                $init->login();
                break;
            default:
                redirect("../view/login.php");
        }
    }

 ?>