<?php

class MerchantsController extends AppController {

    public $uses = array('Merchant');

    public function beforeFilter() {
        $user = $this->Session->read('Auth');
        if (empty($user)) {
            $this->redirect('/login');
        }
    }

    public function index() {
        $merchants = $this->Merchant->find('all', array(
            'conditions' => array(
                'deleted' => 'N'
            )
        ));
        $this->set('merchants', $merchants);
    }

    public function approve() {
        $this->autoRender = false;
        $data = $this->request->data;
        if (!empty($data['id'])) {
            $data['status'] = 'Y';
            if ($this->Merchant->save($data)) {
                echo '1';
            } else {
                echo '0';
            }
        }
    }

}
