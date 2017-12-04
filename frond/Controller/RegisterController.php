<?php

App::uses('AppController', 'Controller');

class RegisterController extends AppController {

    public $uses = array('Customer');

    public function index() {
        $this->layout = 'register';
    }

    public function save() {
        $this->autoRender = false;
        $data = $this->request->data;
        $this->Customer->save($data);
        
         }
}
           
        
        
  
    
    

