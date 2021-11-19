<?php
    include_once '../controller/assetController.php';

    $assetController = new AssetController();
    // echo $assetController->getAllAssets('all');
    echo $assetController->getAsset('1');