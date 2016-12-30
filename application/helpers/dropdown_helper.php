<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function generateClientsDropdownInformation($p_clientsList) {
    $finalarray = array();
    
    if (count($p_clientsList) > 0) {
        foreach ($p_clientsList as $item) {
            $finalarray[$item->idclient] = $item->name;
        }
    }
    return $finalarray;
}

function generateProductDropdownInformation($p_productList) {
    $finalarray = array();
    
    if (count($p_productList) > 0) {
        foreach ($p_productList as $item) {
            $finalarray[$item->idproduct] = $item->code.' - '. $item->name;
        }
    }
    return $finalarray;
}
