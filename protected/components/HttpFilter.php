<?php
class HttpFilter extends CFilter{
	protected function preFilter($filterChain) {
		if(Yii::app()->getRequest()->isSecureConnection){
			Yii::app()->request->redirect('http://'.Yii::app()->getRequest()->serverName.Yii::app()->getRequest()->requestUri);
			return false;
		}
		return true;
	}
}