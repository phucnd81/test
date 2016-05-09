<?php
Yii::import('zii.widgets.grid.CGridView');
Yii::import('ext.spring.widgets.grid.pager.PagesLinkPager');

class GridView extends CGridView{	
	private $_formatter;	
	public $layout = 'grid';
	public $callBackFnc = '';
	public $startWeek = '';
	public $endWeek = '';
	public $minDate = '';
	public $maxDate = '';
	public $paper_sumary_before='<div class="span3">
            <button type="submit" class="btn btn-danger">検索結果のクリア</button>
        </div>';
    public $paper_sumary_last='<div class="span3 text-right">
            <button type="submit" class="btn btn-success">請求データの出力</button>
        </div>';
	public $pager=array(
		'class'=>'PagesLinkPager'
	);
	public $no="";
    public $option_no='width="10%"';
	public $item_row = '1';
	public $save_cond = false;
	public $page_size = '';
	public $min_width_scroll = '1000px';
	
	public function init(){
		foreach($this->columns as $i=>$column){
			if(!is_string($column) && empty($column['class']))
				$this->columns[$i]['class']='ext.spring.widgets.grid.column.DataColumn';
		}
		
		$this->initColumns();
	}
		
	public function run(){
		$this->script();
		$this->renderContent();
	}
	
	/**
	 * Renders the summary text.
	 */
	public function renderSummary()
	{
		if(($count=$this->dataProvider->getItemCount())<=0)
			return;

		if($this->enablePagination){
			
			$pagination=$this->dataProvider->getPagination();
			$total=$this->dataProvider->getTotalItemCount();
			$start=$pagination->currentPage*$pagination->pageSize+1;
			$end=$start+$count-1;
			if($end>$total){
				$end=$total;
				$start=$end-$count+1;
			}
			
			return array(
				'start'=>$start,
				'end'=>$end,
				'count'=>$total,
				'page'=>$pagination->currentPage+1,
				'pages'=>$pagination->pageCount
			);			
		}
		else{
			return array(
				'start'=>1,
				'end'=>$count,
				'count'=>$count,
				'page'=>1,
				'pages'=>1
			);
		}
	}

	public function renderPager(){
		if(!$this->enablePagination)
			return;

		$pager=array();
		$class='PagesLinkPager';
		if(is_string($this->pager))
			$class=$this->pager;
		elseif(is_array($this->pager)){
			$pager=$this->pager;
			if(isset($pager['class']))
			{
				$class=$pager['class'];
				unset($pager['class']);
			}
		}
		
		if($pager['pages']=$this->dataProvider->getPagination()){
			if($pager['pages']->getPageCount()>1){
				return $this->createWidget($class, $pager)->run();
			}	
		}
	}
	
	public function getEmptyText(){
		return NULL;	
	}
			
	public function renderContent(){
		Yii::app()->controller->renderInternal(
			Yii::app()->spring->getViewFile($this->layout),
			array('grid' => $this)
		);
	}
	
	public function script()
    {
        $cs = Yii::app()->getClientScript();
        $cs->registerScriptFile(Yii::app()->spring->getAssetsUrl() . '/jquery.gridview.js', CClientScript::POS_END);
		
		$baseScriptUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('zii.widgets.assets')).'/gridview';
		Yii::app()->getClientScript()->registerCssFile($baseScriptUrl.'/styles.css');
		Yii::app()->getClientScript()->registerScriptFile($baseScriptUrl.'/jquery.yiigridview.js');
		
        //$cs->registerScriptFile(Yii::app()->spring->getAssetsUrl().'/jquery.blockUI.js',CClientScript::POS_END);
    }
}
