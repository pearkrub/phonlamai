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

    public $uses = array('Customer');
    
    public function index() {
        $this->layout= "login";
    }

    public function authen() {
        $this->autoRender = FALSE; //สั่งไม่ให้แสดงผล
        if ($this->request->data) {
            $data = $this->request->data;
            
            $user = $this->Customer->find('first', array(//ค้นหาข้อมูล ตามเงื่อนไข
                'conditions' => array(
                    'email' => $data['email'],
                    'password' => $data['password'],
                    'status' => 'Y',
                    'deleted' => 'N'
                )
            ));
            if (!empty($user)) {
                $this->Session->write('Auth', $user); // เขียน Session
            }
            $this->redirect('/');


            
        }
    }
    
    public function logout() {
        $this->autoRender = FALSE; //สั่งไม่ให้แสดงผล
        $this->Session->delete('Auth');
        $this->redirect('/');
    }
    //put your code here
}
