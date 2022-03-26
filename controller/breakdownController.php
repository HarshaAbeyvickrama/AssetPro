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

    public function reportBreakdown($data){
      $result = $this->reportAsset($data);
      if($result->rowCount() > 0){
        $res = array('status' => 'success');
      } else {
          $res = array('status' => 'failed');
      }
      
      return json_encode($res);
    }

    public function getAllAssignedTechBreakdowns($id){
      $result = $this->getAssignedBreakdowns($id);
      return json_encode($result->fetchAll());

    }

    public function updateAllBreakdowns($data){
        $result = $this->updateBreakdown($data);
        if($result->rowCount() > 0){
            $res = array('status' => 'success');
        } else {
            $res = array('status' => 'failed');
        }

    }
}
