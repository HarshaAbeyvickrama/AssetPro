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

    function get($type){
        switch($type){
            case 'all':
                $sql ="select count(*) as allAssets from asset";
                break;
            case 'assigned':
                $sql ="select count(*) as assignedAssets from asset where assignedUser IS NOT NULL";
                break;
            case 'unassigned':
                $sql ="select count(*) as unassignedAsset from asset where assignedUser IS NULL AND DepartmentID IS NULL";
                break;
            case 'tangible':
                $sql ="SELECT COUNT(*) as tangibleAssets FROM asset WHERE CategoryID = 1 OR CategoryID = 2";
                break;
            case 'consumable':
                $sql ="SELECT COUNT(*) as consumableAssets FROM asset as count WHERE CategoryID = 2";
                break;
            default:
                
        }
        $pstm = $this->connect()->prepare($sql);
        $pstm->execute();
        return $pstm;
    }

    function getAllValues(){
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