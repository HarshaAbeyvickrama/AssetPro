<?php
// include '../model/dbconnection.class.php';
// include '../model/asset.class.php';

class AssetController extends Asset
{
    public function __construct()
    {

    }
    // Done
    // Only available for Asset Manager
    public function getAllAssets($type)
    {
        // $accessManager = new AccessManager();
        $result = $this->getAll($type);
        // print_r($result->fetchAll());

        return json_encode($result->fetchAll());
        // if($accessManager->validateAccess(type:"ALL_ASSETS")){
        //     $result = $this->getAll($type);
        //     http_response_code(200);
        //     return json_encode($result->fetchAll());
        // }else{
        //     return $accessManager->setResponseCode(403);
        // }
    }

    public function getAssetsByCategory($category): bool|string
    {
        switch ($category) {
            case 'fixed':
                $result = $this->getByCategory(1);
                break;

            default:
                # code...
                break;
        }
        return json_encode($result->fetchAll());
    }

    public function getAsset($id)
    {
        // $accessManager = new AccessManager();
        // if($accessManager->validateAccess(type:"GET_ASSET" , assetID:$id)){
        // }
        $result = $this->get($id);
        return json_encode($result->fetch());
    }


    public function getAssetDataForm($id)
    {
        $result = $this->getAssetForm($id);
        return json_encode($result->fetchAll());
    }

    public function deleteAsset($id)
    {
        return $this->delete($id);
    }

    public function addImage($image)
    {
        if ($_SESSION['IS_EDITING_ASSET'] && !isset($image['image'])) {
            $result = array(
                'isImageChanged' => false,
                'isSuccess' => true
            );
        } else {
            $result = array(
                'isImageChanged' => true,
            );

            //Uploading the image
            $extension = pathinfo($image['image']['name'], PATHINFO_EXTENSION);
            $fileUrl = '/uploads/assets/' . uniqid() . '.' . $extension;
            $url = $_SERVER['DOCUMENT_ROOT'] . '/assetpro' . $fileUrl;
            $imageSaved = move_uploaded_file($image['image']['tmp_name'], $url);

            if ($imageSaved) {
                $result['isSuccess'] = true;
                $result['message'] = "Image uploaded successfully";
            } else {
                $result = array(
                    'isSuccess' => false,
                    'message' => 'Image upload failed'
                );
            }
        }

        return $result;
    }

    public function addAsset($asset): bool|string
    {
        // imag extension
        $newAsset = $this->newAsset($asset);
        $res = $newAsset->save();
        unset($newAsset);
        return json_encode($res);
    }

    public function updateAsset($data, $FILES)
    {
        $existingAsset = $this->newAsset(json_decode($this->getAsset($data['assetID']), true));
        $updatedAsset = $this->newAsset($data);

        //filtered asset details that should be updated
        $filtered = $this->filterDetails($existingAsset->toString(), $updatedAsset->toString());
        $filtered['assetID'] = $data['assetID'];
        print_r($filtered);
        return $this->update($filtered);
    }

    public function getAllAssignedAssets($id): bool|string
    {
        $result = $this->getAssigned($id);
        return json_encode($result->fetchAll());
    }

    public function getAllinProgressAssets($id)
    {
        $result = $this->getinProgress($id);
        // return json_encode($result->fetchAll());
    }

    public function getAllAssetCounts()
    {
        $res = $this->getAllCounts();
        $count = $res->fetchAll();
        return json_encode($count[0]);
    }

    public function getAssetCount($type)
    {
        if ($type == '' || $type == NULL) {
            $result = array(
                "status" => "404",
                "message" => "Invalid type"
            );
            return json_encode($result);

        }
        $res = $this->getCount('all');
        return json_encode($res->fetchAll());
    }

    public function getAssetCategories()
    {
        $res = $this->getCategories();
        return json_encode($res);
    }

    //Create new Asset object
    private function newAsset($POST): Asset
    {
        if (isset($POST['warranty'])) {
//            echo "a : " .$POST['warranty'];
            $hasWarranty = $POST['warranty'];
        } elseif (isset($POST['hasWarranty'])) {
//            echo "b : " . $POST['hasWarranty'];
            $hasWarranty = $POST['hasWarranty'];
        } else {
//            echo '3';
            $hasWarranty = false;
        }
//        echo "warreny " . $hasWarranty;
//        $hasWarranty = $POST['warranty'] ?? $POST['hasWarranty'];
        $hasDepreciation = $POST['depreciation'] ?? $POST['hasDepriciation'];

//        echo("==================");
        return new Asset(
            assetName: $POST['assetName'] ?? $POST['Name'],
            assetType: $POST['assetType'] ?? $POST['TypeID'],
            category: $POST['category'] ?? $POST['CategoryID'],
            condition: $POST['condition'] ?? $POST['AssetCondition'],
            purchaseCost: $POST['purchaseCost'] ?? $POST['Cost'],
            purchaseDate: $POST['purchaseDate'] ?? $POST['PurchasedDate'],
            assetDescription: $POST['assetDescription'] ?? $POST['Description'],
            otherInfo: $POST['otherInfo'] ?? $POST['OtherInfo'], //later
            image: $POST['image'] ?? $POST['ImageURL'],
            hasWarrenty: $hasWarranty,
            warrentyStart: $POST['warrantyStart'] ?? '', //later
            warrentyEnd: $POST['warrantyEnd'] ?? '',
            hasDepriciation: $hasDepreciation,
            depriciationMethod: $POST['depreciationMethod'] ?? '',
            usefulYears: $POST['usefulYears'] ?? '',
            depriciaionRate: $POST['depreciationRate'] ?? '',
            residualValue: $POST['residualValue'] ?? ''
        );
    }

    //Filter the updated details
    private function filterDetails($old, $updated): array
    {
        $resultAsset = array();
        $asset = array();
        $assetDetails = array();
        $assetWarranty = array();
        $assetDepriciation = array();

        //====================================== Asset Table ======================================
        //Modified date
        $asset['LastModified'] = date("Y-m-d H:i:s");

        //filter asset basic details
        if ($old['categoryID'] != $updated['categoryID']) {
            $asset['CategoryID'] = $updated['categoryID'];
            $asset['TypeID '] = $updated['assetType'];
        }

        if (count($asset) > 0) {
            $resultAsset['asset'] = $asset;
        }

        //====================================== Asset Details Table ======================================
        //Asset name
        if ($old['assetName'] != $updated['assetName']) {
            $assetDetails['Name'] = $updated['assetName'];
        }

        //Cost
        if ($old['purchaseCost'] != $updated['purchaseCost']) {
            $assetDetails['Name'] = $updated['assetName'];
        }

        //Asset condition
        if ($old['condition'] != $updated['condition']) {
            $assetDetails['AssetCondition'] = $updated['condition'];
        }

        //Asset condition
        if (isset($updated['imageURL'])) {
            $assetDetails['ImageURL'] = $updated['imageURL'];
        }
        //Asset description
        if ($old['assetDescription'] != $updated['assetDescription']) {
            $assetDetails['Description'] = $updated['assetDescription'];
        }

        //Purchased Date
        if ($old['purchaseDate'] != $updated['purchaseDate']) {
            $assetDetails['PurchasedDate'] = $updated['purchaseDate'];
        }

        //Depreciation
        if ($old['hasDepriciation'] != $updated['hasDepriciation']) {
            $assetDetails['hasDepriciation'] = $updated['hasDepriciation'];
        }
        //Warranty
        if ($old['hasWarrenty'] != $updated['hasWarrenty']) {
            $assetDetails['hasWarranty'] = $updated['hasWarrenty'];
        }

        if (count($assetDetails) > 0) {
            $resultAsset['assetDetails'] = $assetDetails;
        }

        echo("OLd : " . $old['hasDepriciation']);
        echo("new : " . $updated['hasDepriciation']);

        //depreciation details
        if (isset($assetDetails['hasDepriciation']) && $assetDetails['hasDepriciation']) {

            //usefulYears
            if ($old['usefulYears'] != $updated['usefulYears']) {
                $assetDepriciation['UsefulYears'] = $updated['usefulYears'];
            }

            //DepriciaionRate
            if ($old['depriciaionRate'] != $updated['depriciaionRate']) {
                $assetDepriciation['DepriciaionRate'] = $updated['depriciaionRate'];
            }

            //ResidualValue
            if ($old['residualValue'] != $updated['residualValue']) {
                $assetDepriciation['ResidualValue'] = $updated['residualValue'];
            }

            //ResidualValue
//            if ($old['isDepreciated'] != $updated['isDepreciated']) {
//                $resultAsset['isDepriciated'] = $updated['isDepreciated'];
//            }
        }

        if (count($assetDepriciation) > 0) {
            $resultAsset['depreciation'] = $assetDepriciation;
        }

        if (isset($assetDetails['hasWarranty']) && $assetDetails['hasWarranty']) {
            //warrenty start
            if ($old['warrentyStart'] != $updated['warrentyStart']) {
                $assetWarranty['fromDate'] = $updated['warrentyStart'];
            }

            //warrenty end
            if ($old['warrentyEnd'] != $updated['warrentyEnd']) {
                $assetWarranty['toDate'] = $updated['warrentyEnd'];
            }
            //other info
            if ($old['otherInfo'] != $updated['otherInfo']) {
                $assetWarranty['OtherInfo'] = $updated['otherInfo'];
            }
        }
        if (count($assetWarranty) > 0) {
            $resultAsset['warranty'] = $assetWarranty;
        }

        return $resultAsset;
    }

    public function getAssignedDetails(string $assetID): array
    {
        $assigned = $this->checkAssigned($assetID);
        if ($assigned['DepartmentID']) {
            $result['hasDepartment'] = true;
            $result['departmentID'] = $assigned['DepartmentID'];
        } else {
            $result['hasDepartment'] = false;
        }

        if ($assigned['assignedUser']) {
            $result['hasAssignedUser'] = true;
            $result['assignedUser'] = $assigned['assignedUser'];
        } else {
            $result['hasAssignedUser'] = false;
        }

        $breakdowns = $this->checkBreakdowns($assetID);

        if ($breakdowns['count']) {
            $result['hasBreakdowns'] = true;
            $result['breakdownCount'] = $breakdowns['count'];
        } else {
            $result['hasBreakdowns'] = false;
        }
        return $result;
//
    }

    public function assignToDepartment($assetID, $departmentID)
    {
        $res = $this->assignDepartment();
        if ($res) {
            $result = array(
                'isSuccess' => true,
                'message' => 'Department Assigned successfully'
            );
        } else {
            $result = array(
                'isSuccess' => false,
                'message' => 'Department Assignment Failed'
            );
        }

        return $result;
    }

    public function calculateDepreciation()
    {
        $res = $this->calculateDepreciation();

    }

}
