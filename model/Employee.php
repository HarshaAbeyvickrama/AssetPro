<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once("../db/dbConnection.php");

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'addEmployee';
            saveEmployee();
            break;

        case 'allEmployees';
            getAllEmployees();
            break;

        default:
            # code...
            break;
    }
}

// Retrieve all employee details

function getAllEmployees(){
    global $mysql;

    $sql = "SELECT
                employeeuser.UserID,
                employeeuser.EmployeeID,
                CONCAT(userdetails.fName,' ',userdetails.lName) AS name,
                userdetails.Gender
            FROM
                employeeuser
            INNER JOIN userdetails ON employeeuser.UserID = userdetails.UserID";

    $result = mysqli_query($mysql , $sql);
    $employees = array();

    if($result){
        while($employee = mysqli_fetch_assoc($result)){
            $employees[] = $employee;
        }
    }
    echo json_encode($employees);


}
function saveEmployee() {
    global $mysql;
    mysqli_begin_transaction($mysql);
    
    $departmentID = $_POST['depID'];
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $maritalStatus = $_POST['maritalStatus'];
    $address = $_POST['address'];
    $contactNo = $_POST['contactNo'];
    $email = $_POST['email'];
    $eName = $_POST['eName'];
    $eRelationship = $_POST['eRelationship'];
    $econtact = $_POST['econtact'];

    try {
        //Inserting into the user table
        $user = "INSERT INTO user VALUES (NULL,'3')";
        mysqli_query($mysql,$user);

        $userID = mysqli_insert_id($mysql);

        //Inserting into the userdetails table
        $userdetails = "INSERT INTO userdetails VALUES 
                       ('$userID','$firstName','$lastName','$address','$gender','23',
                       '$contactNo','$email','$dob','url','$maritalStatus')";
        mysqli_query($mysql,$userdetails);

        //Inserting into employeeuser table
        $employeeuser = "INSERT INTO employeeuser VALUES
                        (NULL,'$userID','$departmentID')";
        mysqli_query($mysql,$employeeuser);

        //Inserting into useremergency table
        $useremergency = "INSERT INTO useremergency VALUES
                         ('$userID','$eRelationship','$eName','blah','$econtact')";
        mysqli_query($mysql,$useremergency);

        //Getting a random username
        //generating username by concatenating first name and last name
        $username = strtolower($firstName . "_" .$lastName);
        $check_username_query = mysqli_query($mysql, "SELECT Username FROM login WHERE username='$username'");
        
        $i = 0;
        //if username exists add number to username
        while(mysqli_num_rows($check_username_query) !=0) {
            $i++; //add 1 to i
            $username = $username . "_" . $i;
            $check_username_query = mysqli_query($mysql, "SELECT Username FROM login WHERE username='$username'");
        }
        
        //Getting a random password
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $Password = substr(str_shuffle($chars), 0, 8);
        $encrypt_pwd = md5($Password); //Encrypting the password

        $usernamePassword = "INSERT INTO login VALUES ('$userID','$username','$encrypt_pwd')";
        mysqli_query($mysql,$usernamePassword);
        
        //auto commit true
        mysqli_commit($mysql);
        
    } catch (mysqli_sql_exception $exception) {
        mysqli_rollback($mysql);
        echo('Not OK\n Exception'.$exception);
    }
}

//getting the employee list (remove if meka not working)
function getEmployees($employee) {
    global $mysql;
    switch ($employee) {
        case 'employees':
            $sql = "SELECT
                        USER.UserID,
                        userdetails.fName,
                        userdetails.lName,
                        userdetails.Gender,
                        emp.EmployeeID,
                        emp.DepartmentID
                    FROM
                        employeeuser emp
                    INNER JOIN userdetails ON userdetails.UserID = emp.UserID
                    JOIN USER ON USER.UserID = userdetails.UserID
                    WHERE
                        USER.RoleID = 3";

            break;
        
        default:
            # code...
            break;
    }
    $result = mysqli_query($mysql,$sql);
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    echo json_encode($rows);
}

?>