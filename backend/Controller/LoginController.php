<?php

class LoginController extends AppController {

    public $uses = array('User');

    public function index() {
        $this->layout = 'login';
    }

    public function authen() {
        $this->autoRender = FALSE; //สั่งไม่ให้แสดงผล
        if ($this->request->data) {
            $data = $this->request->data;

            $user = $this->User->find('first', array(//ค้นหาข้อมูล ตามเงื่อนไข
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

}
