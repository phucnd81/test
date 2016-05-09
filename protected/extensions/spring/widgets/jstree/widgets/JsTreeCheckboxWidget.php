<?php
/**
 * http://www.jstree.com/
 * http://www.sitepoint.com/article/hierarchical-data-database/2
 */
class JsTreeCheckboxWidget extends CWidget{
	
	public $category;
		
	public $baseScriptUrl;	
	
	public function init() {
		if($this->category===null)
			throw new CException(Yii::t('yii','{class} must specify "category" property values.',array('{class}'=>get_class($this))));
			
		if($this->baseScriptUrl===null){
			$this->baseScriptUrl=Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('admin.extensions.jstree.widgets.assets')).'/jstree';	
		}			
				
		Yii::app()->getClientScript()->registerCoreScript('jquery');	
		Yii::app()->getClientScript()->registerScriptFile("{$this->baseScriptUrl}/jquery.jstree.js");		
		Yii::app()->getClientScript()->registerScriptFile("{$this->baseScriptUrl}/jquery.blockUI.js");
	}
	
	public function run(){				
		$this->render('jsTreeCheckboxWidget');
	}
	
	public function createUrl($route, $params=array(), $ampersand='&') {
		return $this->getController()->createUrl($route, $params, $ampersand);
	}
	
	public function tree(){
		static $tree = "";		
		if(!$tree){			
			$tree .= $this->_tree(Categories::model()->node());
		}		
		return $tree;
	}
	
	public function _tree($node = NULL){		
		if($node){
			$children = $node->getChildren();			
			$result  = '<li class="jstree-open '.($children?'jstree-last':'jstree-leaf').'" categories_id="'.$node->id.'">';				
			$result .= '<a href="#">'.CHtml::encode($node->title).'</a>';			
			
			$result .= ($children)?'<ul>':'';
			
			foreach($children as $c){				
				$result .= $this->_tree($c);
			}
			
			$result .= ($children)?'</ul>':'';					
			$result .= "</li>";
			
			return $result;		
		}		
	}
}