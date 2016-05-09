<?php
class HomeController extends FController
{
	public function actionHomeEntry()
	{
		$model = new FContract();
		$this->render('entry', array('model'=>$model));
	}

	public function actionCheckHomeEntry()
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
		if((!filter_var($_POST['param8'], FILTER_VALIDATE_EMAIL)) || strcmp($_POST['param8'],$_POST['param9']) != 0){
			exit();
		}
		if((!filter_var($_POST['param23'], FILTER_VALIDATE_EMAIL)) || strcmp($_POST['param23'], $_POST['param24']) != 0){
			exit();
		}	
		if(!ctype_digit($_POST['param10']) || !ctype_digit($_POST['param25'])){
			exit();
		}
		if((!ctype_digit($_POST['param6']) && strcmp($_POST['param6'],'') != 0) || (!ctype_digit($_POST['param7']) && strcmp($_POST['param7'],'') != 0) || (!ctype_digit($_POST['param21']) && strcmp($_POST['param21'],'') != 0) || (!ctype_digit($_POST['param22']) && strcmp($_POST['param22'],'') != 0)){
			exit();
		}
		session_start();
		$list_home = array();
		for($i = 1; $i <= 31; $i++){
			$list_home[] = $_POST['param'.$i];
		}
		$_SESSION['list_home'] = $list_home;
		exit();
	}
	
	public function actionHomeConfirm()
	{
		session_start();
		if(empty($_SESSION['list_home']) || !isset($_GET['license01']) || !isset($_GET['license02']) || !isset($_GET['license03'])){
			exit();
		}
		$list_home = $_SESSION['list_home'];
		$list_home[] = $_GET['license01'];
		$list_home[] = $_GET['license02'];
		$list_home[] = $_GET['license03'];
		unset($_SESSION['list_home']);
		$this->render('confirm', array('list_home'=>$list_home));
	}
	
	public function actionUpdateHome()
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
		if((!filter_var($_POST['param8'], FILTER_VALIDATE_EMAIL)) || strcmp($_POST['param8'],$_POST['param9']) != 0){
			exit();
		}
		if((!filter_var($_POST['param23'], FILTER_VALIDATE_EMAIL)) || strcmp($_POST['param23'], $_POST['param24']) != 0){
			exit();
		}	
		if(!ctype_digit($_POST['param10']) || !ctype_digit($_POST['param25'])){
			exit();
		}
		if((!ctype_digit($_POST['param6']) && strcmp($_POST['param6'],'') != 0) || (!ctype_digit($_POST['param7']) && strcmp($_POST['param7'],'') != 0) || (!ctype_digit($_POST['param21']) && strcmp($_POST['param21'],'') != 0) || (!ctype_digit($_POST['param22']) && strcmp($_POST['param22'],'') != 0)){
			exit();
		}
		$user_type = '1';
		$update = FContract::model()->update_home($_POST['param1'], $_POST['param2'], $_POST['param3'], $_POST['param4'], $_POST['param5'], $_POST['param6'], $_POST['param7'], $_POST['param8'], $_POST['param9'], $_POST['param10'], $_POST['param11'], $_POST['param12'], $_POST['param13'], $_POST['param14'], $_POST['param15'], $_POST['param16'], $_POST['param17'], $_POST['param18'], $_POST['param19'], $_POST['param20'], $_POST['param21'], $_POST['param22'], $_POST['param23'], $_POST['param24'], $_POST['param25'], $_POST['param26'], $_POST['param27'], $_POST['param28'], $_POST['param29'], $_POST['param30'], $_POST['param31'], $user_type);
		if($update != 1){
			echo 'error_u';
			exit();
		}
	}
	
	public function actionHomeFinish()
	{
		$this->render('finish');
	}
}