<?php

class DefaultController extends FController
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function accessRules()
	{
		return array(	
			array('allow',
				  //'actions' => array('login', 'logout', 'error'),
				  'users'=>array('*'),
			)
		);
	}
}