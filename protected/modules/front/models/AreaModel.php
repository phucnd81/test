<?php

class AreaModel extends CActiveRecord {

    public static function model($className = __CLASS__) 
    {
        return parent::model($className);
    }

	public function getServiceAreaByZipCode($zip_code){
		return Yii::app()->db->createCommand()
                        ->select("*")
                        ->from("service_area")
                        ->where("zip_code like  '$zip_code'")
                        ->queryRow();
	}
	
    public function getelement1($zip_code) {
        
        return Yii::app()->db->createCommand()
                        ->select("house_cleaning,zip_code,pref1,pref2")
                        ->from("service_area")
                        ->where("zip_code like  '$zip_code'")
                        ->queryAll();
    }

    public function getelement2($zip_code2) {

        return Yii::app()->db->createCommand()
                        ->select("kajidaiko,zip_code")
                        ->from("service_area")
                        ->where("zip_code like  '$zip_code2'")
                        ->queryAll();
    }

}
