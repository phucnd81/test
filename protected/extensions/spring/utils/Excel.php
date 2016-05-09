<?php
class Excel extends CComponent
{	
	private static $_isInitialized = false;
	
	public static function init(){
		if (!self::$_isInitialized){
			spl_autoload_unregister(array('YiiBase', 'autoload'));
			require(BASE_PATH . DIRECTORY_SEPARATOR . 'vendors' . DIRECTORY_SEPARATOR . 'PHPExcel.php');
			spl_autoload_register(array('YiiBase', 'autoload'));			
			self::$_isInitialized = true;
		}
	}
	
	public static function createPHPExcel(){
		self::init();
		return new PHPExcel;
	}
	
	public static function load($v = 'Excel5', $file){
		self::init();		
		
		$reader = PHPExcel_IOFactory::createReader($v);
		return $reader->load($file);
	}
}