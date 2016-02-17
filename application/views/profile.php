<?php
    function view(){
        echo "TEST";
    }
?>
<div>

    <form>
        Select the player who's portfolio you would like to view:
        </br>
        <select name="players">
            {players}
            <option value={Player}>{Player}</option>
            {/players}
        </select>
        </br>
        <input onclick="view()" type="button" value="View">
    </form>
    </br></br>
    <h1>Trading Activity</h1>
    <table style="width: 25%">
        <tr>
            <td>Purchases/Sales:</td>
            <td>Quantity:</td>
        </tr>
        {history}
        <tr>
            <td>{Trans}</td>
            <td>{Quantity}</td>
        </tr>
        {/history}
    </table>
</div>