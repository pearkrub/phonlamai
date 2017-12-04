<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegisterController
 *
 * @author ptum
 */
class RegisterController extends AppController {

    public $uses = array('Merchant');// การนำเข้าโมเดลดาต้าเบส  merchant 

    public function index() {
        $this->layout = 'register'; //ให้หน้า index ไปใช้หน้า register
    }

    public function save() { // เอาไว้บันทึกข้อมูลพ่อค้า
        $this->autoRender = FALSE;
        $data = $this->request->data;
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

}
