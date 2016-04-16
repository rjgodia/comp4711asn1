<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Transaction
 *
 * @author rjgodia
 */
class Transaction extends Application
{
    //put your code here
    function __construct()
    {
        parent::__construct();
    }
    
    function index()
    {
        $this->Players->resetAll();
        $this->data['pagebody'] = 'transaction'; //view
        $this->data['translist'] = $this->Trans->all(); // model
        $this->render();
    }
}