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
		
		$this->render();
	}
	
	function logout()
	{
		$this->session->unset_userdata('usr');
        redirect('/');
	}
	
	function verify(){
	
            $trigger = false;
            $query = $this->db->get('users');
            foreach ($query->result() as $row)
            {
                if($row->username == $this->input->post('username') && $row->password == $this->input->post('password')){
                    $trigger = true;
                }
            }
        if ($trigger = true) {
            $this->session->set_userdata('usr', $this->input->post('username'));
            redirect('/');
        }
    }
}
