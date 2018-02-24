<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Order
 *
 * @author ptum
 */
class Order extends AppModel{ 
    public $hasMany = array('OrderDetail');
}
