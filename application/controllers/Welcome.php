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
        $arr = $this->Moves->getData("http://bsx.jlparry.com/data/stocks");
        $this->sortArr($arr);
        $this->data['stock_list'] = $arr;
        $this->data['recent_moves'] = $this->Moves->getData("http://bsx.jlparry.com/data/movement/5");
        
        $this->render();
    }
    
    function sortArr(&$arr)
    {
        usort($arr, array($this,"cmp"));
    }
    
    /* sorts stocks by value, if the same value, stocks are sorted by code */
    function cmp($a, $b)
    {
        return $b['value'] == $a['value'] ? strnatcasecmp($b['code'], $a['code']) : $b['value'] - $a['value'];
    }
}