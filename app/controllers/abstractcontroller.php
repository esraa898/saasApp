<?php
namespace PHPMVC\Controllers;

use PHPMVC\LIB\FrontController;

//abstract for controllers to set values of controllers actions and all controllers inheart it ...
class AbstractController
{
protected $_controller;
protected $_action;
protected $_params;
protected $_data=[];
protected $_template;
protected $_language;



public function notFoundAction(){
  $this->_view();
}
 public function setController($controllername){
     $this->_controller =$controllername;

 }
 public function setAction($actionname){
    $this->_action =$actionname;

}
public function setParams($params){
    $this->_params =$params;

}
public function setTemplate($template){
    $this->_template =$template;

}
public function setLanguage($language){
    $this->_language =$language;

}

protected function _view(){
    if($this->_action == FrontController::NOT_FOUND_ACTION){
        require_once VIEWS_PATH .'notfound'.DS.'notfound.view.php' ;
    }else{
      $view =VIEWS_PATH .$this->_controller .DS. $this->_action.'.view.php' ;
      if(file_exists($view)){
     
          $this->_data=array_merge($this->_data,$this->_language->getDictionary());
          $this->_template->setData($this->_data);
          $this->_template->setActionView($view);
          $this->_template->renderApp();
      
    }else{
        require_once  VIEWS_PATH. 'notfound' . DS .'notview.view.php';
       }
    }
}
   

}