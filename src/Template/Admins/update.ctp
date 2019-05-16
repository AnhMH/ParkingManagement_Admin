<div class="row">
    <div class="col-md-8">
        <div class="box box-primary box-update">   
            <div class="box-header with-border">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                <h3 class="box-title"></h3>
            </div>
            <div class="box-body">                
                <div class="form-body">
                    <form method="post" enctype="multipart/form-data" accept-charset="utf-8" role="form" autocomplete="off" novalidate="novalidate" action="/admins/update/<?php echo !empty($data['id']) ? $data['id'] : '';?>">
                        <div style="display:none;">
                            <input type="hidden" name="_method" class="form-control" value="POST">
                            <input type="hidden" name="_csrfToken" class="form-control" autocomplete="off" value="<?php echo $this->request->getParam('_csrfToken'); ?>">
                        </div>
                        <input type="hidden" name="id" class="form-control" id="id" value="<?php echo !empty($data['id']) ? $data['id'] : '';?>">
                        <div class="form-group text required">
                            <label class="" for="name">Họ tên<span class="input-required">*</span></label>
                            <input type="text" name="name" class="form-control" id="name" required="required" value="<?php echo !empty($data['name']) ? $data['name'] : '';?>">
                        </div>
                        <div class="form-group text required">
                            <label class="" for="account">Tài khoản<span class="input-required">*</span></label>
                            <input type="text" name="account" class="form-control" id="account" required="required" value="<?php echo !empty($data['account']) ? $data['account'] : '';?>">
                        </div>
                        <div class="form-group text">
                            <label class="" for="pass">Mật khẩu<span class="input-required">*</span></label>
                            <input type="text" name="pass" class="form-control" id="pass" value="<?php echo !empty($data['pass']) ? $data['pass'] : '';?>">
                        </div>
                        <div class="form-group select">
                            <label class="" for="type">Chức vụ<span class="input-required">*</span></label>
                            <select name="type" class="form-control" id="type">
                                <?php if (!empty($types)): ?>
                                <?php foreach ($types as $k => $t): ?>
                                <option value="<?php echo $k;?>" <?php echo !empty($data['type']) && $data['type'] == $k ? 'selected="selected"' : '';?>><?php echo $t;?></option>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group select">
                            <label class="" for="gender">Giới tính</label>
                            <select name="gender" class="form-control" id="gender">
                                <?php foreach ($genders as $k => $v): ?>
                                <option value="<?php echo $k;?>" <?php echo !empty($data['gender']) && $data['gender'] == $k ? 'selected="selected"' : '';?>><?php echo $v;?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group select">
                            <label class="">Chọn công ty - dự án</label>
                        </div>
                        <div class="form-group checkbox">
                            <?php if (!empty($companies)): ?>
                                <?php foreach ($companies as $v): ?>
                                    <?php
                                    $checked = false;
                                    if (!empty($dataCompanies[$v['id']])) {
                                        $checked = true;
                                    }
                                    ?>
                                    <label>
                                        <input type="checkbox" data-id="<?php echo $v['id']; ?>" class="check checkAll checkAll_<?php echo $v['id'];?>" <?php echo !empty($checked) ? "checked='checked'" : ""; ?>> <?php echo $v['name']; ?>
                                    </label>
                                    <?php if (!empty($v['projects'])): ?>
                                    <div class="subCheckbox subCheckbox_<?php echo $v['id']; ?>">
                                        <?php foreach ($v['projects'] as $p): ?>
                                            <label>
                                                <input type="checkbox" data-parent-id="<?php echo $v['id']; ?>" name="project[<?php echo $v['id'];?>][<?php echo $p['id'];?>]" value="1" class="check" <?php echo !empty($dataProjects[$p['id']]) ? "checked='checked'" : ""; ?>> <?php echo $p['name']; ?>
                                            </label>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <div class="form-group button-group">
                            <div class="form-group">
                                <input type="submit" value="Lưu" class="btn btn-primary">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Quay lại" class="btn" onclick="return back();"></div>
                            <div class="cls"></div>
                        </div>
                    </form>
                    <div class="cls"></div>
                </div>            
            </div>
        </div>
    </div>
</div>

