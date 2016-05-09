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

		<!-- タイトル -->
		<div class="header bc-gray1">
			<table>
				<tr>
					<td><a href="<?php echo Yii::app()->request->baseUrl; ?>/post_new.php"><img src="<?php echo Yii::app()->request->baseUrl; ?>/imode/img/icn_back_a.png" alt="←戻る" width="35" height="35"></a></td>
					<td><span class="fs-large">利用者登録</span></td>
				</tr>
			</table>
		</div><!-- タイトル end -->

		<!-- 区切り線 -->
		<div class="line2 bc-gray2"></div>

		<!-- 説明ブロック -->
		<div style="padding:2px;">


			<p class="mt-small">
				「家のあんしんパートナー」サービスに、ご契約頂いているお名前と電話番号を入力してください。
			</p>

            <form id="frm" action="" method="post">
            	<div id="error-msg" style="color: red;display: "></div>
                <p>
                    <span class="input-title fs-large">お名前</span><br/>
                    <span class="fs-small">(例:鈴木太郎)</span><br/>
                    姓<input type="text" class="fs-large" id="first_name1" name="first_name1" value="<?php echo $POST['first_name1']; ?>">
                    名<input type="text" class="fs-large" id="last_name1" name="last_name1" value="<?php echo $POST['last_name1']; ?>">
                </p>
                <p>
                    <span class="input-title fs-large">携帯電話番号</span><br/>
                    <span class="fs-small">(例:090XXXXXXXX)</span><br/>
                    <input type="text" maxlength="11" class="fs-large" id="number" name="number" value="<?php echo $POST['number']; ?>"><br/>
                    <span class="fs-small">※半角数字(ハイフンなし)で入力してください。</span>
                </p>
            </form>
		</div><!-- 説明ブロック end -->

		<!-- 利用規約へのリンク -->
		<div class="mt-large fs-large pd-default">
			<a href="javascript:goAgreement();">生活サポートサービス利用規約(必読)</a>
			<p class="fs-small">(ジャパンベストレスキューシステム株式会社提供)</p>
		</div><!-- 利用規約へのリンク end -->

		<!-- 確認ブロック -->
		<div class="pd-default mt-middle fs-small">
			<p name="btnnext-ena" class="ta-center"><a href="javascript:goSubmitForm()"><img name="btnnext" src="<?php echo Yii::app()->request->baseUrl; ?>/imode/img/button-next-c.png" alt="利用規約に同意して次へ" width="205" height="35"></a></p>
		</div><!-- 確認ブロック end -->

		<!-- フッター -->
		<div class="footer fs-copyright col_copyright">(C) JBR INC., All Rights Reserved.</div>

	</body>
</html>
<script>
var msg_pleaseInput = 'を入力してください。';
var msg_invalid = 'は数字で入力してください。';
var filterNumberPhone = /^[0-9-]+$/;
var filterNumberQuantity11 = /^[0-9]{11}$/;

function goSubmitForm(){
	document.getElementById('error-msg').innerHTML = '';
	var first_name1 = document.getElementById("first_name1").value;

	var last_name1 = document.getElementById("last_name1").value;
	var number = document.getElementById("number").value;
	var message = "";
	
	if (first_name1 == '' || last_name1 == ''){
		message = 'お名前' + msg_pleaseInput + '<br />';
	}
		
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