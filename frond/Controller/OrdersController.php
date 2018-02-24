<?php
/**
 * Created by PhpStorm.
 * User: praibool
 * Date: 24/2/2018 AD
 * Time: 12:42
 */

class OrdersController extends AppController
{
    public $uses = array('Product', 'Order', 'CustomerAddress', 'OrderDetail');

    public function create()
    {
        $this->autoRender = false;
        $customer = $this->Session->read('Auth');

        $data = $this->request->data;
        $carts = $this->Session->read('carts');
        $shippingAddressId = $this->Session->read('shippingAddressId');
        $payment_method = $data['payment_method'];
        $product_ids = array();
        $products = array();

        foreach ($carts as $key => $cart) {
            $product_ids[] = $key;
        }
        if (!empty($product_ids)) {
            $products = $this->Product->find('all', array(
                'conditions' => array(
                    'Product.id' => $product_ids
                ),
                'recursive' => 0
            ));
        }

        $address = $this->CustomerAddress->findById($shippingAddressId);
        $order['order_no'] = $this->getOrderNo();
        $order['order_date'] = date('Y-m-d H:i:s');
        $order['status'] = 'new_order';
        $order['customer_id'] = $customer['Customer']['id'];
        $order['payment_method'] = $payment_method;
        $order['shipping_address'] = json_encode($address);
        if ($this->Order->save($order)) {

            $order_id = $this->Order->getLastInsertId();
            $total = 0;
            foreach ($products as $key => $product) {
                $order_detail = array();
                $order_detail['order_id'] = $order_id;
                $order_detail['product_id'] = $product['Product']['id'];
                $order_detail['customer_id'] = $customer['Customer']['id'];
                $order_detail['merchant_id'] = $product['Product']['merchant_id'];
                $order_detail['count'] = $carts[$product['Product']['id']]['qty'];
                $order_detail['normal_price'] = $carts[$product['Product']['id']]['qty'] * $product['Product']['normal_price'];
                $order_detail['price'] = $carts[$product['Product']['id']]['qty'] * $product['Product']['price'];
                $order_detail['product_name'] = $product['Product']['name'];
                $order_detail['product_detail'] = $product['Product']['detail'];
                $order_detail['category_id'] = $product['Product']['category_id'];
                $order_detail['price_per_key'] = $product['Product']['price'];
                $this->OrderDetail->create();
                $this->OrderDetail->save($order_detail);
                $total = $total + ($carts[$product['Product']['id']]['qty'] * $product['Product']['price']);
            }

            $order = array();
            $order['id'] = $order_id;
            $order['summary'] = $total;
            $order['total_price'] = $total;
            if ($this->Order->save($order)) {
                $this->Session->delete('carts');
                $this->Session->delete('shippingAddressId');
                echo base64_encode($order_id);
            }
        }

    }

    public function getOrderNo()
    {
        $order = $this->Order->find('first', array(
            'order' => array(
                'Order.id desc'
            )
        ));
        $year = date('Y');
        $mounth = date('m');
        if (!empty($order)) {
            $running = sprintf("%'.05d", intval($order['Order']['id']) + 1);
            return 'INV' . $year . $mounth . $running;
        } else {
            return 'INV' . $year . $mounth . '00001';
        }
    }

    /**
     * @return array
     */
    public function success($id = null)
    {
        $this->layout = 'success';
        if (!empty($id)) {
            $id = base64_decode($id);
            $order = $this->Order->find('first', array(
                'conditions' => array(
                    'Order.id' => $id

                ),
                'recursive' => 3
            ));
            $this->set('order', $order);
        } else {
            $this->redirect('/');
        }
    }
}