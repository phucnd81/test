<div id="areaSearch">
	<div id="show_error" style="color:#FF0000; padding-left: 60px; width: 620px; margin: auto"></div>
    <div id="searchBox">
        <form name="frm_search_area" id="frm_search_area">
            <input type="text" name="zipcode" class="zipcode" placeholder="郵便番号を入力">
            <input type="submit" class="submitBt" value="対応エリアチェック">
        </form>
    </div><!--/searchBox-->
    
    <div class="searchResult">
    	<?php //$this -> renderPartial('search_result'); ?>
    </div><!--/searchResult-->
</div>

<script type="text/javascript">
$(document).ready(function(){
	$("#frm_search_area").submit(function(){
		$("#show_error").html('');
		$(".searchResult").html('');
		var zipcode = $.trim($("#frm_search_area input[name=zipcode]").val());
		if ( zipcode == "" ){
			$("#show_error").html('郵便番号を入力してください。');
		}else{
			$.ajax({
				type: "POST",
				url: '<?php echo Yii::app()->baseUrl; ?>/housework/checkZipCode',
				data: {'zipcode': zipcode},
				dateType: 'json',
				success: function (data) {
					if ( data.error == 0 ){
						$(".searchResult").html(data.html);
					}else{
						$("#show_error").html(data.msg);
					}
				}
			}).done( function (data) {
						
			});
		}
		return false;
	});
});
</script>