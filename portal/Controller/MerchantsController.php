<?php

class MerchantsController extends AppController {

    public $uses = array('Merchant', 'Province', 'Amphure', 'District', 'Zipcode');

    public function index() {
        $auth = $this->Session->read('Auth');
        $merchant = $this->Merchant->find('first', array(
            'conditions' => array(
                'Merchant.id' => $auth['Merchant']['id']
            )
        ));
        $amphur = array();
        $district = array();
        $this->set('profile', $merchant);
        $provinces = $this->Province->find('list', array('fields' => array('id', 'province_name')));
        $this->set('province_list', $provinces);
        if(!empty($merchant['Merchant']['province_id'])){
            $amphur = $this->Amphure->find('list', array(
                'conditions' => array(
                    'province_id' => $merchant['Merchant']['province_id']
                ),
                'fields' => array(
                    'id','amphur_name'
                )
            ));
        }
        if(!empty($merchant['Merchant']['amphur_id'])){
            $district = $this->District->find('list', array(
                'conditions' => array(
                    'amphur_id' => $merchant['Merchant']['amphur_id']
                ),
                'fields' => array(
                    'id','district_name'
                )
            ));
        }

        $this->set('amphurs', $amphur);
        $this->set('districts', $district);
    }

    public function getAmphur()
    {
        $this->layout = 'ajax';
        $data = $this->request->data;
        $amphur = array();
        if(!empty($data['province_id'])){
            $amphur = $this->Amphure->find('list', array(
                'conditions' => array(
                    'province_id' => $data['province_id']
                ),
                'fields' => array(
                    'id','amphur_name'
                )
            ));
        }
        $this->set('amphures', $amphur);
    }

    public function getDistrict()
    {
        $this->layout = 'ajax';
        $data = $this->request->data;
        $district = array();
        if(!empty($data['amphur_id'])){
            $district = $this->District->find('list', array(
                'conditions' => array(
                    'amphur_id' => $data['amphur_id']
                ),
                'fields' => array(
                    'id','district_name'
                )
            ));
        }
        $this->set('districts', $district);
    }
    public function getZipcode()
    {
        $this->autoRender = false;
        $data = $this->request->data;
        $zipcode = '';
        if(!empty($data['district_id'])){
            $district = $this->District->find('first',array(
                'conditions' => array(
                    'id' => $data['district_id']
                )
            ));
            $Zipcode = $this->Zipcode->find('first',array(
                'conditions' => array(
                    'district_code' => $district['District']['district_code']
                )
            ));

            $zipcode = $Zipcode['Zipcode']['zipcode'];
        }

        echo $zipcode;
    }

    public function save() {
        $this->autoRender = FALSE;
        $data = $this->request->data;
        $auth = $this->Session->read('Auth');
        $merchant = $this->Merchant->find('first', array(
            'conditions' => array(
                'Merchant.id' => $auth['Merchant']['id']
            )
        ));
        $password = md5($data['old_password']);
        $data['password'] = $merchant['Merchant']['password'];
        $data['id'] = $auth['Merchant']['id'];
        if(!empty($data['old_password'])) {
            pr($merchant['Merchant']['password']);
            pr($password);
            if($merchant['Merchant']['password'] != $password){
                $this->redirect('/merchants/index?status=error_old_password');
            }
            if($data['new_password'] != $data['confirm_new_password'] || empty($data['new_password'])) {
                $this->redirect('/merchants/index?status=error_new_password');
            }

            $data['password'] = md5($data['new_password']);
        }

        if($this->Merchant->save($data)) {
            $this->redirect('/merchants/index?status=success');
        }

        $this->redirect('/merchants/index?status=fail');
    }

}
