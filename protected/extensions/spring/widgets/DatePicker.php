<?php
Yii::import('zii.widgets.jui.CJuiDatePicker');
class DatePicker extends CJuiDatePicker
{
    public $i18nScriptFile = 'jquery.ui.datepicker-en.js';
	public $defaultOptions = array(
      'currentText' => 'Today',
			'clearText'=>"Clear",
            'dateFormat'=>"dd-mm-yy",
            'id'=>'datepicker',
            'name'=>'datepicker',
            'region'=>'en',
            'language'=>'English',
			'showMonthAfterYear'=>false,
			'showButtonPanel'=>true,
			'gotoCurrent'=> true,
			'changeMonth'=> true,
	       	'changeYear'=> true,
			'beforeShow'=> 'js:function(input, inst) { 
				setTimeout(function() {
				  var buttonPane = $( input )
					.datepicker( "widget" )
					.find(".ui-datepicker-close").click(function () {
											$.datepicker._clearDate(input);
										  });
				  $( input )
					.datepicker( "widget" )
					.find(".ui-datepicker-close").html(this.$.datepicker._defaults.clearText);  
				}, 1 );
			}',
			'onChangeMonthYear'=> 'js:function(year, month, input) { 
			    var id= "#"+$(input).attr("id");
				setTimeout(function() {
				  var buttonPane = $( input )
					.datepicker( "widget" )
					.find(".ui-datepicker-close").click(function () {
											$.datepicker._clearDate(id);
										  });
				  $( input )
					.datepicker( "widget" )
					.find(".ui-datepicker-close").html(this.$.datepicker._defaults.clearText);  
				}, 1 );
			}',			
	);
}