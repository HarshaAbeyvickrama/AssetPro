<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    require_once("../db/dbConnection.php");
    
   
    if(isset($_REQUEST['action'])){
        switch ($_REQUEST['action']) {
            case 'reportBreakAsset':
                reportAsset();
                break;

            default:
                # code...
                break;
        }
    }

    function  reportAsset(){
       
        global $mysql;

        $defectedPart = $_POST['defP'];
        $reason = $_POST['exDef'];
        //print_r($defectedPart);
        //print_r($reason);
        $reportassetquery = "INSERT into breakdown(AssetID,TechnicianID,EmployeeID,Date,Reason,DefectedParts)
        VALUES(42,1,5,now(),'$defectedPart','$reason')";
         
        
      
        if(mysqli_query($mysql,$reportassetquery )) {
          
            function alert_success($message) {
                echo "alert('$message')";
            }
            alert_success("Successfully reported!");
            
        } else {
            echo "Fail";
        }
    }

?>