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
    
    public function MY_Controller(){
        parent::__construct();
        $lang = $this->config->item('language');
        $this->lang->load('general', $lang);
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

}
