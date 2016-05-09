<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionLogin()
	{
		if($id=Yii::app()->user->id){
			$this->redirect(Yii::app()->user->returnUrl);
		}
		$model = new LoginForm;
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes = $_POST['LoginForm'];
			if(!$model->validate(array('username','password'))){
			
			}
			else{
				if($model->validate(array('login')) && $model->login()){
					$this->redirect(Yii::app()->user->returnUrl);
					
				}
				else {
					//reset value
					$model->username = $model->password = "";
				}
			}
		}
		
		// display the login form
		$this->layout = '//layouts/admin_none';
		$this->render('login', array('model'=>$model));
	}
	
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		echo "<script language=\"javascript\">window.location.href='".Yii::app()->homeUrl."'</script>";
		
	}
	
	public function actionLicenceKey(){
		$model = new MLicenceKey();
		
		static $mess;
		static $ses_key;
		
		if(isset($_POST['MLicenceKey'])){
			$model->quantity = $_POST['MLicenceKey']['quantity'];
			$model->service = $_POST['MLicenceKey']['service'];			
			$_SESSION["licence_service"] = $model->service;
			
			if($model->validate()){
				if($model->quantity>Yii::app()->params['one_loop']){
					if ( isset($_SESSION["array_licence_key"]) ){
						//unset($_SESSION["array_licence_key"]);
					}
					$ses_key = md5(rand(10, 99));
					$_SESSION[$ses_key] = array(
						'quantity' => $model->quantity,
						'service'  => $model->service,
						'version'  => $model->getVer(),
						'current' => 0
					);
					
				}
				else{
					$model->generate($arrLicenceKey);
					if($model->generate_err) $mess = $model->generate_err;
					else{
						$model->quantity = '';
						$model->service = '';
						$_SESSION["array_licence_key"] = $arrLicenceKey;
					}
				}
			}
		}
		
		/*
		$this->licencekeyAjaxValidation($model);
		if(isset($_POST['MLicenceKey']['quantity'])){
			$model->quantity = $_POST['MLicenceKey']['quantity'];
			$model->generate();
			if($model->generate_err) $mess = $model->generate_err;
			else $model->quantity = '';
		}*/
		$csv_export_licence_key = 0;
		if ( isset($_SESSION["array_licence_key"]) ){
			$csv_export_licence_key = 1;
		}
		if (!isset($mess)) $mess = '';
		if (!isset($ses_key)) $ses_key = '';
		$this->render('licencekey', array(
			'model'=>$model, 
			'mess'=>$mess, 
			'ses_key' => $ses_key, 
			'csv_export_licence_key'=>$csv_export_licence_key
		));
		
		
	}
	
	function actionCsvLicenceKey(){
		$arrLicenceKey = $_SESSION["array_licence_key"];
		$service = $_SESSION["licence_service"];
		$version = $_SESSION["licence_version"];
		
		Yii::import('ext.ECSVExport');
        
        $data_csv=array();
        foreach($arrLicenceKey as $key_licence)
        {
            $data_csv[]=array(
                "JBR" => "JBR",
                "優待コード"=>$key_licence[0]   
            );
        }
		$csv = new ECSVExport($data_csv,true,false);
		$output = mb_convert_encoding($csv->toCSV(),"SJIS-win", "UTF-8");
		
		$filename= (($service == 'A') ? "key_ieanshin" : "key_kazokuanshin" ) . "_{$version}_".date('Ymd').".csv";
		Yii::app()->getRequest()->sendFile($filename, $output, "text/csv", false);
		
		unset($_SESSION["array_licence_key"]);
		unset($_SESSION["licence_service"]);
		unset($_SESSION["licence_version"]);
		
		Yii::app()->end();
	}
	
	public function actionLoop(){
		
		$result = array();
			
		if(!empty($_GET['ses_id']) && !empty($_SESSION[$_GET['ses_id']])){
			$key = $_GET['ses_id'];
			
			$model = new MLicenceKey();
			$model->service = $_SESSION[$key]['service'];
			
			for($i=0; $i<Yii::app()->params['one_loop']; $i++){
				if($_SESSION[$key]['current'] >= $_SESSION[$key]['quantity']){
					$result = array('message'=>'reached quantity', 'current'=>$_SESSION[$key]['current'], 'quantity'=>$_SESSION[$key]['quantity'],
									'status'=>'done');
					unset($_SESSION[$key]);
					break;
				}
				
				if($message = $model->genByIndex($_SESSION[$key]['current']++, $key, $licence_key, $_SESSION[$key]['version'])){
					$result = array('message'=>$message);
					break;
				}
				$_SESSION["array_licence_key"][] = array($licence_key);
			}			
		}
		
		else if ( !empty($_GET['ses_id']) && empty($_SESSION[$_GET['ses_id']])){
			$result = array('message'=>'empty session');
		}
		else{
			$result = array('message'=>'empty ses key');
		}
		@ob_clean();
		header('Content-Type: application/json; charset="UTF-8"');
		echo json_encode($result);
		Yii::app()->end();
	}
	
	protected function licencekeyAjaxValidation($model){
		if(isset($_POST['ajax']) && $_POST['ajax']==='licencekey-form'){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}