<?php


namespace App\Http\Controllers;
use App\Core\BaseController;

class ChatController extends BaseController
{

    public function index(){
        $this->tdk['t'] = 'chat';
    }
}