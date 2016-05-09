<?xml version="1.0" encoding="Shift_JIS" ?>
<!DOCTYPE html PUBLIC
" -//i-mode group (ja)//DTD XHTML i-XHTML (Locale/Ver.=ja/1.1) 1.0//EN"
" i-xhtml_4ja_10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
	<head>
		<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=Shift_JIS" />
		<title>家のあんしんパートナー</title>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/imode/css/common.css">
		<style type="text/css">
			<![CDATA[
				/*   Special   */
				.header{  }
			]]>
		</style>
	</head>

	<body class="bc-white" onload="testload()">

		<!-- タイトル -->
		<div class="header bc-gray1">
			<table>
				<tr>
					<td><a href="<?php echo Yii::app()->request->baseUrl; ?>/seikatsu_regist_i.php"><img src="<?php echo Yii::app()->request->baseUrl; ?>/imode/img/icn_back_a.png" alt="←戻る" width="35" height="35"></a></td>
					<td><span class="fs-large">利用者登録</span></td>
				</tr>
			</table>
		</div><!-- タイトル end -->

		<!-- 区切り線 -->
		<div class="line2 bc-gray2"></div>

		<!-- 説明ブロック -->
		<div class="pd-default">

			<!-- 説明 -->
			<p class="mt-small">
				登録内容をご確認ください。
			</p>

            <div class="user-info-box" style="padding-left:16px;">
                <div class="name-txt mt-large">お名前</div>
                <div class="name fs-large mt-small"><?php echo $POST['first_name1'] . $POST['last_name1']; ?></div>
                <div class="number-txt mt-large">携帯電話番号</div>
                <div class="number fs-large mt-small"><?php echo $POST['number']; ?></div>
            </div>

            <!-- 登録 -->
            <p class="ta-center mt-exlarge"><a href="javascript:submitForm()"><img src="<?php echo Yii::app()->request->baseUrl; ?>/imode/img/button-next.png" alt="次へ" width="200" height="35"></a></p>
            <!-- 修正 -->
            <p class="ta-center mt-small"><a href="<?php echo Yii::app()->request->baseUrl; ?>/edit_i.php"><img src="<?php echo Yii::app()->request->baseUrl; ?>/imode/img/button-retouch.png" alt="修正" width="200" height="35"></a></p>

		</div><!-- 説明ブロック end -->


		<!-- フッター -->
		<div class="footer fs-copyright col_copyright mt-large">(C)JBR INC., All Rights Reserved.</div>
        <div style="display: none">
            <form id="confirmForm" method="POST">
                <input type="text" name="confirmclick" value="click">
            </form>
        </div>
	</body>
</html>
<script>
function submitForm(){
    document.getElementById("confirmForm").submit();
    return false;
}
</script>