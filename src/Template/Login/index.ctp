
<div class="login-conatainer">
    <div class="login_logo">
        <img src="<?php echo $BASE_URL;?>/img/login_img_top.png" width="76px"/>
    </div>
    <!-- /.login-logo -->
    <div class="login_body">
        <p class="login_msg">Welcome</p>

        <form action="<?php echo $BASE_URL; ?>/login" method="post">
            <input type="hidden" name="_csrfToken" value="<?php echo $this->request->getParam('_csrfToken'); ?>"/>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="User" required="required" name="account" value="<?php echo !empty($data['account']) ? $data['account'] : ''; ?>"/>
                <span class="form-control-feedback form_input_user"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" required="required" name="password" value="<?php echo !empty($data['password']) ? $data['password'] : ''; ?>">
                <span class="form-control-feedback form_input_pass"></span>
            </div>
            <div class="checkbox icheck" style="margin-left: 20px;">
                <label>
                    <input type="checkbox" name="remembera" value="1"/> Remember Me
                </label>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-flat btn-login">LOGIN</button>
                <!-- /.col -->
            </div>
        </form>
        <div class="login_logo logo_bottom">
            <img src="<?php echo $BASE_URL;?>/img/login_img_bottom.png" width="125px"/>
        </div>
    </div>
    
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<div class="login-footer"><b>SPM</b> - SMART PARKING MANAGEMENT</div>
