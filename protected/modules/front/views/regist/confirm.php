<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>家のあんしんパートナー</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/regist/css/reset.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/regist/css/base.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/regist/css/main.css">
</head>

<body class="light">
<!-- ヘッダー -->
<div class="header">
    <div class="page-title type-2 dark">
        <a href="seikatsu_regist.php"><img src="<?php echo Yii::app()->request->baseUrl; ?>/regist/img/icn_back_a.png" alt="logo" width="52" height="52"></a>
        利用者登録
    </div>
</div><!-- ヘッダー end -->

<!-- ボディー -->
<div class="container thin-header">
    <div class="info">
        登録内容を確認してください。
    </div>

    <div class="user-info-box">
        <div class="name-txt">お名前</div>
        <div class="name large"><?php echo $POST['first_name1'] . $POST['last_name1']; ?></div>
        <div class="number-txt">携帯電話番号</div>
        <div class="number large"><?php echo $POST['number']; ?></div>

    </div>

    <div class="buttons-box mt60">
        <a href="#" onClick="return submitForm()" class="button special-h green mb5">登録</a>
        <a href="edit.php" class="button special-h grey">修正</a>
    </div>

</div>

<!-- フッター -->
<div class="footer copyright">
    &copy; JBR INC., All Rights Reserved.
</div><!-- フッター end -->

<div style="display: none">
    <form id="confirmForm" method="POST">
        <input type="text" name="confirmclick" value="click">
    </form>
</div>
<script src="../js/jquery-1.7.1.min.js"></script>
<script>
function submitForm(){
    document.getElementById("confirmForm").submit();
    return false;
}
$(window).bind("pageshow", function(event) {
    if (event.originalEvent.persisted) {
        window.location.reload() 
    }
});
</script>
</body>
</html>