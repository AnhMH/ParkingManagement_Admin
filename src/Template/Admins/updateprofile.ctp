<div class="row">
    <div class="col-sm-12 col-md-8">      
        <form method="post" enctype="multipart/form-data" accept-charset="utf-8" role="form" autocomplete="off" novalidate="novalidate" action="/admins/updateprofile">
            <div style="display:none;">
                <input type="hidden" name="_method" class="form-control" value="POST">
                <input type="hidden" name="_csrfToken" class="form-control" autocomplete="off" value="<?php echo $this->request->getParam('_csrfToken');?>">
            </div>
            <input type="hidden" name="id" class="form-control" id="id">
            <div class="form-group text required">
                <label class="" for="name">Tên</label>
                <input type="text" name="name" value="<?php echo !empty($AppUI['name']) ? $AppUI['name'] : ''; ?>" class="form-control" id="name" readonly="readonly" required="required">
            </div>
            <div class="form-group email required">
                <label class="" for="email">Email</label>
                <input type="email" name="email" value="<?php echo !empty($AppUI['email']) ? $AppUI['email'] : ''; ?>" class="form-control" id="email" readonly="readonly" required="required">
            </div>
            <div class="form-group tel">
                <label class="" for="tel">Số điện thoại</label>
                <input type="tel" name="tel" value="<?php echo !empty($AppUI['tel']) ? $AppUI['tel'] : ''; ?>" class="form-control" id="tel">
            </div>
            <div class="form-group text">
                <label class="" for="address">Địa chỉ</label>
                <input type="text" name="address" value="<?php echo !empty($AppUI['address']) ? $AppUI['address'] : ''; ?>" class="form-control" id="address">
            </div>
            <div class="form-group text">
                <label class="" for="facebook">Facebook</label>
                <input type="text" name="facebook" value="<?php echo !empty($AppUI['facebook']) ? $AppUI['facebook'] : ''; ?>" class="form-control" id="facebook">
            </div>
            <div class="form-group button-group">
                <div class="form-inline">
                    <input type="submit" value="Lưu" class="btn btn-success">
                    <a href="<?php echo $BASE_URL; ?>" class="btn btn-primary">Quay lại</a>
                </div>
                <div class="cls"></div>
            </div>
        </form>
    </div>
</div>
