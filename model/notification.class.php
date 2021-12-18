<?php

class Notification extends DBConnection
{
    // ADD_ASSET   
    //REMOVE_ASSET
    //UPDATE_ASSET

    // ADD_EMPLOYEE
    //REMOVE_EMPLOYEE
    //UPDATE_EMPLOYEE

    // ADD_TECHNICIAN
    //REMOVE_TECHNICIAN
    //UPDATE_TECHNICIAN

    //NEW_BREAKDOWN
    //COMMENCE_BREAKDOWN


    public function createNotification($type, $userId, $message, $assetId = null, $addedUser = null, $targetUsers)
    {
        echo "createNotification";
        $dbConnection = $this->connect();
        $sql = "INSERT INTO notification (type , createdBy , message , assetId , addedUser  ) VALUES (:type , :user_id , :message ,  :asset_id , :addedUser)";
        $stmt = $dbConnection->prepare($sql);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':asset_id', $assetId);
        $stmt->bindParam(':addedUser', $addedUser);
        $stmt->execute();
        $notificationID = $dbConnection->lastInsertId();

        $this->addNotifcationUsers($notificationID, $targetUsers);
    }

    private function addNotifcationUsers($notificationID, $users)
    {
        $dbConnection = $this->connect();
        foreach ($users as $user) {
            $sql = "Insert into notificationUsers(notificationId , userId) values (:notificationID , :userID)";
            $stmt = $dbConnection->prepare($sql);
            $stmt->bindParam(':notificationID', $notificationID);
            $stmt->bindParam(':userID', $user);
            $stmt->execute();
        }
    }

    public function getNotifications($userId)
    {
        $dbConnection = $this->connect();
        $sql = "SELECT
                    n.*,
                    ns.seen
                FROM
                    `notification` n
                INNER JOIN notificationusers ns ON
                    n.id = ns.notificationId
                WHERE
                    ns.userId = :userID";
        $stmt = $dbConnection->prepare($sql);
        $stmt->bindParam(':userID', $userId);
        $stmt->execute();
        $notifications = $stmt->fetchAll();
        print_r(json_encode($notifications));
    }
}
