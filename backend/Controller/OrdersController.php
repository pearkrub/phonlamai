<?php
/**
 * Created by PhpStorm.
 * User: praibool
 * Date: 24/2/2018 AD
 * Time: 12:42
 */

class OrdersController extends AppController
{
    public $uses = array('Product', 'Order', 'CustomerAddress', 'OrderDetail', 'InformPayment');

//    function beforeFilter() {
////        die(phpinfo());
//    }
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
                'Order.id' => $id
            ),
            'recursive' => 3
        ));
        
        if($order['Order']['status'] == 'new_order') {
            $data['id'] = $id;
            $data['status'] = 'wait_payment';

            $this->Order->save($data);
        }

        $refundeds = $this->OrderDetail->find('all', array(
            'conditions' => array(
                'OrderDetail.order_id' => $id,
                'OrderDetail.status' => 'refunded'
            )
        ));
        $this->set('refundeds', $refundeds);
        $this->set('order', $order);
    }

    public function approve()
    {
        $this->autoRender = false;
        $id = $this->request->data['id'];

        $data['id'] = $id;
        $data['status'] = 'supplying';
        $data['step'] = 2;

        $this->Order->save($data);

        $update['status'] = 'success';
        $informs = $this->InformPayment->find('all',array('conditions' => array('InformPayment.order_id' => $id)));
        foreach ($informs as $inform) {
            $update['id'] = $inform['InformPayment']['id'];
            $this->InformPayment->save($update);
        }

        echo 1;
    }

    public function refundedItem()
    {
        $this->autoRender = false;
        $ids = explode(',', $this->request->data['id']);
        $update['transfer'] = 'canceled';

        foreach ($ids as $key) {
            $update['id'] = $key;
            $this->OrderDetail->save($update);
        }

        echo 1;
    }
}