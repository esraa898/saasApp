<?php
namespace PHPMVC\Controllers;

use PHPMVC\lib\Helper;
use PHPMVC\lib\InputFilter;
use PHPMVC\Model\VcardModel;

class VcardController extends AbstractController
{
    use Helper;
    use InputFilter;
    public function defaultAction(){
      $this->_language->load('template.common');
      $this->_language->load('vcard.default');
        $this->_data['Vcard']= VcardModel::getAll();
          $this->_view();
    }

    public function addAction(){
      $this->_language->load('template.common');
      $this->_language->load('vcard.default');
        if(isset($_POST['submit'])){
            $user = new VcardModel() ;
            $user->subDomain = ($_POST['subDomain']);
            $user->database_user = ($_POST['database_user']);
           
           if($user->save()){
            $_SESSION['message']= 'user added suesscefully ';
               $this->redirect("/vcard");
           } ;
         
        }
        $this->_view();
    }
    public function editAction(){
    
    
        
     $this->_language->load('template.common');
     $this->_language->load('vcard.default'); 
       $id= $this->filterInt($this->_params[0]) ;
      
    
     $user = VcardModel::getByPK($id,'*');
     
      $this->_data['Vcard']=$user;
       if(isset($_POST['submit'])){
       
           $user->subDomain = ($_POST['subDomain']);
           $user->database_user = ($_POST['database_user']);
          if($user->save()){
           $_SESSION['message']= 'user updated suesscefully ';
              $this->redirect("/vcard");
          } ;
        
       }
       $this->_view();
     }

       

    public function deleteAction(){
       
        $id= $this->filterInt($this->_params[0]) ;
          
        $user= VcardModel::getByPK($id,'*');
        
      if($user === false){
        $this->redirect("/vcard");
       }

       if($user->delete() ){
        $_SESSION['message']= 'user deleted suesscefully ';
        $this->redirect("/vcard");
       }
       
        $this->_view();
       }
  
         
        
    
      }