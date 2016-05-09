<?php
////////////////////////////////////
// 発行前に 1~3の定義を設定してください。
////////////////////////////////////

/*** 1) サービス種別 ***********
 *   例）
 * 		A: イエあんしん
 *		B: 離れた家族
 ************************/
define('SERVICE', 'A');

/*** 2) バージョン ***********
 *   例）
 * 		A: 2014/10/16 生成
 *		B: 2014/12/19 生成
 ************************/
define('VERSION', 'B');

/*** 3) 発行件数 *******/
define('GEN_MAX', 60000);


// ライセンスキーの長さ
define('GEN_LEN', 10);

class MLicenceKey extends CFormModel{
	public $service;
	public $quantity;
	public $generate_err;
	
	public function rules(){
		return array(
			array('quantity, service', 'required', 'message'=>Yii::t('msg','please.input', array('{0}'=>'{attribute}'))),
			array('quantity', 'numerical', 'integerOnly'=>true, 'min'=>0),
			array('quantity, service', 'safe'),
		);
	}

	public function attributeLabels(){
		return array(
			'quantity' => '発行件数',
			'service' => '対象サービス',
		);
	}
	
	public function generate(&$arrLicenceKey){		
		if($this->quantity){
			$i = 0;
			$today = date('Y-m-d');
			$version = $this->getVer();
			while($i < $this->quantity){
				try {
					$k = $this->make(GEN_LEN, $i, GEN_MAX, $this->service, $version);
					$mContract = new BaseContract();
					$mContract->licence_key = $k;
					$mContract->create_date = $today;
					if($mContract->save()){
						$i++;
						$arrLicenceKey[] = array($k);
					}
				} catch (Exception $e) {
					$i--;
					//$this->generate_err = $e->getMessage();
					//return;
				}
			}
			if($i!=$this->quantity) $this->generate_err = 'Error';
			else $this->generate_err = 0;
		}
	}
	
	public function genByIndex($i, $k, &$licence_key, $verssion){
		try {
			$mContract = new BaseContract();
			$licence_key = $this->make(GEN_LEN, $i, GEN_MAX, $this->service, $verssion);
			$mContract->licence_key = $licence_key;
			$mContract->create_date = date('Y-m-d');
			$mContract->save();
		} 
		catch (Exception $e) {
			return $e->getMessage();
		}
	}
	
	private function make($len, $number, $max, $begin, $end, $secret="8H6B7G9FCA"){	
		$result = "";
		$number = sprintf("%0".strlen($max)."s", ($number + 1));	
		for($i=0;$i<strlen($number);$i++){
			$result = $secret[$number[$i]] . $result;
		}
		if($len>strlen($max)){
			//$result .= $this->random(($len-strlen($max)));		
			$result .= $this->random(($len-strlen($number)));		
		}
		$result = "{$begin}{$result}{$end}";
		//$result = substr($result, 0, 4) . '-' . substr($result, 4, 4) . '-' . substr($result, -4);	
		return $result;
	}
	private function random($len){			
		$result = "";
		if($len>0){
			$src = "23456789ABCDEFGHJKLMNPQRSTUVWXYZ";
			for($i=1; $i<=$len; $i++){
				$index = rand(0, (strlen($src)-1));			
				$result .= $src{$index};		
			}
		}
		return $result;
	}
	
	public function getVer(){
		$val = 65;
		$files  = array('A' => 'service_a.txt', 'B' => 'service_b.txt');
		if(!empty($files[$this->service])){
			$path = Yii::app()->getRuntimePath().DIRECTORY_SEPARATOR.$files[$this->service];
			if(is_file($path) && file_exists($path)){							
				$val = (int)file_get_contents($path);
				$val++;
			}			
			if($val>90){
				$val = 65;	
			}
			
			sleep(1);
			file_put_contents($path, $val, LOCK_EX);
		}
		
		$_SESSION["licence_version"] = chr($val);
		return chr($val);
	}
}