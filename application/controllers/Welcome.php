<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function index()
	{

                $title = $this->lang->line('title_sell');
                $data = array(
                        'title' => $title 
                );
                $this->CallViews('index.tpl',$data);

	}
        
        public function smar(){
            
            $this->CallViews('index.tpl');
        }
     
}
