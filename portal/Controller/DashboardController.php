<?php
class DashboardController  extends AppController {

    public $uses = ['Order', 'OrderDetail', 'Product'];

    public function  index()
    {
        $auth = $this->Session->read('Auth');

        $mounth_sale = $this->OrderDetail->find('all', array(
            'conditions' => array(
                'OrderDetail.merchant_id' => $auth['Merchant']['id'],
                'Order.order_date >=' => date('Y-m-').'01 00:00:00',
                'Order.step >' => 1
            ),
            'fields' => array('sum(summary) as Amount')
        ));

        $sale_all = $this->OrderDetail->find('all', array(
            'conditions' => array(
                'OrderDetail.merchant_id' => $auth['Merchant']['id'],
                'Order.step >' => 1
            ),
            'fields' => array('sum(summary) as Amount')
        ));

        $order_details = $this->OrderDetail->find('all', array(
            'conditions' => array(
                'OrderDetail.merchant_id' => $auth['Merchant']['id'],
                'Order.step >' => 1
            ),
            'order' => array('OrderDetail.id desc'),
            'limit' => 10
        ));
        $this->set('order_details', $order_details);
        $this->set('mounth', $mounth_sale[0][0]['Amount']);
        $this->set('all', $sale_all[0][0]['Amount']);
        $this->set('all_order', $this->OrderDetail->find('count',array('conditions' => array('OrderDetail.merchant_id' => $auth['Merchant']['id'], 'Order.step >' => 1))));
        $this->set('product_count', $this->Product->find('count', array('conditions' => array('Product.merchant_id' => $auth['Merchant']['id']))));
    }
    //put your code here
}
