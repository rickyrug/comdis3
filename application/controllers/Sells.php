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
        private $default_tax;
        private $default_discount;
        protected $active_status = array("DR","AC");
    public function __construct() {
        parent::__construct();
         $this->load->model('Client_Model');
         $this->load->model('SellHdr_Model');
         $this->load->helper('dropdown');
         $this->user = 1;
         $this->default_discount = 0;
         $this->default_tax = 0;
    }


    public function addConfirmation() {
        $p_idclient = $_POST['idclient'];
        $p_type     = $_POST['type'];
        $p_delverydate = $_POST['delverydate'];
        $p_tax         = $_POST['tax'];
        $p_discount    = $_POST['discount'];
        
        $p_discount = $this->converttoPercentage($p_discount);
        $p_tax      = $this->converttoPercentage($p_tax);
        
        if($p_idclient === ""){
            $result['err']['code'] = 2;
            $result['err']['message'] = "Missing Client";
            echo json_encode($result);
            return;
        }
        
        $result = $this->SellHdr_Model->insert_entry($p_idclient,$p_delverydate , $p_type, $p_tax, $p_discount, $this->user, $p_status = null);
  
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
        $this->smarty->assign('tax',  $this->default_tax);
        $this->smarty->assign('discount',  $this->default_discount);
        
        $this->CallViews('Sells/addform.tpl',$this->data);
    }

    public function deleteConfirmation() {
        $p_sell = $_POST['idsell'];
        
        $result = $this->SellHdr_Model->delete_entry($p_sell,  $this->user);
        
        $confirm_msg ="";
        if($result['err']['code']=== 0){
            $confirm_msg = sprintf($this->lang->line('deleteconfirm_registry'),$p_sell);
        }
        $result['confirm_msg'] = $confirm_msg;
        echo json_encode($result);
    }

    public function deleteView($p_id) {
        $var_sell = $this->SellHdr_Model->find_by_key($p_id);
        
         if(count($var_sell) == 1){
          // $this->setLabels();
           $this->data['sell'] = $var_sell[0];
           $this->data['titledeleteq'] = sprintf( $this->lang->line('deleteconfirmq_registry'),$this->data['sell']->idsell);
           $this->CallViews('Sells/deleteConfirmation.tpl', $this->data);
       }else{
           redirect('Sells');
       }
    }

    public function index($p_message = null) {
        $this->data['sellsList'] = $this->SellHdr_Model->find_all_entries(null,$this->active_status);
        $clientsList = $this->Client_Model->find_all_entries();
        $this->data['clientsList'] = $clientsList;
        $this->smarty->assign('client_options',generateClientsDropdownInformation($clientsList));
        $this->smarty->assign('type_options',  $this->setSellsTypes());
        $this->CallViews('Sells/index.tpl',$this->data);
    }

    public function updateConfirmation() {
        $p_idsells = $_POST['idsell'];
        $p_idclient = $_POST['idclient'];
        $p_type     = $_POST['type'];
        $p_delverydate = $_POST['delverydate'];
        $p_tax         = $_POST['tax'];
        $p_discount    = $_POST['discount'];
        
        $p_discount = $this->converttoPercentage($p_discount);
        $p_tax      = $this->converttoPercentage($p_tax);
        $result = array();
        if($p_idclient === ""){
            $result['err']['code'] = 2;
            $result['err']['message'] = "Missing Client";
            echo json_encode($result);
            return;
        }
        
        $result = $this->SellHdr_Model->update_entry($p_idsells,$p_idclient,$p_delverydate, $p_type,$p_tax, $p_discount,$this->user);
  
        $confirm_msg ="";
        if($result['err']['code']=== 0){
           $confirm_msg = sprintf($this->lang->line('addconfirm_registy'),$p_idsells);
           $confirm_msg .= $confirm_msg .' '.$this->lang->line('redirecting');
           $result['redirect'] = site_url('SellsDetail/addViewDetail/'.$p_idsells);
          

        }
        $result['confirm_msg'] = $confirm_msg;
        echo json_encode($result);
    }

    public function updateView($p_id) {
         $sell = $this->SellHdr_Model->find_by_key($p_id);
        
        if(count($sell) > 0){
           $this->data['sell'] = $sell[0];
           $clientsList = $this->Client_Model->find_all_entries();
           $this->data['clientsList'] = $clientsList;
           
           $this->smarty->assign('client_options',generateClientsDropdownInformation($clientsList));
           $this->smarty->assign('customer_id',$sell[0]->idclient);
           $this->smarty->assign('type_options',  $this->setSellsTypes());
           $this->smarty->assign('typeselected',$sell[0]->type);
           
           $this->CallViews('Sells/editform.tpl', $this->data);
        }else{
            redirect('Sells');
        }
    }

    private function setSellsTypes() {
        $finalarray = array();

        $finalarray['RM'] = $this->lang->line('remission');
        return $finalarray;
    }

    public function find_by_sells(){
        $p_id = $_GET['id_sells'];
        $url = 'SellsDetail/addViewDetail/%d';
        redirect(sprintf($url, $p_id),'refresh');
    }

   

//put your code here
}
