<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- InstanceBeginEditable name="doctitle" -->
    <meta name="description" content="対応エリア｜生活にあんしんを。毎日に楽しさを。NTTドコモ「家のあんしんパートナー」は2つのサポートでお家の困りごとを解決し、お客様に笑顔をお届けします。">
    <meta name="keywords" content="サービス,提供,掃除,生活サポートサービス,対応エリア">
    <title>対応エリア｜JBR group　NTTドコモ「家のあんしんパートナー」</title>
    <link rel="canonical" href="./">
    <link rel="apple-touch-icon" href="../images/apple-touch-icon.png">
    <meta name="apple-mobile-web-app-title" content="NTTドコモ「家のあんしんパートナー」" />
	<!-- InstanceEndEditable -->
	<link href="../../css/pc/import.css" rel="stylesheet" type="text/css" />
	<script src="../../js/pc/lib/jquery.js" type="text/javascript"></script>
	<script src="../../js/pc/lib/jquery.opacityFade.js" type="text/javascript"></script>
	<script src="../../js/pc/lib/jquery.rollover.js" type="text/javascript"></script>
	
	<!--[if IE 6]>
	<script type="text/javascript" src="../../js/pc/lib/DD_belatedPNG.js"></script>
	<script type="text/javascript" src="../../js/pc/pngSupport.js"></script>
	<![endif]-->
	
	<!-- InstanceBeginEditable name="css" -->
	<link href="../../css/pc/content/area.css" rel="stylesheet" type="text/css" />
	<!-- InstanceEndEditable -->
	
	<!-- InstanceBeginEditable name="js" -->
	<!-- InstanceEndEditable -->
	
	<!--<script src="../../js/pc/basic.js" type="text/javascript"></script>-->
	<!-- InstanceParam name="pageID" type="text" value="" -->
    <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-60161286-1', 'auto');
	  ga('send', 'pageview');
	
	</script>
       
</head>

<body id="pagetop" class="Body">
<div id="wrapper">
    <div id="siteHeader">
        <p class="logo"><a href="../../pc/"><img src="../../images/pc/base/logo.gif" alt="JBR Group 家のあんしんパートナー" /></a></p>
        <p class="tel"><img src="../../images/pc/base/tel.gif" alt="家のあんしんパートナー専用コールセンター 0120-024-804" /></p>
    </div><!--/siteHeader-->
    
    <div id="globalNavi">
        <ul>
            <li class="home"><a href="../../pc/">ホーム</a></li>
            <li><a href="../../menu/pc/">サポートメニュー</a></li>
            <li><a href="../../price/pc/">ご利用料金一覧</a></li>
            <li><a href="../../area/index.html">対応エリア</a></li>
            <li><a href="../../faq/pc/">よくある質問</a></li>
        </ul>
    </div><!--/globalNavi-->
		
	<div id="container" class="clearfix">
		
		<div id="breadCrumbs">
			<ul>
				<li class="home"><a href="../../pc/">ホーム</a></li>
				<!-- InstanceBeginEditable name="breadCrumbs" -->
				<li>対応エリア</li>
				<!-- InstanceEndEditable -->
			</ul>
		</div><!--/breadCrumbs-->
		
		
		<div id="contents">
		<!-- InstanceBeginEditable name="contents" -->
		<h1 id="pageTitle"><img src="../../images/pc/content/area/pagetitle.png" alt="生活サポートサービスの対応エリア"/></h1>
		<div class="contBox clearfix">
			<p class="mB30">お住まいの郵便番号を入力して「対応エリアチェック」ボタンを押してください。<br />
				<span style="color: #F00;font-weight:bold;font-size:110%">※半角数字、ハイフンなしで入力してください</span><br />
				（例）1010001</p>
			
               <div id="areaForm">
                                <form  name="areaForm" id="areaForm" >
				<input id="text_code" type="text"  value=""  class="entryZipcode" placeholder="郵便番号を入力"/>
                                <div id="error_check" style="text-align: left;color: #F00;margin-left: 245px;"></div>
                                <input type="submit" id="btn-code" value="対応エリアチェック" class="submitBt" />
                               
			       </form>

		</div><!--/areaForm-->
                </div><!--/areaForm-->
		</div>
		<!-- InstanceEndEditable -->
		</div><!--/contents-->
	</div><!--/container-->
        
   
        
<script>
$(document).ready(function(){
	$("#areaForm").submit(function(){
		Submit_area();
		return false;
	});
});
function Submit_area()
{
    
      $.ajax({
        type: 'POST',
        url: "<?php echo Yii::app()->baseUrl; ?>/area/checkarea",
        data: {
            zip_code:$('#text_code').val()
           
        },
        success: function(data) {
           data = $.trim(data);
            if(data == 'noexist'){
               alert('この郵便番号が無効です。');
               $('#text_code').val(''); 
               var msg = '';
               document.getElementById('error_check').innerHTML = msg; 
                
            }
            else if(data== 'wrong'){
               $('#text_code').val(''); 
               var msg = '郵便番号の形式が正しくありません。';
               document.getElementById('error_check').innerHTML = msg;
            }
            
            else if(data == 'blank'){
                var msg = ' 郵便番号を入力してください。';
                document.getElementById('error_check').innerHTML = msg;
            }
            else
            {
                
                window.location = "<?php echo Yii::app()->baseUrl; ?>" + '/area/Result?zip_code=' + $('#text_code').val();
            }
          
         
        }
      
    });
}


 </script>

        <div id="siteFooter">
            <div id="footerNavi">
                <ul>
                    <li><a href="../../menu/pc/">サポートメニュー</a></li>
                    <li><a href="../../price/pc/">ご利用料金一覧</a></li>
                    <li><a href="../../area/index.html">対応エリア</a></li>
                    <li><a href="../../faq/pc/">よくある質問</a></li>
                    <li class="last"><a href="../../article/" target="_blank">利用規約</a></li>
                </ul>
            </div><!--/footerNavi-->

            <p id="copyright">Copyright &copy; 2015 JBR Inc. All Rights Reserved</p>
        </div><!--/siteFooter-->
</div><!--/wrapper-->

<script type="text/javascript">
  (function () {
    var tagjs = document.createElement("script");
    var s = document.getElementsByTagName("script")[0];
    tagjs.async = true;
    tagjs.src = "//s.yjtag.jp/tag.js#site=QrQCLbH";
    s.parentNode.insertBefore(tagjs, s);
  }());


</script>

<noscript>
  <iframe src="//b.yjtag.jp/iframe?c=QrQCLbH" width="1" height="1" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
</noscript>

</body>
<!-- InstanceEnd -->
</html>
