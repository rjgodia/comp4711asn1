<div class = "row">
    
    <div class="span9">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Player</th>
                    <th>Cash</th>
                    <th>Equity<th>
                </tr>
            </thead>
            {player_list}
            <tr>
                <td><a href="/profile">{Player}</a></td>
                <td>{Cash}</td>
                <td>{Equity}</td>
            </tr>
            {/player_list}
        </table>
    </div>
        
    <div class="span3">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Stock</th>
                    <th>Value</th>
                </tr>
            </thead>
            {stock_list}
            <tr>
                <td><a href="/history/{Code}">{Name}</a></td>
                <td>{Value}</td>
            </tr>
            {/stock_list}
        </table>
    </div>

</div>