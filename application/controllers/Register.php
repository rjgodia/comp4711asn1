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
                $this->load->helper('url');
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
        
        function registerUser()
        {
            $temp = explode(".", $_FILES["imgupload"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            
            $config['upload_path'] = './uploads/';
            $config['file_name'] = $newfilename;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']	= '100';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';
            
            $this->load->library('upload', $config);
            
            $username =  $this->input->post('username');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            
            if($this->is_empty_field(array('username','password')))
            {
                redirect('/register');
            }
            else // successful register conditions
            {
                if(!$this->upload->do_upload('imgupload')) // faulty image upload
                    $newfilename = 'default.jpg';
                
                $data = array(
                    'username' => $username ,
                    'password' => $password ,
                    'avatar' => $newfilename,
                    'role' => 'user');
                $this->db->insert('users', $data);
                //$this->Session->setFlash('UserCreated');
                redirect('/login');
            }
        }
        
        function is_empty_field($field)
        {
            foreach($field as $f)
                if(!$this->input->post($f))
                    return true;
            return false;
        }
        
        function reg(){
            //leave this for now
            $test1 = 'G03';
            $test2 = 'Nice Servo xD';
            $test3 = 'tuesday';
//            $url = 'http://www.comp4711bsx.local/register';
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

  
