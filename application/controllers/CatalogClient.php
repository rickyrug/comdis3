<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CatalogClient
 *
 * @author rickyrug
 */
require_once( APPPATH.'/interfaces/ICrud.php' );

class CatalogClient extends MY_Controller implements ICrud{

    private $data;
    private $user;
    public function __construct() {
        parent::__construct();
        $this->load->model('Client_Model');
        $this->data = array();
        $this->user = 1;
    }

    public function index($p_message = null) {
        $this->setLabels();
        $this->data['clientsList'] = $this->Client_Model->find_all_entries();
        $this->CallViews('CatalogClient/index.tpl', $this->data);
    }

    public function addConfirmation() {
        $p_name = $_POST['name'];
        $p_rfc  = $_POST['rfc'];

            $result = $this->Client_Model->insert_entry($p_name,$p_rfc,$this->user);
  
        $confirm_msg ="";
        if($result['err']['code']=== 0){
            $confirm_msg = sprintf($this->lang->line('addconfirm_clients'),$p_name);
        }
        $result['confirm_msg'] = $confirm_msg;
        echo json_encode($result);
    }

    public function addView() {
        $this->setLabels();
        $this->CallViews('CatalogClient/addform.tpl', $this->data);
    }

    public function deleteView($p_idclient) {
        $var_client = $this->Client_Model->find_by_key($p_idclient);
        
         if(count($var_client) == 1){
           $this->setLabels();
           $this->data['client'] = $var_client[0];
           $this->data['titledeleteq'] = sprintf( $this->lang->line('deleteconfirmq_clients'),$this->data['client']->name);
           $this->CallViews('CatalogClient/deleteConfirmation.tpl', $this->data);
       }else{
           redirect('CatalogClient');
       }
        
    }
    
    public function deleteConfirmation(){
        $p_idclient = $_POST['idclient'];
        
        $result = $this->Client_Model->delete_entry($p_idclient);
        
        $confirm_msg ="";
        if($result['err']['code']=== 0){
            $confirm_msg = sprintf($this->lang->line('deleteconfirm_clients'),$p_idclient);
        }
        $result['confirm_msg'] = $confirm_msg;
        echo json_encode($result);
        
        
    }

    public function updateConfirmation() {
        $p_idclient = $_POST['idclient'];
        $p_name = $_POST['name'];
        $p_rfc = $_POST['rfc'];
        
        
       $result = $this->Client_Model->update_entry($p_idclient,$p_name, $p_rfc, $this->user);
  
        $confirm_msg ="";
        if($result['err']['code']=== 0){
            $confirm_msg = sprintf($this->lang->line('editconfirm_clients'),$p_name);
        }
        $result['confirm_msg'] = $confirm_msg;
        echo json_encode($result);
    }

    public function updateView($p_idclient) {
        $var_client = $this->Client_Model->find_by_key($p_idclient);
       
       if(count($var_client) == 1){
           $this->setLabels();
           $this->data['client'] = $var_client[0];
           $this->CallViews('CatalogClient/editClient.tpl', $this->data);
       }else{
           redirect('CatalogClient');
       }
    }

    public function getError(){
        $message = array();
        $error =  $this->db->error();
        $message['error'] = $error;
        echo json_encode($message);
    }
    
    private function setLabels(){
       
        $this->data['title'] = $this->lang->line('title_clients');
        $this->data['id_label'] =$this->lang->line('id');
        $this->data['name_label'] =$this->lang->line('name');
        $this->data['rfc_label'] =$this->lang->line('rfc');
        $this->data['status_label'] =$this->lang->line('status');
        $this->data['actions_label'] =$this->lang->line('actions');
        $this->data['add_label'] =$this->lang->line('add');
        $this->data['titleaddclient'] =$this->lang->line('titleadd_clients');
        $this->data['titleeditclient'] =$this->lang->line('titleedit_clients');
        $this->data['titledeleteclient'] =$this->lang->line('titledelete_clients');
        
        $this->data['save'] =$this->lang->line('save');
        $this->data['return'] =$this->lang->line('return');
        $this->data['delete'] =$this->lang->line('delete');
        
        $this->data['msg_cli_nvalid_name'] =$this->lang->line('msg_cli_nvalid_name');
        $this->data['msg_cli_required_name'] =$this->lang->line('msg_cli_required_name');
        $this->data['msg_cli_lenght_name'] =$this->lang->line('msg_cli_lenght_name');
        $this->data['msg_cli_regex_name'] =$this->lang->line('msg_cli_regex_name');
        
        $this->data['msg_cli_nvalid_rfc']   =$this->lang->line('msg_cli_nvalid_rfc');
        $this->data['msg_cli_required_rfc'] =$this->lang->line('msg_cli_required_rfc');
        $this->data['msg_cli_lenght_rfc']   =$this->lang->line('msg_cli_lenght_rfc');
    }
}
