<?php
/* @var $this ContractController */

$this->breadcrumbs=array(
	'Contract',
);
?>

<!-- BEGIN Tiles -->
<div class="row-fluid page-title">
    <div class="span8">
        <h1>請求データ検索・出力</h1>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
            <div class="control-group">
                <div class="controls">
                    <form name="frmSearchDate" id="frmSearchDate" action="<?php echo Yii::app()->createUrl("contract/request") ?>" method="get">
                    <span>対象月</span>
                    &nbsp; &nbsp;
                    <input type="text" value="<?php if(isset($_GET["start_date"])) echo $_GET["start_date"];?>" style="cursor: text"  class="input-small" name="start_date" id="start_date"/>
                    &nbsp; 　～　&nbsp;
                    <input type="text" value="<?php if(isset($_GET["end_date"])) echo $_GET["end_date"];?>" style="cursor: text" class="input-small" name="end_date" id="end_date"/>
                    &nbsp; &nbsp;
                    <button type="submit" class="btn btn-success" style="vertical-align: top">契約済キーの検索</button>
                     <input type="hidden" name="pageSize" id="pageSize" value="<?php echo Yii::app()->params['pageSizeDefault']; ?>" />
                    </form>
                </div>
            </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <?php
        $this->renderPartial('_request_grid',array('model'=>$model));
        ?>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#start_date").MonthPicker({ShowIcon: false});
        $("#end_date").MonthPicker({ShowIcon: false});
    });
</script>