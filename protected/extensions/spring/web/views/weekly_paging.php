<table id="<?php echo $grid->id;?>" class="table table-striped table-bordered table-hover text-center <?php echo $grid->itemsCssClass;?>" current_url="<?php echo Yii::app()->request->url;?>">
    <colgroup>
        <?php foreach ($grid->columns as $column){ ?>
            <col width="<?php echo isset($column->headerHtmlOptions['col']) ? $column->headerHtmlOptions['col'] : ''; ?>">
        <?php } ?>		
    </colgroup>
    <thead>
        <tr role="row">
            <?php foreach ($grid->columns as $column){ ?>
                <?php echo $column->renderHeaderCell()?>
            <?php } ?>
        </tr>
    </thead>
    <?php if($total = $grid->dataProvider->getItemCount()){?>
    <tbody>
        <?php for($row = 0; $row<$total; $row++){?>
        <tr class="gradeA <?php echo $grid->rowCssClass[$row%2];?>">
            <?php foreach($grid->columns as $column){ ?>
            <?php $column->renderDataCell($row);?>
            <?php } ?>
        </tr>
        <?php }?>
    </tbody>
    <?php }else{?>
    <tr>
        <td colspan="<?php echo count($grid->columns);?>" align="center"><?php $grid->renderEmptyText() ?></td>
    </tr>
    <?php }?>
</table>
<?php if ( $grid -> callBackFnc != '' ): ?>
<div class="col-md-12 text-center">
	<?php echo $grid -> pagingWeekly(); ?>
</div>
<?php  endif; ?>