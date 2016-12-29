<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductPriceClient
 *
 * @author rickyrug
 */
require_once( APPPATH.'/interfaces/ICrud.php' );

class ProductPriceClient extends MY_Controller implements ICrud{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Client_Model');
        $this->load->model('ClientPrices_Model');
        $this->user = 1;
    }

    public function addConfirmation() {
        
    }

    public function addView() {
        $this->CallViews('ProductPriceClient/addform.tpl', $this->data);
    }

    public function deleteConfirmation() {
        
    }

    public function deleteView($p_id) {
        
    }

    public function index($p_message = null) {
        $this->data['clientsList'] = $this->Client_Model->find_all_entries();
        $this->CallViews('ProductPriceClient/index.tpl', $this->data);
    }

    public function updateConfirmation() {
        
    }

    public function updateView($p_id) {
        
    }

}
