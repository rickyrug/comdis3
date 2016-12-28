<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PurchaseIndex extends MY_Controller{


	public function index()
	{
		$title = $this->lang->line('title_purchase');
                $data = array(
                        'title' => $title 
                );
                $this->CallViews('PurchaseIndex/index.tpl',$data);
	}
}
