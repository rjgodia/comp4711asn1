<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<br/>

<div class="btn-group">
  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
    Select Stock
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu">  
      {stocks}
      <li><a href="/history/{code}">{code}</a></li> 
      {/stocks}
  </ul>
</div>
<br/>
<br/>

<div>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Date</th>
            <th>Code</th>
            <th>Action</th>
            <th>Amount</th>
        </tr>
        </thead>
        {stocktype}
        <tr>
            <td>{datetime}</td>
            <td>{code}</td>
            <td>{action}</td>
            <td>{amount}</td>
        </tr>
        {/stocktype}
    </table>
    
</div>

<h1>Transactions</h1>
<div>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Date</th>
            <th>Player</th>
            <th>Stock</th>
            <th>Transaction</th>
            <th>Quantity</th>
        </tr>
        </thead>
        {translist}
        <tr>
            <td>{DateTime}</td>
            <td>{Player}</td>
            <td>{Stock}</td>
            <td>{Trans}</td>
            <td>{Quantity}</td>
        </tr>
        {/translist}
    </table>
    
</div>