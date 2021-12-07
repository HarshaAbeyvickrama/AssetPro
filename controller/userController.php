<?php
    include_once 'autoloadController.php';
    require_once '../model/user.class.php';
    require_once '../helpers/sessionHelper.php';
    
    class userController {

        private $userModel;

        public function __construct() {
            $this->userModel = new User;
        }

        public function login() {
            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Init data
            $data = [
                'Username' => trim($_POST['Username']),
                'Email' => trim(isset($_POST['Email']) ? $_POST['Email'] : ''),
                'Password' => md5(trim($_POST['Password']))
            ];

            //Validate inputs
            if(empty($data['Username']) || empty($data['Password'])) {
                flash("Login", "Please fill out all required fields!");
                header("location: ../view/login.php");
                exit();
            }
            $login = $this->userModel->findUserByUsername($data['Username'],  $data['Email']);
            // print_r(is_array($test));

            
            // Check for user
            if(is_array($login)) {
                // User found
                // $loggedInUser = $this->userModel->login($data['Username'], $data['Password']);
                // 
                
                 if($this->verifyPassword($data['Password'], $login['Password'])) {
                    //Create session
                    echo "Password verified";
                    $this->createUserSession($login);
                } else {
                    flash("Login", "Password Incorrect");
                    // redirect("../view/login.php");
                }
            } else {
                flash("Login", "No user found!");
                // redirect("../view/login.php");
            }
        }

        public function createUserSession($user) {
            $_SESSION['RoleID'] = $user['RoleID'];
            $_SESSION['UserID'] = $user['UserID'];
            $_SESSION['Username'] = $user['Username'];
            $_SESSION['Email'] = $user['Email'];

            if($_SESSION['RoleID'] == 1){
                header('location: ../view/includes/dashboard.php');
            }
            if($_SESSION['RoleID'] == 2){
                header('location: ../view/includes/dashboard.php');
            }
            if($_SESSION['RoleID'] == 3){
                header('location: ../view/includes/dashboard.php');
            }
            if($_SESSION['RoleID'] == 4){
                header('location: ../view/includes/dashboard.php');
            }
            if($_SESSION['RoleID'] == 5){
                header('location: ../view/includes/dashboard.php');
            }

            redirect("../view/dashboard.php");
        }

        public function logout() {
            // unset($_SESSION['UserID']);
            unset($_SESSION['Username']);
            unset($_SESSION['Email']);
            session_destroy();
            // redirect("../view/login.php");
        }

        private function verifyPassword($Password, $hashedPassword) {
            // $hashedPassword = $['Password'];
            if($Password == $hashedPassword) {
                return true;
            } else {
                return false;
            }
        }
    }

    $init = new userController;

    //Ensure that user is sending a POST request
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        switch($_POST['type']) {
            case 'login':
                $init->login();
                break;
            default:
                // redirect("../view/login.php");
        }
    }

 ?>