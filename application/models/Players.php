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
        parent::__construct('players', 'Net');
    }
    
    function getEquity()
    {        
        $players = $this->Trans->all();
        $stocks = $this->Stocks->all();
        
        foreach($players as $p)
        {
            $equity = 0;
            foreach($stocks as $s)
            {
                $equity += $s->Value * ($this->getTotalTrans($p->Player, $s->Code));
            }
            $this->UpdateEquity('Players', $equity, $p->Player);
        }
    }
    
    function getNet()
    {
        $players = $this->Players->all();
        
        foreach($players as $p)
        {
            $this->UpdateNetWorth('Players', $p->Player, $p->Equity, $p->Cash);
        }
    }
    
    function UpdateEquity($table, $equity, $player)
    {
        $data = array('Equity'=>$equity);
        $this->db->where('Player', $player);
        $this->db->update($table, $data);
    }
    
    function UpdateNetWorth($table, $player, $equity, $cash)
    {
        $data = array ('Net'=>( $cash + $equity ));
        $this->db->where('Player', $player);
        $this->db->update($table, $data);
    }
    
    function getTotalTrans($player, $stock)
    {
        $this->db->select('SUM(Quantity) AS TotalTrans');
        $this->db->where('player', $player);
        $this->db->where('stock', $stock);
        return $this->db->get('transactions')->result()[0]->TotalTrans;
    }
    
    function getCol()
    {
        foreach ($this->Trans->recent() as $row)
        {
            return $row->Stock;
        }
    }
}