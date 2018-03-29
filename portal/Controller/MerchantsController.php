<?php

class MerchantsController extends AppController {

    public $uses = array('Merchant');

    public function index() {
        $auth = $this->Session->read('Auth');
        $merchants = $this->Merchant->find('first', array(
            'conditions' => array(
                'Merchant.id' => $auth['Merchant']['id']
            )
        ));
        $this->set('profile', $merchants);
    }

}
