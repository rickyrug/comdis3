<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function index()
	{
                $this->CallViews('home/index.tpl',$this->data);
	}
        
        public function sellsIndex()
	{
                $this->CallViews('home/sellsindex.tpl',$this->data);
	}

        public function adminIndex()
	{
                $this->CallViews('home/adminindex.tpl',$this->data);
	}
        
         public function purchaseIndex()
	{
                $this->CallViews('home/purchaseindex.tpl',$this->data);
	}
}
