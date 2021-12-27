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
    public function getAssetsByCategory($category){
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
        return json_encode($result->fetchAll()[0]);
    }
    public function deleteAsset($id)
    {
        $result = $this->delete($id);
    }

    public function addAsset($assetName = null, $assetType = null, $category = null, $condition = null, $purchaseDate = null, $purchaseCost = null, $otherInfo = null, $extension = null, $hasWarrenty = false, $warrentyStart = null, $warrentyEnd = null, $hasDepriciation = false, $depriciationMethod = 'straightLine', $usefulYears = null, $depriciaionRate = null, $residualValue = null)
    {
        $newAsset = new Asset(
            assetName: $assetName,
            assetType: $assetType,
            category: $category,
            condition: $condition,
            otherInfo: $otherInfo,
            extension: $extension,
            hasWarrenty: $hasWarrenty,
            warrentyStart: $warrentyStart,
            warrentyEnd: $warrentyEnd,
            hasDepriciation: $hasDepriciation,
            depriciationMethod: $depriciationMethod,
            depriciaionRate: $depriciaionRate,
            residualValue: $residualValue,
            usefulYears: $usefulYears,
            purchaseDate: $purchaseDate,
            purchaseCost: $purchaseCost
        );
        $res = $newAsset->save();
        return json_encode($res);
    }

    public function updateAsset()
    {
    }

    public function getAllAssignedAssets($id)
    {
        $result = $this->getAssigned($id);
        return json_encode($result->fetchAll());
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

    public function getAssetCategories(){
        $res = $this->getCategories();
        return json_encode($res->fetchAll());
    }
}

// $ac = new AssetController();
// print_r($ac->getAssetCategories());