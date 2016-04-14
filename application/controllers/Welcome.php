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
        
//        $this->data['player_list'] = $this->Players->all();
//        $arr = $this->Moves->getData("http://bsx.jlparry.com/data/stocks");
//        $this->sortArr($arr);
//        $this->data['stock_list'] = $arr;
//        
//        $this->data['recent_moves'] = $this->Moves->getData("http://bsx.jlparry.com/data/movement/5");
//        $this->data['game_status'] = $this->getGameStatus("http://bsx.jlparry.com/status");
        
        
        $this->data['player_list'] = $this->Players->all();
        $arr = $this->Moves->getData("http://www.comp4711bsx.local/data/stocks");
        $this->sortArr($arr);
        $this->data['stock_list'] = $arr;
        
        $this->data['recent_moves'] = $this->Moves->getData("http://www.comp4711bsx.local/data/movement/5");
        $this->data['game_status'] = $this->getGameStatus("http://www.comp4711bsx.local/status");        
        
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
    
    function getGameStatus($url)
    {
        $ch = curl_init($url);
        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt( $ch, CURLOPT_HEADER, 0);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec( $ch );
        $res = new SimpleXMLElement($response);
        
        $gameStatus = array(
            "round" => (string)$res->round,
            "state" => (int)$res->state,
            "desc" => (string)$res->desc,
            "current" => (string)$res->current,
            "duration" => (string)$res->duration,
            "upcoming" => (string)$res->upcoming,
            "alarm" => (string)$res->alarm,
            "now"=> (string)$res->now,
            "countdown"=> (string)$res->countdown
        );
        
        return array($gameStatus);
    }
}