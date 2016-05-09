<div id="browser"></div>
<style>#browser{height:400px;overflow:auto;}</style>
<script type="text/javascript">
$(function(){
$("#browser")	
	.jstree({ 		
		// List of active plugins
		"plugins" : [ 
			"themes","json_data","ui","crrm","cookies","dnd","contextmenu"  
		],
		"rules":{multiple : false},
		"ui" :{select_multiple_modifier : false},	
		<?php foreach($this->setting as $k=>$v){?>
		"<?php echo $k;?>" : <?php echo CJavaScript::encode($v);?>,
		<?php }?>
		// This example uses JSON as it is most common		
		"json_data" : { 
			// This tree is ajax enabled - as this is most common, and maybe a bit more complex
			// All the options are almost the same as jQuery's AJAX (read the docs)
			"ajax" : {
				// the URL to fetch the data
				"url" : "<?php echo $this->createUrl('jsTreeChildren')?>",
				// the `data` function is executed in the instance's scope
				// the parameter is the node being loaded 
				// (may be -1, 0, or undefined when loading the root nodes)
				"data" : function (n) { 
					// the result is fed to the AJAX request `data` option
					return { 
						"id" : n.attr ? n.attr("id").replace("node_","") : 0 
					}; 
				}
			}
		}/*,
		
		"types" : {
            "valid_children" : [ "drive" ],
			"types" : {
				"drive" : {
					"valid_children" : [ "folder" ]
				},
				"folder" : {
					"valid_children" : [ "default" ]
				},
				"default" :{
					"valid_children" : "none"	
				}
			}	 
		}*/
	})
	.bind("create.jstree", function (e, data){		
		$.post(
			"<?php echo $this->createUrl('jsTreeCreate')?>", 
			{ 				
				"parent_id" : data.rslt.parent.attr("id").replace("node_",""), 
				"position" : data.rslt.position,
				"title" : data.rslt.name,
				"type" : data.rslt.obj.attr("rel")
			}, 
			function(r){				
				if(r.status){
					$(data.rslt.obj).attr("id", "node_" + r.id);
				}
				else {
					$.jstree.rollback(data.rlbk);
				}
			}
		);
	})
	.bind("remove.jstree", function (e, data){
		if(confirm('<?php echo $this->delete_confirm;?>')){		
			data.rslt.obj.each(function () {
				$.ajax({
					async : false,
					type: 'POST',
					url: "<?php echo $this->createUrl('jsTreeRemove')?>",
					data : {					
						"id" : this.id.replace("node_","")
					}, 
					success : function (r) {
						if(!r.status) {
							data.inst.refresh();
						}
					}
				});
			});
		}
		else
			data.inst.refresh();
	})
	.bind("rename.jstree", function (e, data) {
		$.post(
			"<?php echo $this->createUrl('jsTreeUpdate')?>", 
			{ 
				"id" : data.rslt.obj.attr("id").replace("node_",""),
				"title" : data.rslt.new_name
			}, 
			function (r) {
				if(!r.status) {
					$.jstree.rollback(data.rlbk);
				}
			}
		);
	})
	.bind("move_node.jstree", function (e, data){
		var hasChild = data.rslt.o.find("ul").length;
		var level = data.rslt.o.parents("ul").length;
		if( ( hasChild > 0 && level > 2 ) || level > 3 || level <=1){			
			$.jstree.rollback(data.rlbk);
			data.inst.refresh();
			alert('<?php echo $this->move_disable;?>');
		}
		else{
			data.rslt.o.each(function (i) {
				$.ajax({
					async : false,
					type: 'POST',
					url: "<?php echo $this->createUrl('jsTreeMove')?>",
					data :{					
						"id" : $(this).attr("id").replace("node_",""), 
						"ref" : data.rslt.cr === -1 ? 1 : data.rslt.np.attr("id").replace("node_",""), 
						"position" : data.rslt.cp + i,					
						"copy" : data.rslt.cy ? 1 : 0
					},
					success : function (r) {
						if(!r.status){
							$.jstree.rollback(data.rlbk);
						}
						else {
							$(data.rslt.oc).attr("id", "node_" + r.id);
							if(data.rslt.cy && $(data.rslt.oc).children("UL").length){
								data.inst.refresh(data.inst._get_parent(data.rslt.oc));
							}
						}
						data.inst.refresh();				
					}
				});
			});				
		}
	});
});
</script>