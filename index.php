<?php
session_start();

if (!isset($_SESSION['UserID'])) {
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
} elseif ($url[0] == 'logout') {
    session_destroy();
    header("location: ./view/login.php");
} else {
    require_once './controller/autoloadController.php';
    $controller = $url[0];
    $action = $url[1];

    switch ($controller) {
        case 'asset':
            // require_once './controller/assetController.php';
            $ac = new AssetController();
            switch ($action) {
                case 'addImage':
                    echo $ac->addImage($_FILES);
                    break;
                case 'addAsset':
                    $data = json_decode(file_get_contents('php://input'), true);
                    // print_r($data);
                    echo $ac->addAsset($data);
                    break;
                case 'getAllAssets':
                    echo $ac->getAllAssets($url[2]);
                    break;
                case 'count':
                    echo $ac->getAllAssetCounts();
                    break;
                case 'assigned':
                    echo $ac->getAllAssignedAssets($url[2]);
                    break;
                case 'getAssetForm':
                    echo $ac->getAssetDataForm($url[2]);
                    break;
                case 'categories':
                    echo $ac->getAssetCategories();
                    break;
                case 'get':
                    echo $ac->getAsset($url[2]);
                    break;
                default:
                    # code...
                    break;
            }
            break;

        case 'breakdown':
            $bc = new BreakdownController();
            switch ($action) {
                case 'assigned':
                    echo $bc->getAllAssignedBreakdowns($url[2]);
                    break;
                case 'getBreakdown':
                    echo $bc->getBreakdown($url[2], $url[3]);
                    break;
                case 'reportBreakdown':
                    $data = json_decode(file_get_contents('php://input'), true);
                    echo $bc->reportBreakdown($data);
                    break;
                case 'getAssignedBreakdownT':
                    echo $bc->getAllAssignedTechBreakdowns($url[2]);
                    break;
            }
            break;

        case 'view':
            $vc = new ViewController();
            $vc->renderView($url[1]);
            break;

        case 'stats':
            $vc = new StatController();
            switch ($action) {
                case 'all':
                    echo $vc->getAllStats();
                    break;
            }
            break;

        case 'depricated':
            $dc = new DepriciationController();
            switch ($action) {
                case 'all':
                    echo $dc->getAllDepriciatedAssets();
                    break;
                case 'dispose':
                    $data = json_decode(file_get_contents('php://input'), true);
                    echo $dc->submitForDisposal($data['assetID']);
                    break;
            }
            break;

        case 'employees':
            $ec = new EmployeeController();
            switch ($action) {
                case 'all':
                    echo $ec->getAllEmployees();
                    break;
                case 'getEmployee':
                    echo $ec->getEmployee($url[2]);
                    break;
                case 'addImage':
                    echo $ec->addImage($_FILES);
                    break;
                case 'addEmployee':
                    $data = json_decode(file_get_contents('php://input'), true);
                    echo $ec->addEmployee($data);
                    break;
            }
            break;

        case 'technicians':
            $tc = new TechnicianController();
            switch ($action) {
                case 'all':
                    echo $tc->getAllTechnicians();
                    break;
                case 'getTechnician':
                    echo $tc->getTechnician($url[2]);
                    break;
            }
            break;

        case 'departments':
            $dc = new DepartmentController();
            switch ($action) {
                case 'all':
                    echo $dc->getAllDepartments();
                    break;
            }
            break;

        case 'departmentheads':
            $dhc = new DepartmentHeadController();
            switch ($action) {
                case 'all':
                    echo $dhc->getAllDepartmentHeads();
                    break;
                case 'getDepartmentHead':
                    echo $dhc->getDepartmentHead($url[2]);
                    break;
                case 'getDHBreakdowns':
                    echo $dhc->getAllBreakdownAssets($url[2]);
                    break;
                case 'getDepartmentEmployees':
                    echo $dhc->getHeadDepartmentEmployees($url[2]);
                    break;
            }
            break;

        default:
    }
}
