<?php echo $this->element('search_box'); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-result">
            <?php
                echo $this->SimpleTable->render($table);
                echo $this->Paginate->render($total, $limit);
            ?>
        </div>
    </div>
</div>
