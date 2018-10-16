<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th class="text-center">Hình ảnh</th>
        <th class="text-center">Mã sản phẩm</th>
        <th class="text-center">Tên sản phẩm</th>
        <th class="text-center">SL bán</th>
        <th class="text-center">Chiết khấu</th>
        <th class="text-center">Tổng tiền</th>
        <th class="text-center ">Tiền vốn</th>
        <th class="text-center ">Lợi nhuận</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($profit)) :
        foreach ($profit as $key => $item) :
            ?>
            <tr>
                <td class="text-center zoomin"><?php echo !empty($item['image']) ? "<img src='{$item['image']}' alt='{$item['name']}'/>" : "-"; ?></td>
                <td class="text-center"><?php echo $item['code']; ?></td>
                <td class="text-center"><?php echo $item['name']; ?></td>
                <td class="text-center"><?php echo $item['qty']; ?></td>
                <td class="text-center"><?php echo number_format($item['coupon']); ?></td>
                <td class="text-center"><?php echo number_format($item['price']); ?></td>
                <td class="text-center"><?php echo number_format($item['origin_price']); ?></td>
                <td class="text-center"><?php echo number_format($item['price']-$item['origin_price']); ?></td>
            </tr>
        <?php endforeach;
    else :
        echo '<tr><td colspan="9" class="text-center">Không có dữ liệu</td></tr>';
    endif;
    ?>
    </tbody>
</table>
