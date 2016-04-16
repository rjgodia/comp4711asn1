<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Trans
 *
 * @author rjgodia
 */
class Trans extends MY_Model
{
    //put your code here
    function __construct()
    {
        parent::__construct('transactions', 'user');
    }
    
    function recent()
    {
        $this->db->order_by($this->_keyField, 'desc');
        $this->db->limit(1);
        $query = $this->db->get($this->_tableName);
        return $query->result();
    }
    
    function getCol()
    {
        foreach ($this->Trans->recent() as $row)
        {
            return $row->Stock;
        }
    }
	
}