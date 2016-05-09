<?php

//   #12768 : Permit acces directly to /regist.php
/*    if(!isset($_SESSION['error']))
    {   
    	if(isset($_SESSION['reg_user']))
        	unset($_SESSION['reg_user']);
        echo '<script>alert("利用者情報登録に必要な情報が不足しています。");';
        echo 'window.location.href="'.'https://dev.docomo-anshinpartner.jp'.'";';
        echo '</script>';
        
    }
         
    elseif(!isset($_SESSION['reg_user']['key'])||
    	!isset($_SESSION['reg_user']['userid'])||!isset($_SESSION['reg_user']['callback'])||!isset($_SESSION['reg_user']['return']))
    {
        echo '<script>alert("利用者情報登録に必要な情報が不足しています。");';
        echo 'window.location.href="'.'https://dev.docomo-anshinpartner.jp'.'";';
        echo '</script>';
    }*/

    //Access through ../regist.php -> OK. 
    if(!isset($_SESSION['error'])){
    	echo '<script>alert("利用者情報登録に必要な情報が不足しています。");';
    	echo 'window.location.href="'.'https://dev.docomo-anshinpartner.jp'.'";';
    	echo '</script>';
    }

    if(!isset($_SESSION['reg_user']['edit'])) 
        $_SESSION['reg_user']['edit']=$edit;
    
    
?>
<div id="contents" class="red">
  <!-- <h1 id="pageCopy"><img src="<?php echo Yii::app()->request->baseUrl; ?>/global/images/copy_r.gif" alt="家のあんしんパートナー"></h1> -->
  <p class="p10"> 下記情報を入力いただき、「登録」ボタンを押してください。 </p>
  <p class="require mB10">は必須項目です。</p>
  <div id="error_sumary" style="margin: 0px 0px 10px 10px; color: #F00;"></div>
  <form action="" name="homeForm">
    <h2 class="headline">お客様情報</h2>
    <h3 class="subHeading license require"><?php echo CHtml::activeLabel($model,'licence_key'); ?></h3>
    <div class="inputBox">
      <input type="text" id="entryLicense01" name="entryLicense01" 				  
				   <?php    if ($licence_key=="") echo 'value="" ';
				   			else if($licence_key!=NULL && $licence_key!="") echo 'value="'.$licence_key.'" ';
							else
								echo 'value="' . @$arrData[0] .  '"';
				   ?>
				   class="w98p"<?php if ($licence_key!='')
				   		echo 'readonly';
				   ?>>
      <!-- <input type="url" id="entryLicense02" name="entryLicense02" value="" class="w28p">

			<input type="url" id="entryLicense03" name="entryLicense03" value="" class="w28p"> -->
    <p class="caption"
		<?php if ($licence_key=="") 
					echo 'style="color:#cc0033"'; ?> >
      	<?php if ($licence_key=="")
      				echo '優待コードが空欄の場合は、ドコモから送付された「家のあんしんパートナー優待コードのご案内」に記載された優待コードをご入力下さい。';
      			else
      				echo '優待コードが空欄の場合は、ドコモから送付された「家のあんしんパートナー優待コードのご案内」に記載された優待コードをご入力下さい。';
      		?>
	</p>
      <p class="caption">(例：A5A5A5A5A5A5)</p>
    </div>
    <h3 class="subHeading">在宅確認サポートお申込み</h3>
    <div class="inputBox">
     <input type="checkbox" id="Zaitaku_sub" name="Zaitaku_sub" value="1"<?php if (@$arrData['Zaitaku_sub'] == 1){?> checked="checked"<?php } ?>>
      <label for="Zaitaku_sub">在宅確認サポートに申込む</label>
    </div>    
    <h3 class="subHeading require">お名前</h3>
    <div class="inputBox"> 姓
      <input type="text" id="entryName1_1" name="entryName1_1" value="<?php echo @$arrData[1]; ?>" class="w35p">
      名
      <input type="text" id="entryName1_2" name="entryName1_2" value="<?php echo @$arrData[2]; ?>" class="w35p">
      <p class="caption">(例：鈴木　太郎)</p>
    </div>
    <h3 class="subHeading require">フリガナ</h3>
    <div class="inputBox"> 姓
      <input type="text" id="entryKana1_1" name="entryKana1_1" value="<?php echo @$arrData[3]; ?>" class="w35p">
      名
      <input type="text" id="entryKana1_2" name="entryKana1_2" value="<?php echo @$arrData[4]; ?>" class="w35p">
      <p class="caption">(全角　例：スズキ　タロウ)</p>
    </div>
    <h3 class="subHeading">年齢</h3>
    <div class="inputBox">
      <select name="ageGroup1" id="ageGroup1">
        <?php foreach(Yii::app()->params['ageGroup'] as $key => $value){

					echo '<option ' . (($key == @$arrData[31]) ? 'selected="selected"' : '') . ' value="'.$key.'">'.$value.'</option>';

				} ?>
      </select>
    </div>
    <h3 class="subHeading"> 電話番号（ご自宅）</h3>
    <div class="inputBox">
      <input type="tel" id="entryPhone1" name="entryPhone1" value="<?php echo @$arrData[5]; ?>" class="w98p">
      <p class="caption">(半角数字　例：0300000000)</p>
    </div>
    <h3 class="subHeading require"> 電話番号（携帯電話）</h3>
    <div class="inputBox">
      <input type="tel" id="entryMobile1" name="entryMobile1" value="<?php echo @$arrData[6]; ?>" class="w98p">
      <p class="caption">(半角数字　例：09000000000)</p>
      <p class="coution fwB">※ 家のあんしんパートナーご契約の携帯電話番号を入力してください。</p>
    </div>
    <h3 class="subHeading require">メールアドレス</h3>
    <div class="inputBox">
      <input type="email" id="entryMail1_1" name="entryMail1_1" value="<?php echo @$arrData[7]; ?>" class="w98p">
      <p class="caption mB5">確認のためもう一度、入力してください。</p>
      <input type="email" id="entryMail1_2" name="entryMail1_2" value="<?php echo @$arrData[8]; ?>" class="w98p">
      <p class="caption">(半角英数字　例：aaa@docomo.ne.jp)</p>
    </div>
    <h3 class="subHeading require">郵便番号</h3>
    <div class="inputBox" id="inputZip1">
      <input type="text" id="entryZip1" name="entryZip1" value="<?php echo @$arrData[9]; ?>" class="w28p">
      <span class="caption">(半角数字　例：0000000)</span>　
      <input type="button" value="住所検索" id="searchZip1" />
    </div>
    <h3 class="subHeading require">都道府県</h3>
    <div class="inputBox">
      <select name="entryPref1" id="entryPref1">
        <?php foreach(Yii::app()->params['entryPref'] as $key => $value){

					echo '<option ' . (($key == @$arrData[10]) ? 'selected="selected"' : '') . ' value="'.$key.'">'.$value.'</option>';

				} ?>
      </select>
    </div>
    <h3 class="subHeading require">市区町村</h3>
    <div class="inputBox">
      <input type="text" id="entryAddress1_1" name="entryAddress1_1" value="<?php echo @$arrData[11]; ?>" class="w98p">
      <p class="coution fwB">※ ドコモにご登録いただいている契約者住所と同じ住所を入力してください。</p>
    </div>
    <h3 class="subHeading" style="display:none">町域</h3>
    <div class="inputBox" style="display:none">
      <input type="text" id="entryAddress1_2" name="entryAddress1_2" value="<?php echo @$arrData[12]; ?>" class="w98p">
    </div>
    <h3 class="subHeading">以降の住所（丁目、番地等）</h3>
    <div class="inputBox">
      <input type="text" id="entryAddress1_3" name="entryAddress1_3" value="<?php echo @$arrData[13]; ?>" class="w98p">
    </div>
    <h3 class="subHeading">建物名</h3>
    <div class="inputBox">
      <input type="text" id="entryAddress1_4" name="entryAddress1_4" value="<?php echo @$arrData[14]; ?>" class="w98p">
    </div>
    <h3 class="subHeading">備考</h3>
    <div class="inputBox">
      <textarea rows="3" id="entryRemarks1" name="entryRemarks1" class="w98p"><?php echo (@$arrData[15]); ?></textarea>
    </div>
    <h2 class="headline">駆けつけ先情報</h2>
    <div class="checkBt">
      <input type="checkbox" id="entryCheck" name="entryCheck" value="1">
      <label for="entryCheck">上記と同じ</label>
    </div>
    <h3 class="subHeading require">代表者お名前</h3>
    <div class="inputBox"> 姓
      <input type="text" id="entryName2_1" name="entryName2_1" value="<?php echo @$arrData[16]; ?>" class="w35p">
      名
      <input type="text" id="entryName2_2" name="entryName2_2" value="<?php echo @$arrData[17]; ?>" class="w35p">
      <p class="caption">(例：鈴木　太郎)</p>
    </div>
    <h3 class="subHeading require">代表者フリガナ</h3>
    <div class="inputBox"> 姓
      <input type="text" id="entryKana2_1" name="entryKana2_1" value="<?php echo @$arrData[18]; ?>" class="w35p">
      名
      <input type="text" id="entryKana2_2" name="entryKana2_2" value="<?php echo @$arrData[19]; ?>" class="w35p">
      <p class="caption">(例：スズキ　タロウ)</p>
    </div>
    <h3 class="subHeading">年齢</h3>
    <div class="inputBox">
      <select name="ageGroup2" id="ageGroup2">
        <?php foreach(Yii::app()->params['ageGroup'] as $key => $value){

					echo '<option ' . (($key == @$arrData[32]) ? 'selected="selected"' : '') . ' value="'.$key.'">'.$value.'</option>';

				} ?>
      </select>
    </div>
    <h3 class="subHeading">電話番号（ご自宅）</h3>
    <div class="inputBox">
      <input type="tel" id="entryPhone2" name="entryPhone2" value="<?php echo @$arrData[20]; ?>" class="w98p">
      <p class="caption">(半角数字　例：0300000000)</p>
    </div>
    <h3 class="subHeading require">電話番号（携帯電話）</h3>
    <div class="inputBox">
      <input type="tel" id="entryMobile2" name="entryMobile2" value="<?php echo @$arrData[21]; ?>" class="w98p">
      <p class="caption">(半角数字　例：09000000000)</p>
    </div>
    <h3 class="subHeading require">メールアドレス</h3>
    <div class="inputBox">
      <input type="email" id="entryMail2_1" name="entryMail2_1" value="<?php echo @$arrData[22]; ?>" class="w98p">
      <p class="caption mB5">確認のためもう一度、入力してください。</p>
      <input type="email" id="entryMail2_2" name="entryMail2_2" value="<?php echo @$arrData[23]; ?>" class="w98p">
      <p class="caption">(半角英数字　例：aaa@docomo.ne.jp)</p>
    </div>
    <h3 class="subHeading require">郵便番号</h3>
    <div class="inputBox" id="inputZip2">
      <input type="text" id="entryZip2" name="entryZip2" value="<?php echo @$arrData[24]; ?>" class="w28p">
      <span class="caption">(半角数字　例：0000000)</span>　
      <input class="submitBt01" type="button" value="住所検索" id="searchZip2" />
    </div>
    <h3 class="subHeading require">都道府県</h3>
    <div class="inputBox">
      <select name="entryPref2" id="entryPref2">
        <?php foreach(Yii::app()->params['entryPref'] as $key => $value){

					echo '<option ' . (($key == @$arrData[25]) ? 'selected="selected"' : '') . ' value="'.$key.'">'.$value.'</option>';

				} ?>
      </select>
    </div>
    <h3 class="subHeading require">市区町村</h3>
    <div class="inputBox">
      <input type="text" id="entryAddress2_1" name="entryAddress2_1" value="<?php echo @$arrData[26]; ?>" class="w98p">
    </div>
    <h3 class="subHeading" style="display:none">町域</h3>
    <div class="inputBox" style="display:none">
      <input type="text" id="entryAddress2_2" name="entryAddress2_2" value="<?php echo @$arrData[27]; ?>" class="w98p">
    </div>
    <h3 class="subHeading">以降の住所（丁目、番地等）</h3>
    <div class="inputBox">
      <input type="text" id="entryAddress2_3" name="entryAddress2_3" value="<?php echo @$arrData[28]; ?>" class="w98p">
    </div>
    <h3 class="subHeading">建物名</h3>
    <div class="inputBox">
      <input type="text" id="entryAddress2_4" name="entryAddress2_4" value="<?php echo @$arrData[29]; ?>" class="w98p">
    </div>
    <h3 class="subHeading">備考</h3>
    <div class="inputBox">
      <p class="coution fwB">代表者以外の利用者がいる場合は、こちらに氏名をご記入ください。（※二親等以内の同居親族に限ります）</p>
      <textarea rows="3" id="entryRemarks2" name="entryRemarks2" class="w98p"><?php echo (@$arrData[30]); ?></textarea>
    </div>
   
    <!--#12675   20150710-->
	<div class="area_add" id="area_add" style="display:<?php if (@$arrData['Zaitaku_sub'] != 1){?>none<?php } ?> ">
  		<h2 class="headline">在宅確認サポート</h2>
        <div class="checkBt">
          <input type="checkbox" id="entryCheckAddArea" name="entryCheckAddArea" value="1">
          <label for="entryCheckAddArea">上記と同じ</label>
        </div>
        <h3 class="subHeading require">お名前</h3>
        <div class="inputBox"> 姓
          <input type="text" id="first_name3" name="first_name3" value="<?php echo @$arrData['first_name3']; ?>" class="w35p">
          名
          <input type="text" id="last_name3" name="last_name3" value="<?php echo @$arrData['last_name3']; ?>" class="w35p">
          <p class="caption">(例：鈴木　太郎)</p>
        </div>
        <h3 class="subHeading require">フリガナ</h3>
        <div class="inputBox"> 姓
          <input type="text" id="first_kana3" name="first_kana3" value="<?php echo @$arrData['first_kana3']; ?>" class="w35p">
          名
          <input type="text" id="last_kana3" name="last_kana3" value="<?php echo @$arrData['last_kana3']; ?>" class="w35p">
          <p class="caption">(例：スズキ　タロウ)</p>
        </div>
        <div style="display:none">
        <h3 class="subHeading">電話番号（ご自宅）</h3>
        <div class="inputBox">
          <input type="tel" id="tel3" name="tel3" value="<?php echo @$arrData['tel3']; ?>" class="w98p">
          <p class="caption">(半角数字　例：0300000000)</p>
        </div>
        </div>
        <h3 class="subHeading require">電話番号（携帯電話）</h3>
        <div class="inputBox">
          <input type="tel" id="mobile3" name="mobile3" value="<?php echo @$arrData['mobile3']; ?>" class="w98p">
          <p class="caption">(半角数字　例：09000000000)</p>
        </div>
       
        <h3 class="subHeading require">郵便番号</h3>
        <div class="inputBox" id="inputZip3">
          <input type="text" id="zip_code3" name="zip_code3" value="<?php echo @$arrData['zip_code3']; ?>" class="w28p">
          <span class="caption">(半角数字　例：0000000)</span>　
          <input class="submitBt01" type="button" value="住所検索" id="searchZip3" />
        </div>
        <h3 class="subHeading require">都道府県</h3>
        <div class="inputBox">
          <select name="pref3" id="pref3">
            <?php foreach(Yii::app()->params['entryPref'] as $key => $value){
    
                        echo '<option ' . (($key == @$arrData['pref3']) ? 'selected="selected"' : '') . ' value="'.$key.'">'.$value.'</option>';
    
                    } ?>
          </select>
        </div>
        <h3 class="subHeading require">市区町村</h3>
        <div class="inputBox">
          <input type="text" id="address3_1" name="address3_1" value="<?php echo @$arrData['address3_1']; ?>" class="w98p">
        </div>
        <h3 class="subHeading" style="display:none">町域</h3>
        <div class="inputBox" style="display:none">
          <input type="text" id="address3_2" name="address3_2" value="<?php echo @$arrData['address3_2']; ?>" class="w98p">
        </div>
        <h3 class="subHeading">以降の住所（丁目、番地等）</h3>
        <div class="inputBox">
          <input type="text" id="address3_3" name="address3_3" value="<?php echo @$arrData['address3_3']; ?>" class="w98p">
        </div>
        <h3 class="subHeading">建物名</h3>
        <div class="inputBox">
          <input type="text" id="address3_4" name="address3_4" value="<?php echo @$arrData['address3_4']; ?>" class="w98p">
        </div>
        <h3 class="subHeading require">続柄（二親等以内）</h3>
        <div class="inputBox">
          <select name="relationship3" id="relationship3">
            <?php foreach(Yii::app()->params['relationship'] as $key => $value){
    
                        echo '<option ' . (($key == @$arrData['relationship3']) ? 'selected="selected"' : '') . ' value="'.$key.'">'.$value.'</option>';
    
                    } ?>
          </select>
	<p class="caption">
	在宅確認サポート 利用規約<br />

	（在宅確認サポートの内容）
	当社は、会員に対して、加入者が在宅確認情報登録をした建物（共同住宅の場合には居住する戸室をいいます。以下同様とします。）における在宅確認サポートを行います。ただし、会員が在宅確認情報登録を行うにあたっては、在宅確認対象者による事前の承諾が必要となります。<br /><br />

	（在宅確認サポートにおける免責事項） <br />
	在宅確認サポートに関して、利用規約 第８条に定めるほか以下の事項に該当する場合、サービスの提供をお断りする場合があります。<br />
	（１）玄関の開錠を希望する場合<br />
	（２）玄関前の対応以外の対応を希望する場合<br />
	（３）会員の二親等内の親族以外からの依頼である場合<br />
	（４）在宅確認情報登録が未了の場合<br />
	（５）在宅確認対象者による事前の承諾が得られない場合<br />
	（６）在宅確認情報登録先の居住者もしくはその代理人より在宅確認サービス停止の要請があった場合<br />
	（７）在宅確認サポート本来の目的から逸脱した利用方法や、定期的または定常的な在宅確認を要望される等、利用頻度が著しく多いと当社が判断した場合
	</p>
        </div>
        
  	</div>  
   
   <div class="submitArea">
      <p><input type="button" onclick="confirm_contract();" style="cursor: pointer;" class="submitBt01" value="登録"></p>
      <br/>
      <br/>
    </div>
    
  </form>

</div>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/global/js/ajaxzip2.js" type="text/javascript"></script>
<?php 
Yii::app()->clientScript->registerScript('', "
$('#entryLicense01').focus();
");
?>
<script>

jQuery(document).ready(function () {
	$("input[name=Zaitaku_sub]").click(function(){
		if( $(this).is(":checked") ){
			$(".area_add").toggle();
		}else{
			$(".area_add").toggle();
		}
	});
	
	$("#entryCheckAddArea").change(function() {
		if($('#entryCheckAddArea').is(":checked")){
			$('#first_name3').val($('#entryName1_1').val());
			$('#last_name3').val($('#entryName1_2').val());
			$('#first_kana3').val($('#entryKana1_1').val());
			$('#last_kana3').val($('#entryKana1_2').val());
			//$('#tel3').val($('#entryPhone1').val());
			$('#mobile3').val($('#entryMobile1').val());
			$('#zip_code3').val($('#entryZip1').val());
			var value = $('#entryPref1 option:selected').val();
			$('#pref3 option[value="'+ value + '"]').prop("selected",true);
			$('#address3_1').val($('#entryAddress1_1').val());
			$('#address3_2').val($('#entryAddress1_2').val());
			$('#address3_3').val($('#entryAddress1_3').val());
			$('#address3_4').val($('#entryAddress1_4').val());
		}
	});



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
			$('#entryPref2 option[value="'+ value + '"]').prop("selected",true);
			var value = $('#ageGroup1 option:selected').val();
			$('#ageGroup2 option[value="'+ value + '"]').prop("selected",true);
			$('#entryAddress2_1').val($('#entryAddress1_1').val());
			$('#entryAddress2_2').val($('#entryAddress1_2').val());
			$('#entryAddress2_3').val($('#entryAddress1_3').val());
			$('#entryAddress2_4').val($('#entryAddress1_4').val());
			$('#entryRemarks2').val($('#entryRemarks1').val());
		}
	});
});
function submit_home(){
	//var entryLicense = $.trim($('#entryLicense01').val()) + $.trim($('#entryLicense02').val()) + $.trim($('#entryLicense03').val());
	var entryLicense = $.trim($('#entryLicense01').val());
	var message = '';
	var obj = {};
	var i = 0;
	var msg_pleaseInput = 'を入力してください。';
	var msg_invalid = 'は数字で入力してください。';
	var filterNumberPhone = /^[0-9-]+$/;
	var filterNumberQuantity = /^[0-9]{10,11}$/;
	var filterNumberQuantity11 = /^[0-9]{11}$/;
	var filterEntryZip = /^[0-9]{7}$/;
	if(entryLicense == ''){
		message += $('h3.license').text() + ' '+msg_pleaseInput+' <br />';
		obj[i++] = '#entryLicense01';
	}
	
	if($('#entryName1_1').val() == '' || $('#entryName1_2').val() == ''){
		obj[i++] = '#entryName1_1';
		message += '【契約者】お名前 '+msg_pleaseInput+' <br />';
	}else{
		/*if ( !isZenKana($('#entryName1_1').val()) || !isZenKana($('#entryName1_2').val()) ){
			obj[i++] = '#entryName1_1';
			message += 'お名前に全角文字で入力してください。<br />';
		}*/
	}

	if($('#entryKana1_1').val() == '' || $('#entryKana1_2').val() == ''){
		obj[i++] = '#entryKana1_1';
		message += '【契約者】フリガナ '+msg_pleaseInput+' <br />';
	}else{
		if ( !isZenKana($('#entryKana1_1').val()) || !isZenKana($('#entryKana1_2').val()) ){
			obj[i++] = '#entryKana1_1';
			message += '【契約者】フリガナは全角カタカナで入力して下さい<br />';
		}
	}
	if($('#entryPhone1').val() != ''){
		if ( !filterNumberPhone.test($.trim($('#entryPhone1').val())) || $.trim($('#entryPhone1').val()) == "" ) {
			obj[i++] = '#entryPhone1';
			message += '【契約者】電話番号（ご自宅）' + msg_invalid + ' <br />';
		}  else if(!filterNumberQuantity.test($.trim($('#entryPhone1').val().replace(/-/g, "")))){
			obj[i++] = '#entryPhone1';
			message += '【契約者】電話番号（ご自宅）の桁数に誤りがあります。 <br />';
		}
	}
	
	if($('#entryMobile1').val() == ''){
		obj[i++] = '#entryMobile1';
		message += '【契約者】電話番号（携帯電話）'+msg_pleaseInput+' <br />';
	}else{
	    if ( !filterNumberPhone.test($.trim($('#entryMobile1').val())) ) {
	        obj[i++] = '#entryMobile1';
			message += '【契約者】電話番号（携帯電話）' + msg_invalid + ' <br />';
	    } else if(!filterNumberQuantity11.test($.trim($('#entryMobile1').val().replace(/-/g, "")))){
			obj[i++] = '#entryMobile1';
			message += '【契約者】電話番号（携帯電話）の桁数に誤りがあります。 <br />';
		}
	}
	/*if($('#entryMail1_1').val() == ''){
		obj[i++] = '#entryMail1_1';
		message += 'メールアドレス '+msg_pleaseInput+' <br />';
	}*/
	if ( $('#entryMail1_1').val() == '' ){
		obj[i++] = '#entryMail1_1';
		message += '【契約者】メールアドレス'+msg_pleaseInput+' <br />';
	}
    /*else if(!isValidEmailAddress($('#entryMail1_1').val())){
		message += 'メールアドレスの形式が正しくありません。 <br />';
		obj[i++] = '#entryMail1_1';
	}*/
	if($('#entryMail1_2').val() != $('#entryMail1_1').val()){
		obj[i++] = '#entryMail1_2';
		message += '【契約者】確認用メールアドレスが一致しません <br />';
	}
	if($('#entryZip1').val() == ''){
		obj[i++] = '#entryZip1';
		message += '【契約者】郵便番号 '+msg_pleaseInput+' <br />';
	}else{
	    if ( !filterEntryZip.test($.trim($('#entryZip1').val().replace("-", ""))) ) {
	        obj[i++] = '#entryZip1';
			message += '【契約者】郵便番号の桁数に誤りがあります。 <br />';
	    }
	}
	if($('#entryPref1 option:selected').val() == ''){
		obj[i++] = '#entryPref1';
		message += '【契約者】都道府県 '+msg_pleaseInput+' <br />';
	}
	if($('#entryAddress1_1').val() == ''){
		obj[i++] = '#entryAddress1_1';
		message += '【契約者】市区町村 '+msg_pleaseInput+' <br />';
	}

	if($('#entryName2_1').val() == '' || $('#entryName2_2').val() == ''){
		obj[i++] = '#entryName2_1';
		message += '【代表者】代表者お名前 '+msg_pleaseInput+' <br />';
	}else{
		/*if ( !isZenKana($('#entryName2_1').val()) || !isZenKana($('#entryName2_2').val()) ){
			obj[i++] = '#entryName2_1';
			message += '代表者お名前に全角文字で入力してください。<br />';
		}*/
	}

	if($('#entryKana2_1').val() == '' || $('#entryKana2_2').val() == ''){
		obj[i++] = '#entryKana2_1';
		message += '【代表者】代表者フリガナ '+msg_pleaseInput+' <br />';
	}else{
		if ( !isZenKana($('#entryKana2_1').val()) || !isZenKana($('#entryKana2_2').val()) ){
			obj[i++] = '#entryKana2_1';
			message += '【代表者】代表者フリガナは全角カタカナで入力して下さい<br />';
		}
	}

	if($('#entryPhone2').val() != ''){
		if ( !filterNumberPhone.test($.trim($('#entryPhone2').val())) || $.trim($('#entryPhone2').val()) == "" ) {
			obj[i++] = '#entryPhone2';
			message += '【代表者】電話番号（ご自宅）' + msg_invalid + ' <br />';
		} else if(!filterNumberQuantity.test($.trim($('#entryPhone2').val().replace(/-/g, "")))){
			obj[i++] = '#entryPhone2';
			message += '【代表者】電話番号（ご自宅）の桁数に誤りがあります。 <br />';
		}
	}
	
	if($('#entryMobile2').val() == ''){
		obj[i++] = '#entryMobile2';
		message += '【代表者】代表者電話番号（携帯電話） '+msg_pleaseInput+' <br />';
	}else{
	    if ( !filterNumberPhone.test($.trim($('#entryMobile2').val())) ) {
	        obj[i++] = '#entryMobile2';
			message += '【代表者】電話番号（携帯電話）' + msg_invalid + ' <br />';
	    } else if(!filterNumberQuantity11.test($.trim($('#entryMobile2').val().replace(/-/g, "")))){
			obj[i++] = '#entryMobile2';
			message += '【代表者】電話番号（携帯電話）の桁数に誤りがあります。 <br />';
		}
	}
	/*if($('#entryMail2_1').val() == ''){
		obj[i++] = '#entryMail2_1';
		message += 'メールアドレス '+msg_pleaseInput+' <br />';
	}*/
	
	if ( $('#entryMail2_1').val() == '' ){
		obj[i++] = '#entryMail2_1';
		message += '【代表者】メールアドレス'+msg_pleaseInput+' <br />';
	}/*else if(!isValidEmailAddress($('#entryMail2_1').val())){
		message += 'メールアドレスの形式が正しくありません。 <br />';
		obj[i++] = '#entryMail2_1';
	}*/
	if($('#entryMail2_2').val() != $('#entryMail2_1').val()){
		obj[i++] = '#entryMail2_2';
		message += '【代表者】確認用メールアドレスが一致しません<br />';
	}
	if($('#entryZip2').val() == ''){
		obj[i++] = '#entryZip2';
		message += '【代表者】郵便番号 '+msg_pleaseInput+' <br />';
	}
	else{
	    if ( !filterEntryZip.test($.trim($('#entryZip2').val().replace("-", ""))) ) {
	        obj[i++] = '#entryZip2';
			message += '【代表者】郵便番号の桁数に誤りがあります。 <br />';
	    }
	}
	if($('#entryPref2 option:selected').val() == ''){
		obj[i++] = '#entryPref2';
		message += '【代表者】都道府県 '+msg_pleaseInput+' <br />';
	}
	if($('#entryAddress2_1').val() == ''){
		obj[i++] = '#entryAddress2_1';
		message += '【代表者】市区町村'+msg_pleaseInput+' <br />';
	}
	
	
	
	<!-- TTTTT -->
	if( $("input[name=Zaitaku_sub]").is(":checked") ){
		//msg3 = '在宅確認サポートの';
		if($('#first_name3').val() == '' || $('#last_name3').val() == ''){
			obj[i++] = '#first_name3';
			message += /*msg3 + */'【在宅確認】お名前 '+msg_pleaseInput+' <br />';
		}else{
			/*if ( !isZenKana($('#entryName2_1').val()) || !isZenKana($('#entryName2_2').val()) ){
				obj[i++] = '#entryName2_1';
				message += '代表者お名前に全角文字で入力してください。<br />';
			}*/
		}
	
		if($('#first_kana3').val() == '' || $('#last_kana3').val() == ''){
			obj[i++] = '#first_kana3';
			message += '【在宅確認】フリガナ '+msg_pleaseInput+' <br />';
		}else{
			if ( !isZenKana($('#first_kana3').val()) || !isZenKana($('#first_kana3').val()) ){
				obj[i++] = '#entryKana2_1';
				message += '【在宅確認】代表者フリガナは全角カタカナで入力して下さい<br />';
			}
		}
	
		
		/*if ( !filterNumberPhone.test($.trim($('#tel3').val())) || $.trim($('#tel3').val()) == "" ) {
			obj[i++] = '#tel3';
			message += '【在宅確認】電話番号（ご自宅）' + msg_invalid + ' <br />';
		} else if(!filterNumberQuantity.test($.trim($('#tel3').val().replace(/-/g, "")))){
			obj[i++] = '#tel3';
			message += '【在宅確認】電話番号（ご自宅）の桁数に誤りがあります。 <br />';
		}*/
		
		if($('#mobile3').val() == ''){
			obj[i++] = '#mobile3';
			message += '【在宅確認】代表者電話番号（携帯電話） '+msg_pleaseInput+' <br />';
		}else{
			if ( !filterNumberPhone.test($.trim($('#mobile3').val())) ) {
				obj[i++] = '#mobile3';
				message += '【在宅確認】電話番号（携帯電話）' + msg_invalid + ' <br />';
			} else if(!filterNumberQuantity11.test($.trim($('#mobile3').val().replace(/-/g, "")))){
				obj[i++] = '#mobile3';
				message += '【在宅確認】電話番号（携帯電話）の桁数に誤りがあります。 <br />';
			}
		}
		
		if($('#zip_code3').val() == ''){
			obj[i++] = '#zip_code3';
			message += '【在宅確認】郵便番号 '+msg_pleaseInput+' <br />';
		}
		else{
			if ( !filterEntryZip.test($.trim($('#zip_code3').val().replace(/-/g, "")))){
				obj[i++] = '#zip_code3';
				message += '【在宅確認】郵便番号の桁数に誤りがあります。 <br />';
			}
		}
		if($('#pref3 option:selected').val() == ''){
			obj[i++] = '#pref3';
			message += '【在宅確認】都道府県 '+msg_pleaseInput+' <br />';
		}
		if($('#address3_1').val() == ''){
			obj[i++] = '#address3_1';
			message += '【在宅確認】市区町村'+msg_pleaseInput+' <br />';
		}
		
		if($('#relationship3 option:selected').val() == ''){
			obj[i++] = '#relationship3';
			message += '【在宅確認】続柄（二親等以内）を選択してください。 <br />';
		}
	}
	
	if(message != ''){
		$('#error_sumary').html(message);
		//$(obj[0]).focus();
		$(window).scrollTop(100);
		return;
	}
	
	
    $.ajax({
        type: 'POST',
        url: "<?php echo Yii::app()->baseUrl; ?>" + '/family/CheckEmailAjax',
        datatype: 'json',
        data: {
            emailAddress1:$('#entryMail1_1').val(),
            emailAddress2:$('#entryMail2_1').val()
        },
        success: function(data) {
            if(data.result == 'error'){
                message += 'メールアドレスの形式が正しくありません。 <br />';
                if(data.entryMail1_1){
                    obj[i++] = '#entryMail1_1';
                }
                if(data.entryMail2_1){
                    obj[i++] = '#entryMail2_1';
                }
            }
            if(message != ''){
                $('#error_sumary').html(message);
                //$(obj[0]).focus();
                $(window).scrollTop(100);
                return;
            }
			
			var Zaitaku_sub = 0;
			if( $("input[name=Zaitaku_sub]").is(":checked") )
				Zaitaku_sub = 1;
			
            var link = "<?php echo Yii::app()->baseUrl; ?>" + '/family/CheckFamilyEntry';
            var varEntryPhone1 = $('#entryPhone1').val().replace(/-/g,"");
            var varEntryMobile1 = $('#entryMobile1').val().replace(/-/g,"");
            var varEntryZip1 = $('#entryZip1').val().replace(/-/g,"");
            var varEntryPhone2 = $('#entryPhone2').val().replace(/-/g,"");
            var varEntryMobile2 = $('#entryMobile2').val().replace(/-/g,"");
            var varEntryZip2 = $('#entryZip2').val().replace(/-/g,"");
			
			var tel3 = $('#tel3').val().replace(/-/g,"");
            var mobile3 = $('#mobile3').val().replace(/-/g,"");
            var zip_code3 = $('#zip_code3').val().replace(/-/g,"");
			
			dataAll = {};
			var data = {
                    param1: entryLicense,
                    param2: $('#entryName1_1').val(),
                    param3: $('#entryName1_2').val(),
                    param4: $('#entryKana1_1').val(),
                    param5: $('#entryKana1_2').val(),
                    param6: varEntryPhone1,
                    param7: varEntryMobile1,
                    param8: $('#entryMail1_1').val(),
                    param9: $('#entryMail1_2').val(),
                    param10: varEntryZip1,
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
                    param21: varEntryPhone2,
                    param22: varEntryMobile2,
                    param23: $('#entryMail2_1').val(),
                    param24: $('#entryMail2_2').val(),
                    param25: varEntryZip2,
                    param26: $('#entryPref2 option:selected').val(),
                    param27: $('#entryAddress2_1').val(),
                    param28: $('#entryAddress2_2').val(),
                    param29: $('#entryAddress2_3').val(),
                    param30: $('#entryAddress2_4').val(),
                    param31: $('#entryRemarks2').val(),
                    param32: $('#ageGroup1').val(),
                    param33: $('#ageGroup2').val(),
					'Zaitaku_sub': Zaitaku_sub	
                };
			if ( Zaitaku_sub == 1 ){
				dataSub = {
							first_name3: $('#first_name3').val(),
							last_name3: $('#last_name3').val(),
							first_kana3: $('#first_kana3').val(),
							last_kana3: $('#last_kana3').val(),
							'tel3': tel3,
							'mobile3': mobile3,
							'zip_code3': zip_code3,
							pref3: $('#pref3 option:selected').val(),
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
                        var text_license = $('h3.license').text();
                        alert('エラー ' + text_license);
                        $('#entryLicense01').val('');
                        $('#entryLicense02').val('');
                        $('#entryLicense03').val('');
                        $('#entryLicense01').focus();
                    }else{
                        window.location = "<?php echo Yii::app()->baseUrl; ?>" + '/familyConfirm?license01=' + $('#entryLicense01').val();
                        /* window.location = "<?php echo Yii::app()->baseUrl; ?>" + '/familyConfirm?license01=' + $('#entryLicense01').val(); */
                    }
                },
                error: function (msg) {
                    alert('データの送信に失敗しました。');
                }
            });
        },
        error: function (msg) {
            alert('データの送信に失敗しました。');
        }
    });

}

function checkRequiredInput(id, field_name){
	
}

function isZenKana(str) {
	//1 byte
  	//var zen = "1234567890ｰｶﾞｷﾞｸﾞｹﾞｺﾞｻﾞｼﾞｽﾞｾﾞｿﾞﾀﾞﾁﾞﾂﾞﾃﾞﾄﾞﾊﾞﾋﾞﾌﾞﾍﾞﾎﾞﾊﾟﾋﾟﾌﾟﾍﾟﾎﾟｱｲｳｴｵｶｷｸｹｺｻｼｽｾｿﾀﾁﾂﾃﾄﾅﾆﾇﾈﾉﾊﾋﾌﾍﾎﾏﾐﾑﾒﾓﾔﾕﾖﾗﾘﾙﾚﾛﾜｦﾝｧｨｩｪｫｯｬｭｮ ";
  	//2 byte
  	var zen="ガギグゲゴザジズゼゾダヂヅデドバビブベボパピプペポアイウエオカキクケコサシスセソタチツテトナニヌネノハヒフヘホマミムメモヤユヨラリルレロワヲンァィゥェォッャュョーｰ";//アイウエオカキクケコサシスセソタチツテトナニヌネノハヒフヘホマミムメモヤユヨラリルレロワヲンァィゥェォッャュョ
  
    var flag = 1;
  	if( str != '' ){
  		for (var i=0; i<str.length; i++) {
   			var tmp1 = str.substr(i,1);
        	if( zen.indexOf(tmp1) < 0 ){
    	 		flag = 0 
    		}
   		}
    	if(flag == 0 ){
    		return false;
  		}
 	}
	return true;
}
$(function(){
	AjaxZip2.JSONDATA = "<?php echo Yii::app()->baseUrl; ?>" + '/global/js/json/data';
	jQuery('#inputZip1').on('click','#searchZip1',function(){
		AjaxZip2.zip2addr('entryZip1', 'entryPref1', 'entryAddress1_1');
    })
	jQuery('#inputZip2').on('click','#searchZip2',function(){
		AjaxZip2.zip2addr('entryZip2', 'entryPref2', 'entryAddress2_1');
    })
	jQuery('#inputZip3').on('click','#searchZip3',function(){
		AjaxZip2.zip2addr('zip_code3', 'pref3', 'address3_1');
    })

})

function confirm_contract()
{
	var licence_key = $("#entryLicense01").val();
	var link = "<?php echo Yii::app()->baseUrl; ?>" + '/family/CheckContract';
	$.ajax({
		type: 'POST',
		url: link,
		data:{licence_key: licence_key},
		success: function (data) {
            if(data == '0') 
			{
				var msg = '誤った優待コードを入力した恐れがあります。　優待コードをご確認ください。';
				$('#error_sumary').html(msg);
				$(window).scrollTop(100);
			}
			else if(data == '2')
			{
				var msg = '重複する優待コードが入力されました。すでに登録されているか、誤った優待コードを入力した恐れがあります。優待コードをご確認ください。';
				$('#error_sumary').html(msg);
				$(window).scrollTop(100);
			}else{
				submit_home();
			}
        }
	});
}
function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^([\.]*)(?:(?:(?:(?:[a-zA-Z0-9_!#\$\%&'*+/=?\^`{}~|\-]+)(([\.]*)(?:[a-zA-Z0-9_!#\$\%&'*+/=?\^`{}~|\-]+))*)|((?:\\[^\r\n]|[^\\])*)))([\.]*)\@(?:(?:(?:(?:[a-zA-Z0-9_!#\$\%&'*+/=?\^`{}~|\-]+)(?:\.(?:[a-zA-Z0-9_!#\$\%&'*+/=?\^`{}~|\-]+))*)|(?:\[(?:\\\S|[\x21-\x5a\x5e-\x7e])*\])))$/);
    return pattern.test(emailAddress);
};
</script>
