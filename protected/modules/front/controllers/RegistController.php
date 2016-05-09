<?php
class RegistController extends FController
{
	public function detectIMode(){
		$devide_imode = '';
		//if(stripos($_SERVER['HTTP_USER_AGENT'],"ISIM")!==false)  $devide_imode = 'imode/';
		if ( isset($_SESSION["imode"]) && !empty($_SESSION["imode"]) ){	
			$devide_imode = $_SESSION["imode"]; 
			header('Content-Type: text/html; charset=shift-jis');
		} 
		return $devide_imode;
	}
	
	public function actionSeikatsu()
	{
        $data = array();
        if(!isset($_POST["key"])){ //back
		   // if(isset($_SESSION["POST"]) && isset($_SESSION["POST"]['last_name1']) && isset($_SESSION["POST"]['number'])){
			if(isset($_SESSION["POST"])){
                 $this->renderPartial($this->detectIMode().'seikatsu',array('POST' => $_SESSION["POST"])
							);
            }
        }else{
			if ( !isset($_POST["regist_type"]) )
				$_POST["regist_type"] = 1;
            $_SESSION["POST"] = $_POST;
            $data = FContract::model()->findByAttributes(array('licence_key'=>$_SESSION["POST"]['key']));
            if(empty($data)){

            }elseif(!empty($data['email1'])){
                //$this->sendToHome();
                header('Location: phone.php');
            }else{
				$_SESSION["POST"]['first_name1'] = $this -> checkImodeGetValue($data['first_name1']);
				$_SESSION["POST"]['last_name1'] = $this -> checkImodeGetValue($data['last_name1']);
				$_SESSION["POST"]['number'] = $this -> checkImodeGetValue($data['mobile1']);
				$this->renderPartial($this->detectIMode().'seikatsu',array('POST' => $_SESSION["POST"])
							);
            }
        }
        
	}
	public function actionAgreement(){
		if(isset($_POST['first_name1'])) $_SESSION['POST']['first_name1'] = $this -> checkImodeGetValue($_POST['first_name1']);
		if(isset($_POST['last_name1'])) $_SESSION['POST']['last_name1'] = $this -> checkImodeGetValue($_POST['last_name1']);
		if(isset($_POST['number'])) $_SESSION['POST']['number'] = $this -> checkImodeGetValue($_POST['number']);
		$this->renderPartial($this->detectIMode().'agreement');
	}
	public function actionConfirm(){
		if ( isset($_SESSION["on_phone"]) && $_SESSION["on_phone"] == "on_phone" ){
			unset($_SESSION["on_phone"]);
			if ( $this -> detectIMode() == '' )
				header('Location: http://home.idc.nttdocomo.co.jp/');
		}
		if(isset($_POST["confirmclick"])){
        	$this->sendToHomeUpdate();
			if ( $this -> detectIMode() == '' )
				header('Location: phone.php');
			else
				header('Location: phone_i.php');
		}
		if(isset($_POST['name'])||isset($_POST['number'])){
			$_SESSION['POST']['first_name1'] = $this -> checkImodeGetValue($_POST['first_name1']);
			$_SESSION['POST']['last_name1'] = $this -> checkImodeGetValue($_POST['last_name1']);
			$_SESSION['POST']['number'] = $this -> checkImodeGetValue($_POST['number']);
		}
		$this->renderPartial($this->detectIMode().'confirm',array('POST' => $_SESSION['POST'])
							);

	}
	public function actionEdit(){
		if(isset($_POST['name'])||isset($_POST['number'])){
			$_SESSION['POST']['first_name1'] = $this -> checkImodeGetValue($_POST['first_name1']);
			$_SESSION['POST']['last_name1'] = $this -> checkImodeGetValue($_POST['last_name1']);
			$_SESSION['POST']['number'] = $this -> checkImodeGetValue($_POST['number']);
		}
		$this->renderPartial($this->detectIMode().'edit',array('POST' => $_SESSION['POST']));

	}
	
	public function checkImodeGetValue($value){
		if ( $this -> detectIMode() == 'imode/' ){
			if ( mb_detect_encoding($value,array('UTF-8', 'Shift-JIS')) == 'UTF-8' )
				$value = mb_convert_encoding($value, 'SJIS', 'UTF-8');
		}
		return $value;
	}
	
	//i
	public function actionSeikatsui(){
		$_SESSION["imode"] = 'imode/';
		$this -> actionSeikatsu();
	}
	public function actionKajii()
	{
		$_SESSION["imode"] = 'imode/';
		$_POST['regist_type'] = 2;
        $this ->actionSeikatsu();
	}
	
	public function actionZaitakui()
	{   
		$_SESSION["imode"] = 'imode/';
		$_POST['regist_type'] = 3;
        $this ->actionSeikatsu();
	}
	
	public function actionOmimaii()
	{		
		$_SESSION["imode"] = 'imode/';	
		$_POST['regist_type'] = 4;
        $this ->actionSeikatsu();
	}
	//end id
	
	public function actionKaji()
	{
		$_POST['regist_type'] = 2;
         $this ->actionSeikatsu();
	}
	
	public function actionZaitaku()
	{   
			$_POST['regist_type'] = 3;
            $this ->actionSeikatsu();
	}
	
	public function actionOmimai()
	{			
			$_POST['regist_type'] = 4;
            $this ->actionSeikatsu();
	}
    
    public  function actionPhone(){
        if(!isset($_SESSION['POST']['regist_type']))
            die;
		if ( $this->detectIMode() == '' )
        	$device = $this->checkDevice();
		else
			$device = false;
		$_SESSION["on_phone"] = "on_phone";
       switch ($_SESSION['POST']['regist_type']){
           case '1':
               $page = "phone_seikatsu";
               break;
           case '2':
               $page = "phone_kaji";
               break;
           case '3':
               $page = "phone_zaitaku";
               break;
           case '4':
               $page = "phone_omimai";
               break;
       }
       $this->renderPartial($this->detectIMode().$page,array('device' => $device));
    }
    protected function sendToHomeUpdate(){
    	if(!isset($_SESSION["POST"]['key']))
    		die;
        $data = FContract::model()->findByAttributes(array('licence_key'=>$_SESSION["POST"]['key']));
		
		if ( mb_detect_encoding($_SESSION["POST"]['first_name1'],array('UTF-8', 'Shift-JIS')) == 'SJIS' )
			$data->first_name1 = mb_convert_encoding($_SESSION["POST"]['first_name1'], 'UTF-8', 'SJIS');
		else
			$data->first_name1 = $_SESSION["POST"]['first_name1'];
		
		if ( mb_detect_encoding($_SESSION["POST"]['last_name1'],array('UTF-8', 'Shift-JIS')) == 'SJIS' )	
			$data->last_name1 =  mb_convert_encoding($_SESSION["POST"]['last_name1'], 'UTF-8', 'SJIS');
		else
			$data->last_name1 = $_SESSION["POST"]['last_name1'];
		
		if ( mb_detect_encoding($_SESSION["POST"]['number'],array('UTF-8', 'Shift-JIS')) == 'SJIS' )
			$data->mobile1 = mb_convert_encoding($_SESSION["POST"]['number'], 'UTF-8', 'SJIS');
		else 
			$data->mobile1 = $_SESSION["POST"]['number'];
		
		if ( !empty($_SESSION["POST"]['userid']) )
			$data->openid = $_SESSION["POST"]['userid'];
		$data->user_regist_date = date('Y/m/d H:i:s');
		$data->save();
		
        $param = array(
            'userid' => $_SESSION["POST"]['userid'],
            'key' => $_SESSION["POST"]['key']
        );
		$param_string = json_encode($param);
		$url = $_SESSION["POST"]['callback'];
        
		$ch=curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $param_string);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Connection:keep-alive',
			'Content-Type: application/json;charset=utf-8',                                                                                
		    'Content-Length: ' . strlen($param_string))                                                                       
		);
        $result = curl_exec($ch);
        curl_close($ch);
    }
    
    public function accessRules()
	{
		return array(	
			array('allow',
				  //'actions' => array('login', 'logout', 'error'),
				  'users'=>array('*'),
			)
		);
	}
}
?>