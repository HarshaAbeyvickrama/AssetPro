<?php
include_once '../controller/userController.php';
require_once '../model/dbConnection.class.php';
    class User extends DBConnection{

        private $db;

        public function __construct() {
            $this->db = $this->connect();
        }

        //Find user by username
        public function findUserByUsername($Username, $Email) {
            
            $sql = "SELECT
                        login.UserID AS UserID,
                        login.Username,
                        login.Password AS Password,
                        userdetails.Email AS Email,
                        CONCAT(userdetails.fName,' ',userdetails.lName) AS name,
                        user.RoleID
                    FROM
                        login
                    INNER JOIN user ON user.UserID = login.UserID
                    INNER JOIN userdetails ON login.UserID = userdetails.UserID
                    WHERE
                        login.Username = :Username OR userdetails.Email = :Email";
            $pstmt = $this->db->prepare($sql);
            $pstmt->bindParam(':Username', $Username);
            $pstmt->bindParam(':Email', $Email);
            $pstmt->execute();
            $userResult = $pstmt->fetch();
            // print_r($userResult);

            

            // $row = $this->db->single();

            //Check row
            if($pstmt->rowCount() > 0) {
                return $userResult;
            } else {
                return false;
            }
        }

        //Login User
        public function login($Username, $Password) {
            $row = $this->findUserByUsername($Username, $Password);
            // print_r($row);
            // print_r($row['Password']);
            if($row == false) return false; 

            // $hashedPassword = $row['Password'];
            // if(password_verify($Password, $hashedPassword)) {
            //     return $row;
            // } else {
            //     return false;
            // }
        }
    }

?>