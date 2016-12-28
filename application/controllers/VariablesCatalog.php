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
        //$this->data = array();
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
        
    }

    public function index($p_message = null) {
        $this->data['variablesList'] = $this->Variable_Model->find_all_entries();
        $this->CallViews('VariablesCatalog/index.tpl', $this->data);
    }

    public function updateConfirmation() {
        
    }

    public function updateView($p_id) {
        
    }

   

}
