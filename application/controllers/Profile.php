<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Application {

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
        //Retrieve the current logged in user
        $currPlayer = $this->session->userdata('usr');

		$this->data['pagebody'] = 'profile';
		//$this->data['stocks'] = $this->Stocks->all();
		$this->data['players'] = $this->Players->all();
        $this->data['translist'] = $this->Trans->all();
		/*$this->data['movelist'] = $this->Moves->all();
		$this->data['translist'] = $this->Trans->all();
        $players = $this->Players->getCol();
        $recentStockTrans = $this->Trans->getCol();

        //Check whether there is a current logged user. NULL if there is no logged in user,
        // otherwise returns current user
        if($currPlayer == NULL){
            $this->data['title'] = "Player Portfolio";
            $this->data['translist'] = $this->Trans->some("Stock", $recentStockTrans);
        }else{
            $this->data['title'] = $currPlayer."'s Portfolio";
            $this->data['translist'] = $this->Trans->some("Player", $currPlayer);
        }

        $this->data['playerlist'] = $this->Players->some("Player", $players);
        */
		$this->render();
	}

	public function loadPurchases($player){
		$this->data['pagebody'] = 'profile';
		$this->data['title'] = $player . "'s Portfolio";

		$this->data['translist'] = $this->Trans->some("user", $player);
        $this->data['playerlist'] = $this->Players->all();
		$this->data['players'] = $this->Players->all();
		$this->data['movelist'] = $this->Moves->all();

		$this->render();
	}

}
