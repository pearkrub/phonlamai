<?php

class OrdersController extends AppController
{
    public function index() {
        $auth = $this->Session->read('Auth');
        if(empty($auth)){
            $this->redirect('/login');
        }
        $orders = $this->Order->find('all', array(
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