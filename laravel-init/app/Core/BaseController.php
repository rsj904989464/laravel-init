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
        $this->tdk['d'] = '此处是描述';
        $this->tdk['k'] = '此处是关键字';
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
        $controller_method = explode("\\",(request()->route()->getAction())['controller']);
        $controller_method = explode('@',end($controller_method));
        $controller = str_replace('Controller','',$controller_method[0]);
        $method = $controller_method[1];
        $this->tpl = strtolower($controller.'/'.$method);
    }
}