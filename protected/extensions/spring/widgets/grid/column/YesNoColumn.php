<?php
class YesNoColumn extends DataColumn
{
	public function renderDataCellContent($row,$data)
	{
		if($this->value!==null)
			$value=$this->evaluateExpression($this->value,array('data'=>$data,'row'=>$row));
		elseif($this->name!==null)
			$value=CHtml::value($data,$this->name);
			
		if(empty($value)){
			echo CHtml::tag("span", array('class'=>'label'), Yii::t(CONSTANT::SPRING_LANG_APP, 'No'));			
		}
		else{
			echo CHtml::tag("span", array('class'=>'label label-info'), Yii::t(CONSTANT::SPRING_LANG_APP, 'Yes'));
		}
	}
}
