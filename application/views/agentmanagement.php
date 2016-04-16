<div>
    <div class="btn-group">
        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
            Select Player
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            {players}
            <li><a href="/agentmanagement/{username}">{username}</a></li>
            {/players}
        </ul>

    </div>

    </br>
    <h1>Trading Activity</h1>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Player</th>
            <th>Action</th>
            <th>Stock</th>
        </tr>
        </thead>
        {translist}
        <tr>
            <td>{user}</td>
            <td>{action}</td>
            <td>{stock}</td>
        </tr>
        {/translist}
    </table>
</div>