<?php
/**
 * Created by PhpStorm.
 * User: praibool
 * Date: 24/3/2018 AD
 * Time: 15:10
 */

class CustomersController extends AppController
{
    public function index() {
        $this->set('customers', $this->Customer->find('all'));
    }
}