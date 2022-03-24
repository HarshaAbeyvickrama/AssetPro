<?php
// require_once '../model/dbConnection.class.php';
// require_once '../model/stats.class.php';

class StatController extends Stats{
   
    function getAllStats(){
        $stats = new Stats();
        $stats = $stats->getAll();
        return json_encode($stats->fetchAll()[0]);
    }

    function getAllBreakdowns(){
        if($_SESSION['Role'])
        $stats = new Stats();
        $stats = $stats->getBreakdowns();
        return json_encode($stats->fetchAll());
    }

    function getTotalAssetValues(){
        $stats = new Stats();
        $res = $stats->getTotalValues();
        return json_encode($res->fetchAll()[0]);
    }

    function getAllCount($id){
        $stats = new Stats();
        $res = $stats->getCount($id);
        return json_encode($res->fetchAll()[0]);
    }
}

// $sc = new StatController();
// print_r($sc->getTotalAssetValues());