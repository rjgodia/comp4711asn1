<?php
/**
 * Created by PhpStorm.
 * User: Goober Tan
 * Date: 4/15/2016
 * Time: 6:32 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class AgentManagement extends Application{
    //constructor
    function __construct()
    {
        parent::__construct();
        $this->restrict(array('admin'));
    }

    function index()
    {
        $this->Players->resetAll();
        $this->data['pagebody'] = 'agentmanagement';
        $this->render();
    }


}

?>