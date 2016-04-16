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
            $this->data['game_status'] = $this->getGameStatus("http://bsx.jlparry.com/status");
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
            
            $token1 = $team->token[0];
            if((String)$team->message[0] == ""){
                $this->session->set_userdata('token',(String)$token1);
                $this->session->set_userdata('teamCode',(String)$team1);
            }else{
               $this->session->set_flashdata('message_name', 'Agent Error: ' . (String)$team->message[0] . '!');
            }
            redirect('/play');
        }
        
        function buy(){
            $team = $this->session->userdata('teamCode');
            $token = $this->session->userdata('token');
            $player = $this->session->userdata('usr');
            $stock = $this->input->post('stock');
            $quantity = $this->input->post('quantity');
            $url = 'http://bsx.jlparry.com/buy';
            $myvars = 'team=' . $team . '&token=' . $token . '&player=' 
                    . $player . '&stock=' . $stock . '&quantity=' . $quantity;

            //rj dont do it!!!
            //pls for the love of god
            //dont, it works
            if($this->checkSufficientCash($stock,$quantity) === false)
            {
                $this->session->set_flashdata('message_name', 'Insufficient Cash');
                redirect('/play');
            }
            else
            {
                $ch = curl_init( $url );
                curl_setopt( $ch, CURLOPT_POST, 1);
                curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
                curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt( $ch, CURLOPT_HEADER, 0);
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

                $response = curl_exec( $ch );

                try{
                    $x = new SimpleXMLElement($response);
                }catch (Exception $e) { 
                    $this->session->set_flashdata('message_name', 'Error! The xml returned for buy is null. Sever is broken again');
                    redirect('/play');   
                }
                $message = new SimpleXMLElement($response);
                
                // if successful transaction
                if((String)$message->message[0] == "")
                {
                    // update player cash
                    $this->updatePlayerCash($stock, $quantity);
                    //get buy token
                    $buyToken = $message->token[0];
                    // add stock to holdings
                    $this->addToHoldings($stock, $buyToken, $quantity);
                    // add to transactions

                    $this->session->set_flashdata('message_name', 'Stock has been purchased');
                }
                else // failed transaction
                {
                    $this->session->set_flashdata('message_name', 'Error Buying Stock: ' . (String)$message->message[0]);
                }
                redirect('/play');
            }
        }
        
        function checkSufficientCash($stock, $quantity)
        {
            $currentUser = $this->Users->get($this->session->userdata('usr'));
            $currentCash = $currentUser->cash;
            $exepectedPurchase = $this->getTotalPurchase($stock, $quantity);
            
            if($exepectedPurchase <= $currentCash)
                return true;
            return false;
        }
        
        function getTotalPurchase($stock, $quantity)
        {
            $stocks = $this->Moves->getData("http://bsx.jlparry.com/data/stocks");
            $expectedPurchase = 0;
            foreach($stocks as $s)
            {
                if($s['code'] == $stock)
                {
                    $expectedPurchase = $s['value'] * $quantity;
                    break;
                }
            }
            return $expectedPurchase;
        }
        
        function updatePlayerCash($stock, $quantity)
        {
            $player = $this->session->userdata('usr');
            $currentUser = $this->Users->get($this->session->userdata('usr'));
            $currentCash = $currentUser->cash;
            
            $newTotal = $currentCash - $this->getTotalPurchase($stock, $quantity);
            
            $data = array(
                "cash"=> $newTotal
            );
           
            $this->db->where('username',$player);
            $this->db->update('users',$data);
        }
        
        
        function sell(){
            redirect('/play');
        }
        function getGameStatus($url)
        {
            $ch = curl_init($url);
            curl_setopt( $ch, CURLOPT_POST, 1);
            curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt( $ch, CURLOPT_HEADER, 0);
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec( $ch );
            $res = new SimpleXMLElement($response);

            $gameStatus = array(
                "round" => (string)$res->round,
                "state" => (int)$res->state,
                "desc" => (string)$res->desc,
                "current" => (string)$res->current,
                "duration" => (string)$res->duration,
                "upcoming" => (string)$res->upcoming,
                "alarm" => (string)$res->alarm,
                "now"=> (string)$res->now,
                "countdown"=> (string)$res->countdown
            );

            return array($gameStatus);
        }
        
        function addToHoldings($stock, $token, $quantity)
        {
            $player = $this->session->userdata('usr');
            $data = array(
                "user" => $player,
                "stock" => $stock,
                "token" => $token,
                "quantity" => $quantity
            );
            $this->db->insert('holdings',$data);            
        }
        
    }
?>
