<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
{
    function __construct()
    {
        parent::__construct();
    }
    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------
    function index()
    {
        $this->data['pagebody'] = 'homepage';
        $this->data['title'] = 'Stock Ticker';
        $this->data['stock_list'] = $this->Stocks->all();
        $this->Players->getEquity();
        $this->Players->getNet();
        $this->data['player_list'] = $this->Players->all();
        $this->render();
    }
}