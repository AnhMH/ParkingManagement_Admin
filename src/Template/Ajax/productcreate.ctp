<div class="products">
    <div class="breadcrumbs-fixed panel-action">
        <div class="row">
            <div class="products-act">
                <div class="col-md-4 col-md-offset-2">
                    <div class="left-action text-left clearfix">
                        <h2><i class="fa fa-refresh" style="font-size: 14px; cursor: pointer;"
                               onclick="cms_vcrproduct('1')"></i>Tạo sản phẩm</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-action text-right">
                        <div class="btn-groups">
                            <button type="button" class="btn btn-primary" onclick="<?php echo (!empty($isUpdate) && !empty($product['id'])) ? "cms_update_product({$product['id']})" : "cms_add_product( 'save' )"; ?>;"><i
                                    class="fa fa-check"></i> Lưu
                            </button>
                            <?php if (empty($isUpdate)): ?>
                                <button type="button" class="btn btn-primary "
                                        onclick="cms_add_product('saveandcontinue');"><i class="fa fa-floppy-o"></i> Lưu
                                    và tiếp tục
                                </button>
                            <?php endif; ?>
                            <button type="button" class="btn btn-default"
                                    onclick="cms_javascript_redirect(cms_javascrip_fullURL())"><i
                                    class="fa fa-arrow-left"></i> Trở về
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-space customer"></div>

    <div class="products-content" style="margin-bottom: 25px;">
        <div class="basic-info">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4 padd-0">
                        <h4>Thông tin cơ bản</h4>
                        <small>Nhập tên và các thông tin cơ bản của sản phẩm</small>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="form-group clearfix">
                                <div class="col-md-6 padd-left-0">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" id="prd_name"
                                           value="<?php echo!empty($product['name']) ? $product['name'] . (empty($isUpdate) ? ' -copy' : '') : ''; ?>"
                                           class="form-control"
                                           placeholder="Nhập tên sản phẩm"/>
                                </div>
                                <div class="col-md-6 padd-right-0">
                                    <label>Mã sản phẩm</label>
                                    <input type="text" id="prd_code" class="form-control " <?php echo (!empty($product['code']) && !empty($isUpdate)) ? "disabled value='{$product['code']}'" : ""; ?>
                                           placeholder="Nếu không nhập, hệ thống sẽ tự sinh."/>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <div class="col-md-6 padd-left-0">
                                    <label>Số lượng</label>
                                    <input type="text" id="prd_sls" <?php echo (!empty($isUpdate)) ? "disabled" : ""; ?> value="<?php echo (!empty($product['qty'])) ? $product['qty'] : '0'; ?>" placeholder="0"
                                           class="form-control text-right txtNumber"/>
                                </div>
                                <div class="col-md-6 padd-right-0">
                                    <label class="checkbox" style="display: block;"><input type="checkbox"
                                                                                           id="prd_inventory"
                                                                                           class="checkbox"
                                                                                           name="confirm"
                                                                                           value="1"
                                                                                           <?php echo!empty($product['is_inventory']) ? 'checked="checked"' : '' ?>
                                                                                           ><span></span> Theo dõi tồn kho?</label>
                                    <label class="checkbox"><input type="checkbox"
                                                                   id="prd_allownegative"
                                                                   class="checkbox"
                                                                   name="confirm"
                                                                   value="1"
                                                                   <?php echo !empty($product['is_allow_negative']) ? 'checked="checked"' : ''; ?>>
                                        <span></span> Cho phép bán âm?</label>
                                </div>
                            </div>

                            <div class="form-group clearfix">
                                <div class="col-md-6 padd-left-0">
                                    <label>Giá vốn</label>
                                    <input type="text" id="prd_origin_price"
                                           value="<?php echo!empty($product['origin_price']) ? $product['origin_price'] : '0'; ?>"
                                           class="form-control text-right txtMoney" placeholder="0"/>
                                </div>
                                <div class="col-md-6 padd-right-0">
                                    <label>Giá bán</label>
                                    <input type="text" id="prd_sell_price"
                                           value="<?php echo!empty($product['sell_price']) ? $product['sell_price'] : '0'; ?>"
                                           class="form-control txtMoney text-right" placeholder="0"/>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <div class="col-md-6 padd-left-0">
                                    <label>Danh mục</label>

                                    <div class="<?php echo $vipType == 99 ? 'col-md-11' : 'col-md-12';?> padd-0">
                                        <select class="form-control" id="prd_group_id">
                                            <option value="0" selected="selected">--Danh mục--</option>
                                            <optgroup label="Chọn danh mục">
                                                <?php $cateId = !empty($product['cate_id']) ? $product['cate_id'] : ''; ?>
                                                <?php
                                                if (!empty($cates)):
                                                    foreach ($cates as $key => $item) :
                                                        ?>
                                                        <option <?php if ($cateId == $item['id']) echo 'selected ' ?>
                                                            value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                                                            <?php
                                                        endforeach;
                                                    endif;
                                                    ?>
                                            </optgroup>
                                            <?php if ($vipType == 99): ?>
                                            <optgroup label="------------------------">
                                                <option value="product_group" data-toggle="modal" data-target="#list-prd-group">Tạo mới danh mục</option>
                                            </optgroup>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <?php if ($vipType == 99): ?>
                                    <div class="col-md-1 padd-0">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#list-prd-group"
                                                style="border-radius: 0 3px 3px 0; box-shadow: none;">...
                                        </button>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 padd-20">
                            <div class="jumbotron text-center zoomin" id="img_upload"
                                 style="border-radius: 0; margin-bottom: 10px; padding: 15px 20px;">
                                <?php if (!empty($product['image']) && !empty($isUpdate)): ?>
                                <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                                <?php endif; ?>
                                <h3>Upload hình ảnh sản phẩm</h3>
                                <small style="font-size: 14px; margin-bottom: 25px; display: inline-block;">(Để
                                    tải và hiện thị nhanh, mỗi ảnh lên có dung lượng 500KB. Tải tối đa 10MB.)
                                </small>
                                <center>
                                    <form id="image_upload_form" method="post" enctype="multipart/form-data" action="" autocomplete="off" encoding="multipart/form-data">
                                        <div class="file_input_container">
                                            <div class="upload_button"><input type="file" name="photo" id="photo" class="file_input"></div>
                                        </div>
                                        <br clear="all">
                                    </form>
                                </center>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="expand-info">
            <div class="row">
                <div class="col-md-12">
                    <h4 style="border-bottom: 1px solid #0B87C9; padding-bottom: 10px;"><i
                            class="fa fa-th-large blue"></i> <a style="color: #0B87C9; text-decoration: none;"
                            data-toggle="collapse" href="#collapseproductinfo"
                            aria-expanded="false" aria-controls="collapseExample">Thông
                            tin mở rộng(
                            <small> Nhấn để thêm các thông tin cho thuộc tính web</small>
                            )</a></h4>
                </div>
                <div class="col-md-12">
                    <div style="margin-top: 5px;"></div>
                    <div class="collapse" id="collapseproductinfo">
                        <!--                        <div class="col-md-3 padd-0">-->
                        <!--                            <h4>Mô tả chi tiết</h4>-->
                        <!--                            <small-->
                        <!--                            ">Hình ảnh và mô tả sản phẩm.</small>-->
                        <!--                        </div>-->
                        <div class="col-md-12 padd-20">
                            <h4 style="margin-top: 0;">Mô tả
                                <small style="font-style: italic;">(Nhập thông tin mô tả chi tiết hơn để khách
                                    hàng hiểu hàng hoá của bạn)
                                </small>
                            </h4>
                            <!--                                    <textarea id="ck_editor" id="prd_description"></textarea>-->
                            <div id="ckeditor"><?php echo!empty($product['description']) ? $product['description'] : ''; ?></div>
                        </div>
                        <div class="col-md-3 padd-20">
                            <h4>Thông tin cho web</h4>
                            <small
                                ">Hiện thị trên trang web, tối ưu SEO.</small>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="checkbox-group" style="margin-top: 20px;">
                                    <label class="checkbox"><input type="checkbox" class="checkbox"
                                                                   id="display_website" value="1" <?php echo!empty($product['is_display_web']) ? 'checked' : ''; ?>><span></span> Hiện thị ra
                                        website</label>
                                    <br>
                                    <label class="checkbox"><input type="checkbox" id="prd_highlight"
                                                                   class="checkbox" value="1" <?php echo!empty($product['is_feature']) ? 'checked' : ''; ?>><span></span> Nổi bật</label>&nbsp;&nbsp;<label
                                        class="checkbox"><input type="checkbox" class="checkbox"
                                                            id="prd_new" value="1" <?php echo!empty($product['is_new']) ? 'checked' : ''; ?>><span></span> Hàng mới</label>&nbsp;&nbsp;&nbsp;<label
                                        class="checkbox"><input type="checkbox" class="checkbox"
                                                            id="prd_hot" value="1" <?php echo!empty($product['is_hot']) ? 'checked' : ''; ?>><span></span> Đang bán chạy</label>
                                </div>
                                <div class="form-group">
                                    <label>Seo description</label>
                                    <input type="text" id="seo_description" value="<?php echo !empty($product['seo_description']) ? $product['seo_description'] : ''; ?>"
                                           class="form-control" placeholder="Seo description"/>
                                </div>
                                <div class="form-group">
                                    <label>Seo keywords</label>
                                    <input type="text" id="seo_keyword" value="<?php echo !empty($product['seo_keyword']) ? $product['seo_keyword'] : ''; ?>"
                                           class="form-control" placeholder="Seo keywords"/>
                                </div>
                            </div>
                            <div class="btn-groups pull-right" style="margin-top: 15px;">
                                <button type="button" class="btn btn-primary" onclick="<?php echo (!empty($isUpdate) && !empty($product['id'])) ? "cms_update_product({$product['id']})" : "cms_add_product( 'save' )"; ?>;"><i
                                        class="fa fa-check"></i> Lưu
                                </button>
                                <?php if (empty($isUpdate)): ?>
                                    <button type="button" class="btn btn-primary "
                                            onclick="cms_add_product('saveandcontinue');"><i class="fa fa-floppy-o"></i>
                                        Lưu và tiếp tục
                                    </button>
<?php endif; ?>
                                <button type="button" class="btn btn-default btn-back"
                                        onclick="cms_javascript_redirect(cms_javascrip_fullURL())"><i
                                        class="fa fa-arrow-left"></i> Trở về
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    initSample();
</script>

