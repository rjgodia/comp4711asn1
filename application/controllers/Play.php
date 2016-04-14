<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Play extends Application {

        //constructor
        function __construct() 
        {
            parent::__construct();
            $this->restrict(array('user','admin'));
        }

        function index()
        {
            $this->data['pagebody'] = 'play';           
            $this->render();
        }
    }
?>
