<script>	
	function generate()
	{
			var x = document.getElementById("number");
			x.innerHTML=Math.floor((Math.random()*6+1));
	}
	
</script>

Put game play stuff here
</br>

<button onclick="generate()" type="button" name="buttonpassvalue" id="random">ROLL DIE</button>

<div id="number"></div>//<--THIS IS WHERE YOUR ROLL IS PLACED