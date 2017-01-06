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
    
    private $user;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Client_Model');
        $this->load->model('SellHdr_Model');
        $this->load->model('Product_Model');
        $this->load->model('ClientPrices_Model');
        $this->load->model('SellDtl_Model');
        $this->load->helper('dropdown');
        
        $clientsList = $this->Client_Model->find_all_entries();
        $productList = $this->Product_Model->find_all_entries();
        $this->smarty->assign('client_options',generateClientsDropdownInformation($clientsList));
        $this->smarty->assign('type_options',  $this->setSellsTypes());
        $this->smarty->assign('product_options',  generateProductDropdownInformation($productList));
        
        $this->user = 1;
    }
    
    public function addConfirmation() {
        
    }

     public function addProductConfirmation() {
        $p_idsell = $_POST['idsell'];
        $p_idproduct = $_POST['idproduct'];
        $p_quantity = $_POST['quantity'];
        $p_price = $_POST['price'];
        $p_discount = $_POST['discount'];
        $p_tax      = $this->getSpecialProductTaxes($p_idproduct);
        $result = $this->SellDtl_Model->insert_entry( $p_idsell,$p_idproduct, $p_tax,
                                    $p_discount,$p_price,$p_quantity,$this->user);
        
        $confirm_msg ="";
        if($result['err']['code']=== 0){
            $confirm_msg = sprintf($this->lang->line('addconfirm_registy'),$p_idsell);
        }
        $result['confirm_msg'] = $confirm_msg;
        echo json_encode($result);
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
    // echo $smarty->fetch('SellsDetail/editdtlitem.tpl');
    }
     public function updateViewItem() {
      $idsellsdtl =   $_GET['idsells_dtl'];
      $product    =   $_GET['name']; //product name
      $quantity    =   $_GET['quantity']; //quantity
      $price   =   $_GET['price']; //quantity
      
      $this->smarty->assign('idselldtl',$idsellsdtl);
      $this->smarty->assign('idproduct',$product );
      $this->smarty->assign('quantity',$quantity );
      $this->smarty->assign('price',$price);
     echo $this->smarty->fetch('SellsDetail/editdtlitem.tpl');
    }
    public function getSellsItems(){
       
       $result = array();
       $p_idsells = $_POST['idsell'];
        
       $result['items'] = $this->SellDtl_Model->find_by_sells($p_idsells);
       
       $sell = $this->SellHdr_Model->find_by_key($p_idsells);
       
       $result['summary'] = $this->sellssummary($result['items'],$sell[0]);
       echo json_encode($result);
    }
    
    public function getProductRecomendedPrice(){
        $p_idproduct = $_POST['idproduct'];
        $p_client = $_POST['idclient'];
      $result =  array();
      $result['price_available'] = '';
      $resultproductconf = $this->ClientPrices_Model->find_by_productclient($p_idproduct,$p_client);
      
      if(count($resultproductconf)> 0){
          $result['price_available'] = 'CO';
          $result['validprice'] = $resultproductconf[0];
         
      }else{
        $p_product =  $this->Product_Model->find_by_key($p_idproduct);
           if(count($p_product)> 0){
               $result['price_available'] = 'CA';
               $result['validprice'] = $p_product[0];
               $result['message'] = 'Price from product catalog, could by Outdated!';
           }
      }
      
      echo json_encode($result);
         return;
    }
    
    private function setSellsTypes() {
        $finalarray = array();

        $finalarray['RM'] = $this->lang->line('remission');
        return $finalarray;
    }
    
    private function getSpecialProductTaxes($p_idproduct){
        return 0.0;
    }
    
    private function sellssummary($sellsdata,$sell){ // se calcula el resumen
        
        setlocale(LC_MONETARY, 'en_US.UTF-8');
        
        $summary = array();
        $undertotal = 0.0;
        $taxper      = $sell->tax;
        $discountper =  $sell->discount;
        $taxtotal = 0.0;
        $discount = 0.0;
        $total = 0.0;
        foreach($sellsdata as $item){
            $undertotal = $undertotal + ($item->quantity * $item->price);
        }
        $summary['undertotal'] = '$'.number_format($undertotal,2);
        $discount = $undertotal * $discountper; 
        $summary['discount']   = '$'.number_format($discount, 2); 
        $taxtotal = ($undertotal - $discount) * $taxper;
        $summary['tax']        =  '$'.number_format($taxtotal,2);
        $total = $undertotal -$discount - $taxtotal;
        $summary['total'] = '$'.number_format($total,2);
        return  $summary;
    }
}
