<?php
class Depriciation extends DBConnection
{

    function calculate()
    {
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
}
