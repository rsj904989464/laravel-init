<?php
namespace App\Core;
trait Base
{
    protected $data = [];

    function pre($data,$stop = true,$view = false){
        echo '<pre>';
        $data ? print_r($data):var_dump($data);
        echo '</pre>';
        if($stop) exit;
        $this->view = $view;
    }

}