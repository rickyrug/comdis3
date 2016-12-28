<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Product_Model
 *
 * @author 60044723
 */
class Product_Model extends CI_Model{
    
    public $code;
    public $name;
    public $status;
    public $sell_price;
    public $buy_price;
    public $create_date;
    public $create_by;
    public $modification_date;
    public $modification_by;
    protected $table = 'product';
    
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
        $this->db->where('idproduct', $p_key);
        $query = $this->db->get();
        return $query->result();
    }
    
       public function insert_entry($p_code,$p_name, $p_sell_price,$p_buy_price, $p_created_by, $p_status = null) {
        
        $this->code = $p_code;
        $this->name = $p_name;
        $this->sell_price = $p_sell_price;
        $this->buy_price  = $p_buy_price;
           
        $this->create_by   = $p_created_by;
        $this->create_date = standard_date('DATE_ATOM', time());
       

        if (!is_null($p_status)) {
            $this->status = $p_status;
        } else {
            $this->status = 'AC';
        }
        if ($this->db->insert($this->table, $this)) {
            $sql = $this->db->set($this)->get_compiled_insert($this->table);
            $str = $this->db->last_query();
            $err = $this->db->error();
        } else {
            $sql = $this->db->set($this)->get_compiled_insert($this->table);
            $str = $this->db->last_query();
            $err = $this->db->error();
        }
        return array(
            "query" => $sql,
            "lastquery" => $str,
            "err" => $err
        );
    }

    public function update_entry($p_idproduct, $p_code,$p_name,$p_sell_price,$p_buy_price, $p_modified_by, $p_status = null) {

        $data = array(
            'code' => $p_code,
            'name' => $p_name,
            'sell_price' =>$p_sell_price,
            'buy_price'  => $p_buy_price,
            'modification_by' => $p_modified_by,
            'modification_date' => standard_date('DATE_ATOM', time())
        );

        if (!is_null($p_status)) {
            $data['status'] = $p_status;
        }

        $this->db->where('idproduct', $p_idproduct);
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
        $this->db->where('idproduct', $p_idkey);
        $this->db->delete($this->table);
        
        return array(
            "lastquery" => $this->db->last_query(),
            "err" => $this->db->error()
        );
    }
}
