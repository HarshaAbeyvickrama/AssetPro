<?php
session_start();
date_default_timezone_set('Asia/Colombo');
require_once './controller/autoloadController.php';


$url = isset($_SERVER['PATH_INFO']) ? explode("/", ltrim($_SERVER['PATH_INFO'], '/')) : '/';

if ($url[0] == 'resetPassword') {
    echo 'shagdjhagdjhas';
    $uc = new userController();
    return;
}

if ($url[0] == 'login') {
    header("Location: http://localhost/assetpro/view/login.php");
    exit(0);
}

if (!isset($_SESSION['UserID'])) {
    header("Location: ./view/login.php");
    return;
}

if ($url == '/' || $url[0] == 'dashboard') {
    header("location: ./view/dashboard.php");
    exit(0);
} elseif ($url[0] == 'logout') {
    session_destroy();
    header("location: ./view/login.php");
} else {
    $controller = $url[0];
    $action = $url[1];

    switch ($controller) {
        case 'user':
            $uc = new userController();
            switch ($action) {
                case 'forgotPassword':
                    // header("location: http://localhost/assetpro");
                    // redirect('http://localhost/assetpro');
                    echo 'sdvhsgdhgsdhjagd';
                    return;
                    // echo $uc->forgotPassword();
                    // echo json_encode($uc->forgotPassword());
                    break;
            }
            break;

        case 'asset':
            // require_once './controller/assetController.php';
            $ac = new AssetController();
            switch ($action) {
                case 'addImage':
                    echo $ac->addImage($_FILES);
                    break;

                case 'addAsset':
                    $data = json_decode(file_get_contents('php://input'), true);
                    echo $ac->addAsset($data);
                    break;

                case 'update':
                    $_SESSION['IS_EDITING_ASSET'] = true;
                    $data = json_decode($_POST['editedAssetDetails'], true);
                    $res = $ac->updateAsset($data, $_FILES);
                    echo json_encode($res);
                    break;

                case 'delete':
                    if (!isset($_SESSION['IS_DELETING_ASSET'])) {
                        $_SESSION['DELETE_ASSET'] = array();
                        $_SESSION['DELETE_ASSET']['assetID'] = $url[2];

                        //check if asset is assigned to a department and employee
                        $assigns = $ac->getAssignedDetails($url[2]);

                        if ($assigns['hasDepartment'] || $assigns['hasBreakdowns'] || $assigns['hasAssignedUser']) {
                            $_SESSION['DELETE_ASSET']['isDeletable'] = false;
                            $_SESSION['DELETE_ASSET']['data'] = $assigns;
                        } else {
                            $_SESSION['DELETE_ASSET']['isDeletable'] = true;

                        }
                    }
                    if ((isset($_POST['deleteConfirmation']) && $_POST['deleteConfirmation']) || $_SESSION['DELETE_ASSET']['isDeletable']) {
                        $res = $ac->deleteAsset($_SESSION['DELETE_ASSET']['assetID']);
                        unset($_SESSION['DELETE_ASSET']);
                        echo json_encode($res);
                    } else {
                        echo json_encode(array(
                            'isSuccess' => true,
                            'isPending' => true,
                            'data' => $_SESSION['DELETE_ASSET']
                        ));
                    }

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

                // case 'inProgress':
                //     echo $ac->getAllinProgressAssets($url[2]);
                //     break;

                case 'get':
                    echo $ac->getAsset($url[2]);
                    break;

                case 'assignToDepartment':
                    echo $ac->assignToDepartment($_POST['assetID'], $_POST['departmentID']);
                    break;

                case 'calculateDepreciation':
                    $ac->calculateDepreciation();
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
                case 'getBreakdownInprogressT':
                    // echo $bc->getAllTechBreakdownsInProgress($url[2]);
                    break;
                case 'updateAllBreakdowns':
                    $data = json_decode(file_get_contents('php://input'), true);
                    echo json_encode($bc->updateAllBreakdowns($data));
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
                case 'assetsCount':
                    echo $vc->getAllCount($url[2]);
                    break;
            }
            break;

        case 'depricated':
            $dc = new DepriciationController();
            switch ($action) {
                case 'calculate':
                    $dc->calculateDepriciation();
                    break;

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
                case 'update':
                    $data = json_decode($_POST['editedEmployeeDetails'], true);
                    $res = $ec->updateEmployee($data, $_FILES);
                    echo json_encode($res);
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
                case 'addImage':
                    echo $tc->addImage($_FILES);
                    break;
                case 'addTechnician':
                    $data = json_decode(file_get_contents('php://input'), true);
                    echo $tc->addTechnician($data);
                    break;
            }
            break;

        case 'departments':
            $dc = new DepartmentController();
            switch ($action) {
                case 'all':
                    echo $dc->getAllDepartments();
                    break;
                case 'addDepartment':
                    $data = json_decode(file_get_contents('php://input'), true);
                    echo $dc->addDepartment($data);
                    break;
                case 'getDepartmentHeadList':
                    echo $dc->getDepartmentHeadList();
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
                case 'addImage':
                    echo $dhc->addImage($_FILES);
                    break;
                case 'addDepartmentHead':
                    $data = json_decode(file_get_contents('php://input'), true);
                    echo $dhc->addDepartmentHead($data);
                    break;
                case 'getDHBreakdowns':
                    echo $dhc->getAllBreakdownAssets($url[2]);
                    break;
                case 'getDepartmentEmployees':
                    echo $dhc->getHeadDepartmentEmployeesList($url[2]);
                    break;
                case 'getDHAssignedAssets':
                    echo $dhc->getDHAllAssignedAssets($url[2]);
                    break;
                case 'getDeptAssets':
                    echo $dhc->getAllDeptAssets($url[2]);
                    break;
            }
            break;

        default:
    }
}
