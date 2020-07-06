<?php
function pre($data,$stop = true){
    echo '<pre>';
    $data ? print_r($data):var_dump($data);
    echo '</pre>';
    if($stop) exit;
}

function js($files = []) {
    if (empty($files)) {
        return '';
    }
    $html = '';
    foreach ($files as $file) {
        $html .= '<script type="text/javascript" src="' . $file . '"></script>' . "\r\n";
    }
    return $html;
}


function css($files = []) {
    if (empty($files)) {
        return '';
    }
    $html = '';
    foreach ($files as $file) {
        $html .= '<link rel="stylesheet" type="text/css" href="' . $file . '" />' . "\r\n";
    }
    return $html;
}