<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CatalogSupplier
 *
 * @author rickyrug
 */
require_once( APPPATH.'/interfaces/ICrud.php' );

class CatalogSupplier extends MY_Controller implements ICrud{
   private $user;
    public function __construct() {
        parent::__construct();
        $this->load->model('Supplier_Model');
        //$this->data = array();
        $this->user = 1;
    }

    public function index($p_message = null) {
       // $this->setLabels();
        $this->data['supplierList'] = $this->Supplier_Model->find_all_entries();
        $this->CallViews('CatalogSupplier/index.tpl', $this->data);
    }

    public function addConfirmation() {
        $p_name = $_POST['name'];
        $p_rfc  = $_POST['rfc'];

            $result = $this->Supplier_Model->insert_entry($p_name,$p_rfc,$this->user);
  
        $confirm_msg ="";
        if($result['err']['code']=== 0){
            $confirm_msg = sprintf($this->lang->line('addconfirm_registy'),$p_name);
        }
        $result['confirm_msg'] = $confirm_msg;
        echo json_encode($result);
    }

    public function addView() {
      
        $this->CallViews('CatalogSupplier/addform.tpl', $this->data);
    }

    public function deleteView($p_idsupplier) {
        $var_supplier = $this->Supplier_Model->find_by_key($p_idsupplier);
        
         if(count($var_supplier) == 1){
          // $this->setLabels();
           $this->data['supplier'] = $var_supplier[0];
           $this->data['titledeleteq'] = sprintf( $this->lang->line('deleteconfirmq_registry'),$this->data['supplier']->name);
           $this->CallViews('CatalogSupplier/deleteConfirmation.tpl', $this->data);
       }else{
           redirect('CatalogSupplier');
       }
        
    }
    
    public function deleteConfirmation(){
        $p_idsupplier= $_POST['idsupplier'];
        
        $result = $this->Supplier_Model->delete_entry($p_idsupplier);
        
        $confirm_msg ="";
        if($result['err']['code']=== 0){
            $confirm_msg = sprintf($this->lang->line('deleteconfirm_registry'),$p_idsupplier);
        }
        $result['confirm_msg'] = $confirm_msg;
        echo json_encode($result);
        
        
    }

    public function updateConfirmation() {
        $p_idsupplier = $_POST['idsupplier'];
        $p_name = $_POST['name'];
        $p_rfc = $_POST['rfc'];
        
        
       $result = $this->Supplier_Model->update_entry($p_idsupplier,$p_name, $p_rfc, $this->user);
  
        $confirm_msg ="";
        if($result['err']['code']=== 0){
            $confirm_msg = sprintf($this->lang->line('editconfirm_registy'),$p_name);
        }
        $result['confirm_msg'] = $confirm_msg;
        echo json_encode($result);
    }

    public function updateView($p_idsupplier) {
        $var_supplier = $this->Supplier_Model->find_by_key($p_idsupplier);
       
       if(count($var_supplier) == 1){
         //  $this->setLabels();
           $this->data['supplier'] = $var_supplier[0];
           $this->CallViews('CatalogSupplier/editform.tpl', $this->data);
       }else{
           redirect('CatalogSupplier');
       }
    }

//put your code here
}
