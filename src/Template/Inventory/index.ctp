<div class="inventory">
    <div class="inventory-content">
        <div class="product-sear panel-sear">
            <div>
                <div class="form-group col-md-4 padd-0">
                    <input type="text" class="form-control txt-sinventory"
                           placeholder="Nhập tên hoặc mã sản phẩm để tìm kiếm">
                </div>
                <div class="form-group col-md-8 padd-0" style="padding-left: 5px;">
                    <div class="col-md-12 padd-0">
                        <div class="col-md-4">
                            <select class="form-control" id="prd_group_id">
                                <option value="0" selected='selected'>-- Danh mục --</option>
                                <optgroup label="Chọn danh mục">
                                    <?php $cateId = !empty($param['cate_id']) ? $param['cate_id'] : ''; ?>
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
                                <optgroup label="------------------------">
                                </optgroup>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control" id="option_inventory">
                                <option value="0">--Tất cả--</option>
                                <option value="1" selected="selected">Chỉ lấy hàng tồn</option>
                                <option value="2">Hết Hàng</option>
                            </select>
                        </div>
                        <div class="col-md-3" style="padding-left: 5px;">
                            <button style="box-shadow: none;" type="button" class="btn btn-primary btn-large"
                                    onclick="cms_paging_inventory(1)"><i class="fa fa-search"></i> Tìm kiếm
                            </button>
<!--                            <button type="button" class="btn btn-success"  onclick="cms_export_inventory()"><i-->
                            <!--                                    class="fa fa-download"></i> Excel-->
                            <!--                            </button>-->
                        </div>
                    </div>
                    <div class="col-md-1 padd-0" style="padding-left: 1px;">
                    </div>
                </div>
            </div>
        </div>
        <div class="inventory-main-body">
        </div>
    </div>
</div>