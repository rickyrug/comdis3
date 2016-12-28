<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VariablesCatalog
 *
 * @author rickyrug
 */
require_once( APPPATH.'/interfaces/ICrud.php' );
class VariablesCatalog extends MY_Controller implements ICrud{
    
    private $user;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Variable_Model');
        $this->user = 1;
    }
    
    public function addConfirmation() {
        $p_description= $_POST['description'];

            $result = $this->Variable_Model->insert_entry($p_description,$this->user);
  
        $confirm_msg ="";
        if($result['err']['code']=== 0){
            $confirm_msg = sprintf($this->lang->line('addconfirm_registy'),$p_description);
        }
        $result['confirm_msg'] = $confirm_msg;
        echo json_encode($result);
    }

    public function addView() {
         $this->CallViews('VariablesCatalog/addform.tpl', $this->data);
    }

    public function deleteView($p_id) {
        $var_variable = $this->Variable_Model->find_by_key($p_id);
        
         if(count($var_variable) == 1){
          // $this->setLabels();
           $this->data['variable'] = $var_variable[0];
           $this->data['titledeleteq'] = sprintf( $this->lang->line('deleteconfirmq_registry'),$this->data['variable']->description);
           $this->CallViews('VariablesCatalog/deleteConfirmation.tpl', $this->data);
       }else{
           redirect('VariablesCatalog');
       }
    }

    public function index($p_message = null) {
        $this->data['variablesList'] = $this->Variable_Model->find_all_entries();
        $this->CallViews('VariablesCatalog/index.tpl', $this->data);
    }

    public function updateConfirmation() {
         $p_idvariable = $_POST['idvariable'];
        $p_description = $_POST['description'];

        
        
       $result = $this->Variable_Model->update_entry($p_idvariable,$p_description, $this->user);
  
        $confirm_msg ="";
        if($result['err']['code']=== 0){
            $confirm_msg = sprintf($this->lang->line('editconfirm_registy'),$p_description);
        }
        $result['confirm_msg'] = $confirm_msg;
        echo json_encode($result);
    }

    public function updateView($p_id) {
         $var_variable = $this->Variable_Model->find_by_key($p_id);
       
       if(count($var_variable ) == 1){
         //  $this->setLabels();
           $this->data['variable'] = $var_variable[0];
           $this->CallViews('VariablesCatalog/editform.tpl', $this->data);
       }else{
           redirect('VariablesCatalog');
       }
    }

    public function deleteConfirmation() {
         $p_idvariable= $_POST['idvariable'];
        
        $result = $this->Variable_Model->delete_entry($p_idvariable);
        $confirm_msg ="";
        if($result['err']['code']=== 0){
            $confirm_msg = sprintf($this->lang->line('deleteconfirm_registry'),$p_idvariable);
        }
        $result['confirm_msg'] = $confirm_msg;
        echo json_encode($result);
    }

}
