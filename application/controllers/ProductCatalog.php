<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductCatalog
 *
 * @author 60044723
 */

require_once( APPPATH.'/interfaces/ICrud.php' );
class ProductCatalog extends MY_Controller implements ICrud{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Product_Model');
        $this->user = 1;
    }
    
    public function addConfirmation() {
        
        $p_name  = $_POST['name'];
        $p_code  = $_POST['code'];
        $p_sellprice  = $_POST['sellprice'];
        $p_buyprice  = $_POST['buyprice'];
        
            $result = $this->Product_Model->insert_entry($p_code,$p_name, $p_sellprice,$p_buyprice, $this->user);
  
        $confirm_msg ="";
        if($result['err']['code']=== 0){
            $confirm_msg = sprintf($this->lang->line('addconfirm_registy'),$p_name);
        }
        $result['confirm_msg'] = $confirm_msg;
        echo json_encode($result);
        
    }

    public function addView() {
        $this->CallViews('ProductCatalog/addform.tpl', $this->data);
    }

    public function deleteConfirmation() {
        $p_idproduct = $_POST['idproduct'];
        
        $result = $this->Product_Model->delete_entry($p_idproduct);
        
        $confirm_msg ="";
        if($result['err']['code']=== 0){
            $confirm_msg = sprintf($this->lang->line('deleteconfirm_registry'),$p_idproduct);
        }
        $result['confirm_msg'] = $confirm_msg;
        echo json_encode($result);
    }

    public function deleteView($p_id) {
         $var_product = $this->Product_Model->find_by_key($p_id);
        
         if(count($var_product) == 1){
          // $this->setLabels();
           $this->data['product'] = $var_product[0];
           $this->data['titledeleteq'] = sprintf( $this->lang->line('deleteconfirmq_registry'),$this->data['product']->name);
           $this->CallViews('ProductCatalog/deleteConfirmation.tpl', $this->data);
       }else{
           redirect('ProductCatalog');
       }
    }

    public function index($p_message = null) {
        $this->data['productsList'] = $this->Product_Model->find_all_entries();
        $this->CallViews('ProductCatalog/index.tpl', $this->data);
    }

    public function updateConfirmation() {
        $p_idproduct = $_POST['idproduct'];
        $p_name = $_POST['name'];
        $p_code = $_POST['code'];
        $p_sellprice = $_POST['sellprice'];
        $p_buyprice = $_POST['buyprice'];
        
       $result = $this->Product_Model->update_entry($p_idproduct, $p_code,$p_name,$p_sellprice,$p_buyprice,  $this->user);
  
        $confirm_msg ="";
        if($result['err']['code']=== 0){
            $confirm_msg = sprintf($this->lang->line('editconfirm_registy'),$p_name);
        }
        $result['confirm_msg'] = $confirm_msg;
        echo json_encode($result);
    }

    public function updateView($p_id) {
        $var_product= $this->Product_Model->find_by_key($p_id);
       
       if(count($var_product) == 1){
         //  $this->setLabels();
           $this->data['product'] = $var_product[0];
           $this->CallViews('ProductCatalog/editform.tpl', $this->data);
       }else{
           redirect('ProductCatalog');
       }
    }

//put your code here
}
