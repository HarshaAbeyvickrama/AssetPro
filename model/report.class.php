<?php

class report extends DBConnection{

    public function reportAsset($asset_id, $technician_id, $employee_id, $date, $reason, $defectedPart){
        $dbConnection = $this->connect();
        $sql = "INSERT into breakdown (AssetID,TechnicianID,EmployeeID,Date,Reason,DefectedParts) 
        VALUES (:asset_id, :technician_id, :employee_id, :date, :reason, :defected_part)";
        $stmt = $dbConnection->prepare($sql);
        $stmt->bindParam(':asset_id' ,$asset_id );
        $stmt->bindParam(':technician_id' ,$technician_id);
        $stmt->bindParam(':employee_id' , $employee_id);
        $stmt->bindParam(':date' ,$date );
        $stmt->bindParam(':reason' ,$reason);
        $stmt->bindParam(':defected_part' ,$defectedPart);
        $stmt->execute();
        
    }
}