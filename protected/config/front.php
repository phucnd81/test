<?php
return CMap::mergeArray(
	require('main.php'),
	array(
		'import'=>array(),
	
		'components'=>array(
			'user'=>array(
				'stateKeyPrefix' => '_f_docomo',
				'loginUrl'=>array('/login')
			),	
					
			'urlManager'=>array(
				'urlFormat'=>'path',
				'showScriptName'=>false,
				'rules'=>array(
					'<action:(login|logout|error|index)>'=>'front/default/<action>',
					'<action:(homeEntry|homeConfirm|homeFinish)>'=>'front/home/<action>',			//issues 10563
					'<action:(familyEntry|familyConfirm|familyFinish)>'=>'front/family/<action>',	//issues 10563
					'<controller:\w+>/<action:\w+>'=>'front/<controller>/<action>',
				),
			),	
		),
		
		'modules'=>array(
			'front',
		),
		
		'defaultController'=>'front/default/index',
		
		'sourceLanguage' => 'en-en',			
		'language' => 'en',
	)
);
?>