<?php
include(dirname(__FILE__).DIRECTORY_SEPARATOR.'JsTreeBaseAction.php');
class JsTreeUpdateAction extends JsTreeBaseAction
{
    public function run()
    {
        $model = $this->loadModel();		
        $model->name = Yii::app()->getRequest()->getParam('title');		

        $result = array("status"=>1);

        if(!$model->save()){
              $result = array("status"=>0, "error"=> strip_tags(CHtml::errorSummary($model)));	
        }

        header('Content-type: application/json; charset=utf-8');
        echo CJSON::encode($result);		
        Yii::app()->end();	
    }
}