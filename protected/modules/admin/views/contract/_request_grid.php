<div style="width:100%; margin-bottom:5px" align="right">
<?php 
$pageSize = CHtml::dropDownList('pageSize',
								$model->pageSize,
								Yii::app()->params['pageSizeSelect'],
								array('onchange'=>"selectPageSizeDate($(this).val())",
										'style' => 'width:60px; height:25px'
									)
							);
?>
</div>
<script type="text/javascript">
function selectPageSizeDate(limit){
	$("#frmSearchDate input[name=pageSize]").val(limit);
	$("#frmSearchDate").submit();
}
</script>
<?php
/**
 * Created by PhpStorm.
 * User: Khanh
 * Date: 2/10/2015
 * Time: 4:16 PM
 */
$query_i="";
if($_SERVER['QUERY_STRING']){
    $query_i.="?".$_SERVER['QUERY_STRING'];
}
$this->widget('ext.spring.widgets.GridView', array(
        'id'=>'grid-view-body',
        'layout' => 'grid_s03',
        'no'=>"No",
        'enableSorting'=>false,
        'dataProvider'=>$model->searchDate(),
        'paper_sumary_before'=>'<div class="span3"><a class="btn btn-danger" href="'.Yii::app()->createUrl("contract/request").'">検索結果のクリア</a></div>',
        'paper_sumary_last'=>'<div class="span3 text-right">
<a class="btn btn-success" href="'.Yii::app()->createUrl("contract/ExportCSV").$query_i.'">請求データの出力</a>
        </div>',
		'page_size' => $pageSize,
        'columns'=>array(
            array(
                'header' => 'openID',
                'name' => 'openid',
                'htmlOptions' => array(
                    'width' => '20%',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '20%'

                ),
            ),
            array(
                'header' => 'ライセンスキー',
                'name' => 'licence_key',
                'htmlOptions' => array(
                    'width' => '30%'
                ),
                'headerHtmlOptions' => array(
                    'width' => '30%'
                ),
            ),
			array(
                'header' => '種別',
            	'value' => 'record_type($data->record_type)',
                'htmlOptions' => array(
                    'width' => '80'
                ),
                'headerHtmlOptions' => array(
                    'width' => '80'
                ),
            ),
            array(
                'header' => '契約開始日',
                'name' => 'start_date',
                'value'=>'(empty($data->start_date) ? NULL : date("Y/m/d", strtotime($data->start_date)))',
                'htmlOptions' => array(
                    'width' => '15%'
                ),
                'headerHtmlOptions' => array(
                    'width' => '15%'
                ),
            ),
            array(
                'header' => '契約廃止日',
                'name' => 'end_date',
                'value'=>'(empty($data->end_date) ? NULL : date("Y/m/d", strtotime($data->end_date)))',
                'htmlOptions' => array(
                )
            ),
        )
    )
);

function record_type($record_type){
	$aRecordType = Yii::app()->params["record_type"];
	return $aRecordType[$record_type];
}