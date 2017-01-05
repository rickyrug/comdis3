<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SellsDetail
 *
 * @author 60044723
 */
require_once( APPPATH.'/interfaces/ICrud.php' );
class SellsDetail extends MY_Controller implements ICrud{
    public function addConfirmation() {
        
    }

     public function addViewDetail($p_id) {
        echo $p_id;
    }
    
    public function addView() {
    }

    public function deleteConfirmation() {
        
    }

    public function deleteView($p_id) {
        
    }

    public function index($p_message = null) {
        
    }

    public function updateConfirmation() {
        
    }

    public function updateView($p_id) {
        
    }

//put your code here
}
