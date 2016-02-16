<?php
/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 * @author		JLP
 * @copyright           2010-2013, James L. Parry
 * ------------------------------------------------------------------------
 */
class Application extends CI_Controller {
	protected $data = array();	  // parameters for view components
	protected $id;				  // identifier for our content
	/**
	 * Constructor.
	 * Establish view parameters & load common helpers
	 */
	function __construct()
	{
		parent::__construct();
		$this->data = array();
		$this->data['title'] = 'Stock Game';	// our default title
		$this->errors = array();
		$this->data['pageTitle'] = 'welcome';   // our default page
		
		 $this->load->library('session');
		 
		 
		 $nav_right = $this->config->item('menu_choices_right');
		 if ($this->session->userdata('usr') !== null) {
             $nav_right['menudata'][0] = array('name' => 'Hello, ' . $this->session->userdata('usr'), 'link' => '/profile');
			 $nav_right['menudata'][1] 
                 = array('name' => 'Logout', 'link' => '/logout');
			 
         }
		 $this->config->set_item('menu_choices_right', $nav_right);
	}
	/**
	 * Render this page
	 */
	function render()
	{
		$this->data['menubar'] = $this->parser->parse('_menubar', $this->config->item('menu_choices'), true);
		$this->data['menubar_right'] = $this->parser->parse('_menubar_right', $this->config->item('menu_choices_right'), true);
		
		$this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
		// finally, build the browser page!
		$this->data['data'] = &$this->data;
		$this->parser->parse('_template', $this->data);
	}
}