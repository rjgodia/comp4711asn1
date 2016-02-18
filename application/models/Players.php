<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Players
 *
 * @author rjgodia
 */
class Players extends MY_Model
{
    function __construct()
    {
        parent::__construct('players', 'Cash');
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