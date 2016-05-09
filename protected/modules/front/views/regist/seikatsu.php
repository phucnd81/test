<!DOCTYPE html>
<html>
    <head>
		<?php
			header('Cache-Control: max-age=900');
		?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>家のあんしんパートナー</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/regist/css/reset.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/regist/css/base.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/regist/css/main.css">
        <script src="../js/jquery-1.7.1.min.js"></script>
    </head>

    <body class="light">
        <!-- ヘッダー -->
        <div class="header">
            <div class="page-title type-2 dark">
                <a href="post_new.php"><img src="<?php echo Yii::app()->request->baseUrl; ?>/regist/img/icn_back_a.png" alt="logo" width="52" height="52"></a>
                利用者登録
            </div>
        </div><!-- ヘッダー end -->

        <!-- ボディー -->
		<div class="red" style="padding-top:70px;">
			<p class="p10">生活サポート</p>
			<p class="p10">userid: <?php echo $POST['userid']; ?></p>
			<p class="p10">key: <?php echo $POST['key']; ?></p>
			<p class="p10">Callback: <?php echo $POST['callback']; ?></p>
			<p class="p10">kantanflg: <?php echo $POST['kantanflg']; ?></p>
		</div>
        <div class="container thin-header">
            <div class="info">
                「家のあんしんパートナー」サービスにご契約頂いているお名前と電話番号を入力して、利用規約をご確認の上、次へ進んでください。
            </div>

            <form id="frm" action="" method="post">
                <div id="error-msg" style="color: red;display: none"></div>
                <p>
                    <label for="name" id="name">お名前</label><br>
                    姓 <input type="text" id="first_name1" name="first_name1" value="<?php echo $POST['first_name1']; ?>" placeholder="(例)鈴木" style="width:auto;">
                     名 <input type="text" id="last_name1" name="last_name1" value="<?php echo $POST['last_name1']; ?>" placeholder="(例)太郎" style="width:auto;">
                </p>
                <p>
                    <label for="number" id="number">携帯電話番号</label><br>
                    <input id="mobile1" type="text" style="margin-bottom:5px;" name="number" value="<?php echo $POST['number']; ?>" placeholder="(例)090XXXXXXXX">
                    <span class="small">※半角数字（ハイフンなし）で入力してください。</span>
                </p>
            </form>
            
                <div>
                    <a onclick="goAgreement();" class="text-link mt20">生活サポートサービス利用規約</a><br>
                    <p class="description small">(ジャパンベストレスキューシステム株式会社提供)</せ>
                </div>

                <div class="mt20">
                <input id="agree-checkbox" type="checkbox"> <label for="agree-checkbox">生活サポートサービス利用規約に同意する</label>
            	<a href="5-01.html" class="button inactive js-button mt20">次へ</a>
		</div>




        </div>

        <!-- フッター -->
        <div class="footer copyright">
            &copy; JBR INC., All Rights Reserved.
        </div><!-- フッター end -->
        
    <script>
        
	var msg_pleaseInput = 'を入力してください。';
	var msg_invalid = 'は数字で入力してください。';
	var filterNumberPhone = /^[0-9-]+$/;
	var filterNumberQuantity11 = /^[0-9]{11}$/;
        document.getElementById("agree-checkbox").checked = false;
        document.getElementById('agree-checkbox').addEventListener('change',function() {
            var element = this.nextElementSibling.nextElementSibling;
            if(element.classList.contains('inactive')) {
                element.classList.remove('inactive');
                element.classList.add('green');
            } else {
                element.classList.remove('green');
                element.classList.add('inactive');
            }
        });
        document.getElementsByClassName('js-button')[0].addEventListener('click', function(e){
            if(this.classList.contains('inactive')){
                e.preventDefault();
                return false;
            }else{
                e.preventDefault();
                $('#error-msg').css("display","none");
                var first_name1 = $.trim($("#first_name1").val());
				var last_name1 = $.trim($("#last_name1").val());
                var number = $.trim($('#mobile1').val());
                var message = "";
                if (first_name1 == '' || last_name1 == ''){
                    message = 'お名前' + msg_pleaseInput + '<br />';
                }
//                if(number===''){
//                    error = error + '携帯電話番号を入力してください';
//                    return false;
//                }
                	
                if(number == ''){
                    message += '携帯電話番号'+msg_pleaseInput+' <br />';
                }else{
                    if ( !filterNumberPhone.test(number) ) {
                        message += '携帯電話番号' + msg_invalid + ' <br />';
                    } else if(!filterNumberQuantity11.test(number.replace(/-/g, ""))){
                        message += '携帯電話番号の桁数に誤りがあります。 <br />';
                    }
                }
                if(message != ""){
                    $('#error-msg').css("display","inline-block");
                    $('#error-msg').html(message);
                    return false;
                }
                $.ajax({
                    type :"POST",
                    datatype: "json",
                    url: "/front/Regist/confirm",
                    data: {'first_name1':first_name1, 'last_name1': last_name1,'number': number.replace(/-/g, "")},
                    success:function (){
                        window.location = 'confirm.php';
                    }
                });
            }
        });
		function goAgreement(){
			document.getElementById("frm").setAttribute("action", "agreement.php");
			$("#frm").submit();
		}
    </script>
    
    </body>
</html>