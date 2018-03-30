<?php
/**
 * Created by PhpStorm.
 * User: NBL11
 * Date: 30/3/2561
 * Time: 0:11
 */

class PeriodsController extends AppController
{
    public $uses = array('OrderDetail', 'Period');

    public function index() {
        $this->set('periods', $this->Period->find('all',array('order' => array('Period.id desc'))));

        $period = $this->Period->find('first',array(
            'conditions' => array(
                'Period.month_year' => date('m-Y')
            )
        ));
        if($period || intval(date('d')) < 25) {
            $show = 'n';
        }else{
            $show = 'y';
        }
        $this->set('createPeriod', $show);

    }

    public function create() {
        $this->autoRender = false;

        $period = $this->Period->find('first',array(
            'conditions' => array(
                'Period.month_year' => date('m-Y')
            )
        ));
        if($period) {
            echo 'not_create';
        }else{
            $details = $this->OrderDetail->find('list', array(
                'conditions' => array(
                    'OrderDetail.status' => 'received',
                    'OrderDetail.transfer' => 'pending'
                ),
                'fields' => array(
                    'id','total_price'
                )
            ));
            $total = 0;
            $data['month_year'] = date('m-Y');
            $data['total'] = $total;
            if($this->Period->save($data)){
                $id = $this->Period->getLastInsertId();
                $update['transfer'] = 'wait_transfer';
                $update['period_id'] = $id;

                foreach ($details as $key => $total_price) {
                    $update['id'] = $key;
                    $this->OrderDetail->save($update);
                    $total = $total + $total_price;
                }

                $Period['total'] = $total;
                $Period['id'] = $id;
                $this->Period->save($Period);

                echo 1;
            }
        }
    }

    public function view($id = null) {

        if(empty($id)) {
            $this->redirect('/periods');
        }

        $period = $this->Period->find('first',array(
            'conditions' => array(
                'Period.id' => $id
            )
        ));
        if(!$period) {
            $this->redirect('/periods');
        }

        $details = $this->OrderDetail->find('all', array(
            'conditions' => array(
                'OrderDetail.period_id' => $id
            ),
            'fields' => array(
                'Merchant.shop_name',
                'Merchant.bank_name',
                'Merchant.bank_account_name',
                'Merchant.bank_account_number',
                'Merchant.bank_type',
                'sum(total_price) as total',
                'OrderDetail.transfer',
                'OrderDetail.merchant_id'
            ),
            'group' => array(
                'OrderDetail.merchant_id'
            )
        ));

        $this->set('details', $details);
        $this->set('period', $period);
    }

    public function confirmTransfer() {
        $this->autoRender = false;

        $data = $this->request->data;
        $details = $this->OrderDetail->find('list', array(
            'conditions' => array(
                'OrderDetail.merchant_id' => $data['merchant_id'],
                'OrderDetail.period_id' => $data['id']
            ),
            'fields' => array(
                'id','id'
            )
        ));

        foreach ($details as $detail) {
            $update['id'] = $detail;
            $update['transfer'] = 'success';
            $this->OrderDetail->save($update);
        }

        $count = $this->OrderDetail->find('count', array(
            'conditions' => array(
                'OrderDetail.transfer' => 'wait_transfer',
                'OrderDetail.period_id' => $data['id']
            )
        ));

        if($count == 0) {
            $Period['status'] = 'transferred';
            $Period['id'] = $data['id'];
            $this->Period->save($Period);
        }

        echo 1;
    }
}