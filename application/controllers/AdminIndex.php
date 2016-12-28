<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminIndex
 *
 * @author rickyrug
 */
class AdminIndex extends MY_Controller {

    public function index() {
//        $title = $this->lang->line('title_admin');
//        $title_clients = $this->lang->line('title_clients');
//        $title_variables = $this->lang->line('title_variables');
//        $title_products = $this->lang->line('title_products');
//        $data = array(
//            'title' => $title,
//            'title_clients' => $title_clients,
//            'title_variables' =>$title_variables,
//            'title_products' => $title_products
//          
//        );
        $this->CallViews('AdminIndex/index.tpl', $this->data);
    }

}
