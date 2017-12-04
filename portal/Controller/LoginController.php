<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginController
 *
 * @author ptum
 */
class LoginController extends AppController {

    public $uses = array('Merchant');
    
    public function index() {
        $this->layout= "login";
    }

    public function authen() {
        $this->autoRender = FALSE; //สั่งไม่ให้แสดงผล
        if ($this->request->data) {
            $data = $this->request->data;

            $user = $this->Merchant->find('first', array(//ค้นหาข้อมูล ตามเงื่อนไข
                'conditions' => array(
                    'username' => $data['username'],
                    'password' => md5($data['password']),
                    'status' => 'Y',
                    'deleted' => 'N'
                )
            ));
            if (!empty($user)) {
                $this->Session->write('Auth', $user); // เขียน Session
                $this->redirect('/dashboard');
            } else {
                $this->redirect('/login');
            }


            
        }
    }

    public function logout()
    {
        $this->Session->destroy();
        $this->redirect('/login');
    }
    //put your code here
}
