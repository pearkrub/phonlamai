<?php

class MerchantsController extends AppController {

    public $uses = array('Merchant');

    public function index() {
        
        $merchants = $this->Merchant->find('all', array(
            'conditions' => array(
                'deleted' => 'N'
            )
        ));
        $this->set('merchants', $merchants);
    }

}
