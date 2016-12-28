<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author rickyrug
 */
interface ICrud {
    public function index($p_message = null);
    public function addView();
    public function addConfirmation();
    public function updateView($p_id);
    public function updateConfirmation();
    public function deleteView($p_id);
}
