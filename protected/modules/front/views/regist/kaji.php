<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>家のあんしんパートナー</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/regist/css/reset.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/regist/css/base.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/regist/css/main.css">
    </head>

    <body class="light">
        <!-- ヘッダー -->
        <div class="header">
            <div class="page-title type-2 dark">
                <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/regist/img/icn_back_a.png" alt="logo" width="52" height="52"></a>
                利用者登録
            </div>
        </div><!-- ヘッダー end -->

        <!-- ボディー -->
		<div class="red" style="padding-top:70px;">
			<p class="p10">家事サポート</p>
			<p class="p10">userid: <?php echo $userid; ?></p>
			<p class="p10">key: <?php echo $key; ?></p>
			<p class="p10">Callback: <?php echo $callback; ?></p>
			<p class="p10">kantanflg: <?php echo $kantanflg; ?></p>
		</div>
        <div class="container thin-header">
            <div class="info">
                「家のあんしんパートナー」サービスにご契約頂いているお名前と電話番号を入力して、利用規約をご確認の上、次へ進んでください。
            </div>

            <form>
                <p>
                    <label for="name">お名前</label><br>
                    <input type="text" name="name" placeholder="(例)鈴木太郎">
                </p>
                <p>
                    <label for="number">携帯電話番号</label><br>
                    <input type="text" style="margin-bottom:5px;" name="number" maxlength="11" placeholder="(例)090XXXXXXXX">
                    <span class="small">※半角数字（ハイフンなし）で入力してください。</span>
                </p>
            </form>
            
                <div>
                    <a href="4-02.html" class="text-link mt20">生活サポートサービス利用規約</a><br>
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
            }
        });
    </script>
    
    </body>
</html>