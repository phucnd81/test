<!-- BEGIN Tiles -->
<div class="row-fluid page-title">
    <div class="span8">
        <h1>契約データ取り込み</h1>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <form class="form-box" id="import_csv_test" enctype="multipart/form-data" method="post">
            <div class="control-group">
                <div class="controls mbm">
                    <p class="pull-left mtm" style="min-width: 170px">契約データファイルパス</p>
                    <input type="file" accept="*.csv,.csv,text/csv" name="import_file" id="get-csv-file" style="display: none;"/>
                    <div class="input-append input-append-lg">
                        
                        <input type="text" class="input-xlarge" id="txt_file" name="txt_file">
                        <input type="hidden" id="aaction" name="aaction" value="import" />
                        <button type="button" class="btn btn-browse mll">参照</button>
                    </div>
                </div>
                <div class="controls">
                    <p class="pull-left" style="min-width: 170px">&nbsp; &nbsp;</p>
                    <button type="submit" name="import" id="import" class="btn btn-success">契約データの取り込み</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
//$url = $this->createUrl('');
$cs = Yii::app()->getClientScript();
$cs->registerScript(
    'handleCSV',
    '
	//$("input[type=file]").uniform();
    $("#import").on("click", function() {$("#import_csv_test").submit();});
	'
	,CClientScript::POS_END);
if($message!='')
{	
	$csript = Yii::app()->getClientScript();
	$csript->registerScript('msg','alert("'.htmlspecialchars($message,ENT_QUOTES).'")',CClientScript::POS_END);
}
?>

