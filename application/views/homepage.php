<div class = "row">
    <div class="span12">
        <img id="banner" src="/assets/images/banner.jpg" height="70px"/>
    </div>
    <div class="span3">
        <h4><u>Stocks Update</u></h4>
    </div>
    <div class="span9">
        <h4><u>Player Standings</u></h4>
    </div>
    
    <div class="span3">
        <table class="table table-hover">
            <thead>
                <th style="width: 50%">Stock</th>
                <th style="width: 50%">Value</th>
            </thead>
            {stock_list}
            <tr id="{Name}">
                <td><a href="/history/{Code}">{name}</a></td>
                <td>{value}</td>
            </tr>
            {/stock_list}
        </table>
    </div>
    
    <div class="span9">
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
    
    var players = [];
    var stocks =[];
    var pcash = [];
    
    {player_list}players.push({Net});{/player_list}
    {stock_list}stocks.push({Value});{/stock_list}
    {player_list}pcash.push({Cash});{/player_list}
        
    /*
     * color codes the player according to equity and cash
     * green    - highest net worth
     * red      - negative net worth
     */

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
    /*
     * color codes top 3 stocks according to its value
     */
    function colorCodeStocks(id, val)
    {
        var row = document.getElementById(id);
        var pic = document.getElementById(id+'_pic');
        if(stocks[0] === val || stocks[1] === val || stocks[2] === val)
        {
            row.className = "info";
            row.style = "font-weight: bold";
            //pic.innerHTML = '<img src="/assets/images/top_stocks.png" width="25px" height="25px"/>';
        }
    }
    
    {player_list} colorCodePlayers('{Player}', {Net}, {Cash}); {/player_list}
    {stock_list} colorCodeStocks('{Name}', {Value}); {/stock_list}
</script>