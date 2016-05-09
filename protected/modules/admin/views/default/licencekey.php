<!-- BEGIN Tiles -->
        <div class="row-fluid page-title">
            <div class="span8">
                <h1>ライセンスキー発行</h1>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'licencekey-form',
					'htmlOptions'=>array('class'=>'form-box'),
					'enableAjaxValidation'=>false,
					//'clientOptions'=>array('validateOnSubmit'=>true,'validateOnChange'=>false),
					'focus'=>array($model,'quantity')));?>
					
					<?php echo $form->errorSummary($model,NULL,NULL,array('class'=>'text-error')); ?>
					<div style="display:none"><?php echo $form->error($model,'quantity',array('class'=>'text-error')); ?></div>
					<div class="control-group"><p class="text-error"><?php echo $mess?></p></div>
                    <div class="control-group">
                    	<div class="controls mbm">
							<div class="span2">
								<p class="pull-left mtm" style="min-width: 90px">対象サービス</p>
							</div>							
                            <div class="span10">
							<?php echo $form->dropDownList($model, 'service', array('A'=>'家あんしん', 'B'=>'家族あんしん'), array('style'=>'height:45px;width:245px')); ?>
							</div>
                            <div style="clear:both;"></div>
						</div>
                        <div class="controls mbm">
							<div class="span2">
								<p class="pull-left mtm" style="min-width: 90px">発行件数</p>
							</div>							
                            <div class="span10">
							<?php echo $form->textField($model,'quantity',array('class'=>'input-large input-lg', 
																				'style'=>'ime-mode: disabled;',
																				'max-length'=>'5',
																				'placeholder'=>'',
																				'value'=>$model->quantity?$model->quantity:''
																				)); ?>
                            &nbsp;&nbsp;
                            <span>件</span>
							<p>１０万件以上の大量の優待コードの発行はサーバに負荷がかかり、また時間もかかります。優待コード発行実施時間は十分ご注意ください。</p>
							</div>
						</div>
                        <div class="controls">
                            <p class="span2" >&nbsp; &nbsp;</p>
							<div class="span10">
								<button type="submit" class="btn btn-success " >ライセンスキーの発行</button>
							</div>
                            
                        </div>
                    </div>
                <?php $this->endWidget();?>
            </div>
        </div>		
		<?php if(!empty($ses_key)){?> 
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-migrate-1.2.1.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.blockUI.js"></script>       
		<script language="javascript">
			function req_gen_key(data){
				if(data && data['message']){
					if('done' == data['status']){
						window.location.href = window.location.href;
					}
					else{
						$("p.text-error").html(data['message']);
					}
				}
				else{
					$.get('<?php echo Yii::app()->createUrl('loop');?>?ses_id=<?php echo $ses_key;?>', function(data){
						req_gen_key(data);
						
					});		
				}
			}
			
			$(document).ready(function(){
				$.blockUI();
				req_gen_key();
			});
        </script>
		<?php }else{ 
			if ( $csv_export_licence_key == 1 ){
		?>
			<script type="text/javascript">
				window.location.href = '<?php echo Yii::app()->createUrl('csvLicenceKey');?>';
			</script>
        <?php }
			} ?>