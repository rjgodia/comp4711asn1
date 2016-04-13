<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends Application {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	function __construct()
	{
		parent::__construct();
	}
	//-------------------------------------------------------------
	//  The normal pages
	//-------------------------------------------------------------
	function index()
	{
		$this->data['pagebody'] = 'register';	// this is the view we want shown
		$this->data['title'] = "Register";
		
		$this->render();
	}
        function reg(){
            //leave this for now
            $test1 = 'G03';
            $test2 = 'Cats';
            $test3 = 'tuesday';
            //$url = 'http://comp4711asn1.local:8080/register';
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

  
