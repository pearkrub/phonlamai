<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Product
 *
 * @author ptum
 */
class Product extends AppModel{
    //put your code here
    public $hasMany = array('ProductImage');
}
