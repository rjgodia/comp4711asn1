</br>
<img class="center-block" src="/assets/images/gameimage.jpg"/>
</br>

<h4>Stock Ticker</h4>
StockTicker is a game which simulates buying and selling stocks in a stock
market. An indeterminate number of stocks will see their per share value rise and
fall, under the control of a game engine, the BCIT Stock Exchange (BSX). Each
team's webapp represents a stock brokerage active on the BSX. The object of
the game is for players to build as much equity (stocks and cash) as possible.

</br>

<h4>Stock Ticker Game Play</h4>
Movements are generated periodically, based on stock categories.
Each movement will have a randomly chosen stock of that category, a randomly
chosen action (up, down or div), and a random amount (5, 10 or 20).
If a stock price falls below 0, it is “delisted”. Any holdings in that stock are forfeit,
and the stock price reverts to 100.
If a stock price rises above 200, it is “split”. Any holdings in that stock are
doubled, and the stock price is reset to 100.
If a stock action is a dividend (“div”), said dividend is only paid if the stock is
trading at or above par at that point.
The unit of currency is peanuts.
The next iteration of the game (assignment 2) will incorporate stock certificates.
