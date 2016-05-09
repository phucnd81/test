<?php
return array(    
	'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Console',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',        
    ),    
    // application components
    'components' => array(		
        'db' => include(dirname(__FILE__) . '/db.php'),
    ),
	
    'params' => require(dirname(__FILE__) . '/params.php'),
);
?>