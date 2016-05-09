<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>家のあんしんパートナー｜生活サポートサービス｜NTTドコモ</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<link href="<?php echo Yii::app()->request->baseUrl; ?>/global/css/reset.css" rel="stylesheet" type="text/css" media="all">
		<link href="<?php echo Yii::app()->request->baseUrl; ?>/global/css/style.css" rel="stylesheet" type="text/css" media="all">
		<link href="<?php echo Yii::app()->request->baseUrl; ?>/global/css/common.css" rel="stylesheet" type="text/css" media="all">
	</head>
	<body id="pagetop">
		<div id="wrapper">
        
			<p id="logo" <?php if(isset($_SESSION['area'])){ echo 'style="display:none;"'; unset($_SESSION['area']); } ?>><img src="<?php echo Yii::app()->request->baseUrl; ?>/global/images/logo.gif" alt="docomo 生活サポートサービス"></p>
			
			<?php echo $content; ?>
			<!--/contents-->
			
		</div><!--/wrapper-->
		
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/global/plugins/jquery.min.js" type="text/javascript"></script>
        
        <script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		ga('create', '<?php echo Yii::app()->params['google_analytics_code']; ?>', 'auto');
		ga('send', 'pageview');
		
		</script>
        
	</body>
</html>
