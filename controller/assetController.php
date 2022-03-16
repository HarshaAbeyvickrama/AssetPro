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
    public function getAssetsByCategory($category)
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
        $result = $this->delete($id);
    }

    public function addImage($image){
        $extension = pathinfo($image['image']['name'], PATHINFO_EXTENSION);
        $fileUrl = '/uploads/assets/' . uniqid() . '.' . $extension;
        $url = $_SERVER['DOCUMENT_ROOT'] . '/assetpro' . $fileUrl;
        $imageSaved = move_uploaded_file($image['image']['tmp_name'],  $url);

        if ($imageSaved) {
            $result = array(
                'status' => 'success',
                'message' => 'Image uploaded successfully',
                'imageUrl' => $fileUrl
            );
        }else{
            $result = array(
                'status' => 'error',
                'message' => 'Image upload failed'
            );
        }
        return json_encode($result);
    }
    public function addAsset($asset)
    {
        // imag extension
        $hasWarrenty = isset($asset['warrenty']);
        $hasDepriciation = isset($_POST['depriciation']);

        $newAsset = new Asset(
            assetName: $asset['assetName'],
            assetType: $asset['assetType'],
            category: $asset['category'],
            condition: $asset['condition'],
            otherInfo: isset($asset['otherInfo']) ? $asset['otherInfo'] : '',
            image: $asset['image'],
            hasWarrenty: $hasWarrenty, //later
            warrentyStart: isset($asset['warrentyStart']) ? $asset['warrentyStart'] : '',
            warrentyEnd: isset($asset['warrentyEnd']) ? $asset['warrentyEnd'] : '',
            hasDepriciation: $hasDepriciation, //later
            depriciationMethod: isset($asset['depriciationMethod']) ? $asset['depriciationMethod'] : '',
            depriciaionRate: isset($asset['depriciationRate']) ? $asset['depriciationRate'] : '',
            residualValue: isset($asset['residualValue']) ? $asset['residualValue'] : '',
            usefulYears: isset($asset['usefulYears']) ? $asset['usefulYears'] : '',
            purchaseDate: $asset['purchaseDate'],
            purchaseCost: $asset['purchaseCost'],
        );
        $res = $newAsset->save();
        unset($newAsset);
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

    public function getAssetCategories()
    {
        $res = $this->getCategories();
        return json_encode($res);
    }
}

// $ac = new AssetController();
// print_r($ac->getAssetCategories());