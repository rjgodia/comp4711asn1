<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    function __construct()
    {
        parent::__construct();
    }
    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------
    function index()
    {
        $this->data['pagebody'] = 'homepage'; // view
        $this->data['title'] = 'Stock Ticker Updates';
        $this->data['stock_list'] = $this->Stocks->all();
        $this->getEquity();        
        $this->data['player_list'] = $this->Players->all();
        $this->render();
    }
    
    function getEquity()
    {        
        $players = $this->Trans->all();
        $stocks = $this->Stocks->all();
        $equity = 0;
        foreach($players as $p)
        {
            foreach($stocks as $s)
            {
                $equity += $s->Value * ($this->totalSell($p->Player, $s->Code) - $this->totalBuy($p->Player, $s->Code));
            }
            
            $this->UpdateEquity('Players', $equity, $p->Player);
            $equity = 0;
        }
    }
    
    function UpdateEquity($table, $equity, $player)
    {
        $data = array('Equity'=>$equity);
        $this->db->where('Player', $player);
        $this->db->update($table, $data);
    }
    
    function totalBuy($player,$stock)
    {
        $this->db->select('(SUM(Quantity)) AS TotalBuy');
        $this->db->where('player',$player);
        $this->db->where('Trans', 'buy');
        $this->db->where('Stock', $stock);
        $query = $this->db->get('transactions');
        return $query->result()[0]->TotalBuy;
    }
    
    function totalSell($player, $stock)
    {
        $this->db->select('(SUM(Quantity)) AS TotalSell');
        $this->db->where('player',$player);
        $this->db->where('Trans', 'sell');
        $this->db->where('Stock', $stock);
        $query = $this->db->get('transactions');
        return $query->result()[0]->TotalSell;
    }    
}