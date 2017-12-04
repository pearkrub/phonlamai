<?php
class DashboardController  extends AppController {
    public function beforeFilter() {
        $user= $this->Session->read('Auth');
        if(empty($user)){
            $this->redirect('/login');
        }
       
        
        
    }
    public function  index()
    {
        
        
    }
    //put your code here
}
