<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once("../db/dbConnection.php");
$rootDir = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);
global $mysql;

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'addTechnician';
            saveTechnician();
            break;

        case 'getAssets';
            getAssets($_REQUEST['type']);
            // echo 'getAsseeeeer';
            // echo($_REQUEST['type']);
            break;

        default:
            # code...
            break;
    }
}
function getAssets($type){
    $userId = $_SESSION['userID'];
    global $mysql;
    switch ($type) {
        case 'assigned':
            $sql = "SELECT
                    b.AssetID,
                    a.Name as assetName,
                    c.CategoryCode,
                    t.TypeCode,
                    t.Name,
                    CONCAT(ud.fName,' ',ud.lName) as employeeName
                FROM
                    breakdown b
                INNER JOIN assetdetails a ON
                    a.AssetID = b.AssetID
                INNER JOIN asset ON asset.AssetID = b.AssetID
                INNER JOIN category c ON
                    c.CategoryID = asset.CategoryID
                INNER JOIN TYPE t ON
                    t.TypeID = asset.TypeID
                INNER JOIN employeeuser eu ON
                    eu.EmployeeID = b.EmployeeID
                INNER JOIN userdetails ud ON
                    ud.UserID = eu.UserID
                WHERE
                    b.TechnicianID =(
                    SELECT
                        te.TechnicianID
                    FROM
                        technicianuser te
                    WHERE
                        te.UserID = $userId
                )";
            // print_r
            $result = mysqli_query($mysql , $sql);
            // print_r($result);
            if($result){
                $breakdowns = array();
                while($r = mysqli_fetch_assoc($result)){
                    $breakdowns[] = $r;
                }
                echo json_encode($breakdowns);

            }else{
                echo json_encode(array());
            }
            break;
        
        default:
            # code...
            break;
    }
}
function saveTechnician() {
    global $mysql;
    mysqli_begin_transaction($mysql);
    
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $NIC = $_POST['NIC'];
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
        $user = "INSERT INTO user VALUES (NULL,'4')";
        mysqli_query($mysql,$user);

        $userID = mysqli_insert_id($mysql);

        //Save image in the folder
        global $rootDir;
        $extension = pathinfo($_FILES['profileImage']['name'], PATHINFO_EXTENSION);
        $fileUrl = '/uploads/technicians/' . $userID . '.' . $extension;
        $imageSaved = move_uploaded_file($_FILES['profileImage']['tmp_name'], '../'.$fileUrl);

        //Inserting into the userdetails table
        $userdetails = "INSERT INTO userdetails VALUES 
                       ('$userID','$firstName','$lastName','$NIC','$address','$gender','23',
                       '$contactNo','$email','$dob','$fileUrl','$maritalStatus')";
        mysqli_query($mysql,$userdetails);

        //Inserting into technicianeuser table
        $technicianuser = "INSERT INTO technicianuser VALUES
                          (NULL,'$userID')";
        mysqli_query($mysql,$technicianuser);

        //Inserting into useremergency table
        $useremergency = "INSERT INTO useremergency VALUES
                         ('$userID','$eRelationship','$eName','','$econtact')";
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

        $usernamePassword = "INSERT INTO login VALUES ('$userID','$username','$encrypt_pwd','')";
        mysqli_query($mysql,$usernamePassword);
        
        //Commit if everything is ok
        if ($imageSaved) {
            mysqli_commit($mysql);
            echo ('Success');
        }
        
    } catch (mysqli_sql_exception $exception) {
        mysqli_rollback($mysql);
        echo('Not OK\n Exception'.$exception);
    }
}
