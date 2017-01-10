<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SellDtl_Model
 *
 * @author 60044723
 */
class SellDtl_Model extends CI_Model{
   
    public $idsell;
    public $idproduct;
    public $quantity;
    public $price;
    public $tax;
    public $discount;
    public $creation_date;
    public $creation_by;
    public $modification_date;
    public $modification_by;
    
    protected $table = 'sells_dtl';
    
    public function __construct() {
        parent::__construct();
    }
    
         public function find_all_entries($p_number = null) {
        $query = null;
        if (!is_null($p_number)) {
            $query = $this->db->get($this->table, $p_number);
        } else {
            $query = $this->db->get($this->table);
        }
        return $query->result();
    }
    
    public function find_by_key($p_key) {

        $this->db->from($this->table);
        $this->db->where('idsells_dtl', $p_key);
        
        
        
        $query = $this->db->get();
        return $query->result();
    }
    
    public function find_by_sells($p_key) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('product','sells_dtl.idproduct = product.idproduct');
        $this->db->where('idsell', $p_key);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function find_by_sellsproduct($p_sells, $p_product) {
        $this->db->select('*');
        $this->db->from($this->table);
      //  $this->db->join('product','sells_dtl.idproduct = product.idproduct');
        $this->db->where('idsell', $p_sells);
        $this->db->where('idproduct',$p_product);
        $query = $this->db->get();
        return $query->result();
    }
    
       public function insert_entry( $p_idsell,$p_idproduct, $p_tax,
                                    $p_discount,$p_price,$p_quantity,$p_created_by) {
        $id = null;

        $this->idsell = $p_idsell;
        $this->idproduct = $p_idproduct;
        $this->quantity = $p_quantity;
        $this->price = $p_price;
        $this->discount = $p_discount;
        $this->tax = $p_tax;
        $this->creation_by   = $p_created_by;
        $this->creation_date = standard_date('DATE_ATOM', time());
        $this->modification_by= null;
        $this->modification_date = null;

        
        if ($this->db->insert($this->table, $this)) {
            $sql = $this->db->set($this)->get_compiled_insert($this->table);
            $str = $this->db->last_query();
            $err = $this->db->error();
            $id =  $this->db->insert_id();
        } else {
            $sql = $this->db->set($this)->get_compiled_insert($this->table);
            $str = $this->db->last_query();
            $err = $this->db->error();
        }
        return array(
            "query" => $sql,
            "lastquery" => $str,
            "err" => $err,
            "id"  => $id
        );
    }

    public function update_entry($p_idsells_dtl,$p_quantity,$p_price, $p_discount, $p_modified_by) {

        $data = array(
            'quantity' => $p_quantity,
            'price' =>$p_price,
            'discount' =>$p_discount,
            'modification_by' => $p_modified_by,
            'modification_date' => standard_date('DATE_ATOM', time())
        );


        $this->db->where('idsells_dtl', $p_idsells_dtl);
        if ($this->db->update($this->table, $data)) {
            $str = $this->db->last_query();
            $err = $this->db->error();
        } else {
            $str = $this->db->last_query();
            $err = $this->db->error();
        }

        return array(
            "lastquery" => $str,
            "err" => $err
        );
    }
    
     public function delete_entry($p_idkey){
        $this->db->where_in('idsells_dtl', $p_idkey);
        $this->db->delete($this->table);
        
        return array(
            "lastquery" => $this->db->last_query(),
            "err" => $this->db->error()
        );
    }
}
