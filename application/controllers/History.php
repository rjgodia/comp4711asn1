<?php
    defined('BASEPATH') OR exit('No direct script access allowed');


class History extends Application
{
    //constructor
    function __construct() 
    {
        parent::__construct();
    }

    public function index()
    {
            $this->data['pagebody'] = 'history';
            $this->data['stocks'] = $this->Stocks->all();
            $this->data['movelist'] = $this->Moves->all();
            $this->data['translist'] = $this->Trans->all();
            $this->data['title'] = "Recent History";
            $recentStockMove = $this->Moves->getCol();
            $recentStockTrans = $this->Trans->getCol();
            $this->data['stocktype'] = $this->Moves->some("Code", $recentStockMove);
            $this->data['translist'] = $this->Trans->some("Stock", $recentStockTrans);
            $this->render();
    }
    
    public function loadStocks($stock){
        $this->data['pagebody'] = 'history';
        $this->data['title'] = $stock . " History";
        $this->data['stocktype'] = $this->Moves->some("Code", $stock);
        $this->data['translist'] = $this->Trans->some("Stock", $stock);
        $this->data['stocks'] = $this->Stocks->all();
        $this->data['movelist'] = $this->Moves->all();
        
        $this->render();
    }
}

?>