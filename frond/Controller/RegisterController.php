<?php

App::uses('AppController', 'Controller');

class RegisterController extends AppController
{

    public $uses = array('Customer');

    public function index()
    {
        $this->layout = 'register';
    }

    public function save()
    {
        $this->autoRender = false;
        $data = $this->request->data;
        if(!empty($data)) {
            $email = $data['email'];
            $customer = $this->Customer->find('first', array(
                'conditions' => array(
                    'email' => $email
                )
            ));
            if(!empty($customer)) {
                return 'error_email';
            }
            $data['password'] = md5($data['password']);
            if($this->Customer->save($data)) {
                $user = $this->Customer->find('first', array(//ค้นหาข้อมูล ตามเงื่อนไข
                    'conditions' => array(
                        'Customer.id' => $this->Customer->getLastInsertId()
                    )
                ));
                $this->Session->write('Auth', $user); // เขียน Session
                return 'success';
            }
        }

    }

    public function success() {
        $this->layout = 'register';
    }
}
           
        
        
  
    
    

