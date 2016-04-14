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
        
        function registerAgent(){
            $test1 = 'G03';
            $test2 = 'xD';
            $test3 = 'tuesday';
            $url = 'http://bsx.jlparry.com/register';
            $myvars = 'team=' . $test1 . '&name=' . $test2 . '&password=' . $test3;

            $ch = curl_init( $url );
            curl_setopt( $ch, CURLOPT_POST, 1);
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
            curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt( $ch, CURLOPT_HEADER, 0);
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

            $response = curl_exec( $ch );
            var_dump($response);
        }
    }
?>
