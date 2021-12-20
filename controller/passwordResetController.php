<?php
require_once "../model/passwordReset.class.php";

class passwordResetController extends ResetPassword {
    private $resetModel;
    private $userModel;
    private $mail;

    public function __construct() {
        $this->resetModel = new ResetPassword;
        $this->userModel = new User;
    }

    public function sendEmail() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $email = trim($_POST['email']);

        if(empty($email)) {
            flash("reset", "Please input email");
            redirect("../view/password-reset.php");
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            flash("reset", "Invalid Email...");
            redirect("../view/password-reset.php");
        }
    }
}

$init = new ResetPassword;

//Ensure that user is sending a post reuest
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch($_post['type']) {
        case 'send':
            $init-> sendEmail();
            break;
    }
} else {
    // header("location: ../")
}

?>