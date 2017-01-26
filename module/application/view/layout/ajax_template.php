<?php /* @var $this CupRenderer */ ?>
<!DOCTYPE HTML>
<html>
    <head>
        <title><?= $this->getTituloSite() ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="content-language" content="pt-br">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>

        <link href="<?= $this->getPublicAssetsUrl() ?>//css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= $this->getPublicAssetsUrl() ?>//css/bxslider.css" rel="stylesheet">
        <link href="<?= $this->getPublicAssetsUrl() ?>//js/fancybox/fancybox.css" rel="stylesheet">
        <link href="<?= $this->getPublicAssetsUrl() ?>//css/datepicker.css" rel="stylesheet">
        <link href="<?= $this->getPublicAssetsUrl() ?>//css/main.css" rel="stylesheet">

        <link rel="shortcut icon" href="<?= $this->getPublicAssetsUrl() ?>//images/favicon.ico" />
        <link rel="apple-touch-icon" href="<?= $this->getPublicAssetsUrl() ?>//images/favicon.png" />

        <script type="text/javascript" src="<?= $this->getPublicAssetsUrl() ?>//js/jquery.js"></script>
        <script type="text/javascript" src="<?= $this->getPublicAssetsUrl() ?>//js/bxslider.js"></script>

        <script type="text/javascript">
            jQuery(function ($) {
                $(window).load(function () {
                    //Slider
                    $('.bxslider').bxSlider({
                        controls: false,
                        adaptiveHeight: false,
                        auto: true,
                        mode: 'fade',
                        pause: 8000,
                        onSlideBefore: function (currentSlideNumber, totalSlideQty, currentSlideHtmlObject) {
                            $('.bxslider > div').removeClass('active-slide');
                            $('.bxslider > div').eq(currentSlideHtmlObject).addClass('active-slide')
                        },
                        onSliderLoad: function () {
                            $(".bxslider").css("visibility", "visible");
                            $(".bxslider").css("overflow", "visible");
                            $(".bxslider").animate({height: "100%"}, 500);
                            $('.bxslider > div').eq(0).addClass('active-slide');
                        }
                    });
                });
            });
        </script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        
        <section role="main">
            <?php echo $conteudo; ?>
        </section>

        

        <script type="text/javascript" src="<?= $this->getPublicAssetsUrl() ?>//js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?= $this->getPublicAssetsUrl() ?>//js/fancybox/fancybox.js"></script>
        <script type="text/javascript" src="<?= $this->getPublicAssetsUrl() ?>//js/maskedinput.js"></script>
        <script type="text/javascript" src="<?= $this->getPublicAssetsUrl() ?>//js/validator.js"></script>
        <script type="text/javascript" src="<?= $this->getPublicAssetsUrl() ?>//js/nicescroll.js"></script>
        <script type="text/javascript" src="<?= $this->getPublicAssetsUrl() ?>//js/datepicker.js"></script>
        <script type="text/javascript" src="<?= $this->getPublicAssetsUrl() ?>//js/main.js"></script>
    </body>
</html>