<?php
return array(
	'class' => 'CLogRouter',
	'routes' => array(
		/* array(
			'class' => 'CEmailLogRoute',
			'levels' => CLogger::LEVEL_ERROR,
			'emails' => array('luan@spice.or.jp'),
			'sentFrom' => 'luan@spice.or.jp',
			'subject' => 'Error at awabank',
		), */
		array(
			'class' => 'CFileLogRoute',
			'levels' => CLogger::LEVEL_ERROR,
			'logFile' => date("d") . "_error.log",
			'filter'=>'CLogFilter',
		),
		array(
			'class' => 'CFileLogRoute',
			'levels' => CLogger::LEVEL_WARNING,
			'logFile' => date("d") . "_warning.log",
		),
		array(
			'class' => 'CFileLogRoute',
			'levels' => CLogger::LEVEL_INFO,
			'logFile' => date("d") . "_info.log",
		),
		array(
			'class' => 'CFileLogRoute',
			'levels' => CLogger::LEVEL_TRACE,
			'logFile' => date("d") . "_trace.log",
		),
		array(
			'class' => 'CWebLogRoute',
			'categories' => 'debug',
			'levels' => CLogger::LEVEL_PROFILE,
			'showInFireBug' => true,
			'ignoreAjaxInFireBug' => true,
		),
		array(
			'class' => 'CWebLogRoute',
			'categories' => 'debug',
		),
	),
);
