<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Stocks
 *
 * @author rjgodia
 */
class Stocks extends MY_Model{
    //put your code here
    function __construct()
    {
        parent:: __construct('Stocks', 'Code');
    }
}