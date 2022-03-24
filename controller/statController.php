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

    function getCountAllFixed($id){
        $stats = new Stats();
        $res = $stats->getCountFixed($id);
        return json_encode($res->fetch());
    }

    function getCountAllConsumables($id){
        $stats = new Stats();
        $res = $stats->getCountConsumables($id);
        return json_encode($res->fetch());
    }

    function getCountAllIntangibles($id){
        $stats = new Stats();
        $res = $stats->getCountIntangibles($id);
        return json_encode($res->fetch());
    }
}

// $sc = new StatController();
// print_r($sc->getTotalAssetValues());