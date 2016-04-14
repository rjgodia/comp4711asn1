<form action="/play/registerAgent"  method="post" accept-charset="utf-8">	
	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn btn-primary">Temp register agent</button>
		</div>
	</div>
</form>

<form action="/play/buy"  method="post" accept-charset="utf-8">	
        <div class="btn-group">
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
            Select Stock
            <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">  
            {stock_list}
            <li id="stock">{code}</li> 
            {/stock_list}
            </ul>
        </div>

	<div class="control-group">
		<div class="input-prepend">
			<span class="add-on"><i></i></span>
			<input type="text" id="password" name="quant" placeholder="quant">
		</div>
	</div>
	
	
	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn btn-primary">Buy Stock</button>
		</div>
	</div>
	
</form>

