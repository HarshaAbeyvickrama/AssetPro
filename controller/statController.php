<?php
require_once '../model/dbConnection.class.php';
require_once '../model/stats.class.php';

class StatController extends Stats{
   
    function getAllStats(){
        $stats = new Stats();
        $stats = $stats->getAll();
        return json_encode($stats->fetchAll()[0]);
    }

    function getAllBreakdowns(){
        if($_SESSION['Role'])
        $stats = new Stats();
        $stats = $stats->getBreakdowns(technician:12 , employee:14 );
        return json_encode($stats->fetchAll());
    }
}

$sc = new StatController();
print_r($sc->getAllBreakdowns());