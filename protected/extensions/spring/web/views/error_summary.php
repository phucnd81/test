<?php if(!empty($message)){?><?php echo CHtml::openTag('div', $htmlOptions);?><div class="alert alert-danger"><?php echo join('<br/>', $message);?></div></div><?php }?>