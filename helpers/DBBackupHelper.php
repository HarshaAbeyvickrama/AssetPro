<?php

date_default_timezone_set('Asia/Colombo');

$filePath = 'C:/xampp/htdocs/AssetPro/backups/';
$filename = 'assetpro.sql';

function renameFile($filePath, $filename){
    $file = $filePath . $filename;
    if (!file_exists($file)) {
        return false;
    }
    $fileCreationTime = date('Y-M-d_H-i-s', filectime($file));
    $oldFileName = $filePath . 'assetpro_' . $fileCreationTime . '.sql';
    $res = rename($file, $oldFileName);
    return $res;
}

function backupDB($filePath, $filename){
    $command = 'mysqldump -u root assetpro > ' . $filePath . $filename;
    $res = shell_exec($command);
    return $res;
}

try {
    renameFile($filePath, $filename);
    backupDB($filePath, $filename);
} catch (Exception $e) {
    echo $e->getMessage();
}
