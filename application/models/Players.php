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
        parent::__construct('users', 'net');
    }
    
    function gameState($value)
    {
        $url = "http://bsx.jlparry.com/status";
//        $url = "http://www.comp4711bsx.local/status";
        $ch = curl_init($url);
        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt( $ch, CURLOPT_HEADER, 0);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec( $ch );
        $res = new SimpleXMLElement($response);
        curl_close($ch);
        return $res->$value;
    }
    
    public function resetAll()
    {
        $prev = $this->getLastRoundStored();
        $curr = $this->gameState('round');

        // if previously remembered round is different from current round (regardless of gamestate)
        // or if the gamestate is not open
        if($prev != $curr || $this->gameState('state') != 3)
        {
            $this->db->empty_table('transactions');
            $this->db->empty_table('holdings');
            $this->updateRound($curr);
            $this->resetPlayerCash();
        }
    }
    
    public function resetPlayerCash()
    {
        $players = $this->all();
        $data = array("cash"=>5000, "equity" => 0);
        foreach($players as $p)
        {
            $this->db->where('username', $p->username);
            $this->db->update('users', $data);
        }
    }
    
    public function updateRound($round)
    {
        $data = array("round" => $round);
        $this->db->where('name', 'stockticker');
        $this->db->update('gamestate', $data);
    }
    
    public function getLastRoundStored()
    {
        return $this->db->get('gamestate')->row()->round;
    }
}