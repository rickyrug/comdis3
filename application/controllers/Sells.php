<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sells
 *
 * @author 60044723
 */
require_once( APPPATH.'/interfaces/ICrud.php' );
class Sells extends MY_Controller implements ICrud{
    public function addConfirmation() {
        
    }

    public function addView() {
        
    }

    public function deleteConfirmation() {
        
    }

    public function deleteView($p_id) {
        
    }

    public function index($p_message = null) {
        $this->CallViews('Sells/index.tpl',$this->data);
    }

    public function updateConfirmation() {
        
    }

    public function updateView($p_id) {
        
    }

//put your code here
}
