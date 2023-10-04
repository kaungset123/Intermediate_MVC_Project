<?php

class Core{
    private $className="Home";
    private $methodName="index";
    private $params= [];

    public function __construct()
    {
        $this->getUrl();
    }

    public function getUrl(){
        $url = isset($_GET['url']) ? rtrim($_GET['url'],'/') : '' ;

        $url = explode("/",$url);
       
        if(!empty($url[0])){
           if(file_exists("../app/controllers/".ucfirst($url[0]) . ".php")){
               $this->className = $url[0];     
               unset($url[0]);
           }  
        }

        require_once "../app/controllers/".ucfirst($this->className) . ".php";
        $this->className = new $this->className();

        if(!empty($url[1])){
         if(method_exists($this->className,$url[1])){
        $this->methodName = $url[1];
        unset($url[1]);
            }
         }
        //  echo "current method is".$this->methodName;

        $params = !empty($url) ? array_values($url) : [];

        call_user_func([$this->className,$this->methodName],$params);

    }
}