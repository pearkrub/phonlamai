<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link https://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    public $uses = array('Product', 'Merchant');

    public function index() {
        $merchants = $this->Merchant->find('all', array(
            'conditions' => array(
                'Merchant.status' => 'Y',
                'Merchant.deleted' => 'N'
            )
        ));
        $products = $this->Product->find('all',array(
            'conditions' => array(
                'Product.start_date <=' => date('Y-m-d H:i:s'),
                'Product.end_date >=' => date('Y-m-d H:i:s')
            ),
            'order' => array('Product.id desc'),
            'limit' => '5'
        ));
        $this->set('products', []);
        $this->set('merchants', $merchants);
    }

    public function contact() {
        $this->layout = 'product';
    }

    public function about() {
        $this->layout = 'product';
    }

    public function faq()
    {
        $this->layout = 'product';
    }

    public function privacy()
    {
        $this->layout = 'product';
    }
}
