<?php
include(dirname(__FILE__).DIRECTORY_SEPARATOR.'JsTreeBaseAction.php');
class JsTreeMoveAction extends JsTreeBaseAction
{
    public function run()
    {
		header('Content-type: application/json; charset=utf-8');
		
		$model = $this->loadModel();		
		$ref = (int)Yii::app()->getRequest()->getParam('ref');			
		$copy = (int)Yii::app()->getRequest()->getParam('copy');
		$position = (int)Yii::app()->getRequest()->getParam('position');		
		
        if($id = $model->move($ref, $position, $copy)) {
			$result = array("status"=>1, "id"=>$id);
		}else{
			$result = array("status"=>0, "error"=> strip_tags(CHtml::errorSummary($model)));	
		}
				
		echo CJSON::encode($result);		
		Yii::app()->end();	
    }
}