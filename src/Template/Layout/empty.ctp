<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base href="<?php echo $BASE_URL; ?>"/>
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title><?php echo 'Phần mềm quản lý bán hàng'; ?></title>
        
        <?php echo $this->element('seo_tags'); ?>

        <!-- Bootstrap -->
        <link href="<?php echo $BASE_URL; ?>/css/login.css?<?php echo VERSION_DATE;?>" rel="stylesheet">
    </head>
    <body>
        <?php echo $this->element('facebook_messenger'); ?>
        <?php echo $this->Flash->render() ?>
        <?php echo $this->fetch('content'); ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
        <script src="<?php echo $BASE_URL; ?>/js/login.js?<?php echo VERSION_DATE;?>"></script>
    </body>
</html>