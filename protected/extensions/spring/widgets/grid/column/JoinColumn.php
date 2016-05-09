<?php
class JoinColumn extends DataColumn
{
	public $with = array();
		
	private $columns = array();
	
	public function init(){
		parent::init();
		
		if(!empty($this->with)){
			$columns = array();
			
			foreach($this->with as $i=>$column){
				if(is_string($column))
					$column=$this->grid->createDataColumn($column);
				else{
					if(!isset($column['class']))
						$column['class']='DataColumn';
						
					$column=Yii::createComponent($column, $this);
				}
				
				if(!$column->visible){
					unset($this->columns[$i]);
					continue;
				}
				
				if($column->id===null)
					$column->id=$this->id.'_g'.$i;
					
				$this->columns[$i]=$column;
			}

			foreach($this->columns as $column)
				$column->init();
		}	
	}
	
	public function renderDataCellContent($row,$data){
		if($this->value!==null)
			$value=$this->evaluateExpression($this->value,array('data'=>$data,'row'=>$row));
		elseif($this->name!==null)
			$value=CHtml::value($data,$this->name);
		
		echo $value===null ? $this->grid->nullDisplay : $this->grid->getFormatter()->format($value,$this->type);
		
		if(!empty($this->columns)){
			foreach($this->columns as $column)
				$column->renderDataCellContent($row, $data);			
		}
	}
}
