<?php

class Stats extends DBConnection{

    function getAll(){
        $sql = "select (select count(*)from asset)  as allAssets ,
                (select count(*) from asset where assignedUser IS NOT NULL) as assignedAssets ,
                (select count(*) from asset where assignedUser IS NULL AND DepartmentID IS NULL) as unassignedAssets,
                (SELECT COUNT(*) FROM asset WHERE CategoryID = 1 OR CategoryID = 2) as tangibleAssets,
                (SELECT COUNT(*) FROM asset WHERE CategoryID = 2) as consumableAssets,
                (SELECT COUNT(*) FROM employeeuser) as allEmployees,
                (SELECT COUNT(*) FROM technicianuser) as allTechnicians
                from DUAL";
        $stmt = $this->connect()->prepare($sql);
        
        $stmt->execute();
        return $stmt;
    }
}