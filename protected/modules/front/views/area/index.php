
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=320">
<!-- <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0"> -->
<meta name="format-detection" content="telephone=no">
<meta name="description" content="生活にあんしんを。毎日に楽しさを。NTTドコモ「家のあんしんパートナー」は2つのサポートでお家の困りごとを解決し、お客様に笑顔をお届けします。">
<meta name="keywords" content="サービス,提供,掃除,生活サポートサービス">
<title>対応エリア｜JBR group　NTTドコモ「家のあんしんパートナー」</title>
<link rel="canonical" href="./">
<link rel="apple-touch-icon" href="../images/apple-touch-icon.png">
<meta name="apple-mobile-web-app-title" content="NTTドコモ「家のあんしんパートナー」" />
<script src="../js/jquery-1.7.1.min.js"></script>

<link rel="stylesheet" href="../css/style_smartphone.css" media="all">

<script src="../js/scripts.js"></script>

<link rel="stylesheet" href="../css/sp_style.css" media="all">
<script src="../js/gNav.js"></script>
<script src="../js/area.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60161286-1', 'auto');
  ga('send', 'pageview');

</script>
</head>

<body id="sale">
 
<header id="siteHeader">
	<div class="inner">
		<h1 id="sitelogo"><a href="/">JBR 家のあんしんパートナー</a></h1>
		<p id="headerMenu"><a href="javascript:void(0)">メニュー</a></p>
	</div>
	<nav id="headerMenuList" style="display: none;">
		<ul>
			<li><a href="../">トップページ</a></li>
			<li><a href="../menu/">サポートメニュー</a></li>
			<li><a href="../price/">ご利用料金一覧</a></li>
			<li><a href="../area/index.html">対応エリア</a></li>
			<li><a href="../faq/">よくある質問</a></li>
		</ul>
		<p><a href="javascript:void(0)" id="gNavCloseBt">CLOSE</a></p>
	</nav><!--/headerMenuList-->
</header><!-- /siteHeader -->
<div id="content" role="main">
    
   
	<h2 id="pageTitleS"><img src="../images/area/pagetitle.png" alt="対応エリア"></h2>
	
	<div class="contBox">
		<p class="mB30">お住まいの郵便番号を入力して「対応エリアチェック」ボタンを押してください。<br />
				<span class="mB35" style="color: #F00;font-weight:bold">※半角数字、ハイフンなしで入力してください</span><br />
				（例）1010001</p>
		
		<div id="areaForm">
                                <form  name="areaForm" id="areaForm" >
				<input id="text_code" type="text"  value=""  class="entryZipcode" placeholder="郵便番号を入力"/>
                                <div id="error_check" style="text-align: left;color: #F00;margin-left: 10px;"></div>
                                <input type="submit" id="btn-code" value="対応エリアチェック" class="submitBt" />
                 	        </form>

		</div><!--/areaForm-->
	</div><!--/contBox-->
</div><!-- / content -->

<p id="pagetop"><a href="#siteHeader"><img src="../images/common/pagetop.png"></a></p>

<div id="footer">
	<footer>
		<ul id="footerMenu">
            <li><a href="../menu/">サポートメニュー</a></li>
            <li><a href="../price/">ご利用料金一覧</a></li>
            <li><a href="../area/index.html">対応エリア</a></li>
            <li><a href="../faq/">よくある質問</a></li>
            <li><a href="../article/" target="_blank">利用規約</a></li>
		</ul>

		<div id="footerComment">
			<div class="inner">
				本サイトの価格表記は、原則として税抜表記とさせていただきますので、ご了承願います。
			</div>
		</div>
		
		<p id="copyright">Copyright&copy; 2015 JBR Inc. All Rights Reserved</p>
	</footer>
</div>
<script type="text/javascript">
  (function () {
    var tagjs = document.createElement("script");
    var s = document.getElementsByTagName("script")[0];
    tagjs.async = true;
    tagjs.src = "//s.yjtag.jp/tag.js#site=QrQCLbH";
    s.parentNode.insertBefore(tagjs, s);
  }());
</script>

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
               //$('#text_code').val(''); 
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

<noscript>
  <iframe src="//b.yjtag.jp/iframe?c=QrQCLbH" width="1" height="1" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
</noscript>

</body>
</html>