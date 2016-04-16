
<div class="row">
    <div class="span12">
        <table class="table">
            <tr class="success">
                <td>
                    <p class="text-center" id="status"><img src="/assets/images/exclamation.png" width="25px" height="25px"/><b>Game Status:</b> </p>
                </td>
            </tr>
        </table>
    </div>
</div>

<h4 style="color:red;">{message}</h4>

<form action="/play/registerAgent"  method="post" accept-charset="utf-8">	
	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn btn-success">Register to Agent</button>
		</div>
	</div>
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

<script>
    function updateStatus($id)
    {
        var gameState = "";
        var status = document.getElementById($id);
        var state = {game_status}{state}{/game_status};
        switch(state)
        {
            case 0:
                gameState = "close";
                break;
            case 1:
                gameState = "setup";
                break;
            case 2:
                gameState = "ready";
                break;
            case 3:
                gameState = "open";
                break;
            case 4:
                gameState = "over";
            default:
                break;
        }
        status.innerHTML += " {game_status}Round {round}! The stock exchange is " + gameState + "  for {countdown} seconds. It will be open at {alarm}. Current time is {now}.{/game_status}";
    }
    updateStatus("status");
    
</script>