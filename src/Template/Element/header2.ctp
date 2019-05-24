<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <?php echo $this->element('menu'); ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo $BASE_URL; ?>/img/spm_logo_2.png" class="user-image" alt="User Image">
                            <span>SPM group</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo $BASE_URL; ?>/img/spm_logo_2.png" class="img-circle" alt="User Image">

                                <p>
                                    SPM group
                                    <small><?php !empty($AppUI['created']) ? date('Y-m-d', $AppUI['created']) : ''; ?></small>
                                </p>
                                <p><?php echo!empty($AppUI['name']) ? $AppUI['name'] : ''; ?></p>
                            </li>
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-12 text-center">
                                        <p class="headerSelectCustom">Hiển thị công ty - dự án</p>
                                        <select class="headerSelectCustom" id="headerProjectSelect">
                                            <?php if (!empty($AppUI['projects'])): ?>
                                                <?php foreach ($AppUI['projects'] as $p): ?>
                                                    <option value="<?php echo $p['id']; ?>" disabled="disabled"><?php echo $p['name']; ?></option>
                                                    <?php if (!empty($p['data'])): ?>
                                                        <?php foreach ($p['data'] as $v): ?>
                                                            <option value="<?php echo $v['project_id']; ?>" data-company-id="<?php echo $p['id']; ?>" <?php echo!empty($system_project_id) && $system_project_id == $v['project_id'] ? "selected" : ""; ?>>-- <?php echo $v['project_name']; ?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <!--                            <div class="pull-left">
                                                                <a href="<?php echo $BASE_URL; ?>/admins/update/<?php echo $AppUI['id']; ?>" class="btn btn-default btn-flat"><?php echo __('LABEL_UPDATE_PROFILE'); ?></a>
                                                            </div>-->
                                <div class="pull-right">
                                    <a href="<?php echo $BASE_URL; ?>/login/logout" class="btn btn-default btn-flat"><?php echo __('LABEL_SIGN_OUT'); ?></a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</header>
