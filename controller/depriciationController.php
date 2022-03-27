<?php
// require_once '../model/dbConnection.class.php';
// require_once '../model/depreciation.class.php';
// require_once '../model/asset.class.php';
// require_once './assetController.php';
class DepriciationController extends Depriciation
{


    function __construct()
    {
    }

    function calculateNetValue($asset)
    {
        $depriciation = ($asset['Cost'] - $asset['ResidualValue']) / $asset['UsefulYears'];
        $years = $this->calculateYearsElapsed($asset['PurchasedDate']);
        // $totalyears = $asset['UsefulYears'] * 12;
        if ($years < 1) {
            return $asset['Cost'];
        }
        $netValue = $asset['Cost'] - ($depriciation * $years);
        return $netValue;
    }

    function calculateYearsElapsed($purchaseDate): float|int
    {
        $purchaseYear = $purchaseDate;
        $now = date('Y-m-d');

        $ts1 = strtotime($purchaseYear);
        $ts2 = strtotime($now);

        $purchaseYear = date('Y', $ts1);
        $now = date('Y', $ts2);

        $month1 = date('m', $ts1);
        $month2 = date('m', $ts2);

        $diff = (($now - $purchaseYear) * 12) + ($month2 - $month1);
        return $diff / 12;
    }

    function calculateDepriciation()
    {
        try {
            $ac = new AssetController();
            $assets = json_decode($ac->getAssetsByCategory('fixed'), true);
            for ($i = 0; $i < count($assets); $i++) {
                $netValue = $this->calculateNetValue($assets[$i]);
                echo $assets[$i]['AssetID'] . ' Netvalue : ' . $netValue . ' Elaspsed: ' . $this->calculateYearsElapsed($assets[$i]['PurchasedDate']) . ' Residual Value : ' . $assets[$i]['ResidualValue'] . ' Cost : ' . $assets[$i]['Cost'] . '<br>';
                if ($netValue <= $assets[$i]['ResidualValue'] || $this->calculateYearsElapsed($assets[$i]['PurchasedDate']) >= $assets[$i]['UsefulYears'] * 12) {
                    return $this->updateDepriciation($assets[$i]['AssetID']);
                }
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    function isDepriciated($asssets)
    {
        foreach ($asssets as $assset) {
            if ($assset->getDepriciation() == 1) {
                return true;
            }
        }
    }

    function getAssetCost($assetID)
    {
        $res = $this->getCost($assetID);
        echo($res);
    }

    public function getAllDepriciatedAssets()
    {
        $ac = new AssetController();
        $res = $this->getAllDepriciated()->fetchAll();
        for ($i = 0; $i < count($res); $i++) {
            $assetDetails = json_decode($ac->getAsset($res[$i]['AssetID']), true);
            $res[$i] = $assetDetails;
        }
        return json_encode($res);
    }

    public function submitForDisposal($assetID)
    {
        if ($this->isDisposed($assetID)) {
            $res = array('status' => 'error', 'message' => 'Asset already Submitted disposed');
        } else {
            $result = $this->submit($assetID);
            if ($result->rowCount() > 0) {
                $res = array('status' => 'success');
            } else {
                $res = array('status' => 'failed');
            }
        }
        return json_encode($res);
    }
}
// $dc = new DepriciationController();
// $res = $dc->submitForDisposal(2);
// echo $res;
