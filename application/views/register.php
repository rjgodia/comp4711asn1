<div class="row">
    <div class="span12">
        <img id="banner" src="/assets/images/banner.jpg" height="70px"/>
    </div>

    <div class="span4">
        <p class="text-left text-error" id="status">
            <img src="/assets/images/excmark.png" width="25px" height="25px"/>
            Max image size: 1024 x 784
        </p>
    </div>
    <div class="span12"></div>
    <div class="span4">
        <form id="registerForm" action="/Register/registerUser"  method="post" enctype="multipart/form-data">

            <div class="control-group">
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-user"></i></span>
                    <input type="text" id="username" name="username" placeholder="Username">
                </div>
            </div>
            <div class="control-group">
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-lock"></i></span>
                    <input type="password" id="password" name="password" placeholder="Password">
                </div>
            </div>
            <div class="control-group">
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-camera"></i></span>
                    <label class="btn btn-file" for="my-file-selector">
                        <input id="imgupload" name="imgupload" type="file">Avatar Upload
                    </label>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button onclick="validate()" type="submit" class="btn btn-success">Register</button>
                </div>
            </div>
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
                $("#username").attr("placeholder", "* provide a username");
            if(pw.length === 0)
                $("#password").attr("placeholder", "* provide a password");
            
            $("#registerForm").attr("onsubmit","return false;");
        }
        else
        {
            $("#registerForm").attr("onsubmit","return true;");
        }
    }
</script>