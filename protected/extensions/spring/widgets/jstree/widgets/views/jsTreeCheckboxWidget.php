<style>#browser{border:1px solid #999999;height:400px;overflow:auto;}</style>
<div id="browser"><ul><?php echo $this->tree();?></ul></div>
<?php 
Yii::app()->clientScript->registerScript('tree', '
$("#browser").jstree({"plugins":["themes","html_data","ui","checkbox"]}); 
');
if(!empty($this->category)){
	$list = join(",", $this->category);
	Yii::app()->clientScript->registerScript('tree.checked', '
		setTimeout(function(){
			$.each(['.$list.'], function(){
				$("#browser").jstree("check_node","li[categories_id=\'"+this+"\']");
			});		
		}, 1000);		
	');
}
Yii::app()->clientScript->registerScript('tree.update', '
$(".news_letter_category").click(function(){
	var param = new Array();
	
	$("#browser").jstree("get_checked").each(function(i){
		param.push({"name":"category["+i+"]", "value":$(this).attr("categories_id")});
	});
	
	$.blockUI();
	$.ajax({
			type: "POST",
			url: "'.$this->createUrl("categoryUpdate", array("id"=>Yii::app()->request->getParam("id"))).'",
			data: param,
			success: function(data){
				$.unblockUI();	
				window.location.href = "'.$this->createUrl("index").'";		
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) { 				
				errorMessage(textStatus);
		    },
		    timeout: ajaxTimeOutMillsSecond,
		    cache: false		
		});
});
');
?>