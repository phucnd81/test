<?php $baseUrl_regist = Yii::app()->request->baseUrl.'/regist/' ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>家のあんしんパートナー</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo $baseUrl_regist ?>css/reset.css">
        <link rel="stylesheet" href="<?php echo $baseUrl_regist ?>css/base.css">
        <link rel="stylesheet" href="<?php echo $baseUrl_regist ?>css/main.css">
    </head>

    <body class="light">
        <!-- ヘッダー -->
        <div class="header">
            <div class="page-title type-3 dark">
                電話発信
            </div>
        </div><!-- ヘッダー end -->

        <!-- ボディー -->
        <div class="container thin-header large-padding">
            <div class="title-box special">
                <!-- タイトル -->
                <div class="title"><img src="<?php echo $baseUrl_regist ?>img/icn_mark01.png" alt="mark" width="48" height="48"><span class="large">生活トラブルサポート</span></div>

                <!-- 説明 -->
                <div style="text-align:center">
                  <div class="caption">
                   水周り、鍵、ガラスのトラブルに24時間対応します。
                  </div>
                </div>
            </div>

            <div class="help-list type-1">
                <span class="help small"><img src="<?php echo $baseUrl_regist ?>img/icn_small1_1.png" alt="help" width="15" height="15">水周りのトラブル</span>
                <span class="help small"><img src="<?php echo $baseUrl_regist ?>img/icn_small1_2.png" alt="help" width="15" height="15">カギのトラブル</span>
                <span class="help small"><img src="<?php echo $baseUrl_regist ?>img/icn_small1_3.png" alt="help" width="15" height="15">ガラスのトラブル</span>
            </div>

            <div class="free-dial">
                <div class="number"><img src="<?php echo $baseUrl_regist ?>img/icn_freedial.png" alt="free dial" width="34" height="22">0120-024-541</div>
                <div class="number-callable-period">受付 : 24時間 年中無休</div>
            </div>

            <!-- -->
            <div class="buttons-box special">
                <div class="button-area">
                    <a href="<?php echo $device==true?'#':'tel:0120024541' ?>" class="button green">
                        <img src="<?php echo $baseUrl_regist ?>img/icn_handset.png" alt="phone" width="30" height="30"><br>
                        電話をかける
                    </a>
                </div>
            </div>

            <div class="callpage-return-link-area">
                <a href="http://home.idc.nttdocomo.co.jp/" class="text-link">サービスポータルへ戻る</a>
            </div>

        </div>

        <!-- フッター -->
        <div class="footer copyright">
            &copy; JBR INC., All Rights Reserved.
        </div><!-- フッター end -->

    </div> <!-- ボディー end -->

    </body>
</html>