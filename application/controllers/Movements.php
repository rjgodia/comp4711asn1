<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Movements
 *
 * @author rjgodia
 */
class Movements extends Application
{
    //put your code here
    function __construct()
    {
        parent::__construct();
    }
    
    function index()
    {
        $this->Players->resetAll();
        $this->data['pagebody'] = 'movements'; // view
        $this->data['movelist'] = $this->Moves->all(); // model
        $this->render();
    }
}