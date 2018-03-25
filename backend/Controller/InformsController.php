<?php
/**
 * Created by PhpStorm.
 * User: praibool
 * Date: 24/3/2018 AD
 * Time: 15:09
 */

class InformsController extends AppController
{
    public $uses = array('InformPayment');
    
    public function index() {
        $this->set('informs', $this->InformPayment->find('all', array('order' => array('InformPayment.id desc'))));
    }
}