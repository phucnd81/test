<?php $this->pageTitle = Yii::t('app','AdminLogin');?>
<div class="login-wrapper">
            <!-- BEGIN Login Form -->
			<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'form-login',
					'htmlOptions'=>array('class'=>'login-form',),
					'focus'=>array($model,'username')));?>
                <h3>管理画面　ログイン</h3>
                <hr/>
                <div class="control-group">
                    <div class="controls">
						<?php echo $form->textField($model,'username', array(	'class'=>'input-block-level', 
																				'style'=>'ime-mode: disabled;', 
																				'placeholder'=>'ID'
																				)); ?>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
						<?php echo $form->passwordField($model,'password', array(	'class'=>'input-block-level', 
																					'style'=>'ime-mode:disabled',
																					'type'=>'password',
																					'placeholder'=>'パスワード'
																					)); ?>
                    </div>
                </div>
                <?php
				if($model->getErrors()){
					echo '<div class="control-group"><p class="text-error">';
					foreach($model->getErrors() as $field=>$errors){
						foreach($errors as $error){
							if($error!='') echo $error.'<br>';
						}
					}
					echo '</p></div>';
				}
				?>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-success input-block-level">ログイン</button>
                    </div>
                </div>
                <!--<hr/>
                <p class="clearfix">
                    <a href="#" class="goto-forgot pull-right">パスワードを忘れた方はこちら</a>
                   
                </p>-->
            <?php $this->endWidget();?>
            <!-- END Login Form -->

        </div>