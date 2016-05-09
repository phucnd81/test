;(function($){
	$.fn.GridView = function(){};
	$.fn.GridView.settings = {
		id:null,
		form:null,
		unpost:[], 
		afterUpdate:function(){}
	};
	
	var $this = $.fn.GridView;
	
	$.fn.GridView.init = function(options){
		$this.settings = $.extend({}, $this.settings, options || {});
		$this.update();
	};
	
	$.fn.GridView.post = function(href){
		$.blockUI();
		$.ajax({
			type: 'POST',
			url: href,
			data: $this.param(),
			success: function(data){
				$($this.settings.id).replaceWith($($this.settings.id, $('<div>' + data + '</div>')));			
				$this.settings.afterUpdate(data);
				$this.update();			
				$.unblockUI();			
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) { 				
				errorMessage(textStatus);
		    },
		    timeout: ajaxTimeOutMillsSecond,
		    cache: false
		
		});
	};
	
	$.fn.GridView.reload = function(){
		$($this.settings.form).submit();	
	};
	
	$.fn.GridView.update = function(){
		$($this.settings.form).unbind().submit(function(){
			$this.post($($this.settings.id + ' table').attr('current_url'));
			return false;
		});		
		
		$($this.settings.id + ' table > thead th').unbind('click').click(function(){
			if(href = $('.sort-link', this).attr('href')){
				$this.post(href);	
			}			
			return false;
		});
		
		$($this.settings.id + " .pagination li").each(function(index, element){
			var li = $(this);
			$('a', this).unbind().click(function(){
				if(!li.hasClass('active') && !li.hasClass('disable')){
					$this.post($(this).attr('href'));
				}
				return false;
			});			
		});	
	};
	
	$.fn.GridView.param = function(){	
		var param = new Array();
		$.each($($this.settings.form).serializeArray(), function(index, value){
			if(-1 == $.inArray(value['name'], $this.settings.unpost)){
				param.push(value);
			}
		});
		
		return param;
	};
})(jQuery);
;(function($){
	$.fn.Checked = function(){};
	
	$.fn.Checked.settings = {
		id:null,
		all:0,
		data:[],
		form:null,
		unpost:[],
		choose:[],
		data_id:null,
		afterChecked: function(){},
		afterUpdate:function(){}
	};
	
	var $this = $.fn.Checked;
	
	$.fn.Checked.init = function(options){
		$this.settings = $.extend({}, $this.settings, options || {});
		$this.update();
	};
	
	$.fn.Checked.post = function(href){
		$.blockUI();
		$.ajax({
			type: 'POST',
			url: href,
			data: $this.param(),
			success: function(data){
				$($this.settings.id).replaceWith($($this.settings.id, $('<div>' + data + '</div>')));			
				$.unblockUI();
				$this.update();
				$this.settings.afterUpdate(data);		
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) { 				
				errorMessage(textStatus);
		    },
		    timeout: ajaxTimeOutMillsSecond,
		    cache: false
		
		});
	};
	
	$.fn.Checked.param = function(){	
		var param = new Array();
		$.each($($this.settings.form).serializeArray(), function(index, value){
			if(-1 == $.inArray(value['name'], $this.settings.unpost)){
				param.push(value);
			}
		});
		
		return param;
	};
	
	$.fn.Checked.reload = function(){
		$($this.settings.form).submit();	
	};
	
	$.fn.Checked.update = function(){
		$this.settings.data = [];
		if(json = $($this.settings.data_id).val()){
			$this.settings.data = $.parseJSON(json);
		}
		
		if($this.settings.data.length==0){
			$this.settings.all = 0;
			$($this.settings.id + ' table > tbody > tr :checkbox').each(function(value){				
				$this.settings.data.push(parseInt($(this).val()));
			});
		}
		
		$this.compare();
				
		$($this.settings.form).unbind().submit(function(){
			$this.post($($this.settings.id + ' table').attr('current_url'));
			return false;
		});		
		
		$($this.settings.id + ' table > thead th').unbind('click').click(function(){
			if(href = $('.sort-link', this).attr('href')){
				$this.post(href);	
			}			
			return false;
		});
		
		$($this.settings.id + " .pagination li").each(function(index, element){
			var li = $(this);
			$('a', this).unbind().click(function(){
				if(!li.hasClass('active') && !li.hasClass('disable')){
					$this.post($(this).attr('href'));
				}
				return false;
			});			
		});	
		
		if($this.settings.data.length>0 && $this.settings.choose.length >= $this.settings.data.length){
			$this.settings.all = true;
		}
		
		/*if($this.settings.all){
			$this.checkAll(($this.settings.choose.length>0 ? 1 : 0));
		}*/
		
		$($this.settings.id + " table > thead button:first").unbind('click').click(function(){
			$this.settings.choose = new Array();
			$this.settings.all = (1 == parseInt($(this).attr("check_all"))) ? 0 : 1;
			$this.checkAll($this.settings.all);
			$this.settings.afterChecked();
		});
		
		$($this.settings.id + ' table > tbody > tr :checkbox').each(function(index, element){
			if($this.settings.all){
				$(this).attr('checked', ($.inArray(parseInt($(this).val()), $this.settings.choose) >= 0) ? false : true);				
			}
			else{
				$(this).attr('checked', ($.inArray(parseInt($(this).val()), $this.settings.choose) >= 0) ? true : false);
			}
        });
		
		$($this.settings.id + ' table > tbody > tr :checkbox').unbind('click').click(function(){
			var checked = $(this).is(":checked");
			
			if($this.settings.all){
				if(!checked)
					$this.settings.choose.push(parseInt($(this).val()));
				else
					$this.remove($(this).val());
					
				$($this.settings.id + " table > thead :checkbox").attr('checked', ($this.settings.choose.length>0 ? false : true));	
			}
			else{
				if(checked)
					$this.settings.choose.push(parseInt($(this).val()));
				else
					$this.remove($(this).val());	
			}
			
			$this.settings.afterChecked();
		});
	};
	
	$.fn.Checked.checkAll = function(f){		
		var button = $($this.settings.id + " table > thead button:first");
		button.text(((1 != f) ? '選択' : '解除'));
		button.attr('check_all', f);
		
		$($this.settings.id + ' table > tbody > tr :checkbox').each(function(index, element){
            this.checked = f;
        });
	};
	
	$.fn.Checked.remove = function(val){
		var tmp = new Array();		
		$.each($this.settings.choose, function(index, value){
			if(value != val){
				tmp.push(value);	
			}
		});
		
		$this.settings.choose = tmp;	
	};
	
	$.fn.Checked.compare = function(){
		if($this.settings.choose.length>0){
			if($this.settings.data.length>0){
				var tmp = new Array();
				$.each($this.settings.choose, function(index, value){
					if($.inArray(value, $this.settings.data)>=0){
						tmp.push(value);
					}
				});
				
				$this.settings.choose = tmp;	
			}
			else{
				$this.settings.choose = [];	
			}
		}
	};
	
	$.fn.Checked.getId = function(){
		var result = new Array();
		
		if($this.settings.all){
			$.each($this.settings.data, function(index, value){
				if(-1 == $.inArray(value, $this.settings.choose)){
					result.push(value);
				}
			});
		}
		else{
			$.each($this.settings.choose, function(index, value){
				result.push(value);
			});
		}
		
		return result;
	};	
	
	$.fn.Checked.clear = function(){
		$this.settings.all = 0;
		$this.settings.choose = new Array();
		$($this.settings.id + ' table :checkbox').attr('checked', false);
	};
})(jQuery);