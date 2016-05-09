<div id="contents" class="blue">
	<h1 id="pageCopy"><img src="<?php echo Yii::app()->request->baseUrl; ?>/global/images/copy_b.gif" alt="家族のあんしんパートナー"></h1>
	
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
		<?php } ?>
		
		<h2 class="headline">お客様情報</h2>
		<h3 class="subHeading license require">ライセンスコード</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[31].' '.$list_home[32].' '.$list_home[33]; } ?></p>
		</div>
		
		<h3 class="subHeading require">お名前</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[1].' '.$list_home[2]; } ?></p>
		</div>
		
		<h3 class="subHeading require">フリガナ</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[3].' '.$list_home[4]; } ?></p>
		</div>
		
		<h3 class="subHeading"><span class="coution">※</span> 自宅TEL</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[5]; } ?></p>
		</div>
		
		<h3 class="subHeading"><span class="coution">※</span> 携帯TEL</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[6]; } ?></p>
		</div>
		
		<h3 class="subHeading require">メールアドレス</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[7]; } ?></p>
		</div>
		
		<h3 class="subHeading require">郵便番号</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[9]; } ?></p>
		</div>
		
		<h3 class="subHeading require">都道府県</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[10]; } ?></p>
		</div>
		
		<h3 class="subHeading">市区町村</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[11]; } ?></p>
		</div>
		
		<h3 class="subHeading">町域名</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[12]; } ?></p>
		</div>
		
		<h3 class="subHeading">番地</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[13]; } ?></p>
		</div>
		
		<h3 class="subHeading">建物名</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[14]; } ?></p>
		</div>
		
		<h3 class="subHeading">備考</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[15]; } ?></p>
		</div>
		
		
		<h2 class="headline">駆けつけ先情報</h2>
		
		
		<h3 class="subHeading require">お名前</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[16].' '.$list_home[17]; } ?></p>
		</div>
		
		<h3 class="subHeading require">フリガナ</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[18].' '.$list_home[19]; } ?></p>
		</div>
		
		<h3 class="subHeading"><span class="coution">※</span> 自宅TEL</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[20]; } ?></p>
		</div>
		
		<h3 class="subHeading"><span class="coution">※</span> 携帯TEL</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[21]; } ?></p>
		</div>
		
		<h3 class="subHeading require">メールアドレス</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[22]; } ?></p>
		</div>
		
		<h3 class="subHeading require">郵便番号</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[24]; } ?></p>
		</div>
		
		<h3 class="subHeading require">都道府県</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[25]; } ?></p>
		</div>
		
		<h3 class="subHeading">市区町村</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[26]; } ?></p>
		</div>
		
		<h3 class="subHeading">町域名</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[27]; } ?></p>
		</div>
		
		<h3 class="subHeading">番地</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[28]; } ?></p>
		</div>
		
		<h3 class="subHeading">建物名</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[29]; } ?></p>
		</div>
		
		<h3 class="subHeading">備考</h3>
		<div class="inputBox">
			<p><?php if(!empty($list_home)){ echo $list_home[30]; } ?></p>
		</div>
		
		<div class="submitArea btn">
			<p class="mB10"><input type="button" onclick="goBack()" style="cursor: pointer;" class="submitBt02" value="修正する"></p>
			<p><input type="button" onclick="submit_sign_home();" style="cursor: pointer;" class="submitBt03" value="登録"></p>
		</div>
	</form>
</div>

<script>
function goBack() {
    window.history.back()
}
function submit_sign_home(){
	var link = "<?php echo Yii::app()->baseUrl; ?>" + '/home/UpdateHome';
	$.ajax({
		type: 'POST',
		url: link,
		data: {
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
			param31: $('#entryRemarks2').val()
		},
		success: function(data) {
			if(data == 'error'){
				alert('エラー ライセンスコード');
				return;
			}else if(data == 'error_u'){
				alert('更新エラー');
				return;
			}else{
				window.location = "<?php echo Yii::app()->baseUrl; ?>" + '/homeFinish';
			}
		},
		error: function (msg) {
			alert('データの送信に失敗しました。');
		}
	});
}
</script>