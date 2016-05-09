<?php
class LableColumn extends DataColumn
{
	public function renderDataCellContent($row,$data)
	{
		if($this->value!==null)
			$value=$this->evaluateExpression($this->value,array('data'=>$data,'row'=>$row));
		elseif($this->name!==null)
			$value=CHtml::value($data,$this->name);
			
		if(!empty($this->type) && method_exists($this, $this->type)){
			$this->{$this->type}($value);
		}
		else
			return $value;
	}
	
	public function def($value){
		if(!empty($value))
			echo "&nbsp;".CHtml::tag("span", array('class'=>'label label-important'), Yii::t(CONSTANT::SPRING_LANG_APP, 'Default'));
	}
}
