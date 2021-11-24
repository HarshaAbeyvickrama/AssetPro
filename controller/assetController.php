<?php
    include_once 'autoloadController.php';
    
    class AssetController extends Asset{

        // Done
        // Only available for Asset Manager
        public function getAllAssets($type){
            $accessManager = new AccessManager();

            if($accessManager->validateAccess(type:"ALL_ASSETS")){
                $result = $this->getAll($type);
                http_response_code(200);
                return json_encode($result->fetchAll());
            }else{
                return $accessManager->setResponseCode(403);
            }
        }

        public function getAsset($id){
            $accessManager = new AccessManager();
            if($accessManager->validateAccess(type:"GET_ASSET" , assetID:$id)){
                $result = $this->get($id);
                return json_encode($result->fetchAll());
            }
        }
        public function deleteAsset($id){
            $result = $this->delete($id);
        }

        public function addAsset(){
            $newAsset = new Asset();
        }

        public function updateAsset(){
            
        }
        
        public function getAllAssignedAssets($id){
            $result = $this->getAssigned($id);
            return json_encode($result->fetchAll());
        }

    }


?>