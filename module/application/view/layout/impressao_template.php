<?php /* @var $this SiteController */ ?>
<!DOCTYPE HTML>
<html>
    <head>
        <?= $this->metatags() ?>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="content-language" content="pt-br">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700' rel='stylesheet' type='text/css'>
        <link href="<?= $this->getPublicAssetsUrl() ?>//css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= $this->getPublicAssetsUrl() ?>//css/bootstrap-datepicker3.min.css" rel="stylesheet">
        <link href="<?= $this->getPublicAssetsUrl() ?>//js/fancybox/fancybox.css" rel="stylesheet">
        <link href="<?= $this->getPublicAssetsUrl() ?>//css/datepicker.css" rel="stylesheet">
        <link href="<?= $this->getPublicAssetsUrl() ?>//css/main.css" rel="stylesheet">
        <link rel="shortcut icon" href="<?= $this->getPublicAssetsUrl() ?>//images/logo.png">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body onload="javascript:window.print();">
        <?php echo $conteudo; ?>
    </body>
</html>