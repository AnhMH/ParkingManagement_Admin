
<div class="login-box">
    <div class="login-logo">
        <a href="javascript::void()"><b>Parking</b>Management</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="<?php echo $BASE_URL; ?>/login" method="post">
            <input type="hidden" name="_csrfToken" value="<?php echo $this->request->getParam('_csrfToken'); ?>"/>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Account" required="required" name="account" value="<?php echo !empty($data['account']) ? $data['account'] : ''; ?>"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" required="required" name="password" value="<?php echo !empty($data['password']) ? $data['password'] : ''; ?>">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
<!--                <div class="col-xs-8">
                    <div class="checkbox icheck" style="margin-left: 20px;">
                        <label>
                            <input type="checkbox" name="remembera" value="1"/> Remember Me
                        </label>
                    </div>
                </div>-->
                <div class="col-xs-4 col-xs-offset-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
