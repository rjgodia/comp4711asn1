<div class = "row">
    <div class="span12">
        <img src="/assets/images/banner.jpg" height="70px"/>
    </div>
    
    <div class="span4">
        <h4><u>Stocks Update</u></h4>
    </div>
    <div class="span7">
        <h4><u>Player Standings</u></h4>
    </div>
    <div class="span1">
        <div class="btn-group">
            <button type="button" id="switch" class="btn btn-primary" onclick="change(this.id)">
                <img src="/assets/images/qmark.png" width="25px" height="25px"/>
            </button>
        </div>
    </div>
    
    <div id="col1" class="span4" style="overflow-y: scroll; max-height: 200px; margin-top: 0px">
        <table class="table table-hover">
            <thead>
                <th>Stock</th>
                <th>Value</th>
                <th></th>
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
    
    <div id="col2" class="span8" style="overflow-y: scroll; max-height: 200px; margin-top: 0px">
        <table class="table table-hover">
             <thead>
                <th>Player</th>
                <th>Cash</th>
                <th>Equity</th>
                <th>Net Worth</th>
                <th></th>
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
        </table>
    </div>
    
    <div id="col3" class="span3" style="display: none; overflow-y: scroll; max-height: 200px; margin-top: 0px">
        <table class="table table-hover">
            <thead>
                <th>Legend</th>
                <th></th>
            </thead>
            <tr class="info">
                <td><img src="/assets/images/top_stocks.png" width="25px" height="25px"/></td>
                <td>Top 3 Stocks</td>
            </tr>
            <tr class="success">
                <td><img src="/assets/images/top_player.png" width="25px" height="25px"/></td>
                <td>Highest Player Net Worth</td>
            </tr>
            <tr class="warning">
                <td><img src="/assets/images/top_cash.png" width="25px" height="25px"/></td>
                <td>Highest Player Cash</td>
            </tr>
        </table>
    </div>
    
</div>

<script>
var speed = 250;
function change(id)
{
    var btn = document.getElementById(id);
    if(btn.className === "btn btn-primary")
    {
        $("#col1").hide(speed);
        $("#col1").show(speed);
        
        $("#col2").hide(speed);
        $("#col2").removeClass().addClass("span5");
        $("#col2").show(speed);
        
        $("#col3").show(speed);
        btn.className = "btn btn-secondary";
    }
    else
    {
        $("#col1").hide(speed);
        $("#col1").show(speed);
        
        $("#col2").hide(speed);
        $("#col2").removeClass().addClass("span8");
        $("#col2").show(speed);
        
        $("#col3").hide(speed);
        btn.className = "btn btn-primary";
    }
}

</script>

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
            pic.innerHTML = '<img src="/assets/images/top_stocks.png" width="25px" height="25px"/>';
        }
    }
    
    {player_list} colorCodePlayers('{Player}', {Net}, {Cash}); {/player_list}
    {stock_list} colorCodeStocks('{Name}', {Value}); {/stock_list}
</script>