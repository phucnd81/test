<?php
/**
 * PagesLinkPager class file.
 */
class PagesLinkPager extends CLinkPager{
	public $nextPageLabel = '<i class="icon-angle-right"></i>';
	public $prevPageLabel = '<i class="icon-angle-left"></i>';
	public $firstPageLabel = false;
	public $lastPageLabel = false;
	public $maxButtonCount=10;
	public $firstPageCssClass='';
	public $lastPageCssClass='';
	public $previousPageCssClass='';
	public $nextPageCssClass='';
	public $selectedPageCssClass='disabled';
	public $internalPageCssClass='';
	
	/**
	 * Executes the widget.
	 * This overrides the parent implementation by displaying the generated page buttons.
	 */
	public function run()
	{
		$this->registerClientScript();
		$buttons=$this->createPageButtons();
		if(empty($buttons))
			return;
		//echo $this->header;
		$this->htmlOptions['class']='';
		return CHtml::tag('ul',$this->htmlOptions,implode("\n",$buttons));
		//echo $this->footer;
	}
    protected function createPageButtons()
    {
        if(($pageCount=$this->getPageCount())<=1)
            return array();

        list($beginPage,$endPage)=$this->getPageRange();
        $currentPage=$this->getCurrentPage(false); // currentPage is calculated in getPageRange()
        $buttons=array();

        // first page
        if ($this->firstPageLabel !== false) {
            $buttons[]=$this->createPageButton($this->firstPageLabel,0,$this->firstPageCssClass,$currentPage<=0,false);
        }
        // prev page
        if ($this->prevPageLabel !== false && $currentPage>0) {
            if(($page=$currentPage-1)<0)
                $page=0;
            $buttons[]=$this->createPageButton($this->prevPageLabel,$page,$this->previousPageCssClass,$currentPage<=0,false);
        }

        // internal pages
        for($i=$beginPage;$i<=$endPage;++$i)
            $buttons[]=$this->createPageButton($i+1,$i,$this->internalPageCssClass,false,$i==$currentPage);

        // next page
        if ($this->nextPageLabel !== false && $currentPage<$pageCount-1) {
            if(($page=$currentPage+1)>=$pageCount-1)
                $page=$pageCount-1;
            $buttons[]=$this->createPageButton($this->nextPageLabel,$page,$this->nextPageCssClass,$currentPage>=$pageCount-1,false);
        }
        // last page
        if ($this->lastPageLabel !== false) {
            $buttons[]=$this->createPageButton($this->lastPageLabel,$pageCount-1,$this->lastPageCssClass,$currentPage>=$pageCount-1,false);
        }

        return $buttons;
    }
}