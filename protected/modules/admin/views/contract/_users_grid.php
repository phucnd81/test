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

<?php
/**
 * Created by PhpStorm.
 * User: Khanh
 * Date: 2/10/2015
 * Time: 4:16 PM
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
        'paper_sumary_before'=>'<div class="span3"><a class="btn btn-danger" href="'.Yii::app()->createUrl("contract/users").'">検索結果のクリア</a></div>',
        'paper_sumary_last'=>'<div class="span3 text-right">
<a class="btn btn-success" href="'.Yii::app()->createUrl("contract/UExportCSV").$query_i.'">顧客データの出力</a>
        </div>',
		'page_size' => $pageSize,
		'min_width_scroll' => '5900px',
        'columns'=>array(
			array(
				'name'=>'id',
				'type'=>'raw',
				'header' => '詳細表示・変更',
				'value'=>function($data){
					return '<a href="' . Yii::app()->createUrl('contract/details') . '?id='.strval($data->primaryKey).'"><button class="btn btn-success">詳細</button></a>';
				},
				'htmlOptions' => array(
                    'width' => '140px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"

                ),
                'headerHtmlOptions' => array(
                    'width' => '140px'
                ),
			),
            array(
                'header' => 'ライセンスキー',
                'name' => 'licence_key',
                'htmlOptions' => array(
                    'width' => '140px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"

                ),
                'headerHtmlOptions' => array(
                    'width' => '140px'
                ),
            ),
            array(
                'header' => '契約開始日',
                'name' => 'start_date',
                'value'=>'(empty($data->start_date) ? NULL : date("Y/m/d", strtotime($data->start_date)))',
                'htmlOptions' => array(
                    'width' => '100px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '100px'
                ),
            ),
            array(
                'header' => '契約廃止日',
                'name' => 'end_date',
                'value'=>'(empty($data->end_date) ? NULL : date("Y/m/d", strtotime($data->end_date)))',
                'htmlOptions' => array(
                    'width' => '100px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '100px'
                ),
            ),
            array(
                'header' => '利用者登録日時',
                'name' => 'user_regist_date',
                'value'=>'(empty($data->user_regist_date) ? NULL : date("Y/m/d H:i:s", strtotime($data->user_regist_date)))',
                'htmlOptions' => array(
                    'width' => '140px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '140px'
                ),
            ),
			array(
                'header' => $css_head_open.'【契約者】'."<br>".'お名前'.$css_head_close,
                'name' => 'first_name1',
                'value'=>'getData($data,"first_name1","last_name1")',
                'htmlOptions' => array(
                    'width' => '160px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '160px'
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
			array(
                'header' => $css_head_open.'【契約者】'."<br>".'年齢'.$css_head_close,
                'name' => 'age_group',
                'htmlOptions' => array(
                    'width' => '120px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '120px'
                ),
            ),
			array(
                'header' => $css_head_open.'【契約者】'."<br>".'電話番号（ご自宅）'.$css_head_close,
                'name' => 'tel1',
                'htmlOptions' => array(
                    'width' => '160px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '160px'
                ),
            ),
			array(
                'header' => $css_head_open.'【契約者】'."<br>".'電話番号（携帯電話）'.$css_head_close,
                'name' => 'mobile1',
                'htmlOptions' => array(
                    'width' => '160px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '160px'
                ),
            ),
			array(
                'header' => $css_head_open.'【契約者】'."<br>".'メールアドレス'.$css_head_close,
                'name' => 'email1',
                'htmlOptions' => array(
                    'width' => '120px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '120px'
                ),
            ),
			array(
                'header' => $css_head_open.'【契約者】'."<br>".'郵便番号'.$css_head_close,
                'name' => 'zip_code1',
                'htmlOptions' => array(
                    'width' => '80px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '80px'
                ),
            ),
			array(
                'header' => $css_head_open.'【契約者】'."<br>".'都道府県'.$css_head_close,
                'name' => 'pref1',
                'htmlOptions' => array(
                    'width' => '80px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '80px'
                ),
            ),
			array(
                'header' => $css_head_open.'【契約者】'."<br>".'市区町村'.$css_head_close,
                'name' => 'address1_1',
                'htmlOptions' => array(
                    'width' => '140px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '140px'
                ),
            ),
			array(
                'header' => $css_head_open.'【契約者】'."<br>".'町域名'.$css_head_close,
                'name' => 'address1_2',
                'htmlOptions' => array(
                    'width' => '140px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '140px'
                ),
            ),
			array(
                'header' => $css_head_open.'【契約者】'."<br>".'番地'.$css_head_close,
                'name' => 'address1_3',
                'htmlOptions' => array(
                    'width' => '140px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '140px'
                ),
            ),
			array(
                'header' => $css_head_open.'【契約者】'."<br>".'建物名'.$css_head_close,
                'name' => 'address1_4',
                'htmlOptions' => array(
                    'width' => '140px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '140px'
                ),
            ),
			array(
                'header' => $css_head_open.'【契約者】'."<br>".'備考'.$css_head_close,
                'name' => 'remark1',
                'htmlOptions' => array(
                    'width' => '140px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '140px'
                ),
            ),
			array(
                'header' => $css_head_open.'【代表者】'."<br>".'お名前'.$css_head_close,
                'name' => 'first_name1',
                'value'=>'getData($data,"first_name2","last_name2")',
                'htmlOptions' => array(
                    'width' => '160px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '160px'
                ),
            ),
			array(
                'header' => $css_head_open.'【代表者】'."<br>".'フリガナ'.$css_head_close,
                'name' => 'first_kana1',
                'value'=>'getData($data,"first_kana2","last_kana2")',
                'htmlOptions' => array(
                    'width' => '120px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '120px'
                ),
            ),
            array(
                'header' => $css_head_open.'【代表者】'."<br>".'年齢'.$css_head_close,
                'name' => 'age_group2',
                'htmlOptions' => array(
                    'width' => '120px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '120px'
                ),
            ),
			array(
                'header' => $css_head_open.'【代表者】'."<br>".'電話番号（ご自宅）'.$css_head_close,
                'name' => 'tel2',
                'htmlOptions' => array(
                    'width' => '160px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '160px'
                ),
            ),
			array(
                'header' => $css_head_open.'【代表者】'."<br>".'電話番号（携帯電話）'.$css_head_close,
                'name' => 'mobile2',
                'htmlOptions' => array(
                    'width' => '160px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '160px'
                ),
            ),
			array(
                'header' => $css_head_open.'【代表者】'."<br>".'メールアドレス'.$css_head_close,
                'name' => 'email2',
                'htmlOptions' => array(
                    'width' => '140px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '140px'
                ),
            ),
			array(
                'header' => $css_head_open.'【代表者】'."<br>".'郵便番号'.$css_head_close,
                'name' => 'zip_code2',
                'htmlOptions' => array(
                    'width' => '80px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '80px'
                ),
            ),
			array(
                'header' => $css_head_open.'【代表者】'."<br>".'都道府県'.$css_head_close,
                'name' => 'pref2',
                'htmlOptions' => array(
                    'width' => '80px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '80px'
                ),
            ),
			array(
                'header' => $css_head_open.'【代表者】'."<br>".'市区町村'.$css_head_close,
                'name' => 'address2_1',
                'htmlOptions' => array(
                    'width' => '140px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '140px'
                ),
            ),
			array(
                'header' => $css_head_open.'【代表者】'."<br>".'町域名'.$css_head_close,
                'name' => 'address2_2',
                'htmlOptions' => array(
                    'width' => '140px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '140px'
                ),
            ),
			array(
                'header' => $css_head_open.'【代表者】'."<br>".'番地'.$css_head_close,
                'name' => 'address2_3',
                'htmlOptions' => array(
                    'width' => '140px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '140px'
                ),
            ),
			array(
                'header' => $css_head_open.'【代表者】'."<br>".'建物名'.$css_head_close,
                'name' => 'address2_4',
                'htmlOptions' => array(
                    'width' => '140px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '140px'
                ),
            ),
			array(
                'header' => $css_head_open.'【代表者】'."<br>".'備考'.$css_head_close,
                'name' => 'remark2',
                'htmlOptions' => array(
                    'width' => '140px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '140px'
                ),
            ),
			array(
                'header' => $css_head_open.'【在宅確認】'."<br>".'お名前'.$css_head_close,
                'name' => 'first_name3',
				'value'=>'getData($data,"first_name3","last_name3")',
                'htmlOptions' => array(
                    'width' => '140px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '140px'
                ),
            ),
			array(
                'header' => $css_head_open.'【在宅確認】'."<br>".'フリガナ'.$css_head_close,
                'name' => 'first_kana3',
                'value'=>'getData($data,"first_kana3","last_kana3")',
                'htmlOptions' => array(
                    'width' => '120px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '120px'
                ),
            ),
			/*array(
                'header' => $css_head_open.'【在宅確認】'."<br>".'電話番号（ご自宅）'.$css_head_close,
                'name' => 'tel3',
                'htmlOptions' => array(
                    'width' => '160px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '160px'
                ),
            ),*/
			array(
                'header' => $css_head_open.'【在宅確認】'."<br>".'電話番号（携帯電話）'.$css_head_close,
                'name' => 'mobile3',
                'htmlOptions' => array(
                    'width' => '160px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '160px'
                ),
            ),
			array(
                'header' => $css_head_open.'【在宅確認】'."<br>".'郵便番号'.$css_head_close,
                'name' => 'zip_code3',
                'htmlOptions' => array(
                    'width' => '80px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '80px'
                ),
            ),
			array(
                'header' => $css_head_open.'【在宅確認】'."<br>".'都道府県'.$css_head_close,
                'name' => 'pref3',
                'htmlOptions' => array(
                    'width' => '80px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '80px'
                ),
            ),
			array(
                'header' => $css_head_open.'【在宅確認】'."<br>".'市区町村'.$css_head_close,
                'name' => 'address3_1',
                'htmlOptions' => array(
                    'width' => '140px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '140px'
                ),
            ),
			/*array(
                'header' => $css_head_open.'【在宅確認】'."<br>".'町域'.$css_head_close,
                'name' => 'address3_2',
                'htmlOptions' => array(
                    'width' => '140px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '140px'
                ),
            ),*/
			array(
                'header' => $css_head_open.'【在宅確認】'."<br>".'以降の住所（丁目、番地等）'.$css_head_close,
                'name' => 'address3_3',
                'htmlOptions' => array(
                    'width' => '140px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '140px'
                ),
            ),
			array(
                'header' => $css_head_open.'【在宅確認】'."<br>".'建物名'.$css_head_close,
                'name' => 'address3_4',
                'htmlOptions' => array(
                    'width' => '140px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '140px'
                ),
            ),
			array(
                'header' => $css_head_open.'【在宅確認】'."<br>".'続柄（二親等以内）'.$css_head_close,
                'name' => 'relationship3',
                'htmlOptions' => array(
                    'width' => '140px',
                    'style'=>"word-break:break-all; word-wrap: break-word;"
                ),
                'headerHtmlOptions' => array(
                    'width' => '140px'
                ),
            ),
		)
    )
);
function getData($data,$row1,$row2){
    return $data[$row1].$data[$row2];
}
?>
