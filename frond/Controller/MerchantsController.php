<?php

class MerchantsController extends AppController {

    public $uses = array('Merchant', 'Province', 'Amphure', 'District', 'Zipcode');

    public function register(){
        $this->layout = 'register';
        $provinces = $this->Province->find('list', array('fields' => array('id', 'province_name')));
        $this->set('province_list', $provinces);
        
        
    }
     

    public function save() { // เอาไว้บันทึกข้อมูลพ่อค้า
        $this->autoRender = FALSE;
        $data = $this->request->data;
        pr($data);        die;
        if($this->Merchant->save($data)){
            if (!empty($_FILES['document']['name'])) {
                $type = explode('.', $_FILES['document']['name']);
                $id = $this->Merchant->id;
                $file_name = 'm00'.$id.'.'.end($type);
                $target_file = 'files/merchant/'.$file_name;
                if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
                    $file['id'] = $id;
                    $file['document_file']=$file_name;
                    $this->Merchant->save($file);
                    $this->redirect(Configure::read('Portal.Domain') . 'login');
                }
            }
            $this->redirect(Configure::read('Portal.Domain').'login');
        }
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

}
