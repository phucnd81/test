<div id="contents" class="blue">
	<h1 id="pageCopy"><img src="<?php echo Yii::app()->request->baseUrl; ?>/global/images/copy_b.gif" alt="家族のあんしんパートナー"></h1>
	
	<p class="p10">
		ダミーコピー□□□□□□□□□□□□<br>
		□□□□□□□□□□□□□□□□□□<br>
		□□□□□□□□□□□□□□□□□□<br>
		□□□□□□□□□□□□□□□□□□<br>
		□□□□□□□□□□□□□□
	</p>
	
	<p class="require mB10">は必須項目です。</p>
	
	<div id="error_sumary" style="margin: 0px 0px 10px 10px; color: #F00;"></div>
	
	<form action="" name="homeForm">
		<h2 class="headline">お客様情報</h2>
		<h3 class="subHeading license require"><?php echo CHtml::activeLabel($model,'licence_key'); ?></h3>
		<div class="inputBox">
			<input type="url" id="entryLicense01" name="entryLicense01" value="" class="w28p">
			<input type="url" id="entryLicense02" name="entryLicense02" value="" class="w28p">
			<input type="url" id="entryLicense03" name="entryLicense03" value="" class="w28p">
			<p class="caption">(例：A5A5  A5A5  A5A5)</p>
		</div>
		
		<h3 class="subHeading require">お名前</h3>
		<div class="inputBox">
			姓 <input type="text" id="entryName1_1" name="entryName1_1" value="" class="w35p">
			名 <input type="text" id="entryName1_2" name="entryName1_2" value="" class="w35p">
			<p class="caption">(例：鈴木　太郎)</p>
		</div>
		
		<h3 class="subHeading require">フリガナ</h3>
		<div class="inputBox">
			姓 <input type="text" id="entryKana1_1" name="entryKana1_1" value="" class="w35p">
			名 <input type="text" id="entryKana1_2" name="entryKana1_2" value="" class="w35p">
			<p class="caption">(例：スズキ　タロウ)</p>
		</div>
		
		<h3 class="subHeading"><span class="coution">※</span> 自宅TEL</h3>
		<div class="inputBox">
			<input type="tel" id="entryPhone1" name="entryPhone1" value="" class="w98p">
			<p class="caption">(半角数字　例：0300000000)</p>
		</div>
		
		<h3 class="subHeading"><span class="coution">※</span> 携帯TEL</h3>
		<div class="inputBox">
			<input type="tel" id="entryMobile1" name="entryMobile1" value="" class="w98p">
			<p class="caption">(半角数字　例：09000000000)</p>
			<p class="coution fwB">※ いずれか必須</p>
		</div>
		
		<h3 class="subHeading require">メールアドレス</h3>
		<div class="inputBox">
			<input type="email" id="entryMail1_1" name="entryMail1_1" value="" class="w98p">
			<p class="caption mB5">確認のためもう一度、入力してください。</p>
			<input type="email" id="entryMail1_2" name="entryMail1_2" value="" class="w98p">
			<p class="caption">(半角英数字　例：aaa@docomo.ne.jp)</p>
		</div>
		
		<h3 class="subHeading require">郵便番号</h3>
		<div class="inputBox">
			<input type="text" id="entryZip1" name="entryZip1" value="" class="w28p">
			<span class="caption">(半角数字　例：0000000)</span>
		</div>
		
		<h3 class="subHeading require">都道府県</h3>
		<div class="inputBox">
			<select name="entryPref1" id="entryPref1">
				<?php foreach(Yii::app()->params['entryPref'] as $key => $value){
					echo '<option value="'.$key.'">'.$value.'</option>';
				} ?>
			</select>
		</div>
		
		<h3 class="subHeading">市区町村</h3>
		<div class="inputBox">
			<input type="text" id="entryAddress1_1" name="entryAddress1_1" value="" class="w98p">
		</div>
		
		<h3 class="subHeading">町域名</h3>
		<div class="inputBox">
			<input type="text" id="entryAddress1_2" name="entryAddress1_2" value="" class="w98p">
		</div>
		
		<h3 class="subHeading">番地</h3>
		<div class="inputBox">
			<input type="text" id="entryAddress1_3" name="entryAddress1_3" value="" class="w98p">
		</div>
		
		<h3 class="subHeading">建物名</h3>
		<div class="inputBox">
			<input type="text" id="entryAddress1_4" name="entryAddress1_4" value="" class="w98p">
		</div>
		
		<h3 class="subHeading">備考</h3>
		<div class="inputBox">
			<textarea rows="3" id="entryRemarks1" name="entryRemarks1" class="w98p"></textarea>
		</div>
		
		
		<h2 class="headline">駆けつけ先情報</h2>
		<div class="checkBt">
			<input type="checkbox" id="entryCheck" name="entryCheck" id="entryCheck" value="1"><label for="entryCheck">上記と同じ場合</label>
		</div>
		
		<h3 class="subHeading require">お名前</h3>
		<div class="inputBox">
			姓 <input type="text" id="entryName2_1" name="entryName2_1" value="" class="w35p">
			名 <input type="text" id="entryName2_2" name="entryName2_2" value="" class="w35p">
			<p class="caption">(例：鈴木　太郎)</p>
		</div>
		
		<h3 class="subHeading require">フリガナ</h3>
		<div class="inputBox">
			姓 <input type="text" id="entryKana2_1" name="entryKana2_1" value="" class="w35p">
			名 <input type="text" id="entryKana2_2" name="entryKana2_2" value="" class="w35p">
			<p class="caption">(例：スズキ　タロウ)</p>
		</div>
		
		<h3 class="subHeading"><span class="coution">※</span> 自宅TEL</h3>
		<div class="inputBox">
			<input type="tel" id="entryPhone2" name="entryPhone2" value="" class="w98p">
			<p class="caption">(半角数字　例：0300000000)</p>
		</div>
		
		<h3 class="subHeading"><span class="coution">※</span> 携帯TEL</h3>
		<div class="inputBox">
			<input type="tel" id="entryMobile2" name="entryMobile2" value="" class="w98p">
			<p class="caption">(半角数字　例：09000000000)</p>
			<p class="coution fwB">※ いずれか必須</p>
		</div>
		
		<h3 class="subHeading require">メールアドレス</h3>
		<div class="inputBox">
			<input type="email" id="entryMail2_1" name="entryMail2_1" value="" class="w98p">
			<p class="caption mB5">確認のためもう一度、入力してください。</p>
			<input type="email" id="entryMail2_2" name="entryMail2_2" value="" class="w98p">
			<p class="caption">(半角英数字　例：aaa@docomo.ne.jp)</p>
		</div>
		
		<h3 class="subHeading require">郵便番号</h3>
		<div class="inputBox">
			<input type="text" id="entryZip2" name="entryZip2" value="" class="w28p">
			<span class="caption">(半角数字　例：0000000)</span>
		</div>
		
		<h3 class="subHeading require">都道府県</h3>
		<div class="inputBox">
			<select name="entryPref2" id="entryPref2">
				<?php foreach(Yii::app()->params['entryPref'] as $key => $value){
					echo '<option value="'.$key.'">'.$value.'</option>';
				} ?>
			</select>
		</div>
		
		<h3 class="subHeading">市区町村</h3>
		<div class="inputBox">
			<input type="text" id="entryAddress2_1" name="entryAddress2_1" value="" class="w98p">
		</div>
		
		<h3 class="subHeading">町域名</h3>
		<div class="inputBox">
			<input type="text" id="entryAddress2_2" name="entryAddress2_2" value="" class="w98p">
		</div>
		
		<h3 class="subHeading">番地</h3>
		<div class="inputBox">
			<input type="text" id="entryAddress2_3" name="entryAddress2_3" value="" class="w98p">
		</div>
		
		<h3 class="subHeading">建物名</h3>
		<div class="inputBox">
			<input type="text" id="entryAddress2_4" name="entryAddress2_4" value="" class="w98p">
		</div>
		
		<h3 class="subHeading">備考</h3>
		<div class="inputBox">
			<textarea rows="3" id="entryRemarks2" name="entryRemarks2" class="w98p"></textarea>
		</div>

		<div class="submitArea">
			<input type="button" onclick="submit_home();" style="cursor: pointer;" class="submitBt01" value="お申込">
		</div>
	</form>
</div>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/global/plugins/jquery.min.js" type="text/javascript"></script>

<script>
jQuery(document).ready(function () {
	$("#entryCheck").change(function() {
		if($('#entryCheck').is(":checked")){
			$('#entryName2_1').val($('#entryName1_1').val());
			$('#entryName2_2').val($('#entryName1_2').val());
			$('#entryKana2_1').val($('#entryKana1_1').val());
			$('#entryKana2_2').val($('#entryKana1_2').val());
			$('#entryPhone2').val($('#entryPhone1').val());
			$('#entryMobile2').val($('#entryMobile1').val());
			$('#entryMail2_1').val($('#entryMail1_1').val());
			$('#entryMail2_2').val($('#entryMail1_2').val());
			$('#entryZip2').val($('#entryZip1').val());
			var value = $('#entryPref1 option:selected').val();
			$('#entryPref2 option[value="'+ value + '"]').attr("selected",true);
			$('#entryAddress2_1').val($('#entryAddress1_1').val());
			$('#entryAddress2_2').val($('#entryAddress1_2').val());
			$('#entryAddress2_3').val($('#entryAddress1_3').val());
			$('#entryAddress2_4').val($('#entryAddress1_4').val());
			$('#entryRemarks2').val($('#entryRemarks1').val());
		}
	});
});

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
};
function submit_home(){
	var entryLicense = $.trim($('#entryLicense01').val()) + $.trim($('#entryLicense02').val()) + $.trim($('#entryLicense03').val());
	var message = '';
	var obj = {};
	var i = 0;
	var msg_pleaseInput = 'を入力してください。';
	if(entryLicense == ''){
		message += $('h3.license').text() + ' '+msg_pleaseInput+' <br />';
		obj[i++] = '#entryLicense01';
	}
	if($('#entryLicense01').val().length != 4 || $('#entryLicense02').val().length != 4 || $('#entryLicense03').val().length != 4){
		message += '4文字を入力する <br />';
		if($('#entryLicense01').val().length != 4){
			obj[i++] = '#entryLicense01';
		}else if($('#entryLicense02').val().length != 4){
			obj[i++] = '#entryLicense02';
		} else if($('#entryLicense03').val().length != 4){
			obj[i++] = '#entryLicense03';
		}
	}
	if($('#entryName1_1').val() == '' && $('#entryName1_2').val() == ''){
		obj[i++] = '#entryName1_1';
		message += 'お名前 '+msg_pleaseInput+' <br />';
	}
	if($('#entryKana1_1').val() == '' && $('#entryKana1_2').val() == ''){
		obj[i++] = '#entryKana1_1';
		message += 'フリガナ '+msg_pleaseInput+' <br />';
	}
	var filter = /^[0-9]+$/;
	if(filter.test($('#entryPhone1').val()) == false && $('#entryPhone1').val() != ''){
		obj[i++] = '#entryPhone1';
		message += '数ではありません 自宅TEL <br />';
	}
	if(filter.test($('#entryMobile1').val()) == false && $('#entryMobile1').val() != ''){
		obj[i++] = '#entryMobile1';
		message += '数ではありません 携帯TEL <br />';
	}
	if($('#entryMail1_1').val() == ''){
		obj[i++] = '#entryMail1_1';
		message += 'メールアドレス '+msg_pleaseInput+' <br />';
	}
	if(isValidEmailAddress($('#entryMail1_1').val()) == false){
		message += '電子メールアドレスエラー <br />';
		obj[i++] = '#entryMail1_1';
	}
	if($('#entryMail1_2').val() != $('#entryMail1_1').val()){
		obj[i++] = '#entryMail1_2';
		message += '正しくない メールアドレス <br />';
	}
	if($('#entryZip1').val() == ''){
		obj[i++] = '#entryZip1';
		message += '郵便番号 '+msg_pleaseInput+' <br />';
	}   
	if(filter.test($('#entryZip1').val()) == false || $('#entryZip1').val().length != 7){
		obj[i++] = '#entryZip1';
		message += '数ではありません || 7文字 <br />';
	}
	if($('#entryPref1 option:selected').val() == ''){
		obj[i++] = '#entryPref1';
		message += '都道府県 '+msg_pleaseInput+' <br />';
	}
	if($('#entryName2_1').val() == '' && $('#entryName2_2').val() == ''){
		obj[i++] = '#entryName2_1';
		message += 'お名前 '+msg_pleaseInput+' <br />';
	}
	if($('#entryKana2_1').val() == '' && $('#entryKana2_2').val() == ''){
		obj[i++] = '#entryKana2_1';
		message += 'フリガナ '+msg_pleaseInput+' <br />';
	}
	if(filter.test($('#entryPhone2').val()) == false && $('#entryPhone2').val() != ''){
		obj[i++] = '#entryPhone2';
		message += '数ではありません 自宅TEL <br />';
	}
	if(filter.test($('#entryMobile2').val()) == false && $('#entryMobile2').val() != ''){
		obj[i++] = '#entryMobile2';
		message += '数ではありません 携帯TEL <br />';
	}
	if($('#entryMail2_1').val() == ''){
		obj[i++] = '#entryMail2_1';
		message += 'メールアドレス '+msg_pleaseInput+' <br />';
	}
	if(isValidEmailAddress($('#entryMail2_1').val()) == false){
		message += '電子メールアドレスエラー <br />';
		obj[i++] = '#entryMail2_1';
	}
	if($('#entryMail2_2').val() != $('#entryMail2_1').val()){
		obj[i++] = '#entryMail2_2';
		message += '正しくない メールアドレス <br />';
	}
	if($('#entryZip2').val() == ''){
		obj[i++] = '#entryZip2';
		message += '郵便番号 '+msg_pleaseInput+' <br />';
	}
	if(filter.test($('#entryZip2').val()) == false || $('#entryZip2').val().length != 7){
		obj[i++] = '#entryZip2';
		message += '数ではありません || 7文字 <br />';
	}
	if($('#entryPref2 option:selected').val() == ''){
		obj[i++] = '#entryPref2';
		message += '都道府県 '+msg_pleaseInput+'';
	}
	if(message != ''){
		$('#error_sumary').html(message);
		$(obj[0]).focus();
		return;
	}
	var link = "<?php echo Yii::app()->baseUrl; ?>" + '/home/CheckHomeEntry';
	$.ajax({
		type: 'POST',
		url: link,
		data: {
			param1: entryLicense, 
			param2: $('#entryName1_1').val(),
			param3: $('#entryName1_2').val(), 
			param4: $('#entryKana1_1').val(),
			param5: $('#entryKana1_2').val(),
			param6: $('#entryPhone1').val(),
			param7: $('#entryMobile1').val(),
			param8: $('#entryMail1_1').val(),
			param9: $('#entryMail1_2').val(),
			param10: $('#entryZip1').val(),
			param11: $('#entryPref1 option:selected').val(),
			param12: $('#entryAddress1_1').val(), 
			param13: $('#entryAddress1_2').val(),
			param14: $('#entryAddress1_3').val(),
			param15: $('#entryAddress1_4').val(),
			param16: $('#entryRemarks1').val(),
			param17: $('#entryName2_1').val(),
			param18: $('#entryName2_2').val(),
			param19: $('#entryKana2_1').val(),
			param20: $('#entryKana2_2').val(), 
			param21: $('#entryPhone2').val(), 
			param22: $('#entryMobile2').val(),
			param23: $('#entryMail2_1').val(),
			param24: $('#entryMail2_2').val(),
			param25: $('#entryZip2').val(),
			param26: $('#entryPref2 option:selected').val(),
			param27: $('#entryAddress2_1').val(),
			param28: $('#entryAddress2_2').val(),
			param29: $('#entryAddress2_3').val(),
			param30: $('#entryAddress2_4').val(),
			param31: $('#entryRemarks2').val()
		},
		success: function(data) {
			if(data == 'error'){
				var text_license = $('h3.license').text();
				alert('エラー ' + text_license);
				$('#entryLicense01').val('');
				$('#entryLicense02').val('');
				$('#entryLicense03').val('');
				$('#entryLicense01').focus();
			}else{
				window.location = "<?php echo Yii::app()->baseUrl; ?>" + '/homeConfirm?license01=' + $('#entryLicense01').val() + '&license02=' + $('#entryLicense02').val() + '&license03=' + $('#entryLicense03').val();
			}
		},
		error: function (msg) {
			alert('データの送信に失敗しました。');
		}
	});
}
</script>