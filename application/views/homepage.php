<div class = "row">
    <div class="span12">
        <img id="banner" src="/assets/images/banner.jpg" height="70px"/>
    </div>
    
    <div class="span12">
        <table class="table">
            <tr class="success">
                <td>
                    <p class="text-center" id="status"><img src="/assets/images/exclamation.png" width="25px" height="25px"/><b>Game Status:</b> </p>
                </td>
            </tr>
        </table>
    </div>
    
    <div class="span2">
        <h4><u>Current Stocks</u></h4>
    </div>
    <div class="span3">
        <h4><u>Recent Movements</u></h4>
    </div>
    <div class="span7">
        <h4><u>Player Standings</u></h4>
    </div>
    <div class="span2">
        <table class="table table-hover">
            <thead>
                <th style="width: 50%">Stock</th>
                <th style="width: 50%">Value</th>
            </thead>
            {stock_list}
            <tr id="cs_{code}">
                <td><a href="/history/{code}">{code}</a></td>
                <td>{value}</td>
            </tr>
            {/stock_list}
        </table>
    </div>

    
    <div class="span3">
        <table class="table table-hover">
            <thead>
                <th style="width: 33%">Code</th>
                <th style="width: 33%">Action</th>
                <th style="width: 33%">Amount</th>
            </thead>
            {recent_moves}
            <tr id="{seq}_{action}">
                <td>{code}</td>
                <td id="{seq}_{action}_img">{action}</td>
                <td>{amount}</td>
            </tr>
            {/recent_moves}
        </table>
    </div>
    
    <div class="span7">
        <table class="table table-hover">
             <thead>
                <th style="width: 10%"></th>
                <th style="width: 18%">Player</th>
                <th style="width: 18%">Net Worth</th>
                <th style="width: 18%">Cash</th>
                <th style="width: 18%">Equity</th>
                <th style="width: 18%"></th>
            </thead>
            {player_list}
            <tr id="{username}">
                <td><img src="/uploads/{avatar}" width="25px" height="25px"/></td>
                <td><a href="/profile/{username}">{username}</a></td>
                <td id="{username}_net">{net}</td>
                <td>{cash}</td>
                <td>{equity}</td>
                <td id="{username}_pic"></td>
            </tr>
            {/player_list}
        </table>
        
        <table class="table">
            <tr>
                <td><img src="/assets/images/top_player.png" width="25px" height="25px"/> Highest Net Worth
                <img src="/assets/images/top_cash.png" width="25px" height="25px"/> Highest Cash Worth</td>
            </tr>
        </table>
    </div>
</div>

<script>
    var stocks =[];
    var players = [];
    var pcash = [];
    
    {stock_list}stocks.push('cs_{code}');{/stock_list}
    {player_list}players.push({net});{/player_list}
    {player_list}pcash.push({cash});{/player_list}
        
    function colorCodeStocks(id)
    {
        var row = document.getElementById(id);
        if(stocks[0] === id || stocks[1] === id || stocks[2] === id)
        {
            row.style = "font-weight: bold";
            row.className = "info";
        }
    }
    
    function colorCodePlayers(id, net, cash)
    {
        var row = document.getElementById(id);
        var pnet = document.getElementById(id+'_net');
        var pic = document.getElementById(id+'_pic');
        
        /* negative net worth */
        if(net <= 0) pnet.style = "color: red";
        
        /* player with highest cash value */
        if(Math.max.apply(Math, pcash) === cash)
        {
            row.className = "warning";
            row.style = "font-weight: bold";
            pic.innerHTML = '<img src="/assets/images/top_cash.png" width="25px" height="25px"/>';
        }
        
        if(players[0] === net)
        {
            row.className = "success";
            row.style = "font-weight: bold";
            pic.style = "text-style: left";
            pic.innerHTML = '<img src="/assets/images/top_player.png" width="25px" height="25px"/>';
        }
    }
    
    function colorCodeRecentMoves(code, action)
    {
        var c = document.getElementById(code);
        var a = document.getElementById(action);
        
        if(a.innerHTML === 'up')
        {
            a.innerHTML = '<img src="/assets/images/up.png" width="25px" height="25px"/>';
            c.className = 'info';
        }
        if(a.innerHTML === 'down')
        {
            a.innerHTML = '<img src="/assets/images/down.png" width="25px" height="25px"/>';
            c.className = 'error';
        }
        if(a.innerHTML === 'div')
        {
            a.innerHTML = '<img src="/assets/images/div.png" width="25px" height="25px"/>';
            c.className = 'warning';
        }
    }
    
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
    
    
    {player_list}
        colorCodePlayers('{username}', {net}, {cash});
    {/player_list}
    
    {recent_moves}
        colorCodeRecentMoves('{seq}_{action}', '{seq}_{action}_img');
    {/recent_moves}
    
    {stock_list}
        colorCodeStocks('cs_{code}');
    {/stock_list}
</script>