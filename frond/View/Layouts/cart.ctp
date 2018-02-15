<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from diamondcreative.net/plus-v1.3.0/home-v7.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Jul 2017 13:26:05 GMT -->
<head>
    <title>Phonlamai.com - ตลาดขายผลไม้ออนไลน์</title>
    <meta charset="utf-8">
    <meta name="description" content="Phonlamai.com - ตลาดขายผลไม้ออนไลน์">
    <meta name="author" content="Diamant Gjota" />
    <meta name="keywords" content="plus, html5, css3, template, ecommerce, e-commerce, bootstrap, responsive, creative" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!--Favicon-->
    <link rel="shortcut ic3on" href="/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/img/favicon.ico" type="image/x-icon">

    <!-- css files -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/owl.carousel.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/owl.theme.default.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="/css/swiper.css" />
    <link href="/js/sweetalert.css" rel="stylesheet">

    <!-- this is default skin you can replace that with: dark.css, yellow.css, red.css ect -->
    <link id="pagestyle" rel="stylesheet" type="text/css" href="/css/default.css" />

    <!-- Google fonts -->
<!--    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">-->
<!--    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">-->
<!--    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">-->
    <style>
        .bs-wizard {margin-top: 40px;}

        /*Form Wizard*/
        .bs-wizard {border-bottom: solid 1px #e0e0e0; padding: 0 0 10px 0;}
        .bs-wizard > .bs-wizard-step {padding: 0; position: relative;}
        .bs-wizard > .bs-wizard-step + .bs-wizard-step {}
        .bs-wizard > .bs-wizard-step .bs-wizard-stepnum {color: #595959; font-size: 16px; margin-bottom: 5px;}
        .bs-wizard > .bs-wizard-step .bs-wizard-info {color: #999; font-size: 14px;}
        .bs-wizard > .bs-wizard-step > .bs-wizard-dot {position: absolute; width: 30px; height: 30px; display: block; background: #37effb; top: 45px; left: 50%; margin-top: -15px; margin-left: -15px; border-radius: 50%;}
        .bs-wizard > .bs-wizard-step > .bs-wizard-dot:after {content: ' '; width: 14px; height: 14px; background: #fb4c45; border-radius: 50px; position: absolute; top: 8px; left: 8px; }
        .bs-wizard > .bs-wizard-step > .progress {position: relative; border-radius: 0px; height: 8px; box-shadow: none; margin: 20px 0;}
        .bs-wizard > .bs-wizard-step > .progress > .progress-bar {width:0px; box-shadow: none; background: #fb4c45;}
        .bs-wizard > .bs-wizard-step.complete > .progress > .progress-bar {width:100%;}
        .bs-wizard > .bs-wizard-step.active > .progress > .progress-bar {width:50%;}
        .bs-wizard > .bs-wizard-step:first-child.active > .progress > .progress-bar {width:0%;}
        .bs-wizard > .bs-wizard-step:last-child.active > .progress > .progress-bar {width: 100%;}
        .bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot {background-color: #f5f5f5;}
        .bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot:after {opacity: 0;}
        .bs-wizard > .bs-wizard-step:first-child  > .progress {left: 50%; width: 50%;}
        .bs-wizard > .bs-wizard-step:last-child  > .progress {width: 50%;}
        .bs-wizard > .bs-wizard-step.disabled a.bs-wizard-dot{ pointer-events: none; }
        /*END Form Wizard*/
    </style>
</head>
<body>
<?php echo $this->element('common/header') ?>
<!-- start section -->
<section class="section white-backgorund">
    <div class="container">
        <div class="row">
                <?php echo $this->element('common/sidebar') ?>
            <div class="col-sm-9">
                <?php echo $this->fetch('content'); ?>
            </div>
        </div>

    </div><!-- end container -->
</section>
<!-- end section -->


<!-- start section -->

<!-- end section -->

<!-- start footer -->
<?php echo $this->element('common/footer') ?>
<!-- end footer -->

<?php echo $this->element('common/modal') ?>
<!-- JavaScript Files -->
<script type="text/javascript" src="/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/js/jquery.downCount.js"></script>
<script type="text/javascript" src="/js/nouislider.min.js"></script>
<script type="text/javascript" src="/js/jquery.sticky.js"></script>
<script type="text/javascript" src="/js/pace.min.js"></script>
<script type="text/javascript" src="/js/star-rating.min.js"></script>
<script type="text/javascript" src="/js/wow.min.js"></script>
<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>-->
<script type="text/javascript" src="/js/gmaps.js"></script>
<script type="text/javascript" src="/js/custom.js"></script>
<script src="/js/sweetalert.min.js"></script>

<!-- Initialize Swiper slide -->
<script>
    // var swiperH = new Swiper('.swiper-coverflow', {
    //     pagination: '.swiper-pagination',
    //     nextButton: '.swiper-button-next',
    //     prevButton: '.swiper-button-prev',
    //     paginationClickable: true,
    //     effect: 'coverflow',
    //     centeredSlides: true,
    //     slidesPerView: 'auto',
    //     loop: true,
    //     coverflow: {
    //         rotate: 50,
    //         stretch: 0,
    //         depth: 100,
    //         modifier: 1,
    //         slideShadows : true
    //     }
    // });
</script>

</body>

<!-- Mirrored from diamondcreative.net/plus-v1.3.0/home-v7.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Jul 2017 13:27:28 GMT -->
</html>