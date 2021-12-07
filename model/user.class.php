<?php
include_once '../controller/userController.php';
    class User extends DBConnection{
        public function findUserByUsername($Username, $Password) {
            $this->dbConnection->query('SELECT 
                                        * 
                                        FROM 
                                            user 
                                        INNER JOIN 
                                            login 
                                        ON 
                                            login.UserID = user.UserID 
                                        INNER JOIN 
                                            role 
                                        on 
                                            role.RoleID = user.roleID 
                                        WHERE
                                            login.UserID
                                        IN (
                                            SELECT
                                                login.UserID
                                            FROM
                                                login
                                            WHERE
                                                login.Username = :Username
                                            AND
                                                login.Password = :Password
                                            )
                                      ');
        }
        //Login User
        public function login($Username, $Password) {
            $row = $this->findUserByUsername($Username, $Password);

            if($row == false) return false;

            $hashedPassword = $row->Password;
            if(password_verify($Password, $hashedPassword)) {
                return $row;
            } else {
                return false;
            }
        }
        
        //===================query for setting EmployeeID session==============
        // public function getEmployeeIdByUser($userId){
        //     $result = $this->dbConnection->query('SELECT
        //     EmployeeID
        // FROM
        //     employeeuser
        // INNER JOIN USER ON employeeuser.UserID = user.UserID
        // WHERE
        //     user.UserID = :userId');

        //     return $result->EmployeeID;

        // }
    }



?>