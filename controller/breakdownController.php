<?php
  include_once 'autoloadController.php';

class BreakdownController extends Breakdown{

    public function getAllAssignedBreakdowns($id){
        $result = $this->getAssignedBreakdowns($id);
        return json_encode($result->fetchAll());
    }
}
?> 