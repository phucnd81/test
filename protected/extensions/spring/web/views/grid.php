<div class='clearfix'></div>
<div id="<?php echo $grid->id;?>" class="dataTables_wrapper no-footer">	
	<table class="table table-striped table-bordered table-hover text-center <?php echo $grid->itemsCssClass;?>" current_url="<?php echo Yii::app()->request->url;?>">
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
<div class="row margin-bottom-20">
	<div class="col-md-5">
		<?php if($summary = $grid->renderSummary()){
			$pager = $grid->renderPager();
			$pageMiddle = '<li style="line-height: 30px;">　'.$summary['start'].' ～ '.$summary['end'].' 件目　（全'.$summary['count'].'件中）　 </li>';
		?>
		<ul class="pager no-margin">
			<?php echo join("\n".$pageMiddle, $pager);?>
		</ul>
		<?php }?>
	</div>
	<div class="col-md-7 text-right">
		<a class="btn yellow" data-toggle="modal" href="#long">
			編集
			<i class="fa fa-edit"></i>
		</a>
	</div>
</div>
<style>
.pagination .active a {
	background: -moz-linear-gradient(center top , #FBB450 0%, #F89406 100%) repeat scroll 0 0 rgba(0, 0, 0, 0) !important;
	border: 1px solid #E68E0B !important;
	box-shadow: 0 1px 0 rgba(255, 255, 255, 0.25) inset !important;
	color: #FFFFFF !important;
}
</style>