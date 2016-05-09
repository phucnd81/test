<?php
class DatePickerJP extends CInputWidget
{
    public $defaultOptions = array(
		'altFormat'=>'D', 
		'syncAltField'=>true,
		'region'=>'ja',
		'language'=>'Japanese',
		'showAltFieldOnly'=>true,
		'highlightWeekends'=>true,
		'highlightPublicHolidays'=>true,			
		'changeMonth'=>true, 
		'changeYear'=>true
	);

	public $options;
	
	public $template = "{era} {date}";
	
	public $viewOptions = array();
	
	public $eraOptions = array();

	public $url_action = '';
	public function run(){
		foreach($this->defaultOptions as $key=>$val){
			$this->options[$key] = $val;
		}
		
		$this->url_action = Yii::app()->request->baseUrl.'/top/ajaxChangeEra';
		
		$this->renderContent();
		
		list($name, $id)=$this->resolveNameID();
		$this->options['altField'] = "{$id}_view";
		
		$cs = Yii::app()->getClientScript();
		$options=CJavaScript::encode($this->options);		
		$cs->registerScript(__CLASS__.'#'.$id, "jQuery('#{$id}').jpdatepicker($options);");
		
		$cs->registerScriptFile(Yii::app()->spring->getAssetsUrl().'/datepicker-jp/jquery.global.js');
		$cs->registerScriptFile(Yii::app()->spring->getAssetsUrl().'/datepicker-jp/jquery.glob.ja.custom.js');
		$cs->registerScriptFile(Yii::app()->spring->getAssetsUrl().'/datepicker-jp/jquery.public-holiday.ja.js');	
		$cs->registerScriptFile(Yii::app()->spring->getAssetsUrl().'/datepicker-jp/jquery.ui.core.js');
		$cs->registerScriptFile(Yii::app()->spring->getAssetsUrl().'/datepicker-jp/jquery.ui.jpdatepicker.js');
		$cs->registerScriptFile(Yii::app()->spring->getAssetsUrl().'/datepicker-jp/jquery.ui.global-jpdatepicker.js');
		$cs->registerScriptFile(Yii::app()->spring->getAssetsUrl().'/datepicker-jp/jquery.ui.jpdatepicker-ja.js');
		$cs->registerScriptFile(Yii::app()->spring->getAssetsUrl().'/datepicker-jp/jpdatepicker.action.js');
	}
	
	public function renderEra(){
		list($name, $id)=$this->resolveNameID();
		$this->eraOptions['id'] = "{$id}_era";
		// function created at jpdatepicker.action.js
		$this->eraOptions['onchange'] = "changeJPDateEra('{$id}', '{$this->url_action}')";
		
		$data = array(	'M' => 'M', 
						'T' => 'T', 
						'S' => 'S', 
						'H' => 'H');
		
		if(isset($this->eraOptions['data'])){
			$data = $this->eraOptions['data'];
			unset($this->eraOptions['data']);
		}
		
		$era = 'H';
		
		$value = $this->model->{$this->attribute};
		if(is_array($value)){
			$era = isset($value['era']) ? $value['era'] : NULL;
		}
		else if(!empty($value)){
			$era = Yii::app()->spring->toEraName($value);
		}
		
		echo CHtml::dropDownList("{$name}[era]", $era, $data, $this->eraOptions);
	}
	
	public function renderDate(){
		list($name, $id)=$this->resolveNameID();
		
		if(isset($this->htmlOptions['id']))
			$id=$this->htmlOptions['id'];
		else
			$this->htmlOptions['id']=$id;
			
		if(isset($this->htmlOptions['name']))
			$name=$this->htmlOptions['name'];
		
		$this->viewOptions['id'] 	=  "{$id}_view";
		$this->viewOptions['name']  = "{$name}[view]";
		// function created at jpdatepicker.action.js
		$this->viewOptions['onchange']  = "changeJPDateView('{$id}', '{$this->url_action}');";
		$this->htmlOptions['style'] = 'display:none;';
			
		if($this->hasModel()){
			$view = NULL;
			$value = $this->model->{$this->attribute};
			if(is_array($value)){
				$view = isset($value['view']) ? $value['view'] : NULL;
				$value = isset($value['date']) ? $value['date'] : NULL;
			}
			else if($value){
				$value = date('Y/m/d', strtotime($value));
			}
			
			echo CHtml::textField("{$name}[date]", $value, $this->htmlOptions);
			echo CHtml::textField("{$name}[view]", $view, $this->viewOptions);
		}
		else{
			echo CHtml::textField($name, $this->value, $this->htmlOptions);
			echo CHtml::textField("{$name}[view]", NULL, $this->viewOptions);
		}	
	}
	
	public function renderContent(){
		ob_start();
		echo preg_replace_callback("/{(\w+)}/", array($this,'renderSection'),$this->template);
		ob_end_flush();
	}
	
	protected function renderSection($matches){
		$method='render'.$matches[1];
		if(method_exists($this,$method)){
			$this->$method();
			$html=ob_get_contents();
			ob_clean();
			return $html;
		}
		else
			return $matches[0];
	}
}