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

				.input-title {display: inline-block; margin-bottom: 0px; margin-top:10px;}
				form input {width:100%; margin-bottom: 5px; margin-top:5px;}
			]]>
		</style>
	</head>

	<body class="bc-white">

<script>
<!--
  //document.write("Hello JavaScript!!");
-->
</script>

		<!-- �^�C�g�� -->
		<div class="header bc-gray1">
			<table>
				<tr>
					<td><a href="<?php echo Yii::app()->request->baseUrl; ?>/post_new.php"><img src="<?php echo Yii::app()->request->baseUrl; ?>/imode/img/icn_back_a.png" alt="���߂�" width="35" height="35"></a></td>
					<td><span class="fs-large">���p�ғo�^</span></td>
				</tr>
			</table>
		</div><!-- �^�C�g�� end -->

		<!-- ��؂�� -->
		<div class="line2 bc-gray2"></div>

		<!-- �����u���b�N -->
		<div style="padding:2px;">


			<p class="mt-small">
				�u�Ƃ̂��񂵂�p�[�g�i�[�v�T�[�r�X�ɁA���_�񒸂��Ă��邨���O�Ɠd�b�ԍ�����͂��Ă��������B
			</p>

            <form id="frm" action="" method="post">
            	<div id="error-msg" style="color: red;display: "></div>
                <p>
                    <span class="input-title fs-large">�����O</span><br/>
                    <span class="fs-small">(��:��ؑ��Y)</span><br/>
                    ��<input type="text" class="fs-large" id="first_name1" name="first_name1" value="<?php echo $POST['first_name1']; ?>">
                    ��<input type="text" class="fs-large" id="last_name1" name="last_name1" value="<?php echo $POST['last_name1']; ?>">
                </p>
                <p>
                    <span class="input-title fs-large">�g�ѓd�b�ԍ�</span><br/>
                    <span class="fs-small">(��:090XXXXXXXX)</span><br/>
                    <input type="text" maxlength="11" class="fs-large" id="number" name="number" value="<?php echo $POST['number']; ?>"><br/>
                    <span class="fs-small">�����p����(�n�C�t���Ȃ�)�œ��͂��Ă��������B</span>
                </p>
            </form>
		</div><!-- �����u���b�N end -->

		<!-- ���p�K��ւ̃����N -->
		<div class="mt-large fs-large pd-default">
			<a href="javascript:goAgreement();">�����T�|�[�g�T�[�r�X���p�K��(�K��)</a>
			<p class="fs-small">(�W���p���x�X�g���X�L���[�V�X�e��������В�)</p>
		</div><!-- ���p�K��ւ̃����N end -->

		<!-- �m�F�u���b�N -->
		<div class="pd-default mt-middle fs-small">
			<p name="btnnext-ena" class="ta-center"><a href="javascript:goSubmitForm()"><img name="btnnext" src="<?php echo Yii::app()->request->baseUrl; ?>/imode/img/button-next-c.png" alt="���p�K��ɓ��ӂ��Ď���" width="205" height="35"></a></p>
		</div><!-- �m�F�u���b�N end -->

		<!-- �t�b�^�[ -->
		<div class="footer fs-copyright col_copyright">(C) JBR INC., All Rights Reserved.</div>

	</body>
</html>
<script>
var msg_pleaseInput = '����͂��Ă��������B';
var msg_invalid = '�͐����œ��͂��Ă��������B';
var filterNumberPhone = /^[0-9-]+$/;
var filterNumberQuantity11 = /^[0-9]{11}$/;

function goSubmitForm(){
	document.getElementById('error-msg').innerHTML = '';
	var first_name1 = document.getElementById("first_name1").value;

	var last_name1 = document.getElementById("last_name1").value;
	var number = document.getElementById("number").value;
	var message = "";
	
	if (first_name1 == '' || last_name1 == ''){
		message = '�����O' + msg_pleaseInput + '<br />';
	}
		
	if(number == ''){
		message += '�g�ѓd�b�ԍ�'+msg_pleaseInput+' <br />';
	}else{
		if ( !filterNumberPhone.test(number) ) {
			message += '�g�ѓd�b�ԍ�' + msg_invalid + ' <br />';
		} else if(!filterNumberQuantity11.test(number.replace(/-/g, ""))){
			message += '�g�ѓd�b�ԍ��̌����Ɍ�肪����܂��B <br />';
		}
	}
	if(message != ""){
		document.getElementById('error-msg').innerHTML = message;
		return false;
	}
	
	document.getElementById("frm").setAttribute("action", "<?php echo Yii::app()->request->baseUrl; ?>/confirm_i.php");
	document.getElementById("frm").submit();
}

function goAgreement(){
	document.getElementById("frm").setAttribute("action", "agreement_i.php");
	document.getElementById("frm").submit();
	
}
</script>