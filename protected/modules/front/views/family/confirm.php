<div id="contents" class="red">
	<!-- <h1 id="pageCopy"><img src="<?php echo Yii::app()->request->baseUrl; ?>/global/images/copy_r.gif" alt="家のあんしんパートナー"></h1> -->
	
	<p class="p10">
		下記の内容をご確認いただき、間違いがない場合は「登録」を押してください。<br>
		間違いがある場合、「修正する」を押して修正してください。
	</p>
	
	<form action="" name="homeForm">
		<?php if(!empty($list_home)){ ?>
		<input type="hidden" id="entryLicense" name="entryLicense" value="<?php echo $list_home[0]; ?>">
		<input type="hidden" id="entryName1_1" name="entryName1_1" value="<?php echo $list_home[1]; ?>">
		<input type="hidden" id="entryName1_2" name="entryName1_2" value="<?php echo $list_home[2]; ?>">
		<input type="hidden" id="entryKana1_1" name="entryKana1_1" value="<?php echo $list_home[3]; ?>">
		<input type="hidden" id="entryKana1_2" name="entryKana1_2" value="<?php echo $list_home[4]; ?>">
		<input type="hidden" id="entryPhone1" name="entryPhone1" value="<?php echo $list_home[5]; ?>">
		<input type="hidden" id="entryMobile1" name="entryMobile1" value="<?php echo $list_home[6]; ?>">
		<input type="hidden" id="entryMail1_1" name="entryMail1_1" value="<?php echo $list_home[7]; ?>">
		<input type="hidden" id="entryMail1_2" name="entryMail1_2" value="<?php echo $list_home[8]; ?>">
		<input type="hidden" id="entryZip1" name="entryZip1" value="<?php echo $list_home[9]; ?>">
		<input type="hidden" id="entryPref1" name="entryPref1" value="<?php echo $list_home[10]; ?>">
		<input type="hidden" id="entryAddress1_1" name="entryAddress1_1" value="<?php echo $list_home[11]; ?>">
		<input type="hidden" id="entryAddress1_2" name="entryAddress1_2" value="<?php echo $list_home[12]; ?>">
		<input type="hidden" id="entryAddress1_3" name="entryAddress1_3" value="<?php echo $list_home[13]; ?>">
		<input type="hidden" id="entryAddress1_4" name="entryAddress1_4" value="<?php echo $list_home[14]; ?>">
		<input type="hidden" id="entryRemarks1" name="entryRemarks1" value="<?php echo $list_home[15]; ?>">
		
		<input type="hidden" name="entryCheck" value="">
		<input type="hidden" id="entryName2_1" name="entryName2_1" value="<?php echo $list_home[16]; ?>">
		<input type="hidden" id="entryName2_2" name="entryName2_2" value="<?php echo $list_home[17]; ?>">
		<input type="hidden" id="entryKana2_1" name="entryKana2_1" value="<?php echo $list_home[18]; ?>">
		<input type="hidden" id="entryKana2_2" name="entryKana2_2" value="<?php echo $list_home[19]; ?>">
		<input type="hidden" id="entryPhone2" name="entryPhone2" value="<?php echo $list_home[20]; ?>">
		<input type="hidden" id="entryMobile2" name="entryMobile2" value="<?php echo $list_home[21]; ?>">
		<input type="hidden" id="entryMail2_1" name="entryMail2_1" value="<?php echo $list_home[22]; ?>">
		<input type="hidden" id="entryMail2_2" name="entryMail2_2" value="<?php echo $list_home[23]; ?>">
		<input type="hidden" id="entryZip2" name="entryZip2" value="<?php echo $list_home[24]; ?>">
		<input type="hidden" id="entryPref2" name="entryPref2" value="<?php echo $list_home[25]; ?>">
		<input type="hidden" id="entryAddress2_1" name="entryAddress2_1" value="<?php echo $list_home[26]; ?>">
		<input type="hidden" id="entryAddress2_2" name="entryAddress2_2" value="<?php echo $list_home[27]; ?>">
		<input type="hidden" id="entryAddress2_3" name="entryAddress2_3" value="<?php echo $list_home[28]; ?>">
		<input type="hidden" id="entryAddress2_4" name="entryAddress2_4" value="<?php echo $list_home[29]; ?>">
		<input type="hidden" id="entryRemarks2" name="entryRemarks2" value="<?php echo $list_home[30]; ?>">
		<input type="hidden" id="ageGroup1" name="ageGroup1" value="<?php echo $list_home[31]; ?>">
		<input type="hidden" id="ageGroup2" name="ageGroup2" value="<?php echo $list_home[32]; ?>">
		<?php if (isset($list_home['Zaitaku_sub'])) { ?>
        <input type="hidden" id="Zaitaku_sub" name="Zaitaku_sub" value="<?php echo $list_home['Zaitaku_sub']; ?>">
        <input type="hidden" id="first_name3" name="first_name3" value="<?php echo $list_home['first_name3']; ?>">
        <input type="hidden" id="last_name3" name="last_name3" value="<?php echo $list_home['last_name3']; ?>">
        <input type="hidden" id="first_kana3" name="first_kana3" value="<?php echo $list_home['first_kana3']; ?>">
        <input type="hidden" id="last_kana3" name="last_kana3" value="<?php echo $list_home['last_kana3']; ?>">
        <input type="hidden" id="tel3" name="tel3" value="<?php echo $list_home['tel3']; ?>">
        <input type="hidden" id="mobile3" name="mobile3" value="<?php echo $list_home['mobile3']; ?>">
        <input type="hidden" id="zip_code3" name="zip_code3" value="<?php echo $list_home['zip_code3']; ?>">
        <input type="hidden" id="pref3" name="pref3" value="<?php echo $list_home['pref3']; ?>">
        <input type="hidden" id="address3_1" name="address3_1" value="<?php echo $list_home['address3_1']; ?>">
        <input type="hidden" id="address3_2" name="address3_2" value="<?php echo $list_home['address3_2']; ?>">
        <input type="hidden" id="address3_3" name="address3_3" value="<?php echo $list_home['address3_3']; ?>">
        <input type="hidden" id="address3_4" name="address3_4" value="<?php echo $list_home['address3_4']; ?>">
        <input type="hidden" id="relationship3" name="relationship3" value="<?php echo $list_home['relationship3']; ?>">
		<?php } } ?>
		
		<h2 class="headline">お客様情報</h2>
		<h3 class="subHeading license">優待コード</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[0]; } ?></p>
			<!-- <p><?php if(!empty($list_home)){ 
								if (isset($list_home['Zaitaku_sub']))
									echo $list_home[31].' '.$list_home[32].' '.$list_home[33];
								else
									echo $list_home[31].' '.$list_home[32];
							} ?></p> -->
		</div>
		
		<h3 class="subHeading">お名前</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[1].' '.$list_home[2]; } ?></p>
		</div>
		
		<h3 class="subHeading">フリガナ</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[3].' '.$list_home[4]; } ?></p>
		</div>
		
		<h3 class="subHeading">年齢</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[31]; } ?></p>
		</div>

		<h3 class="subHeading">電話番号（ご自宅）</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[5]; } ?></p>
		</div>
		
		<h3 class="subHeading">電話番号（携帯電話）</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[6]; } ?></p>
		</div>
		
		<h3 class="subHeading">メールアドレス</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[7]; } ?></p>
		</div>
		
		<h3 class="subHeading">郵便番号</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[9]; } ?></p>
		</div>
		
		<h3 class="subHeading">都道府県</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[10]; } ?></p>
		</div>
		
		<h3 class="subHeading">市区町村</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[11]; } ?></p>
		</div>
		
		<h3 class="subHeading" style="display:none">町域</h3>
		<div class="inputBox" style="display:none">
			<p><?php if(!empty($list_home)){ echo $list_home[12]; } ?></p>
		</div>
		
		<h3 class="subHeading">以降の住所（丁目、番地等）</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[13]; } ?></p>
		</div>
		
		<h3 class="subHeading">建物名</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[14]; } ?></p>
		</div>
		
		<h3 class="subHeading">備考</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo nl2br($list_home[15]); } ?></p>
		</div>
		
		
		<h2 class="headline">駆けつけ先情報</h2>
		
		
		<h3 class="subHeading">代表者お名前</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[16].' '.$list_home[17]; } ?></p>
		</div>
		
		<h3 class="subHeading">代表者フリガナ</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[18].' '.$list_home[19]; } ?></p>
		</div>
				
		<h3 class="subHeading">年齢</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[32]; } ?></p>
		</div>

		<h3 class="subHeading">電話番号（ご自宅）</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[20]; } ?></p>
		</div>
		
		<h3 class="subHeading">電話番号（携帯電話）</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[21]; } ?></p>
		</div>
		
		<h3 class="subHeading">メールアドレス</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[22]; } ?></p>
		</div>
		
		<h3 class="subHeading">郵便番号</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[24]; } ?></p>
		</div>
		
		<h3 class="subHeading">都道府県</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[25]; } ?></p>
		</div>
		
		<h3 class="subHeading">市区町村</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[26]; } ?></p>
		</div>
		
		<h3 class="subHeading" style="display:none">町域</h3>
		<div class="inputBox" style="display:none">
			<p><?php if(!empty($list_home)){ echo $list_home[27]; } ?></p>
		</div>
		
		<h3 class="subHeading">以降の住所（丁目、番地等）</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[28]; } ?></p>
		</div>
		
		<h3 class="subHeading">建物名</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[29]; } ?></p>
		</div>
		
		<h3 class="subHeading">備考</h3>

		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo nl2br($list_home[30]); } ?></p>
		</div>
        
        
        <!--12675 12702--->
        <?php if (isset($list_home['Zaitaku_sub'])) {?>
        <h2 class="headline">在宅確認サポート</h2>
		
		
		<h3 class="subHeading">お名前</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home['first_name3'].' '.$list_home['last_name3']; } ?></p>
		</div>
		
		<h3 class="subHeading">フリガナ</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home['first_kana3'].' '.$list_home['last_kana3']; } ?></p>
		</div>
		<div style="display:none">
		<h3 class="subHeading">電話番号（ご自宅）</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home['tel3']; } ?></p>
		</div>
		</div>
		<h3 class="subHeading">電話番号（携帯電話）</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home['mobile3']; } ?></p>
		</div>
		
		<h3 class="subHeading">郵便番号</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home['zip_code3']; } ?></p>
		</div>
		
		<h3 class="subHeading">都道府県</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home['pref3']; } ?></p>
		</div>
		
		<h3 class="subHeading">市区町村</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home['address3_1']; } ?></p>
		</div>
		
		<h3 class="subHeading" style="display:none">町域</h3>
		<div class="inputBox" style="display:none">
			<p><?php if(!empty($list_home)){ echo $list_home['address3_2']; } ?></p>
		</div>
		
		<h3 class="subHeading">以降の住所（丁目、番地等）</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home['address3_3']; } ?></p>
		</div>
		
		<h3 class="subHeading">建物名</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home['address3_4']; } ?></p>
		</div>
		
		<h3 class="subHeading">続柄（二親等以内）</h3>

		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo nl2br($list_home['relationship3']); } ?></p>
		</div>
		<?php } ?>
		<div class="submitArea btn">
        	<p class="p10">メールの受信拒否等を設定している場合は、下記アドレスからのメールを受信できるように設定変更をお願いします。<br>no-reply@docomo-anshinpartner.jp</p>
			<p class="mB10"><input type="button" onclick="goBack()" style="cursor: pointer;" class="submitBt02" value="修正する"></p>
            <?php
			if(isset($_SESSION['reg_user']))
			{
				$postdata=$_SESSION['reg_user']; 
			}
			?>
            <?php if ( isset($postdata['key']) && isset($postdata['callback']) && trim($postdata['key']) != "" && trim($postdata['callback']) != "" ){ ?>
            <p class="p10">登録完了画面にて、必ず「家のあんしんリンクに戻る」ボタンを押してください。<br />
							ボタンを押さずに画面を閉じてしまうと、正常に登録が完了しない場合があります。</p>
            <?php } ?>
			<p><input type="button" onclick="submit_sign_home();" style="cursor: pointer;" class="submitBt03" value="登録"></p>
			<br/>
			<br/>
		</div>
	</form>
</div>

<script>
function goBack() {
    var link = "<?php echo Yii::app()->baseUrl; ?>" + '/family/GoBackFamily';
    $.ajax({
            type: 'POST',
            url: link,
            data: {}, success: function (data) {
                window.history.back();
            },
            error: function (msg) {
                alert('データの送信に失敗しました。');
            }
        }
    );

}
function submit_sign_home(){
	var link = "<?php echo Yii::app()->baseUrl; ?>" + '/family/UpdateFamily';
	
	var data = {
			param1: $('#entryLicense').val(), 
			param2: $('#entryName1_1').val(),
			param3: $('#entryName1_2').val(), 
			param4: $('#entryKana1_1').val(),
			param5: $('#entryKana1_2').val(),
			param6: $('#entryPhone1').val(),
			param7: $('#entryMobile1').val(),
			param8: $('#entryMail1_1').val(),
			param9: $('#entryMail1_2').val(),
			param10: $('#entryZip1').val(),
			param11: $('#entryPref1').val(),
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
			param26: $('#entryPref2').val(),
			param27: $('#entryAddress2_1').val(),
			param28: $('#entryAddress2_2').val(),
			param29: $('#entryAddress2_3').val(),
			param30: $('#entryAddress2_4').val(),
			param31: $('#entryRemarks2').val(),
			param32: $('#ageGroup1').val(),
			param33: $('#ageGroup2').val()
	};
	if ($('#Zaitaku_sub').val() != '0' && $('#Zaitaku_sub').val() != null){
		var tel3 = $('#tel3').val().replace(/-/g,"");
        var mobile3 = $('#mobile3').val().replace(/-/g,"");
        var zip_code3 = $('#zip_code3').val().replace(/-/g,"");
		dataSub = {
				Zaitaku_sub: $('#Zaitaku_sub').val(),
				first_name3: $('#first_name3').val(),
				last_name3: $('#last_name3').val(),
				first_kana3: $('#first_kana3').val(),
				last_kana3: $('#last_kana3').val(),
				'tel3': tel3,
				'mobile3': mobile3,
				'zip_code3': zip_code3,
				pref3: $('#pref3').val(),
				address3_1: $('#address3_1').val(),
				address3_2: $('#address3_2').val(),
				address3_3: $('#address3_3').val(),
				address3_4: $('#address3_4').val(),
				relationship3: $('#relationship3').val()
				};
		$.extend( data, dataSub );
	}
	$.ajax({
		type: 'POST',
		url: link,
		data: data,
		success: function(data) {
			if(data == 'error'){
				alert('優待コードに誤りがあります。');
				return;
			}else if(data == 'error_u'){
				alert('更新エラー');
				return;
			}else{
				window.location = "<?php echo Yii::app()->baseUrl; ?>" + '/familyFinish';
			}
		},
		error: function (msg) {
			alert('データの送信に失敗しました。');
		}
	});
}
</script>