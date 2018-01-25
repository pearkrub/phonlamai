<?php
/**
 * Created by PhpStorm.
 * User: NBL11
 * Date: 23/1/2561
 * Time: 9:39
 */

class CartController extends  AppController
{
    public $uses = array('Product');
    public function index(){
        $this->layout = 'cart';

        $carts = $this->Session->read('carts');
        if(empty($carts)){
            $carts = array();
            $this->set('cart_products', $carts);
        }else{
            $carts = json_decode($carts, true);
            $product_ids = array();

            foreach ($carts as $key => $cart){
                $product_ids[] = $key;
            }

            $products = $this->Product->find('all', array(
                'conditions' => array(
                    'Product.id' => $product_ids
                )
            ));
            $cart_products = array();

            foreach ($products as $key => $product){
                $cart_products[$key]['id'] = $product['Product']['id'];
                $cart_products[$key]['name'] = $product['Product']['name'];
                $cart_products[$key]['image'] = empty($product['ProductImage'])?'':$product['ProductImage'][0]['path'];
                $cart_products[$key]['qty'] = $carts[$product['Product']['id']]['qty'];
                $cart_products[$key]['price'] = $product['Product']['price'];
                $cart_products[$key]['shop_name'] = $product['Merchant']['shop_name'];
                $cart_products[$key]['in_stock'] = $product['Product']['quantity'];
            }

            $this->set('cart_products', $cart_products);
        }
    }
}