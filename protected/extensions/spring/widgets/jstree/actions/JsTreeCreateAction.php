<?php
include(dirname(__FILE__).DIRECTORY_SEPARATOR.'JsTreeBaseAction.php');
class JsTreeCreateAction extends JsTreeBaseAction
{
    public function run()
    {
        $modelName = $this->getModelName();
		$model = new $modelName;
		$model->parent_id = (int)Yii::app()->getRequest()->getParam('parent_id');
		$model->position = Yii::app()->getRequest()->getParam('position');
		$model->name = Yii::app()->getRequest()->getParam('title');
		$model->type = Yii::app()->getRequest()->getParam('type');

		$model->beforeSave(null);
		if(!$model->save()){
			$result = array("status"=>0, "error"=> strip_tags(CHtml::errorSummary($model)), $model->attributes);	
		}else{
			$result = array("status"=>1, "id"=>$model->id);
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($result);		
		Yii::app()->end();	
    }
}