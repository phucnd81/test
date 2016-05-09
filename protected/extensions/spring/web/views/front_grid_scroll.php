<table class="table table-striped table-bordered">
    <colgroup>
        <?php foreach ($grid->columns as $column){ ?>
            <col width="<?php echo isset($column->headerHtmlOptions['col']) ? $column->headerHtmlOptions['col'] : ''; ?>">
        <?php } ?>        
    </colgroup>
    <thead>
    <tr>
        <?php foreach ($grid->columns as $column){ ?>
			<?php echo $column->renderHeaderCell()?>
        <?php } ?>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td colspan="4" style="padding: 0">
            <div class="scroll-knowledge">
                <table class="table table-striped table-bordered" style="margin-bottom: 0">
                    <colgroup>
						<?php foreach ($grid->columns as $column){ ?>
                            <col width="<?php echo isset($column->headerHtmlOptions['col']) ? $column->headerHtmlOptions['col'] : ''; ?>">
                        <?php } ?>        
                    </colgroup>
                    <?php if($total = $grid->dataProvider->getItemCount()){?>
						<?php for($row = 0; $row<$total; $row++){?>
                        <tr>
                          <?php foreach($grid->columns as $column){ ?>
                            <?php $column->renderDataCell($row);?>
                          <?php } ?>
                        </tr>
                        <?php }?>
                  	<?php }else{?>
                   		<tr>
                        	<td colspan="<?php echo count($grid->columns);?>" align="center"><?php $grid->renderEmptyText() ?></td>
                      	</tr>
                 	<?php }?>
                </table>
            </div>
        </td>
    </tr>
    </tbody>
</table>