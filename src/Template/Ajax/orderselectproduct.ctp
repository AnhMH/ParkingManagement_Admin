<?php if (!empty($data)): ?>
<tr data-id="<?php echo $data['id']; ?>">
    <td class="text-center seq"><?php echo $param['seq']; ?></td>
    <td><?php echo !empty($data['image']) ? "<div class='zoomin'><img src='{$data['image']}' alt='{$data['name']}'/></div>" : "-"; ?></td>
    <td><?php echo $data['code']; ?></td>
    <td><?php echo $data['name']; ?></td>
    <td class="text-center" style="max-width: 30px;">
        <input style="max-height: 22px;" type="text" class="txtNumber form-control quantity_product_order text-center" value="1">
    </td>
    <td class="text-center price-order"><?php echo !empty($type) ? number_format($data['origin_price']) : number_format($data['sell_price']); ?></td>
    <td style="display: none;"
        class="text-center price-order-hide"><?php echo !empty($type) ? $data['origin_price'] : $data['sell_price']; ?></td>
    <td class="text-center total-money"><?php echo !empty($type) ? $data['origin_price'] : $data['sell_price']; ?></td>
    <td class="text-center"><i class="fa fa-trash-o del-pro-order"></i></td>
</tr>
<?php endif; ?>
