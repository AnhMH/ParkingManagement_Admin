<?php
$searchBoxClass = empty($showSearchBox) ? 'collapsed-box' : '';
$searchBoxBtn = empty($showSearchBox) ? 'fa-plus' : 'fa-minus';
?>
<div class="box box-primary box-search <?php echo $searchBoxClass;?>">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo __('LABEL_SEARCH') ?></h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa <?php echo $searchBoxBtn;?>"></i></button>
        </div>
    </div>
    <div class="box-body">
        <?php echo $this->SimpleForm->render($searchForm); ?>
    </div>
</div>
