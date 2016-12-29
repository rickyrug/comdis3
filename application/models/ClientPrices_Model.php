<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClientPrices_Model
 *
 * @author rickyrug
 */
class ClientPrices_Model extends CI_Model{
    
    public $idclient;
    public $idproduct;
    public $price;
    public $valid_date_due;
    public $creation_date;
    public $creation_by;
    protected $table = 'clients_prices';
    
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
    
    public function find_by_client($p_idclient){
        
        $this->db->from($this->table);
        $this->db->where('idclient',$p_idclient);
        $query = $this->db->get();
        return $query->result();
        
    }
    
    public function find_by_product($p_idproduct){
        
        $this->db->from($this->table);
        $this->db->where('idproduct',$p_idproduct);
        $query = $this->db->get();
        return $query->result();
        
    }
    
        public function insert_entry($p_idclient, $p_idproduct,$p_price,$p_validduedate,$p_createdby) {
        $this->creation_by = $p_createdby;
        $this->creation_date = standard_date('DATE_ATOM', time());
        $this->idclient = $p_idclient;
        $this->idproduct = $p_idproduct;
        $this->price = $p_price;
        $this->valid_date_due = $p_validduedate;
        
        
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
    
    public function update_entry($p_idclients_prices,$p_idclient, $p_idproduct,$p_price,$p_validduedate, $p_modified_by){
        
        $data = array(
            'idclient'          => $p_idclient,
            'idproduct'         => $p_idproduct,
            'modification_by'   => $p_modified_by,
            'modification_date' => standard_date('DATE_ATOM', time()),
            'price'             => $p_price,
            'valid_date_due'    => $p_validduedate
        );
            
        $this->db->where('idclients_prices', $p_idclients_prices);
        if($this->db->update($this->table, $data)){
            $str = $this->db->last_query();
            $err = $this->db->error();
        }else{
            $str = $this->db->last_query();
            $err = $this->db->error();
        }
        
        return array(
            "lastquery" => $str,
            "err" => $err
        );
    }
    
    public function delete_entry($p_idkey){
        $this->db->where('idclients_prices', $p_idkey);
        $this->db->delete($this->table);
        
        return array(
            "lastquery" => $this->db->last_query(),
            "err" => $this->db->error()
        );
    }
    
}
