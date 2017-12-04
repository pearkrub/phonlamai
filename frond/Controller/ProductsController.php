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
class ProductsController extends AppController{
    
    public function index($category_id = null){
        $this->layout = 'product';
        if(!empty($category_id)){
            $this->set('products', $this->Product->find('all',array('conditions' => array('category_id' => $category_id))));
        }else{
            $this->set('products', $this->Product->find('all'));
        }
    }
}
