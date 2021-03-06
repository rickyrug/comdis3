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
    
    private $user;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Client_Model');
        $this->load->model('Product_Model');
        $this->load->model('ClientPrices_Model');
        $this->load->helper('dropdown');
        
        $this->user = 1;
    }

    public function addConfirmation() {
        $p_idclient     = $_POST['idclient'];
        $p_idproduct    = $_POST['idproduct'];
        $p_validdatedue = $_POST['validdatedue'];
        $p_price        = $_POST['price'];
        
        if($p_idclient === ""){
            $result['err']['code'] = 2;
            $result['err']['message'] = "Missing Client";
            echo json_encode($result);
            return;
        }
        
         if($p_idproduct === ""){
            $result['err']['code'] = 1;
            $result['err']['message'] = "Missing Product";
            echo json_encode($result);
            return;
        }
        
        if(!$this->validPrice($p_idclient, $p_idproduct, $p_validdatedue)){
            $result['err']['code'] = 1;
            $result['err']['message'] = "Not a valid date, existing prices with farther dates!";
            echo json_encode($result);
            return;
        }
        
        $result = $this->ClientPrices_Model->insert_entry($p_idclient, $p_idproduct,$p_price,$p_validdatedue,$this->user);
  
        $confirm_msg ="";
        if($result['err']['code']=== 0){
            $confirm_msg = sprintf($this->lang->line('addconfirm_clients'),$p_idclient);
        }
        $result['confirm_msg'] = $confirm_msg;
        echo json_encode($result);
    }

    public function addView() {
        $clientsList = $this->Client_Model->find_all_entries();
        $productList = $this->Product_Model->find_all_entries();
                
        $this->smarty->assign('client_options',generateClientsDropdownInformation($clientsList));
        $this->smarty->assign('product_options',  generateProductDropdownInformation($productList));

        $this->CallViews('ProductPriceClient/addform.tpl', $this->data);
    }

    public function addViewByClient($p_idclient) {
        $clientsList = $this->Client_Model->find_all_entries();
        $productList = $this->Product_Model->find_all_entries();
                
        $this->smarty->assign('client_options',generateClientsDropdownInformation($clientsList));
        $this->smarty->assign('product_options',  generateProductDropdownInformation($productList));
        $this->smarty->assign('customer_id',  $p_idclient);
        
        
        $this->CallViews('ProductPriceClient/addform.tpl', $this->data);
    }
    
    public function deleteConfirmation() {
        $idclients_prices = $_POST['idclients_prices'];
        
        $result = $this->ClientPrices_Model->delete_entry($idclients_prices);
        
        $confirm_msg ="";
        if($result['err']['code']=== 0){
            $confirm_msg = sprintf($this->lang->line('deleteconfirm_registry'),$idclients_prices);
        }
        $result['confirm_msg'] = $confirm_msg;
        echo json_encode($result);
    }

    public function deleteView($p_id) {
        $var_productprice = $this->ClientPrices_Model->find_by_key($p_id);
        
         if(count($var_productprice) == 1){
          // $this->setLabels();
           $this->data['productprice'] = $var_productprice[0];
           $this->data['titledeleteq'] = sprintf( $this->lang->line('deleteconfirmq_registry'),$this->data['productprice']->idclients_prices);
           $this->CallViews('ProductPriceClient/deleteConfirmation.tpl', $this->data);
       }else{
           redirect('ProductPriceClient');
       }
    }

    public function index($p_message = null) {
        $this->data['clientspricesList'] = $this->ClientPrices_Model->find_all_entries();
        $this->CallViews('ProductPriceClient/index.tpl', $this->data);
    }

    public function updateConfirmation() {
        $p_validdatedue   = $_POST['validdatedue'];
        $p_price          = $_POST['price'];
        $p_idproductprice = $_POST['idproductprice'];
        
        $result = $this->ClientPrices_Model->updatepricedate_entry($p_idproductprice,$p_price,$p_validdatedue, $this->user);
        
        $confirm_msg ="";
        if($result['err']['code']=== 0){
            $confirm_msg = sprintf($this->lang->line('editconfirm_registy'),$p_idproductprice);
        }
        $result['confirm_msg'] = $confirm_msg;
        echo json_encode($result);
    }

    public function updateView($p_id) {
       $productpriceList = $this->ClientPrices_Model->find_by_key($p_id);
        
        if(count($productpriceList) > 0){
           $this->data['productprice'] = $productpriceList[0];
           $this->CallViews('ProductPriceClient/editform.tpl', $this->data);
        }else{
            redirect('ProductPriceClient');
        }
    }

    public function getProductPricesByClientid($p_id){
        
        $clientpricesList = $this->Client_Model->find_by_client();
         
    }
    
      public function validPrice($p_client, $p_product,$p_duedate){
       $maxdate = $this->ClientPrices_Model->get_max_date($p_client, $p_product);
       if(count($maxdate) == 1){
         $fechanueva =  strtotime($p_duedate);
         $fechavieja =  strtotime($maxdate[0]->valid_date_due);
         $diffechas = $fechavieja - $fechanueva;
         if($diffechas >= 0){
             return false;
         }else{
             return true;
         }
         
          
       }
       
    }
    
     public function getData($p_message = null) {
        $list = $this->ClientPrices_Model->find_all_entries();
        echo json_encode($list);
       // $this->CallViews('ProductPriceClient/index.tpl', $this->data);
    }
}
