<?php
class HouseworkController  extends FController {
	public function actionCheckZipCode(){
		$zipcode = $_POST["zipcode"];
		$return = array('zipcode' => $zipcode, 'error' => 0, 'html' => '', 'msg' => '');
		
		$areaInfo = AreaModel::model()->getServiceAreaByZipCode($zipcode);
		if ( empty($areaInfo) ){
			$return['error'] = 1;
			$return['msg'] = '郵便番号の形式が正しくありません。';
		}else{
			$return['html'] = $this -> renderPartial('search_result', array('areaInfo' => $areaInfo), true);
		}
		@ob_clean();
		header('Content-Type: application/json; charset="UTF-8"');
		echo json_encode($return);
		exit;
		
	}
	public function actionHouseclean(){
		$this -> layout = false;
		$this->render('houseclean');
	}
	public function actionHousekeeping(){
		$this -> layout = false;
		$this->render('housekeeping');
	}
	public function actionCleaning(){
		$this -> layout = false;
		$this->render('cleaning');
	}
}
?>