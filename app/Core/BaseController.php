<?php

namespace App\Core;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    use Base;
    protected $tdk = [];
    protected $render = true;
    protected $tpl = '';
    protected $layout = 'layout/common';
    protected $insert2footer = '<!--Insert To Footer-->';


    public function __construct()
    {
        $this->tdk['t'] = 'title';
        $this->tdk['d'] = 'desc';
        $this->tdk['k'] = 'keyword';
        $this->data['header'] = '聊天室demo';
    }


    public function __destruct()
    {
        $this->view();
    }



    protected function view(){
        if(!$this->render) die;
        if(!$this->tpl){
            $this->default_tpl();
        }
        $this->data = array_merge($this->data,['tdk'=>$this->tdk,'insert2footer'=>$this->insert2footer]);
        $content = explode($this->insert2footer,view($this->tpl,$this->data)->render());
        if($this->layout){
            die(view($this->layout,array_merge($this->data,['content'=>$content[0],'insert2footer'=>$content[1]??''])));//echo + die
        }
        echo $content;
    }

    protected function default_tpl(){
        $controller = explode("\\",(request()->route()->getAction())['controller']);
        list($controller,$method) = explode('@',end($controller));
        $this->tpl = strtolower(str_replace('Controller','',$controller).'/'.$method);
    }
}