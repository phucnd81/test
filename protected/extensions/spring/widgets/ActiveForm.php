<?php
class ActiveForm extends CActiveForm
{
	public function editor($model, $attribute, $htmlOptions=array()){
		return $this->row('spring.widgets.CKEditor', $model, $attribute, $htmlOptions);
	}	

	public function datePicker($model, $attribute, $viewOptions=array(), $eraOptions=array(), $options=array(), $htmlOptions=array()){
		Yii::app()->controller->widget(
			'spring.widgets.DatePickerJP',
			array(
				'model' => $model,
				'options' => $options,
				'attribute' => $attribute,	
				'eraOptions' => $eraOptions,
				'viewOptions' => $viewOptions,			
				'htmlOptions' => $htmlOptions,
			)
		);
	}
	
	public function row($class, $model, $attribute, $htmlOptions = array()){
		ob_start();
		Yii::app()->controller->widget(
			$class,
			array(
				'form' => $this,
				'model' => $model,
				'attribute' => $attribute,
				'htmlOptions' => $htmlOptions,
			)
		);
		echo "\n";
		return ob_get_clean();
	}
	
	public function errorSummary($model, $header=null, $footer=null, $htmlOptions=array()){
		if(!is_array($model))
			$model=array($model);
		
		if(!isset($htmlOptions['class']))
			$htmlOptions['class']=CHtml::$errorSummaryCss;
		
		$message = array();
		foreach($model as $m){			
			foreach($m->getErrors() as $field=>$errors){
				foreach($errors as $error){
					if($error!='')
						$message[] = $error;
				}
			}
		}

		Yii::app()->controller->renderInternal(
			Yii::app()->spring->getViewFile('error_summary'),
			array(				
				'message' => $message,
				'htmlOptions' => $htmlOptions
			)
		);		
	}
}