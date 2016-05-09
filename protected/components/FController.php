<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class FController extends CController
{
	public $actionName = '';
	public $controllerName = '';
	public function init(){
		parent::init();
		$this->pageTitle = Yii::t('app', 'Front');
		
		$path = (Yii::app()->request->getBaseUrl(true));
		Yii::app()->params['base_url'] = "{$path}";
		Yii::app()->params['upload_url'] ="{$path}/uploads/";
		Yii::app()->params['upload_tmp_url'] = "{$path}/uploads/tmp/";
		$this->layout='//layouts/front';
	}
	
	public function filterHttp($filter) {
		$f = new HttpFilter;
		$f->filter($filter);
	}
	
	public function filterHttps($filter){
		$f = new HttpsFilter;
		$f->filter($filter);
	}
	
	function filters(){	
		$active_https_flag = Yii::app()->params['active_https_flag'];
		$uRI = $_SERVER['REQUEST_URI'];
		$qString = $_SERVER['QUERY_STRING'];
		$fileUri = str_replace("?" . $qString, "", $uRI);
		///
		if ( in_array($fileUri, array('/regist2.php','/family/CheckContract','/family/CheckEmailAjax','/family/CheckFamilyEntry')) && $active_https_flag == 1 ){
			return array(
					'accessControl',
					'https'
			);
			
		}else{
			if ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' && $active_https_flag == 1 ){
				return array(
						'accessControl',
						'https'
				);
			
			}else{
				return array(
						'accessControl',
						'http'
				);
			
			}
				
/*			return array(
					'accessControl',
					'http'
			);*/
		}
		
		
		/*if ( in_array($fileUri, array('/regist2.php')) && $active_https_flag == 1 ){
			return array(
					'accessControl',
					'https'
			);
		}else{
			return array(
					'accessControl',
					'http'
			);
		}*/
	}
	
	public function checkDevice() {
        $mobile_browser = 0;
        if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $mobile_browser++;
        }
        if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']), 'application/vnd.wap.xhtml+xml') > 0) or ( (isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
            $mobile_browser++;
        }
        $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
        $mobile_agents = array(
            'w3c ', 'acs-', 'alav', 'alca', 'amoi', 'audi', 'avan', 'benq', 'bird', 'blac',
            'blaz', 'brew', 'cell', 'cldc', 'cmd-', 'dang', 'doco', 'eric', 'hipt', 'inno',
            'ipaq', 'java', 'jigs', 'kddi', 'keji', 'leno', 'lg-c', 'lg-d', 'lg-g', 'lge-',
            'maui', 'maxo', 'midp', 'mits', 'mmef', 'mobi', 'mot-', 'moto', 'mwbp', 'nec-',
            'newt', 'noki', 'palm', 'pana', 'pant', 'phil', 'play', 'port', 'prox',
            'qwap', 'sage', 'sams', 'sany', 'sch-', 'sec-', 'send', 'seri', 'sgh-', 'shar',
            'sie-', 'siem', 'smal', 'smar', 'sony', 'sph-', 'symb', 't-mo', 'teli', 'tim-',
            'tosh', 'tsm-', 'upg1', 'upsi', 'vk-v', 'voda', 'wap-', 'wapa', 'wapi', 'wapp',
            'wapr', 'webc', 'winw', 'winw', 'xda ', 'xda-');

        if (in_array($mobile_ua, $mobile_agents)) {
            $mobile_browser++;
        }
        if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'opera mini') > 0) {
            $mobile_browser++;
        }

        if ($mobile_browser <= 0) {
             return true;
        }
        if ($mobile_browser > 0) {
              return false;
            
        }
    }
	
}