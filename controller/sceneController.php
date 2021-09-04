<?php
    if(isset($_GET['action']) || isset($_GET['view'])){
        switch ($_GET['action']) {
            case 'renderView':
               renderView();
                break;
            
            default:
                # code...
                break;
        }
    }

    function renderView(){
        $name = "vh";
        return $name;
    }
    echo 'out';



?>