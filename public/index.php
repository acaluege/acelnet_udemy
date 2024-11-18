<?php

class Private
{
    protected $controller = '_404';
    
    function __construct()
    {
        $arr = $this->getURL();
        
        
        $filename = "../private/controllers/".ucfirst($arr[0]).".php";
        if(file_exists($filename))
        {
           require $filename; 
           $this->$controller = $arr[0];    
        }else{
            require "../private/controllers/".$this->$controller.".php";
        }
        
        $mycontroller = new $this->$controller();
    }
    
    private function getURL()
    {
        $url = $_GET['url'] ?? 'home';
        $arr = explode("/", filter_var(trim($url,"/")), FILTER_SANITIZE_URL);
        return $arr;
    }
}

$app = new Private();
