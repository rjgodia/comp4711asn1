<div class = "row">
    <div class="span12">
        <img id="banner" src="/assets/images/banner.jpg" height="70px"/>
    </div>
    
    <div class="span3">
        <h4><u>Recent Movements</u></h4>
    </div>
    
    <div class="span3">
        <h4><u>Current Stocks</u></h4>
    </div>
    
    <div class="span6">
        <h4><u>Player Standings</u></h4>
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
    
    <div class="span3">
        <table class="table table-hover">
            <thead>
                <th style="width: 50%">Stock</th>
                <th style="width: 50%">Value</th>
            </thead>
            {stock_list}
            <tr id="cs_{code}">
                <td><a href="/history/{Code}">{code}</a></td>
                <td>{value}</td>
            </tr>
            {/stock_list}
        </table>
    </div>
    
    <div class="span6">
        <table class="table table-hover">
             <thead>
                <th style="width: 20%">Player</th>
                <th style="width: 20%">Cash</th>
                <th style="width: 20%">Equity</th>
                <th style="width: 20%">Net Worth</th>
                <th style="width: 10%"></th>
            </thead>
            {player_list}
            <tr id="{Player}">
                <td><a href="/profile/{Player}">{Player}</a></td>
                <td id="{Player}_cash">{Cash}</td>
                <td id="{Player}_eq">{Equity}</td>
                <td id="{Player}_net">{Net}</td>
                <td id="{Player}_pic"></td>
            </tr>
            {/player_list}
            <tr>
                <td style="font-size: 10px">
                    <img src="/assets/images/top_player.png" width="25px" height="25px"/> Highest Net worth
                </td>
                <td style="font-size: 10px">
                    <img src="/assets/images/top_cash.png" width="25px" height="25px"/> Highest Cash worth
                </td><td></td><td></td><td></td>
            </tr>
        </table>
    </div>
</div>
<script>
    var stocks =[];
    var players = [];
    var pcash = [];
    
    {stock_list}stocks.push('cs_'+'{code}');{/stock_list}
    {player_list}players.push({Net});{/player_list}
    {player_list}pcash.push({Cash});{/player_list}
    
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
    
    {recent_moves}
        colorCodeRecentMoves('{seq}_{action}', '{seq}_{action}_img');
    {/recent_moves}
    
    {player_list}
        colorCodePlayers('{Player}', {Net}, {Cash});
    {/player_list}
    
    {stock_list}
        colorCodeStocks('cs_{code}');
    {/stock_list}
</script>