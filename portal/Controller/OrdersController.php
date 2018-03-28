<?php

class OrdersController extends AppController
{
    public $uses = array('Order', 'OrderDetail');
    public function index() {
        $auth = $this->Session->read('Auth');
        if(empty($auth)){
            $this->redirect('/login');
        }

        $orderIds = $this->OrderDetail->find('list',array(
            'conditions' => array(
                'OrderDetail.merchant_id' => $auth['Merchant']['id']
            ),
            'fields' => array(
                'OrderDetail.order_id',
                'OrderDetail.order_id'
            )
        ));
        $orders = $this->Order->find('all', array(
            'conditions' => array(
                'Order.step >' => 1,
                'Order.id' => $orderIds
            ),
            'order' => array('Order.id desc')
        ));
        $this->set('orders', $orders);
    }

    public function view($id) {
        $auth = $this->Session->read('Auth');
        if(empty($auth)){
            $this->redirect('/');
        }

        if(empty($id)){
            $this->redirect('/');
        }

        $order = $this->Order->find('first', array(
            'conditions' => array(
                'Order.id' => $id,
            ),
            'recursive' => 3
        ));

        $this->set('order', $order);
    }
}