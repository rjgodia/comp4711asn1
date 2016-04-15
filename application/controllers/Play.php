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
            
            $arr = $this->Moves->getData("http://bsx.jlparry.com/data/stocks");
            $this->data['stock_list'] = $arr;
            $this->data['message'] = $this->session->flashdata('message_name');
            $this->render();
        }
        
        function registerAgent(){
            $test1 = 'g03';
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

            $team = new SimpleXMLElement($response);
            $team1 = $team->team[0];
            
            $token = new SimpleXMLElement($response);
            $token1 = $team->token[0];
            
            $this->session->set_userdata('token',(String)$token1);
            $this->session->set_userdata('teamCode',(String)$team1);
            redirect('/play');
        }
        
        function buy(){
            $team = $this->session->userdata('teamCode');
            $token = $this->session->userdata('token');
            $player = $this->session->userdata('usr');
            $stock = $this->input->post('stock');
            $quantity = $this->input->post('quantity');;
            $url = 'http://bsx.jlparry.com/buy';
            $myvars = 'team=' . $team . '&token=' . $token . '&player=' 
                    . $player . '&stock=' . $stock . '&quantity=' . $quantity;

            $ch = curl_init( $url );
            curl_setopt( $ch, CURLOPT_POST, 1);
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
            curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt( $ch, CURLOPT_HEADER, 0);
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

            $response = curl_exec( $ch );
            var_dump($response);
            $this->session->set_flashdata('message_name', 'Stock has been purchased');
            redirect('/play');
        }
        
        function sell(){
            redirect('/play');
        }
    }
?>
