<?php
    include_once 'autoloadController.php';
    class AssetController extends Asset{
        
        public function getAllAssets($type){
            $result = $this->getAll($type);
            return json_encode($result->fetchAll());
        }

        public function getAsset($id){
            $result = $this->get($id);
            return json_encode($result->fetchAll());
        }
    }


?>