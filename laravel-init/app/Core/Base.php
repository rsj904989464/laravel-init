<?php
namespace App\Core;
trait Base
{
    protected $data = [];

    function pre($data,$stop = true,$view = false){
        echo '<pre>';
        $data ? print_r($data):var_dump($data);
        echo '</pre>';
        $this->view = $view;
        if($stop) exit;
    }

}