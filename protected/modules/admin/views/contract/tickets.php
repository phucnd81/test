<?php
/* @var $this ContractController */

$this->breadcrumbs=array(
	'Contract',
);

/*back from import CSV file*/
if(isset($_GET['msgImport'])){
?>
	<script>
		var saveFlag = "<?php echo $_GET['msgImport'];?>";
		switch(saveFlag) {
			case "1":
				alert('CSVファイルをインポートされました。');
				break;
			case "2":
				alert('CSVファイルではありません。');
				break;
			case "3":
				alert('CSVファイルをインポートされませんでした。');
				break;
			default:
		}		
		top.location.href = "tickets";
	</script>
<?php
}
?>

<!-- BEGIN Tiles -->
<div class="row-fluid page-title">
    <div class="span8">
        <h1>チケットID検索・出力</h1>
    </div>
</div><div class="row-fluid">
    <div class="span12">
       <div class="control-group">
			<div class="controls">
				<form name="frmSearchUser" id="frmSearchUser" method="get">
					<div class="row-fluid">
						<div class="span4">
							<p class="inline-block mts mll" style="min-width: 70px">電話番号</p>
							<input type="text" value="<?php if(isset($_GET["telephone"])) echo $_GET["telephone"];?>"  name="telephone" class="input-medium"/>
						</div>
						<div class="span4">
							<p class="inline-block mts mll" style="min-width: 70px">チケットID</p>
							<input type="text" value="<?php if(isset($_GET["ticket_id"])) echo $_GET["ticket_id"];?>" name="ticket_id" class="input-medium"/>
						</div>
						<div class="span4">
							<button type="submit"  class="btn btn-success" style="vertical-align: bottom">顧客の検索</button>
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
        $this->renderPartial('_tickets_grid',array('model'=>$model));
        ?>
    </div>
</div>