<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Application {

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
		$this->data['pagebody'] = 'login';	// this is the view we want shown
		$this->data['title'] = "Login";
                $this->data['message'] = $this->session->flashdata('message_name');
		$this->render();
	}
	
	function logout()
	{
		$this->session->sess_destroy();
                redirect('/');
	}
	
	function verify(){
            $key = $_POST['username'];
            $user = $this->Users->get($key);
            if (password_verify($this->input->post('password'),$user->password))
            {
                //echo $key;
                $this->session->set_userdata('usr',$key);
                $this->session->set_userdata('userRole',$user->role);
            }else{
                $this->session->set_flashdata('message_name', 'Wrong login');
                redirect('/login');
            }
               
            
            redirect('/');
    }
}
