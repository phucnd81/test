<?php
class FamilyController extends FController

{
	public function actionFamilyEntry()	
	{	
		$licence_key = '';
        $edit=0;
		if(isset($_SESSION['reg_user']) && !isset($_SESSION["go_back_f"]))
		{
			
            if(isset($_SESSION['reg_user']['key']))
                $licence_key = $_SESSION['reg_user']['key'];
			$model = FContract::model()->findByAttributes(array('licence_key'=>$licence_key));
          //  $_SESSION["list_home"]=$model;
//            var_dump($model);exit;
            $list_home[0]=$licence_key;
            $list_home[1]=$model['first_name1'];
            $list_home[2]=$model['last_name1'];
            $list_home[3]=$model['first_kana1'];
            $list_home[4]=$model['last_kana1'];
            $list_home[5]=$model['tel1'];
            $list_home[6]=$model['mobile1'];
            $list_home[7]=$model['email1'];
            $list_home[8]=$model['email1'];
            $list_home[9]=$model['zip_code1'];
            $list_home[10]=$model['pref1'];
            $list_home[11]=$model['address1_1'];
            $list_home[12]=$model['address1_2'];
            $list_home[13]=$model['address1_3'];
            $list_home[14]=$model['address1_4'];
            $list_home[15]=$model['remark1'];
         //   $list_home[16]=$model['first_name1'];
            $list_home[16]=$model['first_name2'];
            $list_home[17]=$model['last_name2'];
            $list_home[18]=$model['first_kana2'];
            $list_home[19]=$model['last_kana2'];
            $list_home[20]=$model['tel2'];
            $list_home[21]=$model['mobile2'];
            $list_home[22]=$model['email2'];
            $list_home[23]=$model['email2'];
            $list_home[24]=$model['zip_code2'];
            $list_home[25]=$model['pref2'];
            $list_home[26]=$model['address2_1'];
            $list_home[27]=$model['address2_2'];
            $list_home[28]=$model['address2_3'];
            $list_home[29]=$model['address2_4'];
            $list_home[30]=$model['remark2'];
         //   $list_home[31]=$model['first_name2'];
            $list_home[31]=$model['age_group'];
            $list_home[32]=$model['age_group2'];
         //12675 added area
         	$list_home['Zaitaku_sub']=$model['Zaitaku_sub'];
         	$list_home['first_name3']=$model['first_name3'];
         	$list_home['last_name3']=$model['last_name3'];
         	$list_home['first_kana3']=$model['first_kana3'];
         	$list_home['last_kana3']=$model['last_kana3'];
         	$list_home['tel3']=$model['tel3'];
         	$list_home['mobile3']=$model['mobile3'];
         	$list_home['zip_code3']=$model['zip_code3'];
         	$list_home['pref3']=$model['pref3'];
         	$list_home['address3_1']=$model['address3_1'];
         	$list_home['address3_2']=$model['address3_2'];
         	$list_home['address3_3']=$model['address3_3'];
         	$list_home['address3_4']=$model['address3_4'];
         	$list_home['relationship3']=$model['relationship3'];
            $name1=$model['first_name1'].$model['last_name1'];
            if($name1!='')
            {
                $edit=1;
            }
            
    		$_SESSION['list_home'] = $list_home;
        //    var_dump($list_home);
            
            if($model == NULL)
			{
				$model = new FContract();
			}
    
		}else{
            $model = new FContract();
            if(isset($_SESSION["go_back_f"]))unset($_SESSION["go_back_f"]);
        }

		
		$arrData = array();
		if ( isset($_SESSION["list_home"])){
			$arrData = $_SESSION["list_home"];
			if ( isset($arrData[0]) )
				$licence_key = $arrData[0];
			unset($_SESSION["list_home"]);
			if ( isset($_SESSION["go_back"]))
            	unset($_SESSION["go_back"]);
		}
		
		if (isset($_SESSION['go_by_get_path'])){
			$arrData = array();
			$arrData[0]=$_SESSION['go_by_get_path'];
			$licence_key = $_SESSION['go_by_get_path'];
			$this->render('entry', array('model'=>$model,'licence_key'=>$licence_key, 'arrData' => $arrData,'edit'=>$edit));
		}
		else{
			$this->render('entry', array('model'=>$model,'licence_key'=>$licence_key, 'arrData' => $arrData,'edit'=>$edit));
		}
	}

    

	public function actionCheckFamilyEntry()

	{

		if(!isset($_POST['param1']) || !isset($_POST['param2']) || !isset($_POST['param3']) || !isset($_POST['param4']) || !isset($_POST['param5']) /*|| !isset($_POST['param6'])*/ || !isset($_POST['param7']) || !isset($_POST['param8']) || !isset($_POST['param9']) || !isset($_POST['param10']) || !isset($_POST['param11']) || !isset($_POST['param12']) || !isset($_POST['param13']) || !isset($_POST['param14']) || !isset($_POST['param15']) || !isset($_POST['param16']) || !isset($_POST['param17']) || !isset($_POST['param18']) || !isset($_POST['param19']) || !isset($_POST['param20']) /*|| !isset($_POST['param21'])*/ || !isset($_POST['param22']) || !isset($_POST['param23']) || !isset($_POST['param24']) || !isset($_POST['param25']) || !isset($_POST['param26']) || !isset($_POST['param27']) || !isset($_POST['param28']) || !isset($_POST['param29']) || !isset($_POST['param30']) || !isset($_POST['param31']))

		{

			exit();

		}
		
		$check = 0;
		$model = FContract::model()->findByAttributes(array('licence_key'=>$_POST['param1']));
		if($model != NULL)
		{
			$check = 1;
		}
		
		/*$licence_key = FContract::model()->getlicence_key();
		foreach($licence_key as $value){

			if($_POST['param1'] == $value['licence_key']){

				$check = 1;

				break;

			}

		}*/

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
		
		if (isset($_POST['Zaitaku_sub']) && $_POST['Zaitaku_sub'] != '0'){
			$list_home['Zaitaku_sub'] = $_POST["Zaitaku_sub"];
			$list_home['first_name3'] = $_POST["first_name3"];
			$list_home['last_name3'] = $_POST["last_name3"];
			$list_home['first_kana3'] = $_POST["first_kana3"];
			$list_home['last_kana3'] = $_POST["last_kana3"];
			$list_home['tel3'] = $_POST["tel3"];
			$list_home['mobile3'] = $_POST["mobile3"];
			$list_home['zip_code3'] = $_POST["zip_code3"];
			$list_home['pref3'] = $_POST["pref3"];
			$list_home['address3_1'] = $_POST["address3_1"];
			$list_home['address3_2'] = $_POST["address3_2"];
			$list_home['address3_3'] = $_POST["address3_3"];
			$list_home['address3_4'] = $_POST["address3_4"];
			$list_home['relationship3'] = $_POST["relationship3"];
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

		
		$check = 0;
		$model = FContract::model()->findByAttributes(array('licence_key'=>$_POST['param1']));
		if($model != NULL)
		{
			$check = 1;
		}
		
		/*$licence_key = FContract::model()->getlicence_key();
		foreach($licence_key as $value){

			if($_POST['param1'] == $value['licence_key']){

				$check = 1;

				break;

			}

		}
*/
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
		$start_date = date('Y-m-d');
        
        $openid='';
        if(isset($_SESSION['reg_user']['userid']))
        {
            $openid=$_SESSION['reg_user']['userid'];
        }
        $update = 0;
        if (!isset($model['first_name1']) && !isset($model['last_name1']))
        {
	        if (!isset($model['start_date']) || $model['start_date']== '')
	        	$start_date = date('Y-m-d');
	        else
	        	$start_date = $model['start_date'];
        }
        else
        {
        	$start_date = date('Y-m-d');
        }
       	if (empty($_POST['Zaitaku_sub']))
			$update = FContract::model()->update_home1($_POST['param1'], $_POST['param2'], $_POST['param3'], $_POST['param4'], $_POST['param5'], $_POST['param6'], $_POST['param7'], $_POST['param8'], $_POST['param9'], $_POST['param10'], $_POST['param11'], $_POST['param12'], $_POST['param13'], $_POST['param14'], $_POST['param15'], $_POST['param16'], $_POST['param17'], $_POST['param18'], $_POST['param19'], $_POST['param20'], $_POST['param21'], $_POST['param22'], $_POST['param23'], $_POST['param24'], $_POST['param25'], $_POST['param26'], $_POST['param27'], $_POST['param28'], $_POST['param29'], $_POST['param30'], $_POST['param31'], $user_type, $_POST['param32'], $_POST['param33'],$user_regist_date,$openid, $start_date);
		else
			$update = FContract::model()->update_home1($_POST['param1'], $_POST['param2'], $_POST['param3'], $_POST['param4'], $_POST['param5'], $_POST['param6'], $_POST['param7'], $_POST['param8'], $_POST['param9'], $_POST['param10'], $_POST['param11'], $_POST['param12'], $_POST['param13'], $_POST['param14'], $_POST['param15'], $_POST['param16'], $_POST['param17'], $_POST['param18'], $_POST['param19'], $_POST['param20'], $_POST['param21'], $_POST['param22'], $_POST['param23'], $_POST['param24'], $_POST['param25'], $_POST['param26'], $_POST['param27'], $_POST['param28'], $_POST['param29'], $_POST['param30'], $_POST['param31'], $user_type, $_POST['param32'], $_POST['param33'],$user_regist_date,$openid, $start_date,$_POST['Zaitaku_sub'],$_POST['first_name3'],$_POST['last_name3'],$_POST['first_kana3'],$_POST['last_kana3'],$_POST['tel3'],$_POST['mobile3'],$_POST['zip_code3'],$_POST['pref3'],$_POST['address3_1'],$_POST['address3_2'],$_POST['address3_3'], $_POST['address3_4'],$_POST['relationship3']);
        
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
			if (empty($_POST['Zaitaku_sub'])){
				SendEmail::send(NULL, 'send_to_admin', $_POST);
				SendEmail::send($_POST['param8'], 'send_to_customer', $_POST);
			}else{
				SendEmail::send(NULL, 'send_to_admin_zaitaku', $_POST);
				SendEmail::send($_POST['param8'], 'send_to_customer_zaitaku', $_POST);
			}
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
			/*	if(!empty($model->first_name1) || !empty($model->last_name1) || !empty($model->first_kana1) || !empty($model->last_kana1))
                {
                    //echo '2';
                    if($_POST['edit_status']==1)
                        echo '1';
                    else
                        echo '2';
                }
					
				else
                */
					echo '1';
			}
		}
	}
    public function actionGoBackFamily()
    {
        $_SESSION["go_back_f"]=true;
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