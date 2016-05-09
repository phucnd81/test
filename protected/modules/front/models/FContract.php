<?php
class FContract extends BaseContract
{
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'licence_key' => '優待コード',
			'openid' => 'Openid',
			'record_type' => 'Record Type',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'create_date' => 'Create Date',
		);
	}
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getlicence_key(){
		return Yii::app()->db->createCommand()
						->select("licence_key")
						->from("contract")
						->queryAll();
	}
	public function checklicence_key($key){
        	return BaseContract::model()->findByAttributes(array('licence_key'=>$key));
	}
	public function checkexits($name,$number){
		$sql = sprintf("SELECT
			*
		FROM
			contract
		WHERE
			(
				CONCAT (first_name1, ' ', last_name1) LIKE '%1\$s'
				OR CONCAT (first_kana1, ' ', last_kana1) LIKE '%1\$s'
			)
		AND (
			tel1 = '%2\$s'
			OR mobile1 = '%2\$s'
		)",$name,$number);
		return Yii::app()->db->createCommand($sql)->queryRow();
	}
	public function update_home($param1, $param2, $param3, $param4, $param5, $param6, $param7, $param8, $param9, $param10, $param11, $param12, $param13, $param14, $param15, $param16, $param17, $param18, $param19, $param20, $param21, $param22, $param23, $param24, $param25, $param26, $param27, $param28, $param29, $param30, $param31, $user_type, $age_group, $age_group2,$user_regist_date,$openid, $start_date){
		$sql = "UPDATE contract"
				." SET first_name1 = :first_name1, last_name1 = :last_name1, first_kana1 = :first_kana1, last_kana1 = :last_kana1, tel1 = :tel1, mobile1 = :mobile1, email1 = :email1, zip_code1 = :zip_code1, pref1 = :pref1, address1_1 = :address1_1, address1_2 = :address1_2, address1_3 = :address1_3, address1_4 = :address1_4, remark1 = :remark1, first_name2 = :first_name2, last_name2 = :last_name2, first_kana2 = :first_kana2, last_kana2 = :last_kana2, tel2 = :tel2, mobile2 = :mobile2, email2 = :email2, zip_code2 = :zip_code2, pref2 = :pref2, address2_1 = :address2_1, address2_2 = :address2_2, address2_3 = :address2_3, address2_4 = :address2_4, remark2 = :remark2, user_type = :user_type, age_group =:age_group, age_group2 =:age_group2, user_regist_date =:user_regist_date, openid=:openid, start_date = :start_date"
				." WHERE licence_key = :licence_key";
		$parameters = array( ':licence_key' => $param1,
							 ':first_name1' => $param2,
							 ':last_name1' => $param3, 
							 ':first_kana1' => $param4, 
							 ':last_kana1' => $param5, 
							 ':tel1' => $param6, 
							 ':mobile1' => $param7,
							 ':email1' => $param8, 
							 ':zip_code1' => $param10, 
							 ':pref1' => $param11, 
							 ':address1_1' => $param12, 
							 ':address1_2' => $param13,
							 ':address1_3' => $param14, 
							 ':address1_4' => $param15, 
							 ':remark1' => $param16,
							 ':first_name2' => $param17,
							 ':last_name2' => $param18, 
							 ':first_kana2' => $param19, 
							 ':last_kana2' => $param20, 
							 ':tel2' => $param21, 
							 ':mobile2' => $param22,
							 ':email2' => $param23, 
							 ':zip_code2' => $param25, 
							 ':pref2' => $param26, 
							 ':address2_1' => $param27, 
							 ':address2_2' => $param28,
							 ':address2_3' => $param29, 
							 ':address2_4' => $param30, 
							 ':remark2' => $param31,
							 ':user_type' => $user_type,
							 ':age_group' => $age_group,
							 ':age_group2' => $age_group2,
                             ':user_regist_date' =>$user_regist_date,
                             ':openid' => $openid,
							 ':start_date' => $start_date,
							 );
		return Yii::app()->db->createCommand($sql)->execute($parameters);
	}
	
	public function update_home1($param1, $param2, $param3, $param4, $param5, $param6, $param7, $param8, $param9, $param10, $param11, $param12, $param13, $param14, $param15, $param16, $param17, $param18, $param19, $param20, $param21, $param22, $param23, $param24, $param25, $param26, $param27, $param28, $param29, $param30, $param31, $user_type, $age_group, $age_group2,$user_regist_date,$openid, $start_date, $Zaitaku_sub=null, $first_name3=null, $last_name3=null, $first_kana3=null, $last_kana3=null, $tel3=null, $mobile3=null, $zip_code3=null, $pref3=null, $address3_1=null, $address3_2=null, $address3_3=null, $address3_4=null, $relationship3=null){
//		$model = FContract::model()->findByAttributes(array('licence_key'=>$param1));
//		if($model == NULL)
//			$sql = "INSERT INTO contract"
//					." (\"licence_key\",\"first_name1\", \"last_name1\", \"first_kana1\", \"last_kana1\", \"tel1\", \"mobile1\", \"email1\", \"zip_code1\", \"pref1\", \"address1_1\", \"address1_2\", \"address1_3\", \"address1_4\", \"remark1\", \"first_name2\", \"last_name2\", \"first_kana2\", \"last_kana2\", \"tel2\", \"mobile2\", \"email2\", \"zip_code2\", \"pref2\", \"address2_1\", \"address2_2\", \"address2_3\", \"address2_4\", \"remark2\", \"user_type\", \"age_group\", \"age_group2\", \"user_regist_date\", \"openid\", \"start_date\", \"Zaitaku_sub\", \"first_name3\", \"last_name3\", \"first_kana3\", \"last_kana3\", \"tel3\", \"mobile3\", \"zip_code3\", \"pref3\", \"address3_1\", \"address3_2\", \"address3_3\", \"address3_4\", \"relationship3\")"
//					." VALUES (:licence_key,:first_name1,:last_name1,:first_kana1,:last_kana1,:tel1,:mobile1,:email1,:zip_code1,:pref1,:address1_1,:address1_2,:address1_3,:address1_4,:remark1,:first_name2,:last_name2,:first_kana2,:last_kana2,:tel2,:mobile2,:email2,:zip_code2,:pref2,:address2_1,:address2_2,:address2_3,:address2_4,:remark2,:user_type,:age_group,:age_group2,:user_regist_date,:openid,:start_date,:Zaitaku_sub,:first_name3,:last_name3,:first_kana3,:last_kana3,:tel3,:mobile3,:zip_code3,:pref3,:address3_1,:address3_2,:address3_3,:address3_4,:relationship3)";
//		else
			$sql = "UPDATE contract"
					." SET \"first_name1\" = :first_name1, \"last_name1\" = :last_name1, \"first_kana1\" = :first_kana1, \"last_kana1\" = :last_kana1, \"tel1\" = :tel1, \"mobile1\" = :mobile1, \"email1\" = :email1, \"zip_code1\" = :zip_code1, \"pref1\" = :pref1, \"address1_1\" = :address1_1, \"address1_2\" = :address1_2, \"address1_3\" = :address1_3, \"address1_4\" = :address1_4, \"remark1\" = :remark1, \"first_name2\" = :first_name2, \"last_name2\" = :last_name2, \"first_kana2\" = :first_kana2, \"last_kana2\" = :last_kana2, \"tel2\" = :tel2, \"mobile2\" = :mobile2, \"email2\" = :email2, \"zip_code2\" = :zip_code2, \"pref2\" = :pref2, \"address2_1\" = :address2_1, \"address2_2\" = :address2_2, \"address2_3\" = :address2_3, \"address2_4\" = :address2_4, \"remark2\" = :remark2, \"user_type\" = :user_type, \"age_group\" =:age_group, \"age_group2\" =:age_group2, \"user_regist_date\" =:user_regist_date, \"openid\"=:openid, \"start_date\" = :start_date, \"Zaitaku_sub\" = :zaitaku_sub, \"first_name3\" = :first_name3, \"last_name3\" = :last_name3, \"first_kana3\" = :first_kana3, \"last_kana3\" = :last_kana3, \"tel3\" = :tel3, \"mobile3\" = :mobile3, \"zip_code3\" = :zip_code3, \"pref3\" = :pref3, \"address3_1\" = :address3_1, \"address3_2\" = :address3_2, \"address3_3\" = :address3_3, \"address3_4\" = :address3_4, \"relationship3\" = :relationship3"
					." WHERE \"licence_key\" = :licence_key";
			
			$parameters = array( ':licence_key' => $param1,
								 ':first_name1' => $param2,
								 ':last_name1' => $param3, 
								 ':first_kana1' => $param4, 
								 ':last_kana1' => $param5, 
								 ':tel1' => $param6, 
								 ':mobile1' => $param7,
								 ':email1' => $param8, 
								 ':zip_code1' => $param10, 
								 ':pref1' => $param11, 
								 ':address1_1' => $param12, 
								 ':address1_2' => $param13,
								 ':address1_3' => $param14, 
								 ':address1_4' => $param15, 
								 ':remark1' => $param16,
								 ':first_name2' => $param17,
								 ':last_name2' => $param18, 
								 ':first_kana2' => $param19, 
								 ':last_kana2' => $param20, 
								 ':tel2' => $param21, 
								 ':mobile2' => $param22,
								 ':email2' => $param23, 
								 ':zip_code2' => $param25, 
								 ':pref2' => $param26, 
								 ':address2_1' => $param27, 
								 ':address2_2' => $param28,
								 ':address2_3' => $param29, 
								 ':address2_4' => $param30, 
								 ':remark2' => $param31,
								 ':user_type' => $user_type,
								 ':age_group' => $age_group,
								 ':age_group2' => $age_group2,
	                             ':user_regist_date' =>$user_regist_date,
	                             ':openid' => $openid,
								 ':start_date' => $start_date,
								 ':zaitaku_sub' => $Zaitaku_sub,
								 ':first_name3' => $first_name3,
								 ':last_name3' => $last_name3,
								 ':first_kana3' => $first_kana3,
								 ':last_kana3' => $last_kana3,
								 ':tel3' => $tel3,
								 ':mobile3' => $mobile3,
								 ':zip_code3' => $zip_code3,
								 ':pref3' => $pref3,
								 ':address3_1' => $address3_1,
								 ':address3_2' => $address3_2,
								 ':address3_3' => $address3_3,
								 ':address3_4' => $address3_4,
								 ':relationship3' => $relationship3,
								 );
			
			return Yii::app()->db->createCommand($sql)->execute($parameters);
		
	}
	
	public function reset_status($licence_key){
		$sql = "UPDATE contract"
				." SET \"Conf_1_datetime\" = NULL, \"Conf_1_status\" = NULL, \"Conf_2_datetime\" = NULL, \"Conf_2_status\" = NULL, \"Conf_3_datetime\" = NULL, \"Conf_3_status\" = NULL, \"Conf_User\" = NULL"
				." WHERE \"licence_key\" = '{$licence_key}'";
		return Yii::app()->db->createCommand($sql)->execute();
	}
}
