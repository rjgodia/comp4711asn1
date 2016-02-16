<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Play extends Application {

        //constructor
        function __construct() 
        {
            parent::__construct();
        }

        function index()
        {
            $this->data['pagebody'] = 'play';
            $this->data['stocks'] = $this->Stocks->all();            
            $this->render();
        }
    }
?>
