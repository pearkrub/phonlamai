<?php

class MerchantsController extends AppController {

    public $user = array('Merchant');

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
