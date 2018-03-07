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
class ProductsController extends AppController
{
    public $uses = ['Product','Merchant'];

    public function index($category_id = null)
    {
        $this->layout = 'product';
        $merchants = $this->Merchant->find('all', array(
            'conditions' => array(
                'Merchant.status' => 'Y',
                'Merchant.deleted' => 'N'
            )
        ));
        $this->set('merchants', $merchants);
        
        $conditions = [
            'Product.start_date <=' => date('Y-m-d H:i:s'),
            'Product.end_date >=' => date('Y-m-d H:i:s')
        ];
        $data = $this->request->query;
        if(!empty($data['category_id'])) {
            $conditions['category_id'] = $data['category_id'];
        }
        if (!empty($data['merchant_id'])) {
            $conditions['merchant_id'] = $data['merchant_id'];
        }
        if (!empty($data['keyword'])) {
            $conditions['Product.name'] = $data['keyword'];
        }
        $this->set('products', $this->Product->find('all', array('conditions' => array($conditions))));
    }

    public function view($id = null)
    {
        $this->layout = 'cart';

        if(empty($id)) {
            $this->redirect('/');
        }

        $product = $this->Product->find('first', array(
            'conditions' => array(
                'Product.id' => $id
            )
        ));

        if(empty($product)) {
            $this->redirect('/');
        }

        $this->set('product', $product);
    }

    public function ajaxView()
    {
        $this->layout = 'ajax';
        $data = $this->request->data;

        $product = $this->Product->find('first', array(
            'conditions' => array(
                'Product.id' => $data['id']
            )
        ));

        $this->set('product', $product);
    }

    public function addToCart()
    {
        $this->autoRender = false;

        $data = $this->request->data;
        try {
            if (!empty($data['id'])) {
                $product_id = $data['id'];
                $qty = $data['qty'];

                $cart = $this->Session->read('carts');

                if (!empty($cart[$product_id]) && empty($data['update'])) {
                    $cart[$product_id]['qty'] = $cart[$product_id]['qty'] + $qty;

                } else {
                    $cart[$product_id]['qty'] = $qty;
                }

                $cart = $this->Session->write('carts', $cart);

                return $cart;
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function removeProductInCart()
    {
        $this->autoRender = false;

        $data = $this->request->data;
        try {
            if (!empty($data['id'])) {
                $product_id = $data['id'];

                $cart = $this->Session->read('carts');

                if (!empty($cart[$product_id])) {
                    unset($cart[$product_id]);
                }
                $cart = $this->Session->write('carts', $cart);

                return $cart;
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function loadCart()
    {

        $this->layout = 'ajax';
        $carts = $this->Session->read('carts');
        if (empty($carts)) {
            $carts = array();
            $this->set('cart_products', $carts);
        } else {
            $product_ids = array();

            foreach ($carts as $key => $cart) {
                $product_ids[] = $key;
            }

            $products = $this->Product->find('all', array(
                'conditions' => array(
                    'Product.id' => $product_ids
                )
            ));
            $cart_products = array();

            foreach ($products as $key => $product) {
                $cart_products[$key]['id'] = $product['Product']['id'];
                $cart_products[$key]['name'] = $product['Product']['name'];
                $cart_products[$key]['image'] = empty($product['ProductImage']) ? '' : $product['ProductImage'][0]['path'];
                $cart_products[$key]['qty'] = $carts[$product['Product']['id']]['qty'];
                $cart_products[$key]['price'] = $product['Product']['price'];
            }

            $this->set('cart_products', $cart_products);
        }

    }

    public function cartCount()
    {
        $this->autoRender = false;

        $carts = $this->Session->read('carts');
        if (empty($carts)) {
            return '(0)';
        } else {
            return '(' . count($carts) . ')';
        }
    }

}
