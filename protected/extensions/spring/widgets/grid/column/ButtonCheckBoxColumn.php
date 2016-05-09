<?php
Yii::import('zii.widgets.grid.CCheckBoxColumn');

class ButtonCheckBoxColumn extends CCheckBoxColumn
{
	public $selectableRows=2;
	
	public $headerCheckBoxHtmlOptions = array();

	public function init()
	{
		if(isset($this->checkBoxHtmlOptions['name']))
			$name=$this->checkBoxHtmlOptions['name'];
		else
		{
			$name=$this->id;
			if(substr($name,-2)!=='[]')
				$name.='[]';
			$this->checkBoxHtmlOptions['name']=$name;
		}
				
		$name=strtr($name,array('['=>"\\[",']'=>"\\]"));
	}
	
	protected function renderHeaderCellContent(){
		if(trim($this->headerTemplate)===''){
			echo $this->grid->blankDisplay;
			return;
		}

		$this->headerCheckBoxHtmlOptions['id'] = $this->id.'_all';
		$item = '';
		if($this->selectableRows===null && $this->grid->selectableRows>1)
			$item = CHtml::openTag('button', $this->headerCheckBoxHtmlOptions) . '選択' . '</button>';
		elseif($this->selectableRows>1)
			$item = CHtml::openTag('button', $this->headerCheckBoxHtmlOptions) . '選択' . '</button>';
		else{
			ob_start();
			parent::renderHeaderCellContent();
			$item = ob_get_clean();
		}

		echo strtr($this->headerTemplate,array(
			'{item}'=>$item,
		));
	}

}
