<?php

class MerchantsController extends AppController {

    public $user = array('Merchant');

    public function register(){
        $this->layout = 'register';
        
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

}
