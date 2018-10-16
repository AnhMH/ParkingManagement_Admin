<?php if (!empty($suppliers)) : ?>
    <ul class="list-unstyled">
        <?php
        foreach ($suppliers as $key => $val) :
            ?>
            <li style="cursor: pointer;" onclick="cms_selected_mas(<?php echo $val['id']; ?>)">
                <ul class="list-unstyled">
                    <li style="padding: 3px 10px;" class="data-mas-name-<?php echo $val['id']; ?>"><i class="fa fa-user"
                                                                                                      style="color: #0B87C9;"
                                                                                                      aria-hidden="true"></i> <?php echo $val['name']; ?>
                    </li>
                    <li style="padding: 3px 10px;"><i class="fa fa-barcode"
                                                      style="color: #0B87C9;"></i> <?php echo $val['code']; ?>
                    </li>
                    <li style="padding: 3px 10px;"><i class="fa fa-phone" style="color: #0B87C9;"
                                                      aria-hidden="true"></i> <?php echo (!empty($val['phone'])) ? $val['phone'] : 'Không có'; ?>
                    </li>
                </ul>
            </li>
            <hr style="color: #0B87C9; margin: 10px 0;"/>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
