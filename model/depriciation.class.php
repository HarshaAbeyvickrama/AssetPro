<?php
class Depriciation extends DBConnection
{

    function calculate(){
        $sql = "SELECT
                        d.DepreciationID,
                        d.AssetID,
                        d.UsefulYears,
                        ad.Cost,
                        d.ResidualValue
                    FROM
                        `depreciation` d
                    INNER JOIN assetdetails ad ON
                        d.AssetID = ad.AssetID";
    }

    function getCost($assetID){
        $sql = "SELECT cost FROM assetdetails WHERE assetID = :assetID";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':assetID', $assetID);
        $stmt->execute();
        return $stmt->fetch()['cost'];
    }

    function updateDepriciation($assetID){
        $sql = "UPDATE depreciation SET isDepriciated = true WHERE AssetID = :assetID";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':assetID', $assetID);
        $stmt->execute();
        return $stmt;
    }

    function getAllDepriciated(){
        $sql = "SELECT
                    d.DepreciationID,
                    d.AssetID,
                    d.UsefulYears,
                    ad.Cost
                FROM
                    `depreciation` d
                INNER JOIN assetdetails ad ON
                    d.AssetID = ad.AssetID
                WHERE
                    d.isDepriciated = TRUE" ;
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    function submit($assetID){
        $sql = "UPDATE depreciation SET isDisposed = true WHERE AssetID = :assetID";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':assetID', $assetID);
        $stmt->execute();
        return $stmt;
    }

    function isDisposed($assetID){
        $sql = "SELECT isDisposed FROM depreciation WHERE AssetID = :assetID";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':assetID', $assetID);
        $stmt->execute();
        return $stmt->fetch()['isDisposed'];
    }
}
