<table id="<?php echo $grid->id;?>" class="table table-striped table-hover fill-head table-fixed-header <?php echo $grid->itemsCssClass;?>" current_url="<?php echo Yii::app()->request->url;?>">
    <thead>
        <tr>
            <?php
            $count_begin=0;
            if($summary = $grid->renderSummary()){
                $count_begin=$summary['start'];
            }
            if($grid->no){
                echo '<th '.$grid->option_no.'>'.$grid->no.'</th>';
            } ?>
            <?php foreach ($grid->columns as $column){ ?>
                <?php echo $column->renderHeaderCell()?>
            <?php } ?>
        </tr>
    </thead>
    <?php if($total = $grid->dataProvider->getItemCount()){?>
    <tbody>
        <?php for($row = 0; $row<$total; $row++){?>
        <tr class="gradeA <?php echo $grid->rowCssClass[$row%2];?>">
            <?php if($grid->no){
                echo '<td '.$grid->option_no.'>'.$count_begin.'</td>';
                $count_begin++;
            } ?>
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

<div class="row-fluid mtl">
    <?php echo $grid->paper_sumary_before; ?>
    <div class="span6 pagination pagination-centered man" style="margin-top: 0px;">
        <?php if($pager = $grid->renderPager()){?>
            <?php echo $pager;?>
        <?php }?>
            <?php if($summary){
                echo '<span style="position: relative;" class="mll item-paging">'.$summary['start'].' ～ '.$summary['end'].' 件目　（全'.$summary['count'].'件中）</span>';
                ?>
            <?php }?>
            <span class="mll item-paging" style="position: relative; margin-top:0px;"><?php echo $grid->page_size; ?></span>
	</div>
    <?php echo $grid->paper_sumary_last; ?>
</div>
<style>
    .table-fixed-container .body-fixed {
        overflow-y: scroll;
    }
</style>
