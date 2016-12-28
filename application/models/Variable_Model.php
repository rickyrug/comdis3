<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Variable_Model
 *
 * @author rickyrug
 */
class Variable_Model extends CI_Model {

    public $description;
    public $status;
    public $created_date;
    public $created_by;
    public $modification_date;
    public $modified_by;
    protected $table = 'variables';

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
        $this->db->where('idvariable', $p_key);
        $query = $this->db->get();
        return $query->result();
    }

    public function insert_entry($p_description, $p_created_by, $p_status = null) {
        $this->created_by   = $p_created_by;
        $this->created_date = standard_date('DATE_ATOM', time());
        $this->description = $p_description;

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

    public function update_entry($p_idvariable, $p_description, $p_modified_by, $p_status = null) {

        $data = array(
            'description' => $p_description,
            'modification_by' => $p_modified_by,
            'modification_date' => standard_date('DATE_ATOM', time())
        );

        if (!is_null($p_status)) {
            $data['status'] = $p_status;
        }

        $this->db->where('idvariable', $p_idvariable);
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
        $this->db->where('idvariable', $p_idkey);
        $this->db->delete($this->table);
        
        return array(
            "lastquery" => $this->db->last_query(),
            "err" => $this->db->error()
        );
    }

}
