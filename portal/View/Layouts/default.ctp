<!--
 * GenesisUI - Bootstrap 4 Admin Template
 * @version v1.8.10
 * @link https://genesisui.com
 * Copyright (c) 2017 creativeLabs Łukasz Holeczek
 * @license https://genesisui.com/license.html
 -->
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from genesisui.com/demo/clever/1.8.10/bootstrap4-static/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Nov 2017 12:21:10 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Clever - Bootstrap 4 Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword"
          content="Bootstrap,Admin,Template,Open,Source,AngularJS,Angular,Angular2,jQuery,CSS,HTML,RWD,Dashboard,Vue,Vue.js,React,React.js">
    <link rel="shortcut icon" href="/img/favicon.png">
    <title>ซื้อขายผลไม้ล่วงหน้า-ออนไลน์</title>

    <!-- Icons -->
    <link href="/vendors/css/font-awesome.min.css" rel="stylesheet">
    <link href="/vendors/css/simple-line-icons.min.css" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="/css/style.css" rel="stylesheet">
    <link href="/js/sweetalert.css" rel="stylesheet">

    <!-- Styles required by this views -->
    <link href="/vendors/css/daterangepicker.min.css" rel="stylesheet">
    <link href="/vendors/css/gauge.min.css" rel="stylesheet">
    <link href="/vendors/css/toastr.min.css" rel="stylesheet">
    <link href="/vendors/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        @media print {
            .no-print, .no-print * {
                display: none !important;
            }
        }

    </style>
</head>

<!-- BODY options, add following classes to body to change options

// Header options
1. '.header-fixed'					- Fixed Header

// Brand options
1. '.brand-minimized'       - Minimized brand (Only symbol)

// Sidebar options
1. '.sidebar-fixed'					- Fixed Sidebar
2. '.sidebar-hidden'				- Hidden Sidebar
3. '.sidebar-off-canvas'		- Off Canvas Sidebar
4. '.sidebar-minimized'			- Minimized Sidebar (Only icons)
5. '.sidebar-compact'			  - Compact Sidebar

// Aside options
1. '.aside-menu-fixed'			- Fixed Aside Menu
2. '.aside-menu-hidden'			- Hidden Aside Menu
3. '.aside-menu-off-canvas'	- Off Canvas Aside Menu

// Breadcrumb options
1. '.breadcrumb-fixed'			- Fixed Breadcrumb

// Footer options
1. '.footer-fixed'					- Fixed footer

-->

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
<?php echo $this->element('common/header') ?>
<div class="app-body">
    <?php echo $this->element('common/sidebar') ?>
    <!-- Main content -->
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
<!--            <li class="breadcrumb-item">Home</li>-->
<!--            <li class="breadcrumb-item"><a href="#">Admin</a></li>-->
<!--            <li class="breadcrumb-item active">Dashboard</li>-->
<!--            <!-- Breadcrumb Menu-->
<!--            <li class="breadcrumb-menu d-md-down-none">-->
<!--                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">-->
<!--                    <a class="btn" href="#"><i class="icon-speech"></i></a>-->
<!--                    <a class="btn" href="index-2.html"><i class="icon-graph"></i> &nbsp;Dashboard</a>-->
<!--                    <a class="btn" href="#"><i class="icon-settings"></i> &nbsp;Settings</a>-->
<!--                </div>-->
<!--            </li>-->
        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <?php echo $this->Session->flash(); ?>

                <?php echo $this->fetch('content'); ?>
            </div>

        </div>
        <!-- /.conainer-fluid -->
    </main>

</div>
<footer class="app-footer no-print">
    <span><a href="https://genesisui.com/">Clever</a> © 2017 creativeLabs.</span>
    <span class="ml-auto">Powered by <a href="https://genesisui.com/">GenesisUI</a></span>
</footer>

<!-- Bootstrap and necessary plugins -->
<script src="/vendors/js/jquery.min.js"></script>
<script src="/vendors/js/popper.min.js"></script>
<script src="/vendors/js/bootstrap.min.js"></script>
<script src="/vendors/js/pace.min.js"></script>

<!-- Plugins and scripts required by all views -->
<script src="/vendors/js/Chart.min.js"></script>

<!-- Clever main scripts -->

<script src="/js/app.js"></script>
<script src="/js/custom.js"></script>
<script src="/js/sweetalert.min.js"></script>
<!-- Plugins and scripts required by this views -->
<script src="/vendors/js/toastr.min.js"></script>
<script src="/vendors/js/gauge.min.js"></script>
<script src="/vendors/js/moment.min.js"></script>
<script src="/vendors/js/daterangepicker.min.js"></script>
<script src="/vendors/js/jquery.dataTables.min.js"></script>
<script src="/vendors/js/dataTables.bootstrap4.min.js"></script>

<!-- Custom scripts required by this view -->
<script src="/js/views/tables.js"></script>
<!-- Custom scripts required by this view -->
<!-- <script src="/js/views/main.js"></script> -->

</body>

<!-- Mirrored from genesisui.com/demo/clever/1.8.10/bootstrap4-static/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Nov 2017 12:21:49 GMT -->
</html>