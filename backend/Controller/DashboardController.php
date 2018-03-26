<?php
class DashboardController  extends AppController {

    public $uses = array('Customer', 'Merchant');

    public function  index()
    {
        $this->set('customers', $this->Customer->find('all', array('order' => array('Customer.id desc'), 'limit' => 10)));
        $this->set('merchants', $this->Merchant->find('all', array('order' => array('Merchant.id desc'), 'limit' => 10)));
        
    }
    //put your code here
}
