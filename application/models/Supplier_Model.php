<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clients
 *
 * @author rickyrug
 */
class Supplier_Model extends CI_Model {

    //put your code here

    public $name;
    public $status;
    public $rfc;
    public $create_by;
    public $create_date;
    public $modification_by;
    public $modification_date;
    protected $table = 'supplier';

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

    public function find_by_key($p_key){
        
        $this->db->from($this->table);
        $this->db->where('idsupplier',$p_key);
        $query = $this->db->get();
        return $query->result();
        
    }
    
    public function insert_entry($p_name, $p_rfc, $p_create_by, $p_status = null) {
        $this->create_by = $p_create_by;
        $this->create_date = standard_date('DATE_ATOM', time());
        $this->name = $p_name;
        $this->rfc = $p_rfc;
        //  $this->idclient = null;
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
    
    public function update_entry($p_idclient,$p_name, $p_rfc, $p_modified_by, $p_status = null){
        
        $data = array(
            'name' =>$p_name,
            'rfc'  =>$p_rfc,
            'modification_by' =>$p_modified_by,
            'modification_date' =>standard_date('DATE_ATOM', time())
        );
           
        if(!is_null($p_status)){
            $data['status'] = $p_status;
        }
        
        $this->db->where('idsupplier', $p_idclient);
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
        $this->db->where('idsupplier', $p_idkey);
        $this->db->delete($this->table);
        
        return array(
            "lastquery" => $this->db->last_query(),
            "err" => $this->db->error()
        );
    }

}
