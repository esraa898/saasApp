<?php
namespace PHPMVC\Controllers;
  

//deal with actions 
class IndexController extends AbstractController
{
    public function defaultAction(){
        $this->_language->load('template.common');
        $this->_language->load('empolyee.default');
          $this->_view();
    }
}