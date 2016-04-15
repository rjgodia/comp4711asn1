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
                <form action="/agent/exchange" method="post">
                        <input id="stock" name="stock" type="hidden" value="{code}" />
                        <input id="quantity" name="quantity" type="number" style="width:40px"/>
                        <button id="buy" name="buy" type="submit" class="btn btn-primary">Buy</button>
                        <button id="sell" name="sell" type="submit" class="btn btn-primary">Sell</button>
                </form>  
            </td>
        </tr>
        {/stock_list}
    </table>
    
</div>