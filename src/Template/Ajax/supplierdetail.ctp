<div class="breadcrumbs-fixed panel-action">
    <div class="row">
        <div class="customer-act act">
            <div class="col-md-4 col-md-offset-2">
                <div class="left-action text-left clearfix">
                    <h2>Thông tin Nhà cung cấp</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="right-action text-right">
                    <div class="btn-groups">
                        <button type="button" class="btn btn-primary btn-hide-edit" onclick="cms_edit_cusitem('sup')">
                            <i class="fa fa-pencil-square-o"></i> sửa
                        </button>
                        <button type="button" class="btn btn-default btn-hide-edit"
                                onclick="cms_javascript_redirect(cms_javascrip_fullURL())"><i
                                class="fa fa-arrow-left"></i> Trở về
                        </button>
                        <button type="button" class="btn btn-primary btn-show-edit" style="display:none;"
                                onclick="cms_save_edit_sup()"><i class="fa fa-check"></i> Lưu
                        </button>
                        <button type="button" class="btn btn-default btn-show-edit" style="display:none;"
                                onclick="cms_undo_cusitem('sup')"><i class="fa fa-undo"></i> Hủy
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main-space customer"></div>

<div class="supplier-info col-md-12">
    <?php if (!empty($supplier)) : ?>
        <div id="item-<?php echo $supplier['id']; ?>" class="supplier-inner tr-item-sup">
            <div class="col-md-12" style="margin-bottom: 10px;">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 padd-0">Tên NCC</label>
                        <div class="col-md-8">
                            <?php echo $supplier['name']; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 padd-0">Mã NCC</label>

                        <div class="col-md-8">
                            <?php echo $supplier['code']; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin-bottom: 10px;">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 padd-0">Điện thoại</label>

                        <div class="col-md-8">
                            <?php echo ($supplier['phone'] != '') ? $supplier['phone'] : '(chưa có)'; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 padd-0">Email</label>

                        <div class="col-md-8">
                            <?php echo ($supplier['email'] != '') ? $supplier['email'] : '(chưa có)'; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin-bottom: 10px;">
                <!--                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-4 padd-0">Mã số thuế</label>
                
                                        <div class="col-md-8">
                <?php echo!empty($supplier['tax_code']) ? $supplier['tax_code'] : '(chưa có)'; ?>
                                        </div>
                                    </div>
                                </div>-->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 padd-0">Địa chỉ</label>

                        <div class="col-md-8">
                            <?php echo ($supplier['address'] != '') ? $supplier['address'] : '(chưa có)'; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 padd-0">Ghi chú</label>

                        <div class="col-md-8">
                            <?php echo ($supplier['notes'] != '') ? $supplier['notes'] : '(chưa có)'; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="supplier-inner tr-edit-item-sup" style="display: none;">
            <div class="col-md-12" style="margin-bottom: 10px;">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 padd-0">Tên NCC</label>
                        <div class="col-md-8">
                            <input type="text" id="supplier_name" class="form-control"
                                   value="<?php echo!empty($supplier['name']) ? $supplier['name'] : ''; ?>">
                            <span style="color: red;" class="error error-supplier_name"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 padd-0">Mã NCC</label>
                        <div class="col-md-8">
                            <?php echo!empty($supplier['code']) ? $supplier['code'] : ''; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin-bottom: 10px;">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 padd-0">Điện thoại</label>

                        <div class="col-md-8">
                            <input type="text" id="supplier_phone" class="form-control"
                                   value="<?php echo!empty($supplier['phone']) ? $supplier['phone'] : ''; ?>">
                            <span style="color: red;" class="error error-supplier_phone"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 padd-0">Email</label>
                        <div class="col-md-8">
                            <input type="text" id="supplier_email" class="form-control"
                                   value="<?php echo!empty($supplier['email']) ? $supplier['email'] : ''; ?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12" style="margin-bottom: 10px;">
                <!--                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-4 padd-0">Mã số thuế</label>
                
                                        <div class="col-md-8">
                                            <input type="text" id="tax_code" class="form-control"
                                                   value=" <?php echo!empty($supplier['tax_code']) ? $supplier['tax_code'] : ''; ?>">
                                        </div>
                                    </div>
                                </div>-->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 padd-0">Địa chỉ</label>

                        <div class="col-md-8">
                            <textarea id="supplier_addr"
                                      class="form-control"><?php echo!empty($supplier['address']) ? $supplier['address'] : ''; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 padd-0">Ghi chú</label>

                        <div class="col-md-8">
                            <textarea id="notes"
                                      class="form-control"><?php echo!empty($supplier['notes']) ? $supplier['notes'] : ''; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    else:
    endif;
    ?>
</div>
<div><h2 id="input_info"></h2>
</div>
<div class="inputs-main-body">
</div>
<!--<script>cms_paging_input_by_supplier_id(1);</script>-->