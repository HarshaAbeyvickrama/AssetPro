<?php

class StatController extends Stats{
   
    function getAllStats(){
        $stats = new Stats();
        $stats = $stats->getAll();
        return json_encode($stats->fetchAll()[0]);
    }
}