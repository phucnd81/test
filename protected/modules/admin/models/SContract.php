<?php
class SContract extends BaseContract
{
    public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
	public function getMaxValue($column,$table){
		$temp =  Yii::app()->db->createCommand()
					->select("MAX(".$column.")")
					->from($table)
					->queryAll();
		return $temp[0]["max"];
	}
	public function getlicencekey(){
		$sql = "SELECT DISTINCT licence_key FROM contract";
		$temp = Yii::app()->db->createCommand($sql)->queryColumn();
		return $temp;
	}
}