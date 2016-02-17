<div class = "row">
    <div class="span3">
        <table class="table table-hover">
            <tr>
                <th>Stock</th>
                <th>Value</th>
            </tr>
            {stock_list}
            <tr>
                <td>{Code}</td>
                <td>{Value}</td>
            </tr>
            {/stock_list}
        </table>
    </div>
    
    <div class="span9">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Player</th>
                    <th>Cash</th>
                    <th>Equity<th>
                </tr>
            </thead>
            {player_list}
            <tr>
                <td><a href="#">{Player}</a></td>
                <td>{Cash}</td>
                <td>{Equity}</td>
            </tr>
            {/player_list}
        </table>
    </div>
</div>