<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>NTTドコモ｜家のあんしんパートナー　</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!--base css styles-->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/normalize/normalize.css">
    <!--page specific css styles-->
    <!--base js style-->
    
    <!--end js file-->
    <!--flaty css styles-->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/flaty.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/flaty-responsive.css">
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/img/favicon.png">
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/modernizr/modernizr-2.6.2.min.js"></script>


    <!-- MOVE FROM BOTTOM -->


</head>
<body>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->

<!-- BEGIN Navbar -->
<div id="navbar" class="navbar">
    <div class="navbar-inner">
        <div class="container-fluid">
            <!-- BEGIN Brand -->
            <a href="<?php echo Yii::app()->createUrl('index') ?>" class="brand">
                <small>
                    NTTドコモ　家のあんしんパートナー　顧客管理
                </small>
            </a>
            <!-- END Brand -->

            <!-- BEGIN Responsive Sidebar Collapse -->
            <a href="#" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
                <i class="icon-reorder"></i>
            </a>
            <!-- END Responsive Sidebar Collapse -->

            <!-- BEGIN Navbar Buttons -->
            <ul class="nav flaty-nav pull-right">
                <!-- BEGIN Button User -->
                <li class="user-profile">
                    <a class="user-menu">
                        <i class="icon-user"></i>
                        <span>
                            <?php echo Yii::app()->user->user_name ?>
                        </span>
                    </a>
                    </li>
                <li class="user-profile">
                    <a href="<?php echo Yii::app()->createUrl('logout'); ?>" class="user-menu">
                        <span>
                            ログアウト
                        </span>
                    </a>
                </li>
                <!-- END Button User -->
            </ul>
            <!-- END Navbar Buttons -->
        </div>
        <!--/.container-fluid-->
    </div>
    <!--/.navbar-inner-->
</div>
<!-- END Navbar -->

<!-- BEGIN Container -->
<div class="container-fluid" id="main-container">
    <!-- BEGIN Sidebar -->
    <div id="sidebar" class="nav-collapse">
        <!-- BEGIN Navlist -->

        <ul class="nav nav-list">
            <li>
                <a href="<?php echo Yii::app()->createUrl('contract/request') ?>">
                    <i class="icon-angle-right"></i>
                    <span>請求データ検索・出力</span>
                </a>
            </li>
            <li>
                <a href="<?php echo Yii::app()->createUrl('contract/cancel') ?>">
                    <i class="icon-angle-right"></i>
                    <span>解約データ検索・出力</span>
                </a>
            </li>
            <li>
                <a href="<?php echo Yii::app()->createUrl('contract/users') ?>">
                    <i class="icon-angle-right"></i>
                    <span>顧客データ検索・出力</span>
                </a>
            </li>
            <li>
                <a href="<?php echo Yii::app()->createUrl('contract/ImportData') ?>">
                    <i class="icon-angle-right"></i>
                    <span>契約データ取り込み</span>
                </a>
            </li>
            <li>
                <a href="<?php echo Yii::app()->createUrl('licencekey') ?>">
                    <i class="icon-angle-right"></i>
                    <span>ライセンスキー発行</span>
                </a>
            </li>
			<li>
                <a href="<?php echo Yii::app()->createUrl('contract/tickets') ?>">
                    <i class="icon-angle-right"></i>
                    <span>チケットID検索・出力</span>
                </a>
            </li>
        </ul>
        <!-- END Navlist -->
    </div>
    <!-- END Sidebar -->

    <!-- BEGIN Content -->
    <div id="main-content">
        <?php echo $content; ?>
    </div>
    <!-- END Content -->
</div>
<!-- END Container -->
<!--basic scripts-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/bootstrap.min.js"></script>

<!--page specific plugin scripts-->

<!--flaty scripts-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/app.js"></script>
</body>
</html>
