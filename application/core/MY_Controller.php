<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyController
 *
 * @author rickyrug
 */
class MY_Controller extends CI_Controller {
    
    public $data;
    
    public function MY_Controller(){
        parent::__construct();
        $lang = $this->config->item('language');
        $this->lang->load('general', $lang);
        $this->data = array();
        $this->setLabels();
    }

    public function LoadMenu($p_data){
        $menu = array( 'home' => base_url(),
                       'sells'=> base_url('index.php/SellsIndex'),
                       'purchase' => base_url('index.php/PurchaseIndex'),
                       'admin' => base_url('index.php/Adminindex')
            
                      );
        $breadcrumb = $this->uri->segment_array();
        $p_data['menu'] = $menu;
        $p_data['breadcrumb'] = $breadcrumb;
        return $p_data;
    }
    
    public function CallViews($p_view, $p_data = null) {
        $this->smarty->assign('base_url', base_url());
        $this->smarty->assign('site_url',site_url());
        $this->smarty->assign('CI_VERSION', CI_VERSION);
        $p_data = $this->LoadMenu($p_data);

        if ($p_data != null) {
            $this->smarty->assign('data', $p_data);
        } 
        $this->smarty->display('extends:'
                            .'layout.tpl|'
                            .'layout/head.tpl|'
                            .'layout/topMenu.tpl|'
                            .'layout/mainContainer.tpl|'
                                .'layout/leftMenu.tpl|'
                                .$p_view.'|'
                            .'layout/javascripts.tpl'
                        );
    }
    
    private function setLabels(){
       
        $this->data['title'] = $this->lang->line('title_clients');
        $this->data['id_label'] =$this->lang->line('id');
        $this->data['name_label'] =$this->lang->line('name');
        $this->data['rfc_label'] =$this->lang->line('rfc');
        $this->data['status_label'] =$this->lang->line('status');
        $this->data['actions_label'] =$this->lang->line('actions');
        $this->data['add_label'] =$this->lang->line('add');
        $this->data['titleaddclient'] =$this->lang->line('titleadd_clients');
        $this->data['titleeditclient'] =$this->lang->line('titleedit_clients');
        $this->data['titledeleteclient'] =$this->lang->line('titledelete_clients');
        
        $this->data['save'] =$this->lang->line('save');
        $this->data['return'] =$this->lang->line('return');
        $this->data['delete'] =$this->lang->line('delete');
        
        $this->data['msg_cli_nvalid_name'] =$this->lang->line('msg_cli_nvalid_name');
        $this->data['msg_cli_required_name'] =$this->lang->line('msg_cli_required_name');
        $this->data['msg_cli_lenght_name'] =$this->lang->line('msg_cli_lenght_name');
        $this->data['msg_cli_regex_name'] =$this->lang->line('msg_cli_regex_name');
        
        $this->data['msg_cli_nvalid_rfc']   =$this->lang->line('msg_cli_nvalid_rfc');
        $this->data['msg_cli_required_rfc'] =$this->lang->line('msg_cli_required_rfc');
        $this->data['msg_cli_lenght_rfc']   =$this->lang->line('msg_cli_lenght_rfc');
    }

}