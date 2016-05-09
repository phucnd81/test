<?php
defined('BASE_PATH') 
	|| define('BASE_PATH', realpath(dirname(__FILE__) . '/../../..'));

class Spring extends CApplicationComponent
{	
	protected $_assetsUrl;
	
	public $forceCopyAssets = false;

	public function init(){
		if (Yii::getPathOfAlias('spring') === false) {
			Yii::setPathOfAlias('spring', realpath(dirname(__FILE__) . '/..'));
		}
		
		if (Yii::getPathOfAlias('worker') === false) {
			Yii::setPathOfAlias('worker', realpath(dirname(__FILE__) . '/../../../workers'));
		}
		
		if (Yii::getPathOfAlias('column') === false) {
			Yii::setPathOfAlias('column', realpath(dirname(__FILE__) . '/../widgets/grid/column'));
		}
		
		Yii::$classMap = CMap::mergeArray(Yii::$classMap, array(
			
			'CSort' => Yii::getPathOfAlias('spring.web').'/CSort.php',
			'CModel'=> Yii::getPathOfAlias('spring.base').'/CModel.php',
			'Browser' => Yii::getPathOfAlias('spring.utils').'/Browser.php',
			'CDbCommand' => Yii::getPathOfAlias('spring.db').'/CDbCommand.php',
			'CFormatter' => Yii::getPathOfAlias('spring.utils').'/CFormatter.php',
			'CDbCriteria' => Yii::getPathOfAlias('spring.db.schema').'/CDbCriteria.php',
			'ArrayValidator' => Yii::getPathOfAlias('spring.validators').'/ArrayValidator.php',
			'DateEraValidator' => Yii::getPathOfAlias('spring.validators').'/DateEraValidator.php',
			'DateEraValidatorYM' => Yii::getPathOfAlias('spring.validators').'/DateEraValidatorYM.php',
			'OneByteValidator' 	=> Yii::getPathOfAlias('spring.validators').'/OneByteValidator.php',			
			'KatakanaValidator' => Yii::getPathOfAlias('spring.validators').'/KatakanaValidator.php',
			'DateRangeValidator' => Yii::getPathOfAlias('spring.validators').'/DateRangeValidator.php',
			'DateCompareValidator' => Yii::getPathOfAlias('spring.validators').'/DateCompareValidator.php',
			'NumAndSpecialCharValidator' => Yii::getPathOfAlias('spring.validators').'/NumAndSpecialCharValidator.php',
			'OneByteCharValidator' => Yii::getPathOfAlias('spring.validators').'/OneByteCharValidator.php',
			'OneByteNumberValidator' => Yii::getPathOfAlias('spring.validators').'/OneByteNumberValidator.php',
			'OneByteKatakanaValidator' => Yii::getPathOfAlias('spring.validators').'/OneByteKatakanaValidator.php',
			'HiraganaValidator' => Yii::getPathOfAlias('spring.validators').'/HiraganaValidator.php',
			'DateYMDValidator' => Yii::getPathOfAlias('spring.validators').'/DateYMDValidator.php',
		));
		
		CValidator::$builtInValidators = CMap::mergeArray(CValidator::$builtInValidators, array(
			'array'=>'ArrayValidator',
			'era' => 'DateEraValidator',			
			'range'=>'DateRangeValidator',
			'1byte' => 'OneByteValidator',			
			'katakana' => 'KatakanaValidator',	
			'dateCompare' => 'DateCompareValidator',		
			'numandspecialchar'=>'NumAndSpecialCharValidator',
			'hiragana' => 'HiraganaValidator',
		));

		if (Yii::app() instanceof CConsoleApplication || PHP_SAPI == 'cli') {
			return;
		}
		
		parent::init();
	}
	
	public function getViewFile($layout){
		if(is_file($layout) & file_exists($layout)){
			return $layout;
		}
		else{
			$view = Yii::getPathOfAlias('spring.web.views');
		}
		
		return "{$view}/{$layout}.php";
	}
	
	public function getAssetsUrl() {
		if (isset($this->_assetsUrl)) {
			return $this->_assetsUrl;
		} 
		else{
			return $this->_assetsUrl = Yii::app()->getAssetManager()->publish(
				Yii::getPathOfAlias('spring.assets'), false, -1, $this->forceCopyAssets
			);
		}
	}
	
	public function registerScriptFile($name, $position = CClientScript::POS_END){
		Yii::app()->getClientScript()->registerScriptFile($this->getAssetsUrl() . "/{$name}", $position);
	}
	
	public function array_sum_key($arr, $index = null ){
		if(!is_array( $arr ) || sizeof( $arr ) < 1){
			return 0;
		}
		
		$ret = 0;
		foreach( $arr as $id => $data ){
			if( isset( $index )  ){
				$ret += (isset( $data[$index] )) ? (int)$data[$index] : 0;
			}
			else{
				$ret += (int)$data;
			}
		}
		
		return $ret;
	}
	
	public function array_min_key($arr, $key = NULL){
		if(!is_array( $arr ) || sizeof( $arr ) < 1){
			return array();
		}
		
		$index = NULL;
		$ret = array();
		$min = NULL;
		
		foreach($arr as $i=>$r){
			if((NULL == $min) || (isset($r[$key]) && $r[$key]<= $min)){
				$index = $i;
				$min = $r[$key];				
			}	
		}
		
		return $index;
	}
	public function parse_csv($file, $lineLength=0, $delimiter=",", $enclosure='"', $escape = '\\'){
		ini_set("memory_limit",-1);
		set_time_limit(0);
		
		$line = file($file);				
		if(1 == count($line)){
			if(strpos($line[0], "\n\r") != FALSE){					
				$line = explode("\n\r", $line[0]);
			}								
			elseif(strpos($line[0], "\r") != FALSE){					
				$line = explode("\r", $line[0]);
			}
			elseif(strpos($line[0], "\n") != FALSE){					
				$line = explode("\n", $line[0]);
			}
		}

		if($line){
			$array = array();
			foreach($line as $l){
				$l = str_replace('"', '', $l);
				if(substr($l, 0, 3) == pack("CCC",0xef,0xbb,0xbf)){
					$l=substr($l, 3);
				}				
				$array[] = str_getcsv($l);	
			}
			
			return $array;
		}
	}
	
	public function parse_csv_rows($rows, $delimiter = "\t"){
		ini_set("memory_limit",-1);
		set_time_limit(0);
		
		$array = array();
		$line = '';
		foreach ($rows as $row){
			if(!empty($row)){
				if(!empty($line)){
					$line .= ','.$row;
				}else{
					$line = $row;
				}
			}
		}
		if(!empty($line)){
			$array = str_getcsv($line, $delimiter);
		}
		return $array;
	}
	
	public function toYmd($date = array()){
		if(is_array($date)){
			if(!empty($date['era']) && !empty($date['view'])){
				require_once Yii::getPathOfAlias('spring.validators.era').'/Date_Japanese_Era.php';				
				if(preg_match('/^(?<year>[0-9]+)\/(?<month>[0-9]+)\/(?<day>[0-9]+)$/', $date['view'], $m)){
					try{
						$era = new Date_Japanese_Era(array($date['era'], $m['year']));
						$date = $era->__get('gregorianYear')."-{$m['month']}-{$m['day']}";
					}
					catch(Exception $e){}
				}	
			}			
		}
		
		return is_array($date) ? NULL : $date;
	}
	
	public function toEra($date = NULL){
		if($date && ($time = strtotime($date))){
			require_once Yii::getPathOfAlias('spring.validators.era').'/Date_Japanese_Era.php';
			try{
				$r = array();
				$era = new Date_Japanese_Era(array(date('Y', $time), date('m', $time), date('d', $time)));	
				return "{$era->__get('nameAscii')} {$era->__get('year')}".date('/m/d', $time);
			}
			catch(Exception $e){}
		}		
	}
	
	public function toEraName($date = NULL, $name="nameAscii"){
		if($date && ($time = strtotime($date))){
			require_once Yii::getPathOfAlias('spring.validators.era').'/Date_Japanese_Era.php';
			try{
				$r = array();
				$era = new Date_Japanese_Era(array(date('Y', $time), date('m', $time), date('d', $time)));	
				return $era->__get('nameAscii');
			}
			catch(Exception $e){}
		}	
	}
	
	public function toUTF8($data=NULL){		
		if(!($detect = mb_detect_encoding($data , mb_detect_order() , true))){
			$detect = mb_detect_encoding($data, 'JIS, eucjp-win, sjis-win, ISO-2022-JP, UTF-8, UTF-7, ASCII, UTF-16, UTF-32, UCS2, UCS4, UTF-32BE, UTF-32LE, UTF-16BE, UTF-16LE, windows-1251, ISO-8859-1, GBK');
		}			
			
		if(in_array($detect, array('ASCII', 'UTF-8')))
			return $data;
			
		return mb_convert_encoding($data, 'UTF-8', $detect);
	}
}