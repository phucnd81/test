<div class="table-scrollable">
<table id="<?php echo $grid->id;?>" class="table table-bordered table-hover <?php echo $grid->itemsCssClass;?>" current_url="<?php echo Yii::app()->request->url;?>">
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
</div>
<?php if($pager = $grid->renderPager()){?>
	<?php if($summary = $grid->renderSummary()){
        ;
        $pageMiddle = '<li style="line-height: 30px;">　'.$summary['start'].' ～ '.$summary['end'].' 件目　（全'.$summary['count'].'件中）　 </li>';
    ?>
    <ul class="pager" style=";margin-left: 150px;padding:  0 !important; width:400px;">
        <?php echo join("\n".$pageMiddle, $pager);?>
    </ul>
    <?php }?>
<?php }?>