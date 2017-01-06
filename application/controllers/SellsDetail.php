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
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Client_Model');
        $this->load->model('SellHdr_Model');
        $this->load->helper('dropdown');
        $clientsList = $this->Client_Model->find_all_entries();
        $this->smarty->assign('client_options',generateClientsDropdownInformation($clientsList));
        $this->smarty->assign('type_options',  $this->setSellsTypes());
    }
    
    public function addConfirmation() {
        
    }

     public function addViewDetail($p_id) {
        
         $sell = $this->SellHdr_Model->find_by_key($p_id);
        
        if(count($sell) > 0){
           $this->data['sell'] = $sell[0];
           $this->data['sell']->tax = $this->converttoNumber($this->data['sell']->tax);
           $this->data['sell']->discount = $this->converttoNumber($this->data['sell']->discount);
           $this->smarty->assign('customer_id',  $sell[0]->idclient);
           $this->smarty->assign('typeid',  $sell[0]->type);
           $this->CallViews('SellsDetail/addform.tpl', $this->data);
        }else{
            redirect('ProductPriceClient');
        }
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

    private function setSellsTypes() {
        $finalarray = array();

        $finalarray['RM'] = $this->lang->line('remission');
        return $finalarray;
    }
//put your code here
}
