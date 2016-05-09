<?php
class CKEditor extends CInputWidget{
	public $form;

	public $editorOptions = array(
		'filebrowserBrowseUrl' => '',
		'filebrowserImageBrowseUrl' => ''
	);

	public function run(){
		
		list($name, $id) = $this->resolveNameID();

		$this->registerClientScript($id);

		$this->htmlOptions['id'] = $id;

		if ($this->hasModel()) {
			if ($this->form) {
				$html = $this->form->textArea($this->model, $this->attribute, $this->htmlOptions);
			} else {
				$html = CHtml::activeTextArea($this->model, $this->attribute, $this->htmlOptions);
			}
		} else {
			$html = CHtml::textArea($name, $this->value, $this->htmlOptions);
		}
		
		echo $html;
	}

	public function registerClientScript($id){		
		Yii::app()->spring->registerScriptFile('ckeditor/ckeditor.js');	
		$options = !empty($this->editorOptions) ? CJavaScript::encode($this->editorOptions) : '{}';
		Yii::app()->clientScript->registerScript(
			__CLASS__ . '#' . $this->getId(),
			"CKEDITOR.replace( '$id', $options);"
		);
	}
}