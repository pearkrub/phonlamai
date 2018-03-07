<?php
/**
 * Created by PhpStorm.
 * User: NBL11
 * Date: 7/3/2561
 * Time: 8:57
 */

class AccountsController extends AppController
{

    public $uses = array('Customer');
    public function profile() {

        $this->layout = 'cart';
        $Auth = $this->Session->read('Auth');
        if(empty($Auth)) {
            $this->redirect('/');
        }
        $this->set('customer', $Auth);
    }

    public function save() {

        $this->autoRender = false;
        $Auth = $this->Session->read('Auth');
        if(empty($Auth)) {
            $this->redirect('/');
        }
        $data = $this->request->data;

        if(!empty($data['oldPassword'])) {
            if($Auth['Customer']['password'] != md5($data['oldPassword'])) {
                $this->redirect('/accounts/profile?status=failPassword');
            }
            if($data['confirmPassword'] != $data['newPassword']) {
                $this->redirect('/accounts/profile?status=failPasswordSame');
            }
            if(empty($data['confirmPassword']) || strlen($data['confirmPassword']) < 6) {
                $this->redirect('/accounts/profile?status=failPasswordEmpty');
            }

            $profile['password'] = md5($data['confirmPassword']);
        }
        $profile['id'] = $Auth['Customer']['id'];
        $profile['first_name'] = $data['first_name'];
        $profile['last_name'] = $data['last_name'];
        $profile['email'] = $data['email'];
        $profile['phone'] = $data['phone'];
        if($this->Customer->save($profile)) {
            $Customer = $this->Customer->find('first', array(
                'conditions' => array(
                    'Customer.id' => $profile['id']
                )
            ));
            $this->Session->write('Auth', $Customer);
            $this->redirect('/accounts/profile?status=success');
        }
    }
}