<?php

class Notification extends DBConnection{

    public function createNotification($type , $userId , $message , $assetId = null , $targetUser = null){
        $dbConnection = $this->connect();
        $sql = "INSERT INTO notification (type , createdBy , message , assetId , targetUser) VALUES (:type , :user_id , :message ,  :asset_id , :targetUser)";
        $stmt = $dbConnection->prepare($sql);
        $stmt->bindParam(':type' , $type);
        $stmt->bindParam(':user_id' , $userId);
        $stmt->bindParam(':message' , $message);
        $stmt->bindParam(':asset_id' , $assetId);
        $stmt->bindParam(':target_user' , $targetUser);
        $stmt->execute();
        
    }

    protected function getNotifications($userId){
        $dbConnection = $this->connect();
        $sql = "SELECT * FROM notification WHERE targetUser = :user_id AND status = unseen";
        $stmt = $dbConnection->prepare($sql);
        $stmt->bindParam(':user_id' , $userId);
        $stmt->execute();
        $notifications = $stmt->fetchAll();
        return json_encode($notifications);
    }
}