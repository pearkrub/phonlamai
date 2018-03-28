<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Merchan
 *
 * @author ptum
 */
class Merchant extends AppModel{

    public $name = 'Merchant';

    public $belongsTo = array('Amphure' => array(
        'className' => 'Amphure',
        'foreignKey' => 'amphur_id'
    ), 'District', 'Province');
}
