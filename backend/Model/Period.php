<?php
/**
 * Created by PhpStorm.
 * User: NBL11
 * Date: 30/3/2561
 * Time: 0:21
 */

class Period extends AppModel
{
    public $hasMany = array('OrderDetail');
}