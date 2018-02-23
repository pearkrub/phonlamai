<?php
/**
 * Created by PhpStorm.
 * User: NBL11
 * Date: 22/2/2561
 * Time: 8:37
 */

class AddressesController extends AppController
{
    public $uses = array('CustomerAddress', 'Province', 'Amphure', 'District');

    public function addAddress()
    {
        $this->layout = 'ajax';
        try {
            $data = $this->request->data;
            $district = array();
            $amphur = array();
            $default = array();
            if (!empty($data['id'])) {
                $CustomerAddress = $this->CustomerAddress->find('first', array(
                    'conditions' => array(
                        'CustomerAddress.id' => $data['id']
                    )
                ));
                $default = $CustomerAddress['CustomerAddress'];
                $amphur = $this->Amphure->find('list', array(
                    'conditions' => array(
                        'province_id' => $CustomerAddress['CustomerAddress']['province_id']
                    ),
                    'fields' => array(
                        'id', 'amphur_name'
                    )
                ));
                $district = $this->District->find('list', array(
                    'conditions' => array(
                        'amphur_id' => $CustomerAddress['CustomerAddress']['amphure_id']
                    ),
                    'fields' => array(
                        'id', 'district_name'
                    )
                ));

            }else{
                $default['province_id'] = '';
                $default['amphure_id'] = '';
                $default['district_id'] = '';
            }
            $this->set('default', $default);
            $this->set('districts', $district);
            $this->set('amphures', $amphur);
            $provinces = $this->Province->find('list', array('fields' => array('id', 'province_name')));
            $this->set('province_list', $provinces);
        } catch (\Exception $e) {
            $this->prd($e->getMessage());
        }
    }

    public function save()
    {
        $this->autoRender = false;

        $data = $this->request->data;

        $Customer = $this->Session->read('Auth');

        $data['customer_id'] = $Customer['Customer']['id'];
        $data['amphure_id'] = $data['amphur_id'];
        $customer = $this->CustomerAddress->save($data);

        if ($customer) {
            $this->set('customer', $customer);
        }
    }

    /**
     * @return array
     */
    public function removeAddress()
    {
        $this->autoRender = false;
        $data = $this->request->data;
        try {
            if (!empty($data['id'])) {
                if ($this->CustomerAddress->delete($data['id'])) {
                    echo 1;
                } else {
                    echo 0;
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}