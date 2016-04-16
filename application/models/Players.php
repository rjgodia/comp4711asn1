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
        parent::__construct('users', 'cash');
    }
    
    function gameState()
    {
        $url = "http://bsx.jlparry.com/status";
        $ch = curl_init($url);
        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt( $ch, CURLOPT_HEADER, 0);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec( $ch );
        $res = new SimpleXMLElement($response);
        return $res->state;
    }
    
    public function resetAll()
    {
        if($this->gameState() == 4 || $this->gameState() == 0)
        {
            $this->db->empty_table('transactions');
            $this->db->empty_table('holdings');
            $this->resetPlayerCash();
        }
    }
    
    public function resetPlayerCash()
    {
        $players = $this->all();
        $data = array("cash"=>5000);
        foreach($players as $p)
        {
            $this->db->where('username', $p->username);
            $this->db->update('users', $data);
        }
    }
    
//    function getEquity()
//    {        
//        $players = $this->Trans->all();
//        $stocks = $this->Stocks->all();
//        
//        foreach($players as $p)
//        {
//            $equity = 0;
//            foreach($stocks as $s)
//            {
//                $equity += $s->Value * ($this->getTotalTrans($p->Player, $s->Code));
//            }
//            $this->UpdateEquity('Players', $equity, $p->Player);
//        }
//    }
//    
//    function getNet()
//    {
//        $players = $this->Players->all();
//        
//        foreach($players as $p)
//        {
//            $this->UpdateNetWorth('Players', $p->Player, $p->Equity, $p->Cash);
//        }
//    }
//    
//    function UpdateEquity($table, $equity, $player)
//    {
//        $data = array('Equity'=>$equity);
//        $this->db->where('Player', $player);
//        $this->db->update($table, $data);
//    }
//    
//    function UpdateNetWorth($table, $player, $equity, $cash)
//    {
//        $data = array ('Net'=>( $cash + $equity ));
//        $this->db->where('Player', $player);
//        $this->db->update($table, $data);
//    }
//    
//    function getTotalTrans($player, $stock)
//    {
//        $this->db->select('SUM(Quantity) AS TotalTrans');
//        $this->db->where('player', $player);
//        $this->db->where('stock', $stock);
//        return $this->db->get('transactions')->result()[0]->TotalTrans;
//    }
//    
//    function getCol()
//    {
//        foreach ($this->Trans->recent() as $row)
//        {
//            return $row->Stock;
//        }
//    }
}