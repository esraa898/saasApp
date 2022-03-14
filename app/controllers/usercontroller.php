<?php
namespace PHPMVC\Controllers;

use PHPMVC\lib\Helper;
use PHPMVC\lib\InputFilter;

use PHPMVC\Model\UserModel;

class UserController extends AbstractController
{
    use Helper;
    use InputFilter;
    public function defaultAction(){
      $this->_language->load('template.common');
      $this->_language->load('empolyee.default');
        $this->_data['empolyees']= UserModel::getAll();
          $this->_view();
    }
    public function addAction(){
      $this->_language->load('template.common');
      $this->_language->load('empolyee.default');
        if(isset($_POST['submit'])){
            $emp = new UserModel() ;
            $emp->name= $_POST['name'];
            $emp->title =$_POST['title'];
            $emp->phone= $_POST['phone'];
            $emp->whatsapp = $_POST['whatsapp'];
            $emp->email = $_POST['email'];
            $emp->adress = $_POST['adress'];
            $emp->image= $_POST['image'];
            $emp->cover= $_POST['cover'];
           if($emp->save()){
            $_SESSION['message']= 'user added suesscefully ';
               $this->redirect("/user");
           } ;
         
        }
        $this->_view();
    }
    public function editAction(){
      $this->_language->load('template.common');
      $this->_language->load('empolyee.default');
      $id= $this->filterInt($this->_params[0]) ;
        
     $emp = UserModel::getByPK($id,'*');
     
     if($emp === false){
        $this->redirect("/user");
}
     $this->_data['empolyee']=$emp;
     if(isset($_POST['submit'])){
      $emp->name= $_POST['name'];
      $emp->title =$_POST['title'];
      $emp->phone= $_POST['phone'];
      $emp->whatsapp = $_POST['whatsapp'];
      $emp->email = $_POST['email'];
      $emp->adress = $_POST['adress'];
      $emp->image= $_POST['image'];
      $emp->cover= $_POST['cover'];
      
       if($emp->save()){
        $_SESSION['message']= 'empolyee saved suesscefully ';
        $this->redirect("/user");
     }

       
    }   
    $this->_view();
    }
    public function deleteAction(){
       
        $id= $this->filterInt($this->_params[0]) ;
          
        $emp = UserModel::getByPK($id,'*');
        
      if($emp === false){
        $this->redirect("/user");
       }

       if($emp->delete() ){
        $_SESSION['message']= 'empolyee deleted suesscefully ';
        $this->redirect("/user");
       }
       
        $this->_view();
       }
  
         
        
    
      }
