<?php

return array(

	'webRoot' => dirname(__FILE__).DIRECTORY_SEPARATOR.'..',

    'base_url' => '/',

    'upload_dir' => dirname(__FILE__) . '/../../public/admin/uploads/',
	'admin_dir' => dirname(__FILE__) . '/../../public/admin/',

    'upload_url' => 'uploads/',

    'page_size' => 15,
	
	'one_loop' => 100,

	'ageGroup'=> array(

		'' => '▼選択してください',

		'10代' => '10代',

		'20代' => '20代',

		'30代' => '30代',

		'40代' => '40代',

		'50代' => '50代',

		'60代' => '60代'

	),

	'entryPref'=> array(

		'' => '▼選択してください',

		'北海道' => '北海道',

		'青森県' => '青森県',

		'岩手県' => '岩手県',

		'宮城県' => '宮城県',

		'秋田県' => '秋田県',

		'山形県' => '山形県',

		'福島県' => '福島県',

		'茨城県' => '茨城県',

		'栃木県' => '栃木県',

		'群馬県' => '群馬県',

		'埼玉県' => '埼玉県',

		'千葉県' => '千葉県',

		'東京都' => '東京都',

		'神奈川県' => '神奈川県',

		'新潟県' => '新潟県',

		'富山県' => '富山県',

		'石川県' => '石川県',

		'福井県' => '福井県',

		'山梨県' => '山梨県',

		'長野県' => '長野県',

		'岐阜県' => '岐阜県',

		'静岡県' => '静岡県',

		'愛知県' => '愛知県',

		'三重県' => '三重県',

		'滋賀県' => '滋賀県',

		'京都府' => '京都府',

		'大阪府' => '大阪府',

		'兵庫県' => '兵庫県',

		'奈良県' => '奈良県',

		'和歌山県' => '和歌山県',

		'鳥取県' => '鳥取県',

		'島根県' => '島根県',

		'岡山県' => '岡山県',

		'広島県' => '広島県',

		'山口県' => '山口県',

		'徳島県' => '徳島県',

		'香川県' => '香川県',

		'愛媛県' => '愛媛県',

		'高知県' => '高知県',

		'福岡県' => '福岡県',

		'佐賀県' => '佐賀県',

		'長崎県' => '長崎県',

		'熊本県' => '熊本県',

		'大分県' => '大分県',

		'宮崎県' => '宮崎県',

		'鹿児島県' => '鹿児島県',

		'沖縄県' => '沖縄県'

	),
	'pageSizeDefault' => 100,
	'pageSizeSelect' => array(
							100=>100,
							200=>200,
							300=>300,
							400=>400,
							500=>500,
							1000=>1000
	),
	'record_type' => array('01' => '契約開始',
							'02' => '契約廃止'
							),
	'statusSelect' => array(
		'0' => '',
		'1' => '不在',
		'2' => '留守電',
		'3' => '伝言',
		'4' => '確認完了'
	),
	'statusSelect2' => array(
		'0' => '',
		'1' => '折り返し有　確認完了'
	),
	'relationship'=> array(
			'' => '▼選択してください',
	
			'祖父母（義理の祖父母）' => '祖父母（義理の祖父母）',
	
			'父母（義理の父母）' => '父母（義理の父母）',
	
			'兄弟・姉妹（義理の兄弟・姉妹）' => '兄弟・姉妹（義理の兄弟・姉妹）',
	
			'兄弟・姉妹の配偶者' => '兄弟・姉妹の配偶者',
	
			'配偶者' => '配偶者',
	
			'子' => '子',
	
			'子の配偶者' => '子の配偶者',
	
			'孫' => '孫',
	
			'孫の配偶者' => '孫の配偶者'
	)		
);