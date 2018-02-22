<?php
/**
 * Created by PhpStorm.
 * User: NBL11
 * Date: 23/1/2561
 * Time: 9:39
 */

class CartController extends AppController
{
    public $uses = array('Product');

    public function index()
    {
        $this->layout = 'cart';

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
                $cart_products[$key]['shop_name'] = $product['Merchant']['shop_name'];
                $cart_products[$key]['in_stock'] = $product['Product']['quantity'];
            }

            $this->set('cart_products', $cart_products);
        }
    }

    public function checkout()
    {
        try {
            $Auth = $this->Session->read('Auth');
            if (!empty($Auth)) {
                $this->layout = 'cart';
            }else{
                $this->layout = 'register';
            }


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
                    $cart_products[$key]['shop_name'] = $product['Merchant']['shop_name'];
                    $cart_products[$key]['in_stock'] = $product['Product']['quantity'];
                }

                $this->set('cart_products', $cart_products);
            }
        }catch (\Exception $exception){
            die;
            $this->prd($exception);
        }
    }

    /**
     * @return array
     */
    public function shipping()
    {
        $this->layout = 'cart';
    }

    /**
     * @return array
     */
    public function getSummary()
    {
        $this->layout = 'ajax';

        $carts = $this->Session->read('carts');
        if (empty($carts)) {
            $carts = array();
            $this->set('total', 0);
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

            $total = 0;
            foreach ($products as $key => $product) {
                $total = $total + ($carts[$product['Product']['id']]['qty'] * $product['Product']['price']);
            }

            $this->set('total', $total);
        }
    }
}