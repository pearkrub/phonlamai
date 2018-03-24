<!DOCTYPE html>
<html class=" ">

<!-- Mirrored from jaybabani.com/complete-admin/v4.2/preview/fullmenu/index-ecommerce.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Jul 2017 14:08:42 GMT -->
<head>
    <!--
     * @Package: Complete Admin - Responsive Theme
     * @Subpackage: Bootstrap
     * @Version: 2.2
     * This file is part of Complete Admin Theme.
    -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <meta charset="utf-8"/>
    <title>Admin : Phonlamai.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <link rel="shortcut icon" href="/assets/images/favicon.png" type="image/x-icon"/>    <!-- Favicon -->
    <link rel="apple-touch-icon-precomposed" href="/assets/images/apple-touch-icon-57-precomposed.png">
    <!-- For iPhone -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/images/apple-touch-icon-114-precomposed.png">
    <!-- For iPhone 4 Retina display -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/images/apple-touch-icon-72-precomposed.png">
    <!-- For iPad -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/images/apple-touch-icon-144-precomposed.png">
    <!-- For iPad Retina display -->


    <!-- CORE CSS FRAMEWORK - START -->
    <link href="/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css"/>
    <!-- CORE CSS FRAMEWORK - END -->
    <link href="/css/sweetalert2.min.css" rel="stylesheet" type="text/css"/>
    <!-- HEADER SCRIPTS INCLUDED ON THIS PAGE - START -->


    <link href="/assets/plugins/morris-chart/css/morris.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="/assets/plugins/jquery-ui/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css"
          media="screen"/>

    <!-- HEADER SCRIPTS INCLUDED ON THIS PAGE - END -->

    <link href="/assets/plugins/datatables/css/jquery.dataTables.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="/assets/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.min.css" rel="stylesheet"
          type="text/css" media="screen"/>
    <link href="/assets/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet"
          type="text/css" media="screen"/>
    <link href="/assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet"
          type="text/css" media="screen"/>

    <!-- CORE CSS TEMPLATE - START -->
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/responsive.css" rel="stylesheet" type="text/css"/>
    <!-- CORE CSS TEMPLATE - END -->

</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class=" "><!-- START TOPBAR -->
<?php echo $this->element('common/header') ?>
<!-- END TOPBAR -->
<!-- START CONTAINER -->
<div class="page-container row-fluid container-fluid">

    <!-- SIDEBAR - START -->

    <?php echo $this->element('common/sidebar') ?>
    <!--  SIDEBAR - END -->
    <!-- START CONTENT -->
    <section id="main-content" class=" ">
        <section class="wrapper main-wrapper row" style=''>

            <div class='col-xs-12'>
                <div class="page-title">

                    <!--<div class="pull-left">
                         PAGE HEADING TAG - START <h1 class="title">ฟามโชคชัย</h1> PAGE HEADING TAG - END
                    </div>
                    -->


                </div>
            </div>
            <div class="clearfix"></div>
            <!-- MAIN CONTENT AREA STARTS -->


            <?php echo $this->Session->flash(); ?>

            <?php echo $this->fetch('content'); ?>


            <!-- MAIN CONTENT AREA ENDS -->
        </section>
    </section>
    <!-- END CONTENT -->


    <div class="chatapi-windows ">


    </div>
</div>
<!-- END CONTAINER -->
<!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->


<!-- CORE JS FRAMEWORK - START -->
<script src="/assets/js/jquery-1.11.2.min.js" type="text/javascript"></script>
<script src="/assets/js/jquery.easing.min.js" type="text/javascript"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script>
<script src="/assets/plugins/viewport/viewportchecker.js" type="text/javascript"></script>
<script>window.jQuery || document.write('<script src="/assets/js/jquery-1.11.2.min.js"><\/script>');</script>
<!-- CORE JS FRAMEWORK - END -->


<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->

<script src="/assets/plugins/jquery-ui/smoothness/jquery-ui.min.js" type="text/javascript"></script>
<script src="/assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="/assets/js/chart-sparkline.js" type="text/javascript"></script>
<script src="/assets/plugins/easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>

<script src="/assets/plugins/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="/assets/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
<script src="/assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="/assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>

<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->

<!--<script src="/assets/plugins/morris-chart/js/raphael-min.js" type="text/javascript"></script>-->
<!--<script src="/assets/plugins/morris-chart/js/morris.min.js" type="text/javascript"></script>-->
<!--<script src="/assets/js/eco-dashboard.js" type="text/javascript"></script>-->
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->


<!-- CORE TEMPLATE JS - START -->
<script src="/assets/js/scripts.js" type="text/javascript"></script>
<!-- END CORE TEMPLATE JS - END -->
<script src="/js/sweetalert2.min.js" type="text/javascript"></script>

<!-- General section box modal start -->
<div class="modal" id="section-settings" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog animated bounceInDown">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Section Settings</h4>
            </div>
            <div class="modal-body">

                Body goes here...

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                <button class="btn btn-success" type="button">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- modal end -->
</body>

<!-- Mirrored from jaybabani.com/complete-admin/v4.2/preview/fullmenu/index-ecommerce.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Jul 2017 14:08:42 GMT -->
</html>


<script type="text/javascript">


</script>