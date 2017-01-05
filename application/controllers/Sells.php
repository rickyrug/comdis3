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
        private $user;

        
    public function __construct() {
        parent::__construct();
         $this->load->model('Client_Model');
         $this->load->model('SellHdr_Model');
         $this->load->helper('dropdown');
         $this->user = 1;
    }


    public function addConfirmation() {
        $p_idclient = $_POST['idclient'];
        $p_type     = $_POST['type'];
        $p_delverydate = $_POST['delverydate'];
        
        
        if($p_idclient === ""){
            $result['err']['code'] = 2;
            $result['err']['message'] = "Missing Client";
            echo json_encode($result);
            return;
        }
        
        $result = $this->SellHdr_Model->insert_entry($p_idclient,$p_delverydate , $p_type, $this->user, $p_status = null);
  
        $confirm_msg ="";
        if($result['err']['code']=== 0){
           $confirm_msg = sprintf($this->lang->line('addconfirm_registy'),$result['id']);
           $confirm_msg .= $confirm_msg .' '.$this->lang->line('redirecting');
           $result['redirect'] =site_url('SellsDetail/addViewDetail/'.$result['id']);
          

        }
        $result['confirm_msg'] = $confirm_msg;
        echo json_encode($result);
    }

    public function addView($p_id = null) {
        $clientsList = $this->Client_Model->find_all_entries();
        
        $this->smarty->assign('client_options',generateClientsDropdownInformation($clientsList));
        $this->smarty->assign('customer_id',  $p_id);
        $this->smarty->assign('today',standard_date('DATE_ATOM', time()));
        $this->smarty->assign('type_options',  $this->setSellsTypes());
        
        $this->CallViews('Sells/addform.tpl',$this->data);
    }

    public function deleteConfirmation() {
        
    }

    public function deleteView($p_id) {
        
    }

    public function index($p_message = null) {
        $this->data['clientsList'] = $this->Client_Model->find_all_entries();
        
        
        $this->CallViews('Sells/index.tpl',$this->data);
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
