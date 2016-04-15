<h4 style="color:red;">{message}</h4>
<form action="/login/verify"  method="post" accept-charset="utf-8">	
	<div class="control-group">
		<div class="input-prepend">
			<span class="add-on"><i class="icon-user"></i></span>
			<input type="text" id="username" name="username" placeholder="Username">
		</div>
	</div>

	<div class="control-group">
		<div class="input-prepend">
			<span class="add-on"><i class="icon-lock"></i></span>
			<input type="password" id="password" name="password" placeholder="password">
		</div>
	</div>
	
	
	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn btn-primary">Sign in</button>
		</div>
	</div>
</form>

<button class="btn btn-primary"><a href="<?php echo site_url('register'); ?>">Temp Register Button</button>




