<h4 style="color:red;">{message}</h4>
<form action="/play/registerAgent"  method="post" accept-charset="utf-8">	
	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn btn-primary">Temp register agent</button>
		</div>
	</div>
</form>

	
</form>

<div>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Value</th>
        </tr>
        </thead>
        {stock_list}
        <tr>
            <td>{code}</td>
            <td>{name}</td>
            <td>{value}</td>
            <td>
                <span style="float:left;">
                <form action="/play/buy" method="post">
                        <input id="stock" name="stock" type="hidden" value="{code}" />
                        <input value="1" min="0" style="width:30px" id="quantity" name="quantity" type="number"/>
                        <button id="buy" name="buy" type="submit" class="btn btn-primary">Buy</button>
                </form>
                 </span> 
                <span style="float:right;">
                <form action="/play/sell" method="post">
                        <input id="stock" name="stock" type="hidden" value="{code}" />
                        <input value="1" min="0" style="width:30px" id="quantity" name="quantity" type="number"/>
                        <button id="sell" name="sell" type="submit" class="btn btn-primary">Sell</button>
                </form> 
                </span>
            </td>
        </tr>
        {/stock_list}
    </table>
    
</div>