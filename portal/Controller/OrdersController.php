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

    public function changeStatus() {
        $this->autoRender = false;
        $data = $this->request->data;

        if($data['status'] != '') {
            $orderDetail = $this->OrderDetail->find('first', array('conditions' => array('OrderDetail.id' => $data['id'])));
            $this->OrderDetail->save($data);
            $detailCount = $this->OrderDetail->find('count',array(
                'conditions' => array(
                    'OrderDetail.order_id' => $orderDetail['OrderDetail']['order_id']
                )
            ));
            $detailCount = $detailCount;
            $detail = $this->OrderDetail->find('count',array(
                'conditions' => array(
                    'OrderDetail.status' => $data['status'],
                    'OrderDetail.order_id' => $orderDetail['OrderDetail']['order_id']
                )
            ));

            $orderDiff = $detailCount - $detail;
           if($orderDiff == 0) {
               if($data['status'] == 'shipping') {
                   $order['status'] = 'shipping';
                   $order['step'] = 3;
                   $order['id'] = $orderDetail['OrderDetail']['order_id'];

               }else{
                   $order['status'] = 'delivered';
                   $order['step'] = 4;
                   $order['id'] = $orderDetail['OrderDetail']['order_id'];
               }

               $this->Order->save($order);
           }

           echo 1;
        }
    }
}