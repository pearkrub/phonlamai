<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductsController
 *
 * @author ptum
 */
class ProductsController extends AppController {

    public $uses = array('Product', 'ProductImage');

    public function beforeFilter() {
        $user = $this->Session->read('Auth');
        if (empty($user)) {
            $this->redirect('/login');
        }
    }

    public function index() {
        $merchant = $this->Session->read('Auth');
        $this->set('products', $this->Product->find('all', array('conditions' => array('merchant_id' => $merchant['Merchant']['id']))));
    }

    public function add() {
        
    }

    public function save() {

        $this->autoRender = false;

        $data = $this->request->data;

        if (!empty($data)) {
            $merchant = $this->Session->read('Auth');
            $data['merchant_id'] = $merchant['Merchant']['id'];
            $data['status'] = 'Y';
            $date = explode(' - ', $data['daterange']);
            $start_Date = $date[0];
            $end_date = $date[1];
            $data['start_date'] =  $start_Date.' 00:00:00';
            // $time = strtotime(date('Y-m-d')); //แปลงเวลา
            // $end_date = date("Y-m-d", strtotime("+" . $data['category_id'] . " month", $time));
            $data['end_date'] =  $end_date.' 23:59:59';
            // $time = strtotime($end_date);
            // $receive_date = date("Y-m-d", strtotime("+5 days", $time));
            // $data['receive_date'] = $receive_date;
            if ($this->Product->save($data)) {
                $product_id = $this->Product->getLastInsertId();
                $file_ary = $this->reArrayFiles($_FILES['image']);

                foreach ($file_ary as $file) {
                    $type = explode('.', $file['name']);
                    $file_name = $this->uniqid_base36(true) . '.' . end($type);
                    $target_file = 'files/product/' . $file_name;
                    if (move_uploaded_file($file["tmp_name"], $target_file)) {
                        $img['product_id'] = $product_id;
                        $img['file_name'] = $file['name'];
                        $img['file_type'] = $file['type'];
                        $img['file_size'] = $file['size'];
                        $img['path'] = $target_file;
                        $this->ProductImage->create();
                        $this->ProductImage->save($img);
                        $this->redirect(Configure::read('Portal.Domain') . 'products');
                    }
                }
            }
        }
    }

    public function uniqid_base36($more_entropy = false) {
        $s = uniqid('', $more_entropy);
        if (!$more_entropy)
            return base_convert($s, 16, 36);

        $hex = substr($s, 0, 13);
        $dec = $s[13] . substr($s, 15); // skip the dot
        return base_convert($hex, 16, 36) . base_convert($dec, 10, 36);
    }

    public function reArrayFiles(&$file_post) {

        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for ($i = 0; $i < $file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }

        return $file_ary;
    }

}
