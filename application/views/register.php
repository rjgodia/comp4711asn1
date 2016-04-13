</br></br>

<form action="/Register/registerUser"  method="post" enctype="multipart/form-data">
    
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
        <div class="input-prepend">
            <span class="add-on"><i class="icon-camera"></i></span>
            <input type="file" id="imgupload" name="imgupload" placeholder="image">
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
                <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </div>
</form>