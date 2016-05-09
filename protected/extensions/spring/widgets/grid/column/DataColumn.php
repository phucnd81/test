<?php
Yii::import('zii.widgets.grid.CDataColumn');
class DataColumn extends CDataColumn{
	public function renderHeaderCell(){
		$this->headerHtmlOptions['id']=$this->id;
		$class = '';
		
		if($this->grid->enableSorting && $this->sortable && $this->name!==null){
			$class = 'sorting'; 
			$directions=$this->grid->dataProvider->getSort()->getDirections();
			if(isset($directions[$this->name])){
				$class=$directions[$this->name] ? 'sorting_desc' : 'sorting_asc';
			}
		}
		
		if(isset($this->headerHtmlOptions['class']))
			$this->headerHtmlOptions['class'].=' '.$class;
		else
			$this->headerHtmlOptions['class']=$class;
		
		echo CHtml::openTag('th',$this->headerHtmlOptions);
		$this->renderHeaderCellContent();
		echo "</th>";
	}
}
