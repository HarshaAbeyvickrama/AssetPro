<?php
  include_once 'autoloadController.php';

class BreakdownController extends Breakdown{

    public function getAllAssignedBreakdowns($id){
        $result = $this->getAssigned($id);
        return json_encode($result->fetchAll());
    }

    public function getBreakdown($aid,$bid){
      $result = $this->get($aid,$bid);
      return json_encode($result->fetchAll());
    }

    public function reportBreakdown($aid){
      $result = $this->reportAsset($aid);
      // return json_encode($result->fetchAll());
    }
}
?> 