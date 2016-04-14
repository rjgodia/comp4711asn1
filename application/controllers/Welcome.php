<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Moves');
    }
    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------
    
    function index()
    {
        $this->data['pagebody'] = 'homepage';
        $this->data['title'] = 'Stock Ticker';
        
        //$this->Players->getEquity();
        //$this->Players->getNet();
        
        $this->data['player_list'] = $this->Players->all();
        $this->data['stock_list'] = $this->Stocks->getData("http://bsx.jlparry.com/data/stocks");
        $this->data['recent_moves'] = $this->Moves->getData("http://bsx.jlparry.com/data/movement/5");
        $this->render();
    }
}