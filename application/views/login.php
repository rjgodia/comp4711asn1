<div class="row">
    <div class="span12">
        <img id="banner" src="/assets/images/banner.jpg" height="70px"/>
    </div>
    
    <div class="span3">
        <h4>{message}</h4>
        <form id="loginForm" action="/login/verify"  method="post" accept-charset="utf-8">	
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
                        <button onclick="validate()" type="submit" class="btn btn-success">Sign in</button>
                </div>
            </div>
        </form>
        <form action="/register">
            <button class="btn btn-primary">Player Register</button>
        </form>
    </div>
</div>

<script>
    function validate()
    {
        var uname = $("#username").val();
        var pw = $("#password").val();
        
        if(uname.length === 0 || pw.length === 0)
        {
            if(uname.length === 0)
                $("#username").attr("placeholder", "* enter username");
            if(pw.length === 0)
                $("#password").attr("placeholder", "* enter password");
            
            $("#loginForm").attr("onsubmit","return false;");
        }
        else
        {
            $("#loginForm").attr("onsubmit","return true;");
        }
    }
</script>