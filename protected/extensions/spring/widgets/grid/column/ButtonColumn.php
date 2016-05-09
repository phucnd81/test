<?php
class ButtonColumn extends CButtonColumn
{
	protected function initDefaultButtons()
	{
		if($this->deleteConfirmation===null)
			$this->deleteConfirmation=Yii::t('msg','confirm.delete');
			
		foreach(array('view','update','delete') as $id)
		{
			$button=array(
				'label'=>$this->{$id.'ButtonLabel'},
				'url'=>$this->{$id.'ButtonUrl'},
				'imageUrl'=>$this->{$id.'ButtonImageUrl'},
				'options'=>$this->{$id.'ButtonOptions'},
			);
			
			if(isset($this->buttons[$id]))
				$this->buttons[$id]=array_merge($button,$this->buttons[$id]);
			else
				$this->buttons[$id]=$button;
		}
		
		if(!isset($this->buttons['delete']['click']))
		{
			if(is_string($this->deleteConfirmation))
				$confirmation="if(!confirm(".CJavaScript::encode($this->deleteConfirmation).")) return false;";
			else
				$confirmation='';

			if($this->afterDelete===null)
				$this->afterDelete='function(){}';

			$this->buttons['delete']['click']=<<<EOD
function() {
	$confirmation
	var th = this,
		afterDelete = $this->afterDelete;
		
	jQuery.blockUI();	
	jQuery.get(jQuery(this).attr('href'), function(data){
		jQuery.unblockUI();
		if(jQuery.fn.GridView)
			jQuery.fn.GridView.reload();	
			
		afterDelete(th, true, data);	
	});	
	return false;
}
EOD;
		}
	}
}