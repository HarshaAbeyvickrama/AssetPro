<?php

    require_once("../db/dbConnection.php");

    if(isset($_POST['submit'])){

        $conn = mysqli_connect("localhost","root","","assetpro");

        $departmentID = $_POST['departmentID'];
        $firstName = $_POST['fName'];
        $lastName = $_POST['lName'];
        $role = $_POST['role'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $maritalStatus = $_POST['maritalStatus'];
        $address = $_POST['address'];
        $contactNo = $_POST['contactNo'];
        $email = $_POST['email'];
        $eName = $_POST['eName'];
        $eRelationship = $_POST['eRelationship'];
        $econtact = $_POST['econtact'];

        $sql = "INSERT INTO userdetails
        (fName, lName, Address, Gender, PhoneNumber, DOB, CivliStatus)
        VALUES ('$firstName','$lastName','$address','$gender',
                '$contactNo','$dob','$maritalStatus')";

        $query = mysqli_query($conn, $sql);

        if($query) {
            $sql2 = "INSERT INTO employeeuser (DepartmentID) VALUES ('$departmentID')";
            $result = mysqli_query($conn, $sql2);

            echo "Your form was successfully submited!";

        }else {
            echo "Try again buddy";
        }
    }
?>