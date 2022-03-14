<?php 
namespace PHPMVC\lib;

class Template
 

{
    private $_templateparts;
    private  $_action_view;
    private $_data;
     public function __construct(array $parts)
     {
         $this->_templateparts=$parts;
     }
     public function setActionView($actionview){
        $this->_action_view=$actionview;
     }
     public function setData($data){
     $this->_data = $data;
    }
    public function renderTemplateHeaderStart(){
        extract($this->_data);
        require_once TEMPLATE_PATH.'templateheaderstart.php';
    }
    public function renderTemplateHeaderend(){
        extract($this->_data);
        require_once TEMPLATE_PATH.'templateheaderend.php';
    }
    public function renderTemplateFooter(){
        extract($this->_data);
        require_once TEMPLATE_PATH.'templatefooter.php';
    }
    public function renderTemplateBlocks(){
      if(!array_key_exists('template',$this->_templateparts)){
          trigger_error('sorry you have to define template blocks ',E_USER_WARNING);
      }else{
          $parts=$this->_templateparts['template'];
          if(!empty($parts)){
            extract($this->_data);
            
              foreach($parts as $partkey =>$file){
                  if($partkey === ':view'){
                      require_once  $this->_action_view;
                  }else{
                      require_once $file;
                  }
              }
          }
      }
    }
    public function renderHeaderResources(){
        $output='';
        if(!array_key_exists('header_resources',$this->_templateparts)){
            trigger_error('sorry you have to define template blocks ',E_USER_WARNING);
        }else{
            $resources=$this->_templateparts['header_resources'];
            $css=$resources['css'];
            if(!empty($css)){

                   
                foreach($css as $csskey =>$path){
                
                  $output .= '<link type="text/css" rel="stylesheet" href ="'.$path.'"/>';

                    }
                 
                }
                echo $output;
            }
        }
        
        public function renderFooterResources(){
            $output='';
            if(!array_key_exists('footer_resources',$this->_templateparts)){
                trigger_error('sorry you have to define template blocks ',E_USER_WARNING);
            }else{
                $resources=$this->_templateparts['footer_resources'];
                $js=$resources['js'];
                if(!empty($js)){
    
                       
                    foreach($js as $jskey =>$path){
                    
                        $output .= '<script src="'.$path.'"></script>';
    
                        }
                     
                    }
                    echo $output;
                }
            }
    public function renderApp(){
       $this->renderTemplateHeaderStart();
       $this->renderHeaderResources();
       $this->renderTemplateHeaderend();
       $this->renderTemplateBlocks();
       $this->renderFooterResources();
       $this->renderTemplateFooter();

    }
}