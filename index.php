<?php
    session_start();
    
    if(!isset($_SESSION['UserID'])){
        header("Location: ./view/login.php");
        return;
    }

    $url = isset($_SERVER['PATH_INFO']) ? explode("/", ltrim($_SERVER['PATH_INFO'], '/')) : '/';

    // if (!isset($_SESSION['user']) || $url[0] == 'login') {
    //     header("location: ./view/login.php");
    // }

    if ($url == '/' || $url[0] == 'dashboard') {
        // dashboard
        // echo 'dashboard';
        header("location: ./view/dashboard.php");
    } elseif($url[0] == 'logout') {
        session_destroy();
        header("location: ./view/login.php");

    }else {
        require_once './controller/autoloadController.php';
        $controller = $url[0];
        $action = $url[1];

        switch ($controller) {
            case 'asset':
                // require_once './controller/assetController.php';
                $ac = new AssetController();
                switch ($action) {
                    case 'getAllAssets':
                        echo $ac->getAllAssets($url[2]);
                        break;
                    case 'count':
                        echo $ac->getAllAssetCounts();
                        break;
                    case 'assigned':
                        echo $ac->getAllAssignedAssets($url[2]);
                        break;
                    case 'getAsset':
                        echo $ac->getAsset($url[2]);
                        break;
                   
                    default:
                        # code...
                        break;
                }
                break;
            case 'breakdown':
                $bc = new BreakdownController();
                switch($action){
                    case 'assigned':
                        echo $bc->getAllAssignedBreakdowns($url[2]);
                        break;
                }
            
            case 'view':
                $vc = new ViewController();
                $vc->renderView($url[1]);
                break;

            case 'stats':
                $vc = new StatController();
                switch($action){
                    case 'all':
                        echo $vc->getAllStats();
                        break;
                }
            default:
                # code...
                break;
        }
    }
