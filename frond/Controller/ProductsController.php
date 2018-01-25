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

    public function index($category_id = null)
    {
        $this->layout = 'product';
        if (!empty($category_id)) {
            $this->set('products', $this->Product->find('all', array('conditions' => array('category_id' => $category_id))));
        } else {
            $this->set('products', $this->Product->find('all'));
        }
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

                if (empty($cart)) {
                    $cart = array();
                } else {
                    $cart = json_decode($cart, true);
                }
                if (!empty($cart[$product_id]) && empty($data['update'])) {
                    $cart[$product_id]['qty'] = $cart[$product_id]['qty'] + $qty;

                } else {
                    $cart[$product_id]['qty'] = $qty;
                }

                $cart = $this->Session->write('carts', json_encode($cart));

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

                if (empty($cart)) {
                    $cart = array();
                } else {
                    $cart = json_decode($cart, true);
                }
                if (!empty($cart[$product_id])) {
                    unset($cart[$product_id]);
                }
                $cart = $this->Session->write('carts', json_encode($cart));

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
            $carts = json_decode($carts, true);
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
            $carts = json_decode($carts, true);
            return '(' . count($carts) . ')';
        }
    }

}
