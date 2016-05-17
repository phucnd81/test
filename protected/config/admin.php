<?php
return CMap::mergeArray(
	require('main.php'),
	array(
		'import'=>array(),
	
		'components'=>array(
			'user'=>array(
				'stateKeyPrefix' => '_a_docomo',
				'loginUrl'=>array('/login')
			),	
					
			'urlManager'=>array(
				'urlFormat'=>'path',
				'showScriptName'=>false,
				'rules'=>array(				
					'<action:(login|logout|error|index|licencekey|loop|csvLicenceKey)>'=>'admin/default/<action>',
					'<controller:(contract)>'=>'admin/<controller>/index',
					'<controller:\w+>/<action:\w+>'=>'admin/<controller>/<action>',
				),
			),
				
		),
		
		'modules'=>array(
			'admin',
			'gii'=>array(
				'class'=>'system.gii.GiiModule',
				'password'=>'admin@shinway',
				'ipFilters'=>array('*'),
			),
		),
		
		'defaultController'=>'admin/default/index',
	)
);
?>