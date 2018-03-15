<?php
/**
 * Created by PhpStorm.
 * User: NBL11
 * Date: 22/2/2561
 * Time: 8:38
 */

class CustomerAddress extends  AppModel
{
    public $belongsTo = array('Amphure', 'District', 'Province');
}