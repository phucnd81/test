<div style="width:100%; margin-bottom:5px" align="right">
<?php 
$pageSize = CHtml::dropDownList('pageSize',
								$model->pageSize,
								Yii::app()->params['pageSizeSelect'],
								array('onchange'=>"selectPageSizeUser($(this).val())",
										'style' => 'width:60px; height:25px'
									)
							);
?>
</div>
<script type="text/javascript">
function selectPageSizeUser(limit){
	$("#frmSearchUser input[name=pageSize]").val(limit);
	$("#frmSearchUser").submit();
}
</script>
<style>
input[type="file"] {
    display: none;
}
</style>
<?php
/**
 * Created by PhpStorm.
 * User: Congdt
 * Date: 28/04/2016
 * Time: 11:36 AM
 */
 
$css_head_open = "<div style=\"text-align:left\">";
$css_head_close = "<//div>";
$query_i="";
if($_SERVER['QUERY_STRING']){
    $query_i.="?".$_SERVER['QUERY_STRING'];
}
$this->widget('ext.spring.widgets.GridView', array(
        'id'=>'grid-view-body',
        'layout' => 'grid_s03_scroll_xy',
        'no'=>"No",
        'option_no'=>"width='50px'",
        'enableSorting'=>false,
        'dataProvider'=>$model->searchUsers(),
        'paper_sumary_before'=>'<div class="span3"><a class="btn btn-danger" href="'.Yii::app()->createUrl("contract/tickets").'">検索結果のクリア</a></div>',
        'paper_sumary_last'=>'<div class="span3 text-right">
			<form id="CSVfrm" method="POST" enctype="multipart/form-data" action="'.Yii::app()->createUrl("contract/TicketsImportCSV").'">
				<a class="btn btn-success" href="'.Yii::app()->createUrl("contract/TicketsExportCSV").$query_i.'">CSVファイルの出</a>
				<label class="btn btn-success">
					<input type="file" id="csv_import_file" name="csv_import_file" onchange="javascript:this.form.submit();"/>
					<i class="fa fa-cloud-upload"></i> CSVファイルのインポート
				</label>
			</form>
        </div>',
		'page_size' => $pageSize,
		'min_width_scroll' => '100%',
        'columns'=>array(
			array(
				'name'=>'id',
				'type'=>'raw',
				'header' => '詳細表示・変更',
				'value'=>function($data){
					return '<a href="' . Yii::app()->createUrl('contract/details') . '?id='.strval($data->primaryKey).'"><button class="btn btn-success">詳細</button></a>';
				},
				'htmlOptions' => array(
                    'width' => '100px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"

                ),
                'headerHtmlOptions' => array(
                    'width' => '100px'
                ),
			),
            array(
                'header' => 'チケットID',
                'name' => 'ticket_id',
                'htmlOptions' => array(
                    'width' => '220px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"

                ),
                'headerHtmlOptions' => array(
                    'width' => '220px'
                ),
            ),
            array(
                'header' => '登録日',
                'name' => 'user_regist_date',
                'value'=>'(empty($data->user_regist_date) ? NULL : date("Y/m/d", strtotime($data->user_regist_date)))',
                'htmlOptions' => array(
                    'width' => '100px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '100px'
                ),
            ),
            array(
                'header' => '利用日',
                'name' => 'ticket_date',
                'value'=>'(empty($data->ticket_date) ? NULL : date("Y/m/d", strtotime($data->ticket_date)))',
                'htmlOptions' => array(
                    'width' => '100px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '100px'
                ),
            ),
            array(
                'header' => 'ステータス',
				'type'=>'raw',
                'name' => '',
                'value'=> function($data){
								$statusArr = array('1' => '未利用', '2' => '予約中', '3' => '利用済', '4' => '決済取消');
								$rtn = "<select id='status' name='status' style='width:90px;'>";
								foreach ($statusArr as $key => $value){
									if($data->ticket_status == $key){
										$rtn .= "<option value='" . $key . "' selected>" . $value . "</option>";
									}else{
										$rtn .= "<option value='" . $key . "'>" . $value . "</option>";
									}
								}
								$rtn .= "/<select>";
								return $rtn;
							},
                'htmlOptions' => array(
                    'width' => '100px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '100px'
                ),
            ),
			array(
                'header' => $css_head_open.'【契約者】'."<br>".'お名前'.$css_head_close,
                'name' => 'first_name1',
                'value'=>'getData($data,"first_name1","last_name1")',
                'htmlOptions' => array(
                    'width' => '100px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '100px'
                ),
            ),
			array(
                'header' => $css_head_open.'【契約者】'."<br>".'フリガナ'.$css_head_close,
                'name' => 'first_kana1',
                'value'=>'getData($data,"first_kana1","last_kana1")',
                'htmlOptions' => array(
                    'width' => '120px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '120px'
                ),
            ),
		)
    )
);
function getData($data,$row1,$row2){
    return $data[$row1].$data[$row2];
}
?>
