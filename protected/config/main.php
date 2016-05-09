<?php
if (session_id() == ''){
	session_start();
}
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => Yii::t('app', 'Name'),
    // preloading 'log' component
    'preload' => array('log', 'spring'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    //'modules' => array('search'),
    // application components
    'components' => array(
        'request' => array(
            // 'enableCsrfValidation' => true,
            //'enableCookieValidation' => true,
        ),
        'user' => array(
            'allowAutoLogin' => true,
			'loginRequiredAjaxResponse' => '<script language="javascript">window.location.href=window.location.href</script>',//LOGIN_REQUIRED
        ),
        'image' => array(
            'class' => 'CImage'
        ),
	
        // uncomment the following to enable URLs in path-format		

        'db' => include(dirname(__FILE__) . '/db.php'),
		'log' => include(dirname(__FILE__) . '/log.php'),
        'mail' => include(dirname(__FILE__) . '/email.php'),
		
		/*
		'errorHandler' => array(
			'class'=>'application.extensions.kis.error.ErrorHandler'
		),*/
		
        'session' => array (
			//'savePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..'.DIRECTORY_SEPARATOR.'runtime',
			'class' => 'system.web.CDbHttpSession',
			'connectionID' => 'db',
			'sessionTableName' => 'session',
			'timeout' => 1800, //30min
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
				'regist.php'=>'front/Default/index',

				'regist2.php'=>'front/family/familyEntry',
				'area/index.html'=>'front/area/index',
				'housework/houseclean' => 'front/housework/houseclean',
				'housework/houseclean/index.html' => 'front/housework/houseclean',
				'housework/housekeeping' => 'front/housework/housekeeping',
				'housework/housekeeping/index.html' => 'front/housework/housekeeping',
				'housework/cleaning' => 'front/housework/cleaning',
				'housework/cleaning/index.html' => 'front/housework/cleaning',
                               
				
				'seikatsu_regist.php'=>'front/Regist/seikatsu',
                'kaji_regist.php'=>'front/Regist/kaji',
                'zaitaku_regist.php'=>'front/Regist/zaitaku', 				
				'omimai_regist.php'=>'front/Regist/omimai',
				'agreement.php'=>'front/Regist/agreement',
				'confirm.php'=>'front/Regist/confirm',
				'edit.php'=>'front/Regist/edit',
                'phone.php' => 'front/Regist/Phone',
				//IMODE 
				'seikatsu_regist_i.php'=>'front/Regist/seikatsui',
                'kaji_regist_i.php'=>'front/Regist/kajii',
                'zaitaku_regist_i.php'=>'front/Regist/zaitakui',
				'omimai_regist_i.php'=>'front/Regist/omimaii',
				'agreement_i.php'=>'front/Regist/agreement',
				'confirm_i.php'=>'front/Regist/confirm',
				'edit_i.php'=>'front/Regist/edit',
				'phone_i.php' => 'front/Regist/Phone',
				
				'shitter_regist.php'=>'front/Ticket/ticket',
				'shitter_confirm.php'=>'front/Ticket/confirm',
				'shitter_edit.php'=>'front/Ticket/edit',
				'shitter_phone.php'=>'front/Ticket/phone',
				'shitter_agreement.php'=>'front/Ticket/agreement',
            ),
        ),
        'spring' => array(
            'class' => 'application.extensions.spring.components.Spring'
        ),
    ),

    'sourceLanguage' => 'ja-jp',
    'language' => 'ja',
    // using Yii::app()->params['paramName']    
    'params' => CMap::mergeArray(
		require(dirname(__FILE__) . '/params.php'),
		require(dirname(__FILE__) . '/params-local.php')
	),
);
?>