<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Leaderboards
 *
 * @author rjgodia
 */
class Leaderboards extends Application
{
    //constructor
    function __construct() 
    {
        parent::__construct();
    }

    function index()
    {
        $this->data['pagebody'] = 'leaderboards';
        $this->data['playerlist'] = $this->Players->all();
        $this->render();
    }
}