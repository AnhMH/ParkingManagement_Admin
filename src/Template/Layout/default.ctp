<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <base href="<?php echo $BASE_URL; ?>"/>
        <link rel="shortcut icon" href="<?php echo $BASE_URL; ?>/favicon.ico"/>
        <title><?php echo isset($seo['title']) ? $seo['title'] : 'Phần mềm quản lý bán hàng'; ?></title>
        <?php echo $this->element('seo_tags'); ?>
        <link href="<?php echo $BASE_URL; ?>/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $BASE_URL; ?>/css/bootstrap-datepicker.css" rel="stylesheet">
        <link href="<?php echo $BASE_URL; ?>/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
        <link href="<?php echo $BASE_URL; ?>/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo $BASE_URL; ?>/css/style.css?<?php echo VERSION_DATE;?>" rel="stylesheet">
        <link href="<?php echo $BASE_URL; ?>/css/jquery-ui.min.css" rel="stylesheet">
        <link href="<?php echo $BASE_URL; ?>/css/jquery.datetimepicker.css" rel="stylesheet">
        
        <script>
            var BASE_URL = '<?php echo $BASE_URL; ?>';
            var controller = '<?php echo $controller; ?>';
            var action = '<?php echo $action; ?>';
            var _csrfToken = '<?php echo $this->request->getParam('_csrfToken');?>';
        </script>
    </head>
    <body>
        <?php echo $this->element('facebook_messenger'); ?>
        <header>
            <?php echo $this->element('header'); ?>
        </header>
        <section class="main" role="main">
            <div class="container-fluid">
                <div class="row">
                    <?php echo $this->element('sidebar'); ?>
                    <div class="main-content">
                        <?php echo $this->element('modal'); ?>
                        <?php echo $this->fetch('content'); ?>
                    </div>
                </div>
            </div>
        </section>
    </body>
    <script src="<?php echo $BASE_URL; ?>/js/jquery.js"></script>
    <script src="<?php echo $BASE_URL; ?>/js/jquery-ui.min.js"></script>
    <script src="<?php echo $BASE_URL; ?>/js/html5shiv.min.js"></script>
    <script src="<?php echo $BASE_URL; ?>/js/respond.min.js"></script>
    <script src="<?php echo $BASE_URL; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo $BASE_URL; ?>/js/jquery.datetimepicker.full.js"></script>
    <script src="<?php echo $BASE_URL; ?>/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo $BASE_URL; ?>/js/bootstrap-datepicker.vi.min.js"></script>
    <script src="<?php echo $BASE_URL; ?>/js/ckeditor.js"></script>
    <script src="<?php echo $BASE_URL; ?>/js/editor.js"></script>
    <script src="<?php echo $BASE_URL; ?>/js/ajax.js?<?php echo VERSION_DATE;?>"></script>
</html>