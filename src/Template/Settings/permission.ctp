<div class="row">
    <div class="col-md-8">
        <div class="box box-primary box-update">   
            <div class="box-header with-border">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                <h3 class="box-title"></h3>
            </div>
            <div class="box-body">                
                <div class="form-body">
                    <form method="post" enctype="multipart/form-data" accept-charset="utf-8" role="form" autocomplete="off" novalidate="novalidate" action="/settings/permission/<?php echo $type; ?>">
                        <div style="display:none;">
                            <input type="hidden" name="_method" class="form-control" value="POST">
                            <input type="hidden" name="_csrfToken" class="form-control" autocomplete="off" value="<?php echo $this->request->getParam('_csrfToken'); ?>">
                        </div>
                        <div class="form-group select">
                            <label class="" for="vehicle_id"><?php echo __('LABEL_ADMIN_TYPE'); ?></label>
                            <?php if (!empty($adminType)): ?>
                                <select name="type" class="form-control" id="permissionType">
                                    <?php foreach ($adminType as $k => $v): ?>
                                        <option value="<?php echo $k; ?>" <?php echo ($k == $type) ? 'selected="selected"' : ''; ?>><?php echo $v; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            <?php endif; ?>
                        </div>
                        <div class="form-group checkbox">
                            <?php if (!empty($permission)): ?>
                                <?php foreach ($permission as $k => $v): ?>
                                    <?php
                                    $checked = false;
                                    foreach ($v['detail'] as $dk => $dv) {
                                        if (!empty($detail[$dk])) {
                                            $checked = true;
                                            break;
                                        }
                                    }
                                    ?>
                                    <label>
                                        <input type="checkbox" data-id="<?php echo $k; ?>" class="check checkAll checkAll_<?php echo $k;?>" <?php echo!empty($checked) ? "checked='checked'" : ""; ?>> <?php echo $v['title']; ?>
                                    </label>
                                    <div class="subCheckbox subCheckbox_<?php echo $k; ?>">
                                        <?php foreach ($v['detail'] as $dk => $dv): ?>
                                            <label>
                                                <input type="checkbox" data-parent-id="<?php echo $k; ?>" name="<?php echo $dk; ?>" value="1" class="check" <?php echo!empty($detail[$dk]) ? "checked='checked'" : ''; ?>> <?php echo $dv; ?>
                                            </label>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <div class="form-group button-group">
                            <div class="form-group">
                                <input type="submit" value="Lưu" class="btn btn-primary">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Quay lại" class="btn" onclick="return back();">
                            </div>
                            <div class="cls"></div>
                        </div>
                    </form>
                    <div class="cls"></div>
                </div>            
            </div>
        </div>
    </div>
</div>
