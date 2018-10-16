<option value="0" selected="selected">--Danh mục--</option>
<optgroup label="Chọn danh mục">
    <?php if (!empty($cates)): ?>
    <?php foreach ($cates as $val): ?>
    <option
        value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?>
    </option>
    <?php endforeach; ?>
    <?php endif; ?>
    
</optgroup>
<?php if ($vipType == 99): ?>
<optgroup label="------------------------">
    <option value="product_group" data-toggle="modal" data-target="#list-prd-group">Tạo mới danh
        mục
    </option>
</optgroup>
<?php endif; ?>