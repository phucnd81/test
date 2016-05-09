<?php
class FamilyController extends FController

{
	public function actionFamilyEntry()	
	{	
		$licence_key = '';
		if(isset($_GET['key']))
		{
			$licence_key = $_GET['key'];
			$model = FContract::model()->findByAttributes(array('licence_key'=>$licence_key));
			if($model == NULL)
			{
				$model = new FContract();
			}
		}else
			$model = new FContract();
		
		$arrData = array();
		if ( isset($_SESSION["list_home"]) ){
			$arrData = $_SESSION["list_home"];
			unset($_SESSION["list_home"]);
		}
		
			
		$this->render('entry', array('model'=>$model,'licence_key'=>$licence_key, 'arrData' => $arrData));

	}



	public function actionCheckFamilyEntry()

	{

		if(!isset($_POST['param1']) || !isset($_POST['param2']) || !isset($_POST['param3']) || !isset($_POST['param4']) || !isset($_POST['param5']) || !isset($_POST['param6']) || !isset($_POST['param7']) || !isset($_POST['param8']) || !isset($_POST['param9']) || !isset($_POST['param10']) || !isset($_POST['param11']) || !isset($_POST['param12']) || !isset($_POST['param13']) || !isset($_POST['param14']) || !isset($_POST['param15']) || !isset($_POST['param16']) || !isset($_POST['param17']) || !isset($_POST['param18']) || !isset($_POST['param19']) || !isset($_POST['param20']) || !isset($_POST['param21']) || !isset($_POST['param22']) || !isset($_POST['param23']) || !isset($_POST['param24']) || !isset($_POST['param25']) || !isset($_POST['param26']) || !isset($_POST['param27']) || !isset($_POST['param28']) || !isset($_POST['param29']) || !isset($_POST['param30']) || !isset($_POST['param31']))

		{

			exit();

		}

		$licence_key = FContract::model()->getlicence_key();

		$check = 0;

		foreach($licence_key as $value){

			if($_POST['param1'] == $value['licence_key']){

				$check = 1;

				break;

			}

		}

		if($check == 0){

			echo 'error';

			exit();

		}

		$name1 = $_POST['param2'].$_POST['param3'];

		$kana1 = $_POST['param4'].$_POST['param5'];

		$name2 = $_POST['param17'].$_POST['param18'];

		$kana2 = $_POST['param19'].$_POST['param20'];

		if($name1 == '' || $kana1 == '' || $name2 == '' || $kana2 == '' || $_POST['param8'] == '' || $_POST['param9'] == '' || $_POST['param10'] == '' || $_POST['param11'] == '' || $_POST['param23'] == '' || $_POST['param24'] == '' || $_POST['param25'] == '' || $_POST['param26'] == ''){

			exit();

		}
		if((!$this->actionCheckEmail($_POST['param8'])) || strcmp($_POST['param8'],$_POST['param9']) != 0){

			exit();

		}

		if((!$this->actionCheckEmail($_POST['param23'])) || strcmp($_POST['param23'], $_POST['param24']) != 0){

			exit();

		}	

		if(!ctype_digit($_POST['param10']) || !ctype_digit($_POST['param25'])){

			exit();

		}

		if((!ctype_digit($_POST['param6']) && strcmp($_POST['param6'],'') != 0) || (!ctype_digit($_POST['param7']) && strcmp($_POST['param7'],'') != 0) || (!ctype_digit($_POST['param21']) && strcmp($_POST['param21'],'') != 0) || (!ctype_digit($_POST['param22']) && strcmp($_POST['param22'],'') != 0)){

			exit();

		}

		//session_start();

		$list_home = array();

		for($i = 1; $i <= 33; $i++){

			$list_home[] = $_POST['param'.$i];

		}

		$_SESSION['list_home'] = $list_home;

		exit();

	}

	

	public function actionFamilyConfirm()

	{

		//session_start();

		if(empty($_SESSION['list_home']) || !isset($_GET['license01']) ){

			exit();

		}

		$list_home = $_SESSION['list_home'];

		$list_home[] = $_GET['license01'];

		/* $list_home[] = $_GET['license02'];

		$list_home[] = $_GET['license03']; */

		//unset($_SESSION['list_home']);

		$this->render('confirm', array('list_home'=>$list_home));

	}

	

	public function actionUpdateFamily()

	{

		if(!isset($_POST['param1']) || !isset($_POST['param2']) || !isset($_POST['param3']) || !isset($_POST['param4']) || !isset($_POST['param5']) || !isset($_POST['param6']) || !isset($_POST['param7']) || !isset($_POST['param8']) || !isset($_POST['param9']) || !isset($_POST['param10']) || !isset($_POST['param11']) || !isset($_POST['param12']) || !isset($_POST['param13']) || !isset($_POST['param14']) || !isset($_POST['param15']) || !isset($_POST['param16']) || !isset($_POST['param17']) || !isset($_POST['param18']) || !isset($_POST['param19']) || !isset($_POST['param20']) || !isset($_POST['param21']) || !isset($_POST['param22']) || !isset($_POST['param23']) || !isset($_POST['param24']) || !isset($_POST['param25']) || !isset($_POST['param26']) || !isset($_POST['param27']) || !isset($_POST['param28']) || !isset($_POST['param29']) || !isset($_POST['param30']) || !isset($_POST['param31']))

		{

			exit();

		}

		$licence_key = FContract::model()->getlicence_key();

		$check = 0;

		foreach($licence_key as $value){

			if($_POST['param1'] == $value['licence_key']){

				$check = 1;

				break;

			}

		}

		if($check == 0){

			echo 'error';

			exit();

		}

		$name1 = $_POST['param2'].$_POST['param3'];

		$kana1 = $_POST['param4'].$_POST['param5'];

		$name2 = $_POST['param17'].$_POST['param18'];

		$kana2 = $_POST['param19'].$_POST['param20'];

		if($name1 == '' || $kana1 == '' || $name2 == '' || $kana2 == '' || $_POST['param8'] == '' || $_POST['param9'] == '' || $_POST['param10'] == '' || $_POST['param11'] == '' || $_POST['param23'] == '' || $_POST['param24'] == '' || $_POST['param25'] == '' || $_POST['param26'] == ''){

			exit();

		}
        if((!$this->actionCheckEmail($_POST['param8'])) || strcmp($_POST['param8'],$_POST['param9']) != 0){

			exit();

		}

        if((!$this->actionCheckEmail($_POST['param23'])) || strcmp($_POST['param23'], $_POST['param24']) != 0){

			exit();

		}	

		if(!ctype_digit($_POST['param10']) || !ctype_digit($_POST['param25'])){

			exit();

		}

		if((!ctype_digit($_POST['param6']) && strcmp($_POST['param6'],'') != 0) || (!ctype_digit($_POST['param7']) && strcmp($_POST['param7'],'') != 0) || (!ctype_digit($_POST['param21']) && strcmp($_POST['param21'],'') != 0) || (!ctype_digit($_POST['param22']) && strcmp($_POST['param22'],'') != 0)){

			exit();

		}

		$user_type = '0';
        $user_regist_date=date('Y-m-d H:i:s');
       
		$update = FContract::model()->update_home($_POST['param1'], $_POST['param2'], $_POST['param3'], $_POST['param4'], $_POST['param5'], $_POST['param6'], $_POST['param7'], $_POST['param8'], $_POST['param9'], $_POST['param10'], $_POST['param11'], $_POST['param12'], $_POST['param13'], $_POST['param14'], $_POST['param15'], $_POST['param16'], $_POST['param17'], $_POST['param18'], $_POST['param19'], $_POST['param20'], $_POST['param21'], $_POST['param22'], $_POST['param23'], $_POST['param24'], $_POST['param25'], $_POST['param26'], $_POST['param27'], $_POST['param28'], $_POST['param29'], $_POST['param30'], $_POST['param31'], $user_type, $_POST['param32'], $_POST['param33'],$user_regist_date);

		if($update != 1){

			echo 'error_u';

			exit();

		}
		else{
			unset($_SESSION['list_home']);
			if(!empty($_POST['param16'])){
				$_POST['param16'] = nl2br($_POST['param16']);
			}
			if(!empty($_POST['param31'])){
				$_POST['param31'] = nl2br($_POST['param31']);
			}
			
			SendEmail::send(NULL, 'send_to_admin', $_POST);
			SendEmail::send($_POST['param8'], 'send_to_customer', $_POST);
		}
	}

	public function actionFamilyFinish()

	{

		$this->render('finish');

	}
	public function actionCheckContract()
	{
		if(isset($_POST['licence_key']))
		{
			$model = FContract::model()->findByAttributes(array('licence_key'=>$_POST['licence_key']));
			if($model==NULL)
			{
				echo '0';
			}else{
				if(!empty($model->first_name1) || !empty($model->last_name1) || !empty($model->first_kana1) || !empty($model->last_kana1))
					echo '2';
				else
					echo '1';
			}
		}
	}

    public function actionCheckEmail($email=""){
        $pattern_user   = '[a-zA-Z0-9_\-\.\+\^!#\$%&*+\/\=\?\`\|\{\}~\']+';
        $pattern_domain = '(?:(?:[a-zA-Z0-9]|[a-zA-Z0-9][a-zA-Z0-9\-]*[a-zA-Z0-9])\.?)+';
        $pattern_ipv4   = '[0-9]{1,3}(\.[0-9]{1,3}){3}';
        $pattern_ipv6   = '[0-9a-fA-F]{1,4}(\:[0-9a-fA-F]{1,4}){7}';
        $pattern = "/^$pattern_user@($pattern_domain|(\[($pattern_ipv4|$pattern_ipv6)\]))$/";
        if((!preg_match($pattern, $email))){
            return false;
        }else{
            return true;
        }
    }
    public  function  actionCheckEmailAjax(){
        header('Content-Type: application/json');
        $email1=$_POST["emailAddress1"];
        $email2=$_POST["emailAddress2"];
        $result=array("result"=>"ok");
        if(!$this->actionCheckEmail($email1)){
            $result["result"]="error";
            $result["entryMail1_1"]=1;
        }
        if(!$this->actionCheckEmail($email2)){
            $result["result"]="error";
            $result["entryMail2_1"]=1;
        }
        echo json_encode($result);
    }
}