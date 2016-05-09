<?php
/* @var $this ContractController */

$this->breadcrumbs=array(
	'Contract',
);
?>

<!-- BEGIN Tiles -->
<div class="row-fluid page-title">
    <div class="span8">
        <h1>顧客データ検索・出力</h1>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
       <div class="control-group">
			<div class="controls">
				<form name="frmSearchUser" id="frmSearchUser" method="get">
					<div class="row-fluid">
						<div class="span4">
							<p class="inline-block mts mll" style="min-width: 70px">フリガナ </p>
							<input type="text" value="<?php if(isset($_GET["name"])) echo $_GET["name"];?>" name="name" class="input-medium"/>
						</div>
						<div class="span4">
							<p class="inline-block mts mll" style="min-width: 70px">優待コード</p>
							<input type="text" value="<?php if(isset($_GET["licence_key"])) echo $_GET["licence_key"];?>" name="licence_key" class="input-medium"/>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span4">
							<p class="inline-block mts mll" style="min-width: 70px">電話番号</p>
							<input type="text" value="<?php if(isset($_GET["telephone"])) echo $_GET["telephone"];?>"  name="telephone" class="input-medium"/>
						</div>
						<div class="span4">
							<p class="inline-block mts mll" style="min-width: 70px">郵便番号</p>
							<input type="text" value="<?php if(isset($_GET["zip_code1"])) echo $_GET["zip_code1"];?>" name="zip_code1" class="input-medium"/>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span4">
							<p class="inline-block mts mll" style="min-width: 70px">対象期間</p>
							<input type="text" value="<?php if(isset($_GET["start_date"])) echo $_GET["start_date"];?>"  class="input-small" name="start_date" id="start_date"/>
							&nbsp; 　～　&nbsp;
							<input type="text" value="<?php if(isset($_GET["end_date"])) echo $_GET["end_date"];?>" class="input-small" name="end_date" id="end_date"/>
						</div>
						<div class="span4">
							<p class="inline-block mts mll" style="min-width: 70px">チケットID</p>
							<input type="text" value="<?php if(isset($_GET["ticket_id"])) echo $_GET["ticket_id"];?>" name="ticket_id" class="input-medium"/>
						</div>
					</div>
                    <div class="row-fluid">
						<div class="span12">
							<p class="inline-block mts mll" style="min-width: 70px">
                            	<input type="checkbox" name="search_usr_null" class="input-small" value="1" <?php if(isset($_GET["search_usr_null"]) && ($_GET["search_usr_null"] == 1)) echo 'checked="checked"';?>/> 契約開始日データが空の顧客も検索する
                            </p>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span12">
							<p class="inline-block mts mll" style="min-width: 70px">在宅確認サポート申し込み管理</p>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span12">
							<fieldset style="margin-left: 40px; width:60%; display:inline;">
								<input type="checkbox" name="cboSearch[0]" class="input-small" <?php if(isset($_GET["cboSearch"][0]) && ($_GET["cboSearch"][0] == 1)) echo 'checked="checked"';?> value="1" />  在宅確認サポート申し込み者<br />
								<input type="checkbox" name="cboSearch[1]" class="input-small" <?php if(isset($_GET["cboSearch"][1]) && ($_GET["cboSearch"][1] == 2)) echo 'checked="checked"';?> style="margin-left: 20px;" value="2" />  1回目確認連絡済み<br />
								<input type="checkbox" name="cboSearch[2]" class="input-small" <?php if(isset($_GET["cboSearch"][2]) && ($_GET["cboSearch"][2] == 3)) echo 'checked="checked"';?> style="margin-left: 20px;" value="3" />  2回目確認連絡済み<br />
								<input type="checkbox" name="cboSearch[3]" class="input-small" <?php if(isset($_GET["cboSearch"][3]) && ($_GET["cboSearch"][3] == 4)) echo 'checked="checked"';?> style="margin-left: 20px;" value="4" />  サービス利用許諾確認済み
							</fieldset>
							<span style="padding-left: 50pt;">
								<button type="submit"  class="btn btn-success" style="vertical-align: bottom">顧客の検索</button>
							</span>
						</div>
					</div>
					<input type="hidden" name="pageSize" id="pageSize" value="<?php echo Yii::app()->params['pageSizeDefault']; ?>" />
				</form>
			</div>
		</div>
		
	</div>
</div>
<div class="row-fluid">
    <div class="span12">
        <?php
        $this->renderPartial('_users_grid',array('model'=>$model));
        ?>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#start_date").datepicker({ dateFormat: 'yy/mm/dd' },$.datepicker.regional['ja']);
        $("#end_date").datepicker({ dateFormat: 'yy/mm/dd' },$.datepicker.regional['ja']);
        $("#start_date").mask("9999/99/99");
        $("#end_date").mask("9999/99/99");
    });
</script>