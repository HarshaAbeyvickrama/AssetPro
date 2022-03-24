<?php

spl_autoload_register('classLoader');

function classLoader($className){

    if (str_contains($className, 'Controller')) {
        $ext = ".php";
        $path = './controller/';
    } else {
        $ext = ".class.php";
        $path = './model/';
    }
   
    
    $fullPath = $path . $className . $ext;
    include_once $fullPath;
}

