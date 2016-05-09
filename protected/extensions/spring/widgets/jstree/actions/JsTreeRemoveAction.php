<?php
include(dirname(__FILE__).DIRECTORY_SEPARATOR.'JsTreeBaseAction.php');
class JsTreeRemoveAction extends JsTreeBaseAction
{
    public function run()
    {
		$this->loadModel()->delete();				
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode(array("status"=>1));		
		Yii::app()->end();	
    }
}