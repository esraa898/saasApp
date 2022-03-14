<?php 
namespace PHPMVC\Lib;

use PHPMVC\lib\Language;
use PHPMVC\lib\Template;

// prepare for path to controller /action/params 
class FrontController 
 {
  const NOT_FOUND_ACTION= 'notFoundAction';
  const NOT_FOUND_CONTROLLER='PHPMVC\Controllers\\NotFoundController';
  private  $_controller='index';
  private  $_action ='default';
  private  $_params=[];
  private  $_template;
  private  $_language;

  public function __construct(Template $template,Language $language )
     {
         
        $this->parseUrl();
        $this->_language=$language;
        $this->_template=$template;
      
     }

     //divde REQUEST URI it into controller ,action ,params.
  public function parseUrl(){
         $url = explode('/',trim( parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH),'/'),3);
       
         if(isset($url[0])&& $url[0] !== ''){
             $this->_controller = $url[0];

         }
         if(isset($url[1])&& $url[1] !== ''){
            $this->_action = $url[1];

        }
        if(isset($url[2])&& $url[2] !== ''){
            $this->_params = explode('/',$url[2]);

        }
     }

     //  generate the resource of paths (making new insteance of controllers )
     public function dispatch(){
       $controllerclassname='PHPMVC\Controllers\\'. ucfirst($this->_controller).'Controller'; 
       $actionname=$this->_action.'Action';
       if(!class_exists($controllerclassname)){
        $controllerclassname=self::NOT_FOUND_CONTROLLER; 
       } 
       $controller =new  $controllerclassname();
       if(!method_exists($controller,$actionname)){
           $this->_action = $actionname=self::NOT_FOUND_ACTION; 
       }
       $controller->setController($this->_controller);
       $controller->setAction($this->_action);
       $controller->setParams($this->_params);
       $controller->setTemplate($this->_template);
       $controller->setLanguage($this->_language);
       $controller->$actionname();
      
      
     }
}