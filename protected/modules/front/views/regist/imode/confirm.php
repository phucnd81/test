<?xml version="1.0" encoding="Shift_JIS" ?>
<!DOCTYPE html PUBLIC
" -//i-mode group (ja)//DTD XHTML i-XHTML (Locale/Ver.=ja/1.1) 1.0//EN"
" i-xhtml_4ja_10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
	<head>
		<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=Shift_JIS" />
		<title>�Ƃ̂��񂵂�p�[�g�i�[</title>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/imode/css/common.css">
		<style type="text/css">
			<![CDATA[
				/*   Special   */
				.header{  }
			]]>
		</style>
	</head>

	<body class="bc-white" onload="testload()">

		<!-- �^�C�g�� -->
		<div class="header bc-gray1">
			<table>
				<tr>
					<td><a href="<?php echo Yii::app()->request->baseUrl; ?>/seikatsu_regist_i.php"><img src="<?php echo Yii::app()->request->baseUrl; ?>/imode/img/icn_back_a.png" alt="���߂�" width="35" height="35"></a></td>
					<td><span class="fs-large">���p�ғo�^</span></td>
				</tr>
			</table>
		</div><!-- �^�C�g�� end -->

		<!-- ��؂�� -->
		<div class="line2 bc-gray2"></div>

		<!-- �����u���b�N -->
		<div class="pd-default">

			<!-- ���� -->
			<p class="mt-small">
				�o�^���e�����m�F���������B
			</p>

            <div class="user-info-box" style="padding-left:16px;">
                <div class="name-txt mt-large">�����O</div>
                <div class="name fs-large mt-small"><?php echo $POST['first_name1'] . $POST['last_name1']; ?></div>
                <div class="number-txt mt-large">�g�ѓd�b�ԍ�</div>
                <div class="number fs-large mt-small"><?php echo $POST['number']; ?></div>
            </div>

            <!-- �o�^ -->
            <p class="ta-center mt-exlarge"><a href="javascript:submitForm()"><img src="<?php echo Yii::app()->request->baseUrl; ?>/imode/img/button-next.png" alt="����" width="200" height="35"></a></p>
            <!-- �C�� -->
            <p class="ta-center mt-small"><a href="<?php echo Yii::app()->request->baseUrl; ?>/edit_i.php"><img src="<?php echo Yii::app()->request->baseUrl; ?>/imode/img/button-retouch.png" alt="�C��" width="200" height="35"></a></p>

		</div><!-- �����u���b�N end -->


		<!-- �t�b�^�[ -->
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