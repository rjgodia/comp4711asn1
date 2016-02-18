<div class = "row">
    <div class="span12">
        <img src="/assets/images/banner.jpg" height="100px"/>
    </div>
    
    <div class="span4">
        <h4><u>Stocks Update</u></h4>
    </div>
    <div class="span8">
        <h4><u>Player Standings</u></h4>
    </div>
    
    <div class="span4" style="overflow-y: scroll; max-height: 200px;">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Stock</th>
                    <th>Value</th>
                    <th></th>
                </tr>
            </thead>
            {stock_list}
            <tr id="{Name}">
                <td><a href="/history/{Code}">{Name}</a></td>
                <td>{Value}</td>
                <td id="{Name}_pic"></td>
            </tr>
            {/stock_list}
        </table>
    </div>
    
    <div class="span8" style="overflow-y: scroll; max-height: 200px;">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Player</th>
                    <th>Cash</th>
                    <th>Equity</th>
                    <th>Net Worth</th>
                    <th></th>
                </tr>
            </thead>
            {player_list}
            <tr id="{Player}">
                <td><a href="/profile/{Player}">{Player}</a></td>
                <td>{Cash}</td>
                <td id="{Player}_eq">{Equity}</td>
                <td id="{Player}_net">{Net}</td>
                <td id="{Player}_pic"></td>
            </tr>
            {/player_list}
        </table>
    </div>
    
</div>

<script>
    
    var players = [];
    var stocks =[];
    
    {player_list}players.push({Net});{/player_list}
    {stock_list}stocks.push({Value});{/stock_list}
        
    /*
     * color codes the player according to equity and cash
     * green    - highest net worth
     * red      - negative net worth
     */
    
    function colorCodePlayers(id, net)
    {
        var row = document.getElementById(id);
        var pic = document.getElementById(id+'_pic');
        var pnet = document.getElementById(id+'_net');
        
        /* negative net worth */
        if(net <= 0) pnet.style = "color: red";
        
        /* highest cash value player */
        
        if(players.indexOf(net) === 0)
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
        if(stocks.indexOf(val) === 0 || stocks.indexOf(val) === 1 || stocks.indexOf(val) === 2)
        {
            row.className = "info";
            row.style = "font-weight: bold";
            pic.innerHTML = '<img src="/assets/images/top_stocks.png" width="25px" height="25px"/>';
        }
    }
    
    {player_list} colorCodePlayers('{Player}', {Net}); {/player_list}
    {stock_list} colorCodeStocks('{Name}', {Value}); {/stock_list}
</script>