<?php
Yii::import('zii.widgets.grid.CCheckBoxColumn');

class ConCheckBoxColumn extends CCheckBoxColumn
{
	public $selectableRows=2;

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

		if($this->selectableRows===null)
		{
			if(isset($this->checkBoxHtmlOptions['class']))
				$this->checkBoxHtmlOptions['class'].=' select-on-check';
			else
				$this->checkBoxHtmlOptions['class']='select-on-check';
			return;
		}

		$cball=$cbcode='';
		if($this->selectableRows==0)
		{
			//.. read only
			$cbcode="return false;";
		}
		elseif($this->selectableRows==1)
		{
			//.. only one can be checked, uncheck all other
			$cbcode="$(\"input:not(#\"+$(this).attr('id')+\")[name='$name']\").attr('checked',false);";
		}
		else
		{
			//.. process check/uncheck all
			$cball=<<<CBALL
$('#{$this->id}_all').live('click',function() {
	var checked=this.checked;	
	$("input[name='$name']").each(function() {
		this.checked=checked;
		if(checked){
			$(this).parents("span").addClass("checked");
		}
		else{
			$(this).parents("span").removeClass("checked");
		}
	});
});

CBALL;
			$cbcode="$('#{$this->id}_all').attr('checked', $(\"input[name='$name']\").length==$(\"input[name='$name']:checked\").length);";
		}

		$js=$cball;
		$js.=<<<EOD
$("input[name='$name']").live('click', function() {
	$cbcode
});
EOD;
		Yii::app()->getClientScript()->registerScript(__CLASS__.'#'.$this->id,$js);
	}
   	protected function renderDataCellContent($row,$data)
	{
		if($this->value!==null)
			$value=$this->evaluateExpression($this->value,array('data'=>$data,'row'=>$row));
		elseif($this->name!==null)
			$value=CHtml::value($data,$this->name);
		else
			$value=$this->grid->dataProvider->keys[$row];

		$checked = false;
		if($this->checked!==null)
			$checked=$this->evaluateExpression($this->checked,array('data'=>$data,'row'=>$row));

		$options=$this->checkBoxHtmlOptions;
		if($this->disabled!==null)
			$options['disabled']=$this->evaluateExpression($this->disabled,array('data'=>$data,'row'=>$row));
      
		$name=$options['name'];
		unset($options['name']);
		$options['value']=$value;
		$options['id']=$this->id.'_'.$row;
        if($data->is_using!=1){
		  echo CHtml::checkBox($name,$checked,$options);
        }
	}
    
}
