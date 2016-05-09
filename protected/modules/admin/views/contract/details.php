<?php
$this->breadcrumbs = array(
    'Contract',
);
?>

<!-- BEGIN Tiles -->
<div class="row-fluid page-title">
    <div class="span8">
        <h1 style="font-weight: bold;">顧客データ確認・変更画面</h1>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
	<form id="frm_editContract" action="">
        <div class="control-group">
            <div class="controls">
				<div id="error_sumary" style="margin: 0px 0px 10px 10px; color: #F00;"></div>
                <div class="row-fluid">
                    <div class="span5">
                        <p class="inline-block mts mll" style="min-width: 70px; font-size: 18px; font-weight: bold;">お客様情報 </p>
                    </div>
                    <div class="span5">
                        <p class="inline-block mts mll" style="min-width: 70px; font-size: 18px; font-weight: bold;">駆けつけ先情報</p>
                    </div>
                </div>
				<input type="hidden" name="id" id="id" value="<?php echo $model->id; ?>" />
                <div class="row-fluid">
                    <div class="span5" style="margin-left: 20px;">
                        <p class="inline-block mts mll" style="min-width: 170px">お名前</p> 姓 
                        <input type="text" name="entryName1_1" id="entryName1_1" value="<?php echo $model->first_name1; ?>" class="input-medium" style="min-width: 70px; width: 70px;"/>  名  
						<input type="text" name="entryName1_2" id="entryName1_2" value="<?php echo $model->last_name1; ?>" class="input-medium" style="min-width: 70px; width: 70px; margin-left: 10px;"/>
                    </div>
                    <div class="span5" style="margin-left: 20px;">
                        <p class="inline-block mts mll" style="min-width: 170px">代表者お名前</p> 姓 
                        <input type="text" name="entryName2_1" id="entryName2_1" value="<?php echo $model->first_name2; ?>" class="input-medium" style="min-width: 70px; width: 70px;"/>  名  
						<input type="text" name="entryName2_2" id="entryName2_2" value="<?php echo $model->last_name2; ?>" class="input-medium" style="min-width: 70px; width: 70px; margin-left: 10px;"/>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span5" style="margin-left: 20px;">
                        <p class="inline-block mts mll" style="min-width: 170px">フリガナ</p> 姓 
                        <input type="text" name="entryKana1_1" id="entryKana1_1" value="<?php echo $model->first_kana1; ?>" class="input-medium" style="min-width: 70px; width: 70px;"/>  名  
						<input type="text" name="entryKana1_2" id="entryKana1_2" value="<?php echo $model->last_kana1; ?>" class="input-medium" style="min-width: 70px; width: 70px; margin-left: 10px;"/>
                    </div>
                    <div class="span5" style="margin-left: 20px;">
                        <p class="inline-block mts mll" style="min-width: 170px">代表者フリガナ</p> 姓 
                        <input type="text" name="entryKana2_1" id="entryKana2_1" value="<?php echo $model->first_kana2; ?>" class="input-medium" style="min-width: 70px; width: 70px;"/>  名  
						<input type="text" name="entryKana2_2" id="entryKana2_2" value="<?php echo $model->last_kana2; ?>" class="input-medium" style="min-width: 70px; width: 70px; margin-left: 10px;"/>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span5" style="margin-left: 20px;">
                        <p class="inline-block mts mll" style="min-width: 170px">年齢</p>
						<select name="ageGroup1" id="ageGroup1" class="input-medium" style="min-width: 200px;">
							<?php foreach(Yii::app()->params['ageGroup'] as $key => $value){
								echo '<option ' . (($key == $model->age_group) ? 'selected="selected"' : '') . ' value="'.$key.'">'.$value.'</option>';
							} ?>
						</select>
                    </div>
                    <div class="span5" style="margin-left: 20px;">
                        <p class="inline-block mts mll" style="min-width: 170px">年齢</p>
						<select name="ageGroup2" id="ageGroup2" class="input-medium" style="min-width: 200px;">
							<?php foreach(Yii::app()->params['ageGroup'] as $key => $value){
								echo '<option ' . (($key == $model->age_group2) ? 'selected="selected"' : '') . ' value="'.$key.'">'.$value.'</option>';
							} ?>
						</select>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span5" style="margin-left: 20px;">
                        <p class="inline-block mts mll" style="min-width: 170px">電話番号（ご自宅）</p>
                        <input type="tel" id="entryPhone1" name="entryPhone1" type="text" value="<?php echo $model->tel1; ?>" class="input-medium" style="min-width: 200px;"/>
                    </div>
                    <div class="span5" style="margin-left: 20px;">
                        <p class="inline-block mts mll" style="min-width: 170px">電話番号（ご自宅）</p>
                        <input type="tel" id="entryPhone2" name="entryPhone2" value="<?php echo $model->tel2; ?>" class="input-medium" style="min-width: 200px;"/>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span5" style="margin-left: 20px;">
                        <p class="inline-block mts mll" style="min-width: 170px">電話番号（携帯電話）</p>
                        <input type="tel" id="entryMobile1" name="entryMobile1" value="<?php echo $model->mobile1; ?>" class="input-medium" style="min-width: 200px;"/>
                    </div>
                    <div class="span5" style="margin-left: 20px;">
                        <p class="inline-block mts mll" style="min-width: 170px">電話番号（携帯電話）</p>
                        <input type="tel" id="entryMobile2" name="entryMobile2" value="<?php echo $model->mobile2; ?>" class="input-medium" style="min-width: 200px;"/>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span5" style="margin-left: 20px;">
                        <p class="inline-block mts mll" style="min-width: 170px">メールアドレス</p>
                        <input type="email" id="entryMail1_1" name="entryMail1_1" value="<?php echo $model->email1; ?>" class="input-medium" style="min-width: 200px;"/>
                    </div>
                    <div class="span5" style="margin-left: 20px;">
                        <p class="inline-block mts mll" style="min-width: 170px">メールアドレス</p>
                        <input type="email" id="entryMail2_1" name="entryMail2_1" value="<?php echo $model->email2; ?>" class="input-medium" style="min-width: 200px;"/>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span5" style="margin-left: 20px;">
                        <p class="inline-block mts mll" style="min-width: 170px">郵便番号</p>
                        <input type="text" id="entryZip1" name="entryZip1" value="<?php echo $model->zip_code1; ?>" class="input-medium" style="min-width: 200px;"/>
                    </div>
                    <div class="span5" style="margin-left: 20px;">
                        <p class="inline-block mts mll" style="min-width: 170px">郵便番号</p>
                        <input type="text" id="entryZip2" name="entryZip2" value="<?php echo $model->zip_code2; ?>" class="input-medium" style="min-width: 200px;"/>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span5" style="margin-left: 20px;">
                        <p class="inline-block mts mll" style="min-width: 170px">都道府県</p>
						<select name="entryPref1" id="entryPref1" class="input-medium" style="min-width: 200px;">
							<?php foreach(Yii::app()->params['entryPref'] as $key => $value){
								echo '<option ' . (($key == $model->pref1) ? 'selected="selected"' : '') . ' value="'.$key.'">'.$value.'</option>';
							} ?>
						</select>
                    </div>
                    <div class="span5" style="margin-left: 20px;">
                        <p class="inline-block mts mll" style="min-width: 170px">都道府県</p>
						<select name="entryPref2" id="entryPref2" class="input-medium" style="min-width: 200px;">
							<?php foreach(Yii::app()->params['entryPref'] as $key => $value){
								echo '<option ' . (($key == $model->pref2) ? 'selected="selected"' : '') . ' value="'.$key.'">'.$value.'</option>';
							} ?>
						</select>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span5" style="margin-left: 20px;">
                        <p class="inline-block mts mll" style="min-width: 170px">市区町村</p>
                        <input type="text" id="entryAddress1_1" name="entryAddress1_1" value="<?php echo $model->address1_1; ?>" class="input-medium" style="min-width: 200px;"/>
                    </div>
                    <div class="span5" style="margin-left: 20px;">
                        <p class="inline-block mts mll" style="min-width: 170px">市区町村</p>
                        <input type="text" id="entryAddress2_1" name="entryAddress2_1" value="<?php echo $model->address2_1; ?>" class="input-medium" style="min-width: 200px;"/>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span5" style="margin-left: 20px;">
                        <p class="inline-block mts mll" style="min-width: 170px">町域</p>
                        <input type="text" id="entryAddress1_2" name="entryAddress1_2" value="<?php echo $model->address1_2; ?>" class="input-medium" style="min-width: 200px;"/>
                    </div>
                    <div class="span5" style="margin-left: 20px;">
                        <p class="inline-block mts mll" style="min-width: 170px">町域</p>
                        <input type="text" id="entryAddress2_2" name="entryAddress2_2" value="<?php echo $model->address2_2; ?>" class="input-medium" style="min-width: 200px;"/>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span5" style="margin-left: 20px;">
                        <p class="inline-block mts mll" style="min-width: 170px">以降の住所（丁目、番地等）</p>
                        <input type="text" id="entryAddress1_3" name="entryAddress1_3" value="<?php echo $model->address1_3; ?>" class="input-medium" style="min-width: 200px;"/>
                    </div>
                    <div class="span5" style="margin-left: 20px;">
                        <p class="inline-block mts mll" style="min-width: 170px">以降の住所（丁目、番地等）</p>
                        <input type="text" id="entryAddress2_3" name="entryAddress2_3" value="<?php echo $model->address2_3; ?>" class="input-medium" style="min-width: 200px;"/>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span5" style="margin-left: 20px;">
                        <p class="inline-block mts mll" style="min-width: 170px">建物名</p>
                        <input type="text" id="entryAddress1_4" name="entryAddress1_4" value="<?php echo $model->address1_4; ?>" class="input-medium" style="min-width: 200px;"/>
                    </div>
                    <div class="span5" style="margin-left: 20px;">
                        <p class="inline-block mts mll" style="min-width: 170px">建物名</p>
                        <input type="text" id="entryAddress2_4" name="entryAddress2_4" value="<?php echo $model->address2_4; ?>" class="input-medium" style="min-width: 200px;"/>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span5" style="margin-left: 20px; margin-bottom: 10px;">
                        <p class="inline-block mts mll" style="min-width: 170px">備考</p>
                        <textarea id="entryRemarks1" name="entryRemarks1" class="input-medium" style="min-width: 200px;"><?php echo $model->remark1; ?></textarea>
                    </div>
                    <div class="span5" style="margin-left: 20px;">
                        <p class="inline-block mts mll" style="min-width: 170px">備考</p>
                        <textarea id="entryRemarks2" name="entryRemarks2" class="input-medium" style="min-width: 200px;"><?php echo $model->remark2; ?></textarea>
                    </div>
                </div>
				<div class="row-fluid">
                    <div class="span5" style="margin-left: 20px; margin-bottom: 10px;">
                        <p class="inline-block mts mll" style="min-width: 170px">保有チケットID</p>
                        <textarea id="ticket_id" name="ticket_id" class="input-medium" style="min-width: 200px;height: 100px;"><?php echo $model->ticket_id; ?></textarea>
                    </div>                    
                </div>
				<div class="row-fluid">
                    <div class="span5" style="margin-left: 20px; margin-bottom: 10px;">
						<p class="inline-block mts mll" style="min-width: 170px">ステータス</p>
						<select name="ticket_status" id="ticket_status" class="input-medium" style="min-width: 200px;">
						<?php
							$statusArr = array('1' => '未利用', '2' => '予約中', '3' => '利用済', '4' => '決済取消');
							foreach ($statusArr as $key => $value){
								if($model->ticket_status == $key){
									echo "<option value='" . $key . "' selected>" . $value . "</option>";
								}else{
									echo "<option value='" . $key . "'>" . $value . "</option>";
								}
							}
						?>
						</select>
					</div>                    
                </div>
            </div>
			<?php if ($model -> Zaitaku_sub == '1') 
                			$hidden_field = "";
                		 else 
                		 	$hidden_field = "display:none"; 
            ?>
			<input type="hidden" name="detailID" value="<?php echo $model->id; ?>" />
            <div class="controls" style="<?php echo $hidden_field; ?>">
                <div class="row-fluid">
                    <div class="span5">
                        <p class="inline-block mts mll" style="min-width: 70px; font-size: 18px; font-weight: bold; <?php echo $hidden_field; ?>">在宅確認情報 </p>
                    </div>
                    <div class="span5">
                        <p class="inline-block mts mll" style="min-width: 70px; font-size: 18px; font-weight: bold;">在宅確認申込み情報</p>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span5" style="margin-left: 20px; <?php echo $hidden_field; ?>">
                        <p class="inline-block mts mll" style="min-width: 170px">お名前</p> 姓 
                        <input type="text" name="first_name3" id="first_name3" value="<?php echo $model->first_name3; ?>" class="input-medium" style="min-width: 70px; width: 70px;"/>  名  
						<input type="text" name="last_name3" id="last_name3" value="<?php echo $model->last_name3; ?>" class="input-medium" style="min-width: 70px; width: 70px; margin-left: 10px;"/>
                    </div>
                    <div class="span5" style="margin-left: 20px;">
                        <p class="inline-block mts mll" style="min-width: 170px">一回目確認連絡</p>
                    </div>
                </div>
				
                <div class="row-fluid">
                    <div class="span5" style="margin-left: 20px; <?php echo $hidden_field; ?>">
                        <p class="inline-block mts mll" style="min-width: 170px">フリガナ</p> 姓 
                        <input type="text" name="first_kana3" id="first_kana3" value="<?php echo $model->first_kana3; ?>" class="input-medium" style="min-width: 70px; width: 70px;"/>  名  
						<input type="text" name="last_kana3" id="last_kana3" value="<?php echo $model->last_kana3; ?>" class="input-medium" style="min-width: 70px; width: 70px; margin-left: 10px;"/>
                    </div>
                    <div class="span5" style="margin-left: 20px;">
                        <p class="inline-block mts mll" style="min-width: 60px; padding-left: 0px;">ステータス</p>
						<?php
							echo CHtml::dropDownList('statusA', ($model->Conf_1_status != "" ? $model->Conf_1_status : "0"), 
								Yii::app()->params['statusSelect'],
								array('onchange'=>"showDateA()",
										'style' => 'width:100px; height:25px; color: #000000',
										'class' => 'input-small'
									));
						?>
                        <p class="inline-block mts mll" style="min-width: 50px; padding-left: 0px;">連絡日</p>
                        <input type="text" id="contact_dateA" name="contact_dateA" class="input-small" value="<?php echo ($model->Conf_1_datetime != "" ? $model->Conf_1_datetime : ""); ?>" style="color: #000000; width:80px;"/>
                        
                        <input type="text" id="contact_timeA" name="contact_timeA" class="input-small" value="<?php echo ($model->Conf_1_datetime != "" ? date("H:i", strtotime($model->Conf_1_datetime)) : ""); ?>" style="color: #000000; width:35px;"/>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span5" style="margin-left: 20px; <?php echo $hidden_field; ?>">
						<p class="inline-block mts mll" style="min-width: 170px">電話番号（携帯電話）</p>
                        <input type="text" id="mobile3" name="mobile3" value="<?php echo $model->mobile3; ?>" class="input-medium" style="min-width: 200px;"/>
                    </div>
                    <div class="span5" style="margin-left: 20px;">
                        <p class="inline-block mts mll" style="min-width: 170px">二回目確認連絡</p>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span5" style="margin-left: 20px; <?php echo $hidden_field; ?>">
                        <p class="inline-block mts mll" style="min-width: 170px">郵便番号</p>
                        <input type="text" id="zip_code3" name="zip_code3" value="<?php echo $model->zip_code3; ?>" class="input-medium" style="min-width: 200px;"/>
                    </div>
                    <div class="span5" style="margin-left: 20px;">
                        <p class="inline-block mts mll" style="min-width: 60px; padding-left: 0px;">ステータス</p>
                            <?php
							echo CHtml::dropDownList('statusB', ($model->Conf_2_status != "" ? $model->Conf_2_status : "0"), 
								Yii::app()->params['statusSelect'],
								array('onchange'=>"showDateB()",
										'style' => 'width:100px; height:25px; color: #000000',
										'class' => 'input-small'
									));
						?>
                        <p class="inline-block mts mll" style="min-width: 50px; padding-left: 0px;">連絡日</p>
                        <input type="text" id="contact_dateB" name="contact_dateB" class="input-small" value="<?php echo ($model->Conf_2_datetime != "" ? $model->Conf_2_datetime : ""); ?>" style="color: #000000; width:80px;"/>
                        <input type="text" id="contact_timeB" name="contact_timeB" class="input-small" value="<?php echo ($model->Conf_2_datetime != "" ? date("H:i", strtotime($model->Conf_2_datetime)) : ""); ?>" style="color: #000000; width:35px;"/>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span5" style="margin-left: 20px; <?php echo $hidden_field; ?>">
                        <p class="inline-block mts mll" style="min-width: 170px">都道府県</p>
						<select name="pref3" id="pref3" class="input-medium" style="min-width: 200px;">
							<?php foreach(Yii::app()->params['entryPref'] as $key => $value){
								echo '<option ' . (($key == $model->pref3) ? 'selected="selected"' : '') . ' value="'.$key.'">'.$value.'</option>';
							} ?>
						</select>
                    </div>
                    <div class="span5">
						<p class="inline-block mts mll" style="min-width: 170px">確認結果</p>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span5" style="margin-left: 20px; <?php echo $hidden_field; ?>">
                        <p class="inline-block mts mll" style="min-width: 170px">市区町村</p>
                        <input type="text" id="address3_1" name="address3_1" value="<?php echo $model->address3_1; ?>" class="input-medium" style="min-width: 200px;"/>
                    </div>
                    <div class="span5" style="margin-left: 20px;">
                    	<p class="inline-block mts mll" style="min-width: 60px; padding-left: 0px;">ステータス</p>
                            <?php
							echo CHtml::dropDownList('statusC', ($model->Conf_3_status != "" ? $model->Conf_3_status : "0"), 
								Yii::app()->params['statusSelect2'],
								array('onchange'=>"showDateC()",
										'style' => 'width:100px; height:25px; color: #000000',
										'class' => 'input-small'
									));
						?>
                        <p class="inline-block mts mll" style="min-width: 50px; padding-left: 0px;">連絡日</p>
                        <input type="text" id="contact_dateC" name="contact_dateC" class="input-small" value="<?php echo ($model->Conf_3_datetime != "" ? $model->Conf_3_datetime : ""); ?>" style="color: #000000; width:80px;"/>
                        <input type="text" id="contact_timeC" name="contact_timeC" class="input-small" value="<?php echo ($model->Conf_3_datetime != "" ? date("H:i", strtotime($model->Conf_3_datetime)) : ""); ?>" style="color: #000000; width:35px;"/>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span5" style="margin-left: 20px; <?php echo $hidden_field; ?>">
                        <p class="inline-block mts mll" style="min-width: 170px">以降の住所（丁目、番地等）</p>
                        <input type="text" id="address3_3" name="address3_3" value="<?php echo $model->address3_3; ?>" class="input-medium" style="min-width: 200px;"/>
                    </div>
                    <div class="span5" style="margin-left: 20px;">
                    	<button disabled="disabled" onclick="return false;" id="confirmMail" class="btn btn-browse mll"  style="float:left;margin-left: 30px;" >完了メールを送信</button>
                        <button disabled="disabled" onclick="return false;" id="confirmMailB" class="btn btn-browse mll"  style="float:right; margin-right: 16px;" >不在メールを送信</button>
                   </div>
                </div>
                <div class="row-fluid">
                    <div class="span5" style="margin-left: 20px; <?php echo $hidden_field; ?>">
						<p class="inline-block mts mll" style="min-width: 170px">建物名</p>
                        <input type="text" id="address3_4" name="address3_4" value="<?php echo $model->address3_4; ?>" class="input-medium" style="min-width: 200px;"/>
                    </div>
                    <div class="span5" style="margin-left: 20px;">
                    	<div style="text-align:center; color:#FF0000" id="par_show_message"></div>
                        <p class="inline-block mts mll" style="min-width: 60px; padding-left: 0px;">備考</p>
                        <textarea id="remark3" name="remark3" class="input-medium" style="min-width: 300px;"><?php echo $model->remark3; ?></textarea>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span5" style="margin-left: 20px; <?php echo $hidden_field; ?>">
                        <p class="inline-block mts mll" style="min-width: 170px">続柄（二親等以内）</p>
						<select name="relationship3" id="relationship3" class="input-medium" style="min-width: 200px;">
							<?php foreach(Yii::app()->params['relationship'] as $key => $value){
								echo '<option ' . (($key == $model->relationship3) ? 'selected="selected"' : '') . ' value="'.$key.'">'.$value.'</option>';
							} ?>
						</select>
                    </div>
                    <div class="span5" style="margin-left: 20px;">
                    	<p class="inline-block mts mll" style="min-width: 170px">登録情報変更に伴う確認情報のリセット</p>
                    </div>
                </div>
                
                <div class="row-fluid">
                    <div class="span5" style="margin-left: 20px; <?php echo $hidden_field; ?>">
                    </div>
                    <div class="span5" style="margin-left: 20px;">
                    	<button onclick="return false;" id="reset" class="btn btn-browse mll"  style="float:left; margin-left:50px" >リセット</button>
                    </div>
                </div>
                
            </div>
           <div class="row-fluid" style="margin: 10px 0 10px 250px">
                <div class="span5" style="margin-left: 20px;">
                    <button onclick="return false;" id="copy_left_to_right" class="btn btn-browse mll" >お客様情報を駆けつけ先情報へコピーする</button>
                </div>
            </div>
            <div class="row-fluid mtl">
                <div style="margin-left: 20px; display:" class="span5"></div>
                <div style="margin-left: 20px;" class="span5" align="right">
                    <input id="change_send_email" name="change_send_email" value="1" type="checkbox" style="vertical-align:baseline" /> お客様情報の変更を利用者にメール送信する
                </div>
            </div>
            
            <div class="row-fluid">
                <div class="span3">
                    <a class="btn btn-danger" href="/admin/contract/users" style="min-width: 70px;">キャンセル</a>
                </div>
                <div class="span4">
                    
                </div>
                <div class="span3 text-right">
                    <a class="btn btn-success" href="#" style="min-width: 70px;" onclick="changeStatus();">変更</a>
                </div>
            </div>
        </div>
	</form>
    </div>
</div>
<div id="confirmDiaglog">
	<span id="msg_confirm_send_mail"></span><br /><br />
	<button id="closeConfirmDialog" class="btn btn-danger" style="float: left; min-width: 100px;">キャンセル</button>  
	<form action="<?php echo Yii::app()->request->baseUrl; ?>/contract/sendMail" method="post" id="frmSendMailStatus">
		<input type="hidden" name="id" value="<?php echo $model->id; ?>" />
		<input type="hidden" name="email" value="<?php echo $model->email1; ?>" />
		<input type="hidden" name="emailType" id="emailType" value="" />
		<input type="hidden" name="data[]" value="" />
        <input type="hidden" name="first_name" id="first_name" value="" />
        <input type="hidden" name="last_name" id="last_name" value="" />
        <input type="hidden" name="first_status" id="first_status" value=""/>
        <input type="hidden" name="second_status" id="second_status" value=""/>
        <input type="hidden" name="third_status" id="third_status" value=""/>
        <input type="hidden" name="first_contact_date" id="first_contact_date" value=""/>
        <input type="hidden" name="second_contact_date" id="second_contact_date" value=""/>
        <input type="hidden" name="third_contact_date" id="third_contact_date" value=""/>
		<button id="closeSuccessDialog" class="btn btn-success" style="float: right; min-width: 100px;" type="submit">OK</button>
	</form>
</div>
<div id="confirmResetA">
	在宅確認情報変更に伴い、在宅確認に関する確認情報を削除してよろしいですか？<br /><br />
	<button id="closeConfirmA" class="btn btn-danger" style="float: left; min-width: 100px;" id="showResetB">キャンセル</button>  
	<button id="SuccessConfirmA" class="btn btn-success" style="float: right; min-width: 100px;" type="submit">OK</button>
</div>
<div id="confirmResetB">
	削除した在宅確認に関する確認情報は元に戻せません。
本当に削除してよろしいですか？
	<br /><br />
	<button id="closeConfirmB" class="btn btn-danger" style="float: left; min-width: 100px;">キャンセル</button>  
	<button onclick="resetStatus()" id="SuccessConfirmB" class="btn btn-success" style="float: right; min-width: 100px;" type="submit">OK</button>
</div>
<script>
$(document).ready(function() {
    $("#contact_dateA").datepicker({dateFormat: 'yy/mm/dd'}, $.datepicker.regional['ja']);
	$("#contact_dateA").mask("9999/99/99");
	$('#contact_timeA').timepicker({
		showPeriodLabels: false,
		timeFormat: 'H:i'
	});
    $("#contact_dateB").datepicker({dateFormat: 'yy/mm/dd'}, $.datepicker.regional['ja']);
    $("#contact_dateB").mask("9999/99/99");
	$('#contact_timeB').timepicker({
		showPeriodLabels: false,
		timeFormat: 'H:i'
	});
	$("#contact_dateC").datepicker({dateFormat: 'yy/mm/dd'}, $.datepicker.regional['ja']);
    $("#contact_dateC").mask("9999/99/99");
	$('#contact_timeC').timepicker({
		showPeriodLabels: false,
		timeFormat: 'H:i'
	});
	
	$('div#confirmDiaglog').dialog({ autoOpen: false })
	$('div#confirmResetA').dialog({ autoOpen: false })
	$('div#confirmResetB').dialog({ autoOpen: false })
	$('#confirmMail').click(function(){ $('div#confirmDiaglog').dialog('open'); });
	$('#confirmMailB').click(function(){ $('div#confirmDiaglog').dialog('open'); });
	$('#reset').click(function(){ $('div#confirmResetA').dialog('open'); });
	$('#SuccessConfirmA').click(function(){ $('div#confirmResetB').dialog('open'); });
	$('#SuccessConfirmA').click(function(){ $('div#confirmResetA').dialog('close'); });
	$('#confirmMail').click(function(){ $('div#confirmDiaglog').dialog('open'); });
	$('#confirmMail').click(function(){ $('div#confirmDiaglog').dialog('open'); });
	$('#closeConfirmDialog').click(function(){ $('div#confirmDiaglog').dialog('close'); });
	$('#closeConfirmA').click(function(){ $('div#confirmResetA').dialog('close'); });
	$('#closeConfirmB').click(function(){ $('div#confirmResetB').dialog('close'); });
	$(".ui-dialog-titlebar").hide();
	
	$("#copy_left_to_right").unbind('click');
	$("#copy_left_to_right").click(function(){
		var arrFieldCopy = {
		  					"entryName1_1": "entryName2_1",
							"entryName1_2": "entryName2_2",
							"entryKana1_1": "entryKana2_1",
							"entryKana1_2": "entryKana2_2",
							"ageGroup1": "ageGroup2",
							"entryPhone1": "entryPhone2",
							"entryMobile1": "entryMobile2",
							"entryMail1_1": "entryMail2_1",
							"entryZip1": "entryZip2",
							"entryPref1": "entryPref2",
							"entryAddress1_1": "entryAddress2_1",
							"entryAddress1_2": "entryAddress2_2",
							"entryAddress1_3": "entryAddress2_3",
							"entryAddress1_4": "entryAddress2_4",
							"entryRemarks1": "entryRemarks2"
		 				};
		$.each( arrFieldCopy, function( from, to ) {
			$("#" + to).val($("#" + from).val());
		});	
	});
});

function showDateA(){
	if($.trim($("#frm_editContract select[id=statusA]").val()) == "0"){
		$("#contact_dateA").val("");
		$("#contact_timeA").val("");
	} else {
		$("#contact_dateA").datepicker("setDate",new Date());
		$('#contact_timeA').timepicker('setTime', new Date());
	}
}

function showDateB(){
	if($.trim($("#frm_editContract select[id=statusB]").val()) == "0"){
		$("#contact_dateB").val("");
		$("#contact_timeB").val("");
	} else {
		$("#contact_dateB").datepicker("setDate",new Date());
		$('#contact_timeB').timepicker('setTime', new Date());
	}
}
function showDateC(){
	if($.trim($("#frm_editContract select[id=statusC]").val()) == "0"){
		$("#contact_dateC").val("");
		$("#contact_timeC").val("");
	} else {
		$("#contact_dateC").datepicker("setDate",new Date());
		$('#contact_timeC').timepicker('setTime', new Date());
	}
}


function changeStatus(){
	submit_home();	
}

function resetStatus(){
	dataPost = $("#frm_editContract").serialize();
	$.post( "<?php echo Yii::app()->request->baseUrl; ?>/contract/resetStatus", dataPost)
		.done(function( data ) {
			location.reload();
		});
}

function submit_home(){
	var message = '';
	var obj = {};
	var i = 0;
	var msg_pleaseInput = 'を入力してください。';
	var msg_invalid = 'は数字で入力してください。';
	var msg_length_ticket_id = 'の長さは35でなければなりません。';　
	var filterNumberPhone = /^[0-9-]+$/;
	var filterNumberQuantity = /^[0-9]{10,11}$/;
	var filterEntryZip = /^[0-9]{7}$/;
	var filterEntryZip = /^[0-9]{7}$/;
	$('#error_sumary').html('');
	$("#par_show_message").html('');
	var msgError = '';
	
	/*if($.trim($("#frm_editContract select[id=statusA]").val()) == "0" && $.trim($("#frm_editContract select[id=statusB]").val()) == "0"){
		msgError += 'ステータスを選択してください。';
	} else
	if($.trim($("#frm_editContract select[id=statusA]").val()) != "0" && $.trim($("#frm_editContract input[id=contact_dateA]").val()) == ""){
		msgError += '連絡日を入力してください。';
	} else
	if($.trim($("#frm_editContract select[id=statusB]").val()) != "0" && $.trim($("#frm_editContract input[id=contact_dateB]").val()) == ""){
		msgError += '連絡日を入力してください。';
	}*/
	
	if($('#entryName1_1').val() == '' || $('#entryName1_2').val() == ''){
		obj[i++] = '#entryName1_1';
		message += '【契約者】お名前 '+msg_pleaseInput+' <br />';
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
	    } else if(!filterNumberQuantity.test($.trim($('#entryMobile1').val().replace(/-/g, "")))){
			obj[i++] = '#entryMobile1';
			message += '【契約者】電話番号（携帯電話）の桁数に誤りがあります。 <br />';
		}
	}

	if ( $('#entryMail1_1').val() == '' ){
		obj[i++] = '#entryMail1_1';
		message += '【契約者】メールアドレス'+msg_pleaseInput+' <br />';
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
	    } else if(!filterNumberQuantity.test($.trim($('#entryMobile2').val().replace(/-/g, "")))){
			obj[i++] = '#entryMobile2';
			message += '【代表者】電話番号（携帯電話）の桁数に誤りがあります。 <br />';
		}
	}
	
	if ( $('#entryMail2_1').val() == '' ){
		obj[i++] = '#entryMail2_1';
		message += '【代表者】メールアドレス'+msg_pleaseInput+' <br />';
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
	
	if($('#ticket_id').val() == ''){
		message += 'チケットID'+msg_pleaseInput+' <br />';
	}else if(isNaN($('#ticket_id').val())){
		message += 'チケットID'+msg_invalid+' <br />';
	}else if($('#ticket_id').val().length != 35){
		message += 'チケットID'+msg_length_ticket_id+' <br />';
	}
	
	<!-- TTTTT -->
		//msg3 = '在宅確認サポートの';
		<?php if ($model->Zaitaku_sub=='1') { ?>
			if($('#first_name3').val() == '' || $('#last_name3').val() == ''){
				obj[i++] = '#first_name3';
				message += /*msg3 + */'【在宅確認】お名前 '+msg_pleaseInput+' <br />';
			}
		
			if($('#first_kana3').val() == '' || $('#last_kana3').val() == ''){
				obj[i++] = '#first_kana3';
				message += '【在宅確認】フリガナ '+msg_pleaseInput+' <br />';
			}else{
				if ( !isZenKana($('#first_kana3').val()) || !isZenKana($('#first_kana3').val()) ){
					obj[i++] = '#entryKana2_1';
					message += '【在宅確認】フリガナは全角カタカナで入力して下さい<br />';
				}
			}
			
			if($('#mobile3').val() == ''){
				obj[i++] = '#mobile3';
				message += '【在宅確認】電話番号（携帯電話） '+msg_pleaseInput+' <br />';
			}else{
				if ( !filterNumberPhone.test($.trim($('#mobile3').val())) ) {
					obj[i++] = '#mobile3';
					message += '【在宅確認】電話番号（携帯電話）' + msg_invalid + ' <br />';
				} else if(!filterNumberQuantity.test($.trim($('#mobile3').val().replace(/-/g, "")))){
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
		<?php } ?>
		
		if(message != ''){
			$('#error_sumary').html(message);
			$(window).scrollTop(100);
			return;
		}
		if ( msgError != "" ){
			alert(msgError);
			return false;
		}
		
		$.ajax({
			type: 'POST',
			url: "<?php echo Yii::app()->baseUrl; ?>" + '/contract/CheckEmailAjax',
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
				////////////
				var dataPost = $("#frm_editContract").serialize();
				$.ajax({
					type: 'POST',
					url: '<?php echo Yii::app()->baseUrl; ?>/contract/updateContract',
					data: dataPost,
					success: function(data) {
						if(data == 'error'){
							alert("error");
						}else{
							<?php if ($model->Zaitaku_sub=='1') { ?>
								$.post( "<?php echo Yii::app()->request->baseUrl; ?>/contract/updateStatus", dataPost)
								.done(function( data ) {
									if($.trim($("#frm_editContract select[id=statusA]").val()) == "4" || $.trim($("#frm_editContract select[id=statusB]").val()) == "4" || $.trim($("#frm_editContract select[id=statusC]").val()) == "1" ){
										$('#confirmMail').removeAttr('disabled');
										$('#confirmMailB').attr('disabled', 'disabled');
										$('#emailType').val('success');
										$('#msg_confirm_send_mail').html('契約者に在宅確認が完了した旨のメールを送信しますか？');
										$("#confirmMail").css("color", "#000000");
										$("#confirmMailB").css("color", "#333");
									} else {
										$('#confirmMail').attr('disabled', 'disabled');
										if( $.trim($("#frm_editContract select[id=statusA]").val()) != "4" 
											&& (	$.trim($("#frm_editContract select[id=statusB]").val()) != "4" 
													&& $.trim($("#frm_editContract select[id=statusB]").val()) != "0" 
												) 
											&& $.trim($("#frm_editContract select[id=statusC]").val()) != "1"
										){
											$('#confirmMailB').removeAttr('disabled');
											$("#confirmMailB").css("color", "#000000");
											$('#emailType').val('unsuccess');	
											$('#msg_confirm_send_mail').html('契約者に在宅確認が得られなかった旨のメールを送信しますか？');
										}else{
											$('#confirmMailB').attr('disabled', 'disabled');
											$("#confirmMailB").css("color", "#333");
										}
										$("#confirmMail").css("color", "#333");
									}
									
									$("#frmSendMailStatus input[name=first_name]").val($("#entryName1_1").val());
									$("#frmSendMailStatus input[name=last_name]").val($("#entryName1_2").val());
									$("#frmSendMailStatus input[name=first_status]").val($("#statusA").val());
									$("#frmSendMailStatus input[name=second_status]").val($("#statusB").val());
									$("#frmSendMailStatus input[name=third_status]").val($("#statusC").val());
									$("#frmSendMailStatus input[name=first_contact_date]").val($("#contact_dateA").val() + ' ' + $("#contact_timeA").val());
									$("#frmSendMailStatus input[name=second_contact_date]").val($("#contact_dateB").val() + ' ' + $("#contact_timeB").val());
									$("#frmSendMailStatus input[name=third_contact_date]").val($("#contact_dateC").val() + ' ' + $("#contact_timeC").val());
									
									alert("利用者情報の変更が完了しました。");
									
								});
							<?php }else{ ?>
								alert("利用者情報の変更が完了しました。");
							<?php } ?>
						}
					},
					error: function (msg) {
						alert('データの送信に失敗しました。');
					}
				});
				///////////////
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
function confirm_contract()
{	
	$('#error_sumary').html('');
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
