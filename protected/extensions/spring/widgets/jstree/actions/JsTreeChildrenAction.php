<?php
include(dirname(__FILE__).DIRECTORY_SEPARATOR.'JsTreeBaseAction.php');
class JsTreeChildrenAction extends JsTreeBaseAction
{
    public function run()
    {
		$id = (int)Yii::app()->getRequest()->getParam('id');
		$node = $this->getModel()->node($id);
		
		if($node){
			$children = $node->getChildren();
		}else{
			$children = $this->getModel()->roots(true);
		}
		
		$result = array();
		
		foreach($children as $c){
			$result[] = array(
				"attr" => array("id" => "node_".$c->id, "rel" => (empty($c->level) ? 'drive' : (1 == $c->level) ? 'folder' : 'default')),
				"data" => $c->name . (empty($c->product_sum) ? NULL :" ({$c->product_sum})" ),
				"state" => ((int)$c->rgt - (int)$c->lft > 1) ? "closed" : ""
			);
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($result);		
		Yii::app()->end();		
    }
}