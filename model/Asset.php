<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    require_once("../db/dbConnection.php");
    $rootDir = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);
    global $mysql;

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    if(isset($_REQUEST['action'])){
        switch ($_REQUEST['action']) {
            case 'addAsset':
                saveAsset();
                break;

            case 'getCount':
                getCount($_REQUEST['type']);
                break;

            case 'getAssets':
                getAssets($_REQUEST['type']);
                break;

            case 'getCats':
                getCats();
                break;
            
            default:
                # code...
                break;
        }
    }

    function saveAsset(){
        global $mysql,$rootDir;
        mysqli_begin_transaction($mysql);

        $isSuccess = false;
        $dateCreated = date("Y-m-d H:i:s");
        $dateModified = date("Y-m-d H:i:s");

        //Get asset Image

        $status = "unassigned";
        // Getting the values
        $assetName = $_POST['assetName'];
        $assetDescription = $_POST['assetDescription'];
        $assetType = $_POST['assetType'];
        $category = $_POST['category'];
        $condition = $_POST['condition'];
        $purchaseDate = $_POST['purchaseDate'];
        $purchaseCost = $_POST['purchaseCost'];
        $otherInfo = $_POST['otherInfo'];

        $hasWarrenty = isset($_POST['warrenty']);

        if($hasWarrenty){
            $warrentyStart = $_POST['fromDate'];
            $warrentyEnd = $_POST['toDate'];
        }

        $hasDepriciation = isset($_POST['depriciation']);

        if($hasDepriciation){
            $depriciationMethod = $_POST['depriciationMethod'];
            $depriciaionRate = $_POST['depriciaionRate'];
            $residualValue = $_POST['residualValue'];
            $usefulYears = $_POST['usefulYears'];
        }
       
        try {
            // Asset table query
            $assetQuery = "insert into asset (AssetID,CategoryID,TypeID,DateCreated,LastModified,Status) values(NULL,$category,$assetType,'$dateCreated','$dateModified','Unassigned')";
            mysqli_query($mysql,$assetQuery);

            //getting the asset ID
            $assetId = mysqli_insert_id($mysql);

            //Save image in the folder
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $fileUrl = '/assetPro/uploads/assets/'.$assetId.'.'.$extension;
            $imageSaved = move_uploaded_file($_FILES['image']['tmp_name'] , $rootDir.$fileUrl);

            // Asset detail query
            $assetDetails = "insert into assetdetails values($assetId,'$assetName',$purchaseCost,'$condition','$fileUrl','$assetDescription','$purchaseDate')";
            mysqli_query($mysql,$assetDetails);

            
            // Check if warrenty is available
            if($hasWarrenty){
                $warrentyQuery = "insert into assetwarranty values($assetId,'$warrentyStart','$warrentyEnd','$otherInfo')";
                mysqli_query($mysql,$warrentyQuery);
            }
            // Check if depriciation is available
            if($hasDepriciation){
                $depriciaionQuery = "insert into depreciation values (NULL,$assetId,$usefulYears,$depriciaionRate,$residualValue)";
                mysqli_query($mysql,$depriciaionQuery);
            }

           
            
            //Commit if everything is ok
            if($imageSaved){
                mysqli_commit($mysql);
                echo('OK');
            }

        } catch (mysqli_sql_exception $exception) {
            mysqli_rollback($mysql);
            echo('Not OK\n Exception'.$exception);
        }
        
    }
    function getCount($type){
        global $mysql;

        switch ($type) {
            case 'allAssets':
                $query = "SELECT COUNT(*) FROM asset as count";
                break;
            case 'allEmployees':
                $query = "SELECT COUNT(*) FROM employeeuser as count";
                break;
            case 'allTechnicians':
                $query = "SELECT COUNT(*) FROM technicianuser as count";
                break;
            
            default:
                # code...
                break;
        }

        if($result = mysqli_query($mysql,$query)){
            $row = mysqli_fetch_array($result);
            echo($row[0]);
        }else{
            echo "Failed";
        }
    }

    function getAssets($type){
        global $mysql;
        switch ($type) {
            case 'all':
                $sql = "SELECT
                            asset.AssetID,
                            asset.Status,
                            assetdetails.Name as assetName,
                            assetdetails.AssetCondition,
                            TYPE.Name as assetType
                        FROM asset
                        INNER JOIN assetdetails ON asset.AssetID = assetdetails.AssetID
                        INNER JOIN type ON asset.TypeID = type.TypeID
                        ORDER BY asset.AssetID";
                
                break;
            case 'assigned':
                $sql = "SELECT
                            asset.AssetID,
                            asset.Status,
                            assetdetails.Name AS assetName,
                            assetdetails.AssetCondition,
                            TYPE.Name AS assetType,
                            CONCAT(userdetails.fName,' ',userdetails.lName) as employee
                        FROM
                            asset
                        INNER JOIN assetdetails ON asset.AssetID = assetdetails.AssetID
                        INNER JOIN TYPE ON asset.TypeID = TYPE.TypeID
                        INNER join userdetails ON asset.EmployeeID = userdetails.UserID
                        WHERE
                            asset.Status = 'assigned' AND asset.EmployeeID IS NOT NULL AND asset.DepartmentID IS NULL
                        ORDER BY
                            asset.AssetID";
                
                break;
            case 'shared':
                $sql = "SELECT
                            asset.AssetID,
                            asset.Status,
                            assetdetails.Name AS assetName,
                            assetdetails.AssetCondition,
                            TYPE.Name AS assetType,
                            department.Name AS department
                        FROM
                            asset
                        INNER JOIN assetdetails ON asset.AssetID = assetdetails.AssetID
                        INNER JOIN TYPE ON asset.TypeID = TYPE.TypeID
                        INNER JOIN department ON department.DepartmentID = asset.DepartmentID
                        WHERE
                            asset.Status = 'assigned' AND asset.EmployeeID IS NULL AND asset.DepartmentID IS NOT NULL
                        ORDER BY
                            asset.AssetID";
                break;

            case 'unassigned':
                $sql = "SELECT
                            asset.AssetID,
                            asset.Status,
                            assetdetails.Name as assetName,
                            assetdetails.AssetCondition,
                            TYPE.Name as assetType
                        FROM asset
                        INNER JOIN assetdetails ON asset.AssetID = assetdetails.AssetID
                        INNER JOIN type ON asset.TypeID = type.TypeID WHERE asset.Status= 'unassigned'
                        ORDER BY asset.AssetID";
                
                break;
           
            
                
            default:
                # code...
                break;
        }
        $result = mysqli_query($mysql,$sql);
        $rows = array();
        while($r = mysqli_fetch_assoc($result)){
            $rows[] = $r;
        }
        echo json_encode($rows);
    }

    function getCats(){
        global $mysql;
        $sqlCategory = "SELECT * FROM category";
        $allCategories = mysqli_query($mysql , $sqlCategory);
        if($allCategories){
            // Loop through cats
            $catArray = array();

            while($category = mysqli_fetch_assoc($allCategories)) {
                $cat = new stdClass();
                $catId = $category['CategoryID'];

                $cat->categoryID = $catId;
                $cat->categoryName = $category['Name'];
                $sql = "SELECT
                            TypeID,
                            NAME,
                            TypeCode
                        FROM
                            type
                        WHERE
                            CategoryID = $catId";
                $types = mysqli_query($mysql , $sql);
                
                $typeArray = array();
                if($types){
                    while($type = mysqli_fetch_assoc($types)){
                        $t = new stdClass();
                        $t->typeID = $type['TypeID'];
                        $t->name = $type['NAME'];
                        // $t->typeCode = $type['TypeCode'];
                        $typeArray[] = $t;
                       
                    }
                }
                $cat->types = $typeArray;
                $catArray[] = $cat;

                
               

            }
            echo json_encode($catArray);
            
        }
             
    }
    function getAsset(){};
?>