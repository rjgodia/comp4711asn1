<div>
    <div class="btn-group">
        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
            Select Player
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            {players}
            <li><a href="/profile/{Player}">{Player}</a></li>
            {/players}
        </ul>

    </div>

    </br>
    <h1>Trading Activity</h1>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Date</th>
            <th>Player</th>
            <th>Stock</th>
            <th>Transaction</th>
            <th>Quantity</th>
        </tr>
        </thead>
        {translist}
        <tr>
            <td>{DateTime}</td>
            <td>{Player}</td>
            <td>{Stock}</td>
            <td>{Trans}</td>
            <td>{Quantity}</td>
        </tr>
        {/translist}
    </table>
</div>