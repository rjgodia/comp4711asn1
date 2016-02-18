<div class = "row">
    <div class="span12">
        <img src="/assets/images/banner.jpg"/>
    </div>
    <div class="span3">
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
    
    <div class="span9">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Stock</th>
                    <th>Value</th>
                    <th>Equity</th>
                    <th></th>
                </tr>
            </thead>
            {player_list}
            <tr id="{Player}">
                <td><a href="/profile">{Player}</a></td>
                <td>{Cash}</td>
                <td id="{Player}_eq">{Equity}</td>
                <td id="{Player}_pic"></td>
            </tr>         
            {/player_list}
        </table>
    </div>
    
</div>

<script>
    
    var players = [];
    var stocks =[];
    
    {player_list}players.push({Cash});{/player_list}
    {stock_list}stocks.push({Value});{/stock_list}
        
    /*
     * color codes the player according to equity and cash
     * green - highest cash
     * red - negative equity
     */
    function colorCodePlayers(id, eq, cash)
    {
        var row = document.getElementById(id);
        var pic = document.getElementById(id+'_pic');
        var peq = document.getElementById(id+'_eq');
        
        if(players.indexOf(cash) === 0)
        {
            row.className = "success";
            row.style = "font-weight: bold";
            pic.style = "text-style: left";
            pic.innerHTML = '<img src="/assets/images/top_player.png" width="25px" height="25px"/>';
        }
        if(eq < 0)
            peq.style = "color: red";
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
    {player_list} colorCodePlayers('{Player}', {Equity}, {Cash}); {/player_list}
    {stock_list} colorCodeStocks('{Name}', {Value}); {/stock_list}
</script>