<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sell_Model
 *
 * @author 60044723
 * 
 * status = AC = Activa
 *          DE = Borrada
 *          CU = Cumplida
 * 
 */
class SellHdr_Model extends CI_Model{
    
    public $idclient;
    public $delivery_date;
    public $type;
    public $creation_by;
    public $creation_date;
    public $modification_date;
    public $modification_by;
    
    protected $table = 'sells_hdr';
    
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
        $this->db->where('idsell', $p_key);
        $query = $this->db->get();
        return $query->result();
    }
    
       public function insert_entry($p_idclient,$p_delivery_date, $p_type, $p_created_by, $p_status = null) {
        
        $this->idclient = $p_idclient;
        $this->delivery_date = $p_delivery_date;
        $this->type = $p_type;
           
        $this->create_by   = $p_created_by;
        $this->create_date = standard_date('DATE_ATOM', time());
        $this->modification_by = null;
        $this->modification_date = null;

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

    public function update_entry($p_idsells,$p_idclient,$p_delivery_date, $p_type, $p_modified_by,$p_status = NULL) {

        $data = array(
            'idclient' => $p_idclient,
            'delivery_date' =>$p_delivery_date,
            'type' =>$p_type,
            'modification_by' => $p_modified_by,
            'modification_date' => standard_date('DATE_ATOM', time())
        );

        if (!is_null($p_status)) {
            $data['status'] = $p_status;
        }

        $this->db->where('idsell', $p_idsells);
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
         
         $data = array(
               'status' => 'DE'
         );
         
          $this->db->where('idsell', $p_idkey);
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
    
}